<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/plain');

$mysqli = new mysqli("localhost", "root", "", "GarudaCBT");
if ($mysqli->connect_error) die("Connect Error");

echo "=== MASTER_TP COLUMNS ===\n";
$res = $mysqli->query("SELECT * FROM master_tp LIMIT 1");
if ($res && $row = $res->fetch_assoc()) {
    echo json_encode(array_keys($row)) . "\n\n";
    echo "First Row: " . json_encode($row) . "\n\n";
} else {
    echo "No data or error: " . $mysqli->error . "\n\n";
}

echo "=== MASTER_SMT COLUMNS ===\n";
$res = $mysqli->query("SELECT * FROM master_smt LIMIT 1");
if ($res && $row = $res->fetch_assoc()) {
    echo json_encode(array_keys($row)) . "\n\n";
    echo "First Row: " . json_encode($row) . "\n\n";
} else {
    echo "No data or error: " . $mysqli->error . "\n\n";
}

echo "=== SETTINGS ===\n";
$res = $mysqli->query("SELECT * FROM setting LIMIT 1");
if ($res && $row = $res->fetch_assoc()) {
    echo json_encode($row) . "\n\n";
} else {
    echo "No data or error: " . $mysqli->error . "\n\n";
}
?>
