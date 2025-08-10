<?php defined('SYSPATH') or die('No direct script access.');

class Util_Crawler_DbLink_Mysql extends Util_Crawler_DbLink{
    
    protected $table = 'crawler_link';
        
    public function getLinks($limit){
        $query = DB::select()
        ->from($this->table)
        ->where('project', '=', $this->project)
        ->and_where('status', '=', 'added')
        ->order_by('created_at', 'ASC')
        ->limit($limit);
        
        $out = array();

        $rows = DB::query ( Database::SELECT, $query )->as_assoc()->execute()->as_array();
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
        ->limit(1000);
        $rows = 0;
        do {
            $rows = DB::query ( Database::DELETE, $query)->execute();
        } while ($rows);
        
        return true;
        
    }
    
    public function getLink($url){
        $query = DB::select()
        ->from($this->table)
        ->where('project', '=', $this->project)
        ->and_where('url', '=', $url)
        ->limit(1);
        
        $rows = DB::query ( Database::SELECT, $query )->as_assoc()->execute()->as_array();
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
            list ($insert_id, $affected_rows) = DB::query(Database::INSERT, $query)->execute();
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
        DB::query(Database::UPDATE, $query)->execute();
        
        return $link;
        
    }
}

// CREATE TABLE `crawler_link` (
//   `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
//   `project` varchar(75) NOT NULL,
//   `url_hash` varchar(32) NOT NULL,
//   `url` text NOT NULL,
//   `ref` text,
//   `extra` longtext,
//   `status` varchar(10) NOT NULL,
//   `created_at` datetime NOT NULL,
//   `update_at` datetime DEFAULT NULL,
//   `cache` varchar(100) DEFAULT NULL,
//   PRIMARY KEY (`id`),
//   UNIQUE KEY `project` (`project`,`url_hash`)
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8;