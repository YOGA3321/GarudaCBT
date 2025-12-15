<?php
defined('BASEPATH') OR exit('DB: No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

// Manual .env Parser
$env_file_path = FCPATH . '.env';
if (file_exists($env_file_path)) {
    $lines = file($env_file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        if (strpos($line, '=') !== false) {
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);
            $value = trim($value, '"\'');
            if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                putenv(sprintf('%s=%s', $name, $value));
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
    }
}

// Environment Detection
$whitelist = array('::1', '127.0.0.1', 'localhost');
$is_localhost = false;
if (in_array($_SERVER['REMOTE_ADDR'], $whitelist) || strpos($_SERVER['HTTP_HOST'], 'localhost') !== false || strpos($_SERVER['HTTP_HOST'], '192.168.') !== false) {
    $is_localhost = true;
}

// Select Credentials based on Environment
if ($is_localhost) {
    $db_host = getenv('LOCALHOST_DB_HOST');
    $db_user = getenv('LOCALHOST_DB_USER');
    $db_pass = getenv('LOCALHOST_DB_PASS');
    $db_name = getenv('LOCALHOST_DB_NAME');
} else {
    $db_host = getenv('HOSTING_DB_HOST');
    $db_user = getenv('HOSTING_DB_USER');
    $db_pass = getenv('HOSTING_DB_PASS');
    $db_name = getenv('HOSTING_DB_NAME');
}

$db['default'] = array(
    'dsn'	=> '',
    'hostname' => $db_host,
    'username' => $db_user,
    'password' => $db_pass,
    'database' => $db_name,
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
