<?php
/**
 * Legacy compatibility shims for running old Kohana-based code on PHP 8+.
 * Постепенно эти шимы можно убирать по мере рефакторинга.
 */
declare(strict_types=1);

// ---- each() polyfill (удалено в PHP 8) ----
if (!function_exists('each')) {
    function each(&$array) {
        $key = key($array);
        if ($key === null) {
            return false;
        }
        $value = current($array);
        next($array);
        return array(1 => $value, 'value' => $value, 0 => $key, 'key' => $key);
    }
}

// ---- create_function() polyfill (удалено в PHP 8) ----
if (!function_exists('create_function')) {
    function create_function($args, $code) {
        $args = (string) $args;
        $code = (string) $code;
        if (stripos($code, '<?') !== false || stripos($code, '?>') !== false) {
            throw new \RuntimeException('create_function shim: PHP tags are not allowed');
        }
        $args = trim($args);
        $body = "return function($args) { $code };";
        /** @var \Closure $fn */
        $fn = eval($body);
        if (!$fn instanceof \Closure) {
            throw new \RuntimeException('create_function shim: failed to create closure');
        }
        return $fn;
    }
}

// ---- split()/spliti() polyfills (удалены в PHP 7) ----
if (!function_exists('split')) {
    function split($pattern, $string, $limit = -1) {
        // Оборачиваем POSIX-паттерн в /.../ для PCRE
        $delim = '/';
        $p = $delim . str_replace($delim, '\\' . $delim, $pattern) . $delim;
        return preg_split($p, $string, $limit);
    }
}
if (!function_exists('spliti')) {
    function spliti($pattern, $string, $limit = -1) {
        $delim = '/';
        $p = $delim . str_replace($delim, '\\' . $delim, $pattern) . $delim . 'i';
        return preg_split($p, $string, $limit);
    }
}

// ---- ereg()/ereg_replace() polyfills (удалены в PHP 7) ----
if (!function_exists('ereg')) {
    function ereg($pattern, $string, &$regs = null) {
        $delim = '/';
        $p = $delim . str_replace($delim, '\\' . $delim, $pattern) . $delim;
        $result = preg_match($p, $string, $regs);
        return $result === 1;
    }
}
if (!function_exists('ereg_replace')) {
    function ereg_replace($pattern, $replacement, $string) {
        $delim = '/';
        $p = $delim . str_replace($delim, '\\' . $delim, $pattern) . $delim;
        return preg_replace($p, $replacement, $string);
    }
}

// ---- magic_quotes ----
if (!function_exists('get_magic_quotes_gpc')) { function get_magic_quotes_gpc() { return 0; } }
if (!function_exists('get_magic_quotes_runtime')) { function get_magic_quotes_runtime() { return 0; } }
if (!function_exists('set_magic_quotes_runtime')) { function set_magic_quotes_runtime($new_setting) { return false; } }

// ---- mbregex_encoding stub ----
if (!function_exists('mbregex_encoding')) {
    function mbregex_encoding($enc) { return true; }
}
