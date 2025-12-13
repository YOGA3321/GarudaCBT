<?php
$mysqli = new mysqli("localhost", "root", "", "garudacbt");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$result = $mysqli->query("DESCRIBE setting");

while($row = $result->fetch_assoc()) {
    print_r($row);
}

$mysqli->close();
?>
