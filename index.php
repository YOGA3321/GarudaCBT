<?php
// 1. LOAD ENVIRONMENT VARIABLES (Local & Hosting Support)
// Manual .env Parser (Fallback if Composer Dotenv fails/not used)
$env_file_path = __DIR__ . '/.env';
if (file_exists($env_file_path)) {
    $lines = file($env_file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if (empty($line) || strpos($line, '#') === 0 || strpos($line, '//') === 0) continue;
        
        if (strpos($line, '=') !== false) {
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);
            // Remove quotes if present
            $value = trim($value, '"\'');
            
            // Set for getenv and $_ENV
            putenv(sprintf('%s=%s', $name, $value));
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }
}

// 2. DETECTIONS & CONFIG
$whitelist_ip = array('::1', '127.0.0.1', 'localhost');
$is_localhost_env = false;
if (in_array($_SERVER['REMOTE_ADDR'], $whitelist_ip) || strpos($_SERVER['HTTP_HOST'], 'localhost') !== false || strpos($_SERVER['HTTP_HOST'], '192.168.') !== false) {
    $is_localhost_env = true;
}

// Protocol & Host
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
$host_server = $_SERVER['HTTP_HOST'];

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $protocol = "https://";
}

// Hosting Domain Override
if (!$is_localhost_env && !empty($_ENV['HOSTING_DOMAIN'])) {
    if (strpos($host_server, $_ENV['HOSTING_DOMAIN']) !== false) {
        $host_server = $_ENV['HOSTING_DOMAIN'];
        $protocol = "https://"; // Force HTTPS on Hosting
    }
}

// Base Path
$doc_root = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
$dir_root = str_replace('\\', '/', __DIR__); 
$base_path = str_replace($doc_root, '', $dir_root);
if ($base_path == '.') $base_path = '';

$base_url = $protocol . $host_server . $base_path;
$base_url = rtrim($base_url, '/') . '/';

if (!empty($_ENV['APP_URL'])) {
    $base_url = rtrim($_ENV['APP_URL'], '/') . '/';
}

if (!defined('BASE_URL')) {
    define('BASE_URL', $base_url);
}

// 3. CHECK DATABASE CONNECTION (Redirect to Install)
$install_needed = false;
$db_error_msg = "";

if ($is_localhost_env) {
    $db_host = $_ENV['LOCALHOST_DB_HOST'] ?? 'localhost';
    $db_user = $_ENV['LOCALHOST_DB_USER'] ?? 'root';
    $db_pass = isset($_ENV['LOCALHOST_DB_PASS']) ? $_ENV['LOCALHOST_DB_PASS'] : '';
    $db_name = $_ENV['LOCALHOST_DB_NAME'] ?? ''; 
} else {
    $db_host = $_ENV['HOSTING_DB_HOST'] ?? 'localhost';
    $db_user = $_ENV['HOSTING_DB_USER'] ?? ''; 
    $db_pass = $_ENV['HOSTING_DB_PASS'] ?? '';            
    $db_name = $_ENV['HOSTING_DB_NAME'] ?? ''; 
}

// Suppress errors for check
mysqli_report(MYSQLI_REPORT_OFF);

try {
    $koneksi = @mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
    if (!$koneksi) {
        $install_needed = true;
    } else {
        // Check if critical table exists
        $check_table = @mysqli_query($koneksi, "SELECT 1 FROM users LIMIT 1");
        if (!$check_table) {
            $install_needed = true;
        }
        mysqli_close($koneksi); // Close temp connection
    }
} catch (Exception $e) {
    $install_needed = true;
}

// Bypass check if we are already running the installer
$current_uri = $_SERVER['REQUEST_URI'];
if ($install_needed && strpos($current_uri, '/installer/') === false && strpos($current_uri, '/assets/') === false) {
    header("Location: " . BASE_URL . "installer/");
    exit;
}

$envs = ['development', 'testing', 'production'];
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : $envs[0]);

switch (ENVIRONMENT) {
    case 'development':
        error_reporting(-1);
        ini_set('display_errors', 1);
        break;
    case 'testing':
    case 'production':
        ini_set('display_errors', 0);
        if (version_compare(PHP_VERSION, '5.3', '>=')) {
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
        } else {
            error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
        }
        break;
    default:
        header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
        echo 'The application environment is not set correctly.';
        exit(1); // EXIT_ERROR
}
$system_path = 'system';
$application_folder = 'application';
$view_folder = '';

if (defined('STDIN')) {
    chdir(dirname(__FILE__));
}

if (($_temp = realpath($system_path)) !== FALSE) {
    $system_path = $_temp . DIRECTORY_SEPARATOR;
} else {
    $system_path = strtr(
            rtrim($system_path, '/\\'),
            '/\\',
            DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
        ) . DIRECTORY_SEPARATOR;
}

if (!is_dir($system_path)) {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: ' . pathinfo(__FILE__, PATHINFO_BASENAME);
    exit(3); // EXIT_CONFIG
}

define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('BASEPATH', $system_path);
define('FCPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('SYSDIR', basename(BASEPATH));

if (is_dir($application_folder)) {
    if (($_temp = realpath($application_folder)) !== FALSE) {
        $application_folder = $_temp;
    } else {
        $application_folder = strtr(
            rtrim($application_folder, '/\\'),
            '/\\',
            DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
        );
    }
} elseif (is_dir(BASEPATH . $application_folder . DIRECTORY_SEPARATOR)) {
    $application_folder = BASEPATH . strtr(
            trim($application_folder, '/\\'),
            '/\\',
            DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
        );
} else {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your application folder path does not appear to be set correctly. Please open the following file and correct this: ' . SELF;
    exit(3); // EXIT_CONFIG
}

define('APPPATH', $application_folder . DIRECTORY_SEPARATOR);

if (!isset($view_folder[0]) && is_dir(APPPATH . 'views' . DIRECTORY_SEPARATOR)) {
    $view_folder = APPPATH . 'views';
} elseif (is_dir($view_folder)) {
    if (($_temp = realpath($view_folder)) !== FALSE) {
        $view_folder = $_temp;
    } else {
        $view_folder = strtr(
            rtrim($view_folder, '/\\'),
            '/\\',
            DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
        );
    }
} elseif (is_dir(APPPATH . $view_folder . DIRECTORY_SEPARATOR)) {
    $view_folder = APPPATH . strtr(
            trim($view_folder, '/\\'),
            '/\\',
            DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
        );
} else {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your view folder path does not appear to be set correctly. Please open the following file and correct this: ' . SELF;
    exit(3); // EXIT_CONFIG
}

define('VIEWPATH', $view_folder . DIRECTORY_SEPARATOR);

require_once BASEPATH . 'core/CodeIgniter.php';
