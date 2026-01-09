<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "# Database Table List\n\n";

$mysqli = new mysqli("localhost", "root", "", "GarudaCBT");
if ($mysqli->connect_error) {
    echo "Connect failed: " . $mysqli->connect_error;
    exit();
}
echo "Connected.\n\n";

$res = $mysqli->query("SHOW TABLES");
if ($res) {
    echo "## Tables Found:\n";
    while ($row = $res->fetch_array()) {
        echo "- " . $row[0] . "\n";
    }
} else {
    echo "Error listing tables: " . $mysqli->error;
}

echo "\n## Checking specific tables:\n";
$tables = ['master_siswa', 'master_tp', 'master_smt', 'cbt_jadwal'];
foreach ($tables as $t) {
    $c = $mysqli->query("SELECT COUNT(*) as c FROM $t");
    if ($c) {
        $r = $c->fetch_assoc();
        echo "- **$t**: " . $r['c'] . " rows\n";
    } else {
        echo "- **$t**: Error - " . $mysqli->error . "\n";
    }
}
?>
