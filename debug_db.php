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

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

echo "Tables:\n";
$tables = $mysqli->query("SHOW TABLES");
while ($row = $tables->fetch_row()) {
    echo $row[0] . ", ";
}
echo "\n\nContent of cbt_jadwal:\n";
$res = $mysqli->query("SELECT id_jadwal, tgl_mulai, tgl_selesai, jam_ke, id_tp, id_smt, id_bank FROM cbt_jadwal");
if ($res) {
    while ($row = $res->fetch_assoc()) {
        print_r($row);
    }
} else {
    echo "Error selecting cbt_jadwal: " . $mysqli->error;
}
?>
