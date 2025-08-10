<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Test task
 * @author alex
 *
 *
 */
class Task_Test extends Minion_Task {
    protected $_options = array(
    // param name => default value
    'foo'   => 'beautiful',
    );
    
    protected function _execute(array $params)
    {
        $i=1;
        
        Minion_CLI::write(print_r($params, true));
        
        while ($i<60){
         Minion_CLI::write_replace(str_repeat('.', $i));
         Minion_CLI::wait(1);
         $i++;
        }
        Minion_CLI::write('');
        
       
    }
}