<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * Base exception implementation (PHP 8.x compatible).
 * Kohana naming convention: 
 *   - system/classes/Kohana/Kohana/Exception.php defines Kohana_Kohana_Exception
 *   - system/classes/Kohana/Exception.php defines Kohana_Exception extends Kohana_Kohana_Exception
 */
class Kohana_Kohana_Exception extends Exception {

    public static $php_errors = array(
        E_ERROR             => 'Fatal Error',
        E_USER_ERROR        => 'User Error',
        E_PARSE             => 'Parse Error',
        E_WARNING           => 'Warning',
        E_USER_WARNING      => 'User Warning',
        E_STRICT            => 'Strict',
        E_NOTICE            => 'Notice',
        E_RECOVERABLE_ERROR => 'Recoverable Error',
        E_DEPRECATED        => 'Deprecated',
    );

    public static $error_view = 'kohana/error';
    public static $error_view_content_type = 'text/html';

    public function __construct($message = "", array $variables = NULL, $code = 0, ?Throwable $previous = NULL)
    {
        $message = __($message, $variables);
        parent::__construct($message, (int)$code, $previous);
        $this->code = $code;
    }

    public function __toString()
    {
        return self::text($this);
    }

    public static function handler(Throwable $e)
    {
        $response = self::_handler($e);
        echo $response->send_headers()->body();
        exit(1);
    }

    public static function _handler(Throwable $e)
    {
        try
        {
            self::log($e);
            return self::response($e);
        }
        catch (Throwable $e)
        {
            ob_get_level() AND ob_clean();
            header('Content-Type: text/plain; charset='.Kohana::$charset, TRUE, 500);
            echo self::text($e);
            exit(1);
        }
    }

    public static function log(Throwable $e, $level = Log::EMERGENCY)
    {
        if (is_object(Kohana::$log))
        {
            $error = self::text($e);
            Kohana::$log->add($level, $error, NULL, array('exception' => $e));
            Kohana::$log->write();
        }
    }

    public static function text(Throwable $e)
    {
        return sprintf('%s [ %s ]: %s ~ %s [ %d ]',
            get_class($e),
            $e->getCode(),
            strip_tags($e->getMessage()),
            Debug::path($e->getFile()),
            $e->getLine()
        );
    }

    public static function response(Throwable $e)
    {
        try
        {
            $class   = get_class($e);
            $code    = $e->getCode();
            $message = $e->getMessage();
            $file    = $e->getFile();
            $line    = $e->getLine();
            $trace   = $e->getTrace();

            if ($e instanceof HTTP_Exception AND isset($trace[0]['function']) AND $trace[0]['function'] === 'factory')
            {
                extract(array_shift($trace));
            }

            if ($e instanceof ErrorException)
            {
                if (function_exists('xdebug_get_function_stack') AND $code == E_ERROR)
                {
                    $trace = array_slice(array_reverse(xdebug_get_function_stack()), 4);
                    foreach ($trace as & $frame)
                    {
                        if ( ! isset($frame['type'])) $frame['type'] = '??';
                        if ('dynamic' === $frame['type']) $frame['type'] = '->';
                        elseif ('static' === $frame['type']) $frame['type'] = '::';
                        if (isset($frame['params']) AND ! isset($frame['args'])) $frame['args'] = $frame['params'];
                    }
                }
                if (isset(self::$php_errors[$code]))
                {
                    $code = self::$php_errors[$code];
                }
            }

            if ( defined('PHPUnit_MAIN_METHOD') OR defined('PHPUNIT_COMPOSER_INSTALL') OR defined('__PHPUNIT_PHAR__') )
            {
                $trace = array_slice($trace, 0, 2);
            }

            $view = View::factory(self::$error_view, get_defined_vars());

            $response = Response::factory();
            $response->status(($e instanceof HTTP_Exception) ? $e->getCode() : 500);
            $response->headers('Content-Type', self::$error_view_content_type.'; charset='.Kohana::$charset);
            $response->body($view->render());
        }
        catch (Throwable $e)
        {
            $response = Response::factory();
            $response->status(500);
            $response->headers('Content-Type', 'text/plain');
            $response->body(self::text($e));
        }
        return $response;
    }
}
