<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$mysqli = new mysqli("localhost", "root", "", "GarudaCBT");

echo "<h2>Describe master_tp</h2>";
$res = $mysqli->query("DESCRIBE master_tp");
while ($row = $res->fetch_assoc()) {
    print_r($row); echo "<br>";
}

echo "<h2>Describe master_smt</h2>";
$res = $mysqli->query("DESCRIBE master_smt");
while ($row = $res->fetch_assoc()) {
    print_r($row); echo "<br>";
}

echo "<h2>Settings</h2>";
$res = $mysqli->query("SELECT * FROM setting");
while ($row = $res->fetch_assoc()) {
    print_r($row); echo "<br>";
}
?>
