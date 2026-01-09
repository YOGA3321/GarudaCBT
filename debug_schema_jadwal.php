<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/plain');

$mysqli = new mysqli("localhost", "root", "", "GarudaCBT");
if ($mysqli->connect_error) die("Connect Error");

echo "=== CBT_JADWAL COLUMNS ===\n";
$res = $mysqli->query("SELECT * FROM cbt_jadwal LIMIT 1");
if ($res && $row = $res->fetch_assoc()) {
    echo json_encode(array_keys($row));
} else {
    echo "No data or error: " . $mysqli->error;
}
?>
