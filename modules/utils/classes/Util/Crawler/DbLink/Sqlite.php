<?php defined('SYSPATH') or die('No direct script access.');

class Util_Crawler_DbLink_Sqlite extends Util_Crawler_DbLink{
    
    protected $table = 'crawler_link';
    public $dbIndex = 'sqlite';
    
    public function __construct(Util_Crawler_Log $loger, $project){
        parent::__construct($loger, $project);
                
        $query = 'CREATE TABLE IF NOT EXISTS crawler_link (id integer PRIMARY KEY AUTOINCREMENT,project varchar NOT NULL,url_hash varchar NOT NULL,url text NOT NULL,ref text,extra text,status varchar NOT NULL,created_at timestamp NOT NULL,updated_at timestamp,cache varchar)';
        $this->getDb()->query(NULL, $query);
        $query = 'CREATE UNIQUE INDEX IF NOT EXISTS project ON crawler_link(project,url_hash)';
        $this->getDb()->query(NULL, $query);
    }
        
    public function getLinks($limit){
        $query = DB::select()
        ->from($this->table)
        ->where('project', '=', $this->project)
        ->and_where('status', '=', 'added')
        ->order_by('created_at', 'ASC')
        ->limit($limit);
        
        $out = array();

        $rows = DB::query ( Database::SELECT, $query )->as_assoc()->execute($this->getDb())->as_array();
        if (count ( $rows )) {
            foreach ( $rows as $row ) {
                $link = new Util_Crawler_Link ();
                $link->id = $row['id'];
                $link->setUrl($row['url']);
                $link->setRef($row['ref']);
                $link->setExtra($row['extra']);
                $link->status = $row['status'];
                $link->cache = $row['cache'];
                $out[] = $link;
            }
        }
                
        
        return $out;
    }
    
    public function removeLinks(){
        $query = DB::delete($this->table)
        ->where('project', '=', $this->project)
        //->limit(1000)
        ;
        $rows = 0;
        do {
            $rows = DB::query ( Database::DELETE, $query)->execute($this->getDb());
        } while ($rows);
        
        return true;
        
    }
    
    public function getLink($url){
        $query = DB::select()
        ->from($this->table)
        ->where('project', '=', $this->project)
        ->and_where('url', '=', $url)
        ->limit(1);
        
        $rows = DB::query ( Database::SELECT, $query )->as_assoc()->execute($this->getDb())->as_array();
        if (count($rows)){
            $row = $rows[0];
            $link = new Util_Crawler_Link ();
            $link->id = $row['id'];
            $link->setUrl($row['url']);
            $link->setRef($row['ref']);
            $link->setExtra($row['extra']);
            $link->status = $row['status'];
            $link->cache = $row['cache'];
            
            return $link;
        }
        
        return null;
        
    }
    
    public function saveLink(Util_Crawler_Link $link){
        return $link->id ? $this->updateLink($link) : $this->insertLink($link);
    }
    
    protected function insertLink(Util_Crawler_Link $link){
        $columns = array('project', 'url_hash', 'url', 'ref', 'extra', 'status', 'created_at', 'cache');
        $values = array($this->project, md5($link->url), $link->url, $link->ref, $link->extra, $link->status, date('Y-m-d H:i:s'), $link->cache);
        $query = DB::insert($this->table, $columns)->values($values);
        
        try {
            list ($insert_id, $affected_rows) = DB::query(Database::INSERT, $query)->execute($this->getDb());
            $link->id = $insert_id;
        }
        catch (Database_Exception $e){
            if ($e->getCode() == 23000){
                //$this->loger->warn('INSERT DUP Url ' . $link->url);
                return 'dup';
            }
            else throw $e;
        }
        
        
        
        return $link;
    }
    
    protected function updateLink(Util_Crawler_Link $link){
        $query = DB::update($this->table)
        ->set(array('extra' => $link->extra, 'status' => $link->status, 'cache' => $link->cache, 'updated_at' => date('Y-m-d H:i:s')))
        ->where('id', '=', $link->id);
        DB::query(Database::UPDATE, $query)->execute($this->getDb());
        
        return $link;
        
    }
    
    /**
     *
     * @return  Database
     */
    protected function getDb(){
        return Database::instance($this->dbIndex);
    }
}