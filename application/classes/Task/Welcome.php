<?php defined('SYSPATH') or die('No direct script access.');
class Task_Welcome extends Minion_Task {
    protected function _execute(array $params)
    {
        
        $limit = 100;
        $offset = 0;
        
        $ua = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36';
        
        do {
            $list = array();
            $url = "http://time2shop.spb.ru/get_item.php?key=k9olwer9873425jh02938457&all&limit={$limit}&from={$offset}";
            echo $url . "\n";
            flush(); ob_flush();
            $data = Util_Curl_Preset::get($url)
            ->setOption('CURLOPT_USERAGENT', $ua)
            ->run();
        
            flush(); ob_flush();
        
            if ($data['error']){
                exit($data['error']);
            }
            $list = json_decode($data['data'], true);
        
            $hostImg = 'http://time2shop.spb.ru';
            $path = dirname(__FILE__) . '/tmp';
        
        
        
            foreach ($list as $v){
                Minion_CLI::write("Делаем {$v['ms_uuid']} ...");
                
                
                $url = $hostImg . $v['image'];
                $filename =  $path . '/' .$v['image_file_name'];
                $thumbnail_filename = $path . '/th_' .$v['image_file_name'];
                if (file_exists($filename)) continue;
        
                $cu = Util_Curl_Preset::get($url);
                $cu->setOption('CURLOPT_USERAGENT', $ua);
                $data = $cu->run();
                if ($data['error']){
                    exit($data['error']);
                }
        
                if (sizeof($data['data'])){
        
        
                    if (!$handle = fopen($filename, 'wb')) {
                        
                        Minion_CLI::write("Не могу открыть файл ($filename)");
                        exit;
                    }
        
                    // Записываем $somecontent в наш открытый файл.
                    if (fwrite($handle, $data['data']) === FALSE) {
                    
                    Minion_CLI::write("Не могу произвести запись в файл ($filename)");
                        exit;
                    }
        
        
                    fclose($handle);
        
                    Image::factory($filename)
                    ->resize(200, 200, Image::AUTO)
                    ->save($thumbnail_filename, 80);
        
                }
        
           }
           
           $offset += $limit;
           if ($offset > 300) break;
        }while (count($list));
        
    }
}