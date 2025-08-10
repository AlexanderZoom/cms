<?php
class Util_PidFile
{
    private $shells = array('ps' => '/usr/bin/env ps', 'kill' => '/usr/bin/env kill');
    private $filePid = '';
    private $timeDir = '';
    private $timeout = 0; // unlimited sec

    public function __construct($options)
    {
        
        if (!isset($options['file_pid']) || !$options['file_pid'] ) throw new Util_PidFile_Exception("File pid is undefined");
        elseif(!file_exists($options['file_pid']))
        {
            $dirname = dirname($options['file_pid']);
            @mkdir($dirname, 0777, true);
            @chmod($dirname, 0777);

            @touch($options['file_pid']);
            @chmod($options['file_pid'], 0666);
        }

        if (!is_readable($options['file_pid'])) throw new Util_PidFile_Exception ("File pid not readable");
        elseif (!is_writable($options['file_pid'])) throw new Util_PidFile_Exception("File pid not writable");
        else
        {
            $this->filePid = $options['file_pid'];
        }

        if (!isset($options['time_dir']) || !$options['time_dir'] ) throw new Util_PidFile_Exception("Time dir is undefined");
        else
        {
            
            if (!file_exists($options['time_dir']))
            {
                $dirname = $options['time_dir'];
                @mkdir($dirname, 0777, true);
                @chmod($dirname, 0777);
            }


            if (substr(sprintf('%o', fileperms($options['time_dir'])), -3) != 777) throw new Util_PidFile_Exception("Permission for Time dir is not 777");
            else ;


            $this->timeDir = $options['time_dir'];

        }


        if (isset($options['timeout']) && $options['timeout']) $this->timeout = $options['timeout'];
    }

    public function getCurrentPid()
    {
        return getmypid();
    }

    public function check()
    {

        $timeOldProcess = $currentTime = time();


        $pid = $this->getPid();

        if ($pid)
        {
            $ps = shell_exec("{$this->shells['ps']} p ".$pid);
            $ps = explode("\n", $ps);
            //print_r($ps);
        }
        else $ps = array();

        if(count($ps)<3)
        {
            ;
        }
        else
        {
            if($tmpTime = $this->getTime($pid)) $timeOldProcess = $tmpTime;

            
           // echo ($currentTime - $this->timeout) ." ".  $timeOldProcess . "\n";
            if (!$timeOldProcess) throw new Util_PidFile_Exception("Time for old process is empty");
                
            if ($this->timeout != 0 && ($currentTime - $this->timeout) >  $timeOldProcess  )
            {
                shell_exec("{$this->shells['kill']} -9 ".$pid);
                $this->unsetTime($pid);
                ///throw new Util_PidFile_Exception("Process {$pid} was expired. killed.  start time: {$timeOldProcess}");
            }
            else throw new Util_PidFile_Exception_Runing("Process {$pid} is runing");
        }


        $pid = $this->getCurrentPid();
        $this->setPid($pid);
        $this->setTime($pid, $currentTime);

    }

    private function getTime($pid)
    {
        $timeFile = "{$this->timeDir}/{$pid}.time";

        $handle = @fopen($timeFile, "r");
        $contents = @fread($handle, filesize($timeFile));
        @fclose($handle);

        return (int) $contents;
    }

    private function setTime($pid, $time)
    {
        $timeFile = "{$this->timeDir}/{$pid}.time";


        if (file_exists("$timeFile"))
        {
            //cronLog(2, "Time file exist {$timeFile}");
            if (unlink($timeFile)) ; //cronLog(2, "Time file was removed {$timeFile}");
            else throw new Util_PidFile_Exception("Old Time file was not removed {$timeFile}");
        }


        if (!file_exists($timeFile))
        {
            @touch($timeFile);
            @chmod($time, 0666);
        }

        $this->writeFile($timeFile, $time);
    }

    private function unsetTime($pid)
    {
        $timeFile = "{$this->timeDir}/{$pid}.time";
        @unlink($timeFile);
    }

    public function deleteTimeFile()
    {
        $this->getPid() ? $this->unsetTime($this->getPid()): null;
    }

    private function getPid()
    {
        $handle = fopen($this->filePid, "r");
        $contents = @fread($handle, filesize($this->filePid));
        fclose($handle);

        return trim($contents);
    }

    private function setPid($pid)
    {
        $this->writeFile($this->filePid, $pid);
    }


    private function writeFile($fileName, $content)
    {
        if (is_writable($fileName))
        {
            if (!$handle = fopen($fileName, 'w'))
            {
                throw new Util_PidFile_Exception("Can not open file : {$fileName}");
            }


            if (fwrite($handle, $content) === FALSE)
            {
                throw new Util_PidFile_Exception("Can not write to file log: {$fileName}");
            }

            fclose($handle);

        }
        else
        {
            throw new Util_PidFile_Exception("File is not writable {$fileName}");
        }
    }
}
?>