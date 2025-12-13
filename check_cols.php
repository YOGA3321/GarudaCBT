<?php
$mysqli = new mysqli("localhost", "root", "", "garudacbt");
$result = $mysqli->query("SHOW COLUMNS FROM setting");
while($row = $result->fetch_assoc()){
    echo $row['Field'] . "\n";
}
