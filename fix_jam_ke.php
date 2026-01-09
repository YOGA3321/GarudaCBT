<?php
define('FCPATH', __DIR__ . '/');
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
            putenv(sprintf('%s=%s', $name, $value));
        }
    }
}

$db_host = getenv('LOCALHOST_DB_HOST') ?: 'localhost';
$db_user = getenv('LOCALHOST_DB_USER') ?: 'root';
$db_pass = getenv('LOCALHOST_DB_PASS') ?: '';
$db_name = getenv('LOCALHOST_DB_NAME') ?: 'garudacbt';

echo "Connecting to $db_host as $db_user for DB $db_name...\n";

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Update cbt_jadwal
$query = "UPDATE cbt_jadwal SET jam_ke = 1 WHERE jam_ke = 0 OR jam_ke IS NULL";
$result = $mysqli->query($query);
if ($result) {
    echo "Updated cbt_jadwal jam_ke: " . $mysqli->affected_rows . " rows.\n";
} else {
    echo "Error updating cbt_jadwal: " . $mysqli->error . "\n";
}

$mysqli->close();
?>
