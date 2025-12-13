<?php
$mysqli = new mysqli("localhost", "root", "", "garudacbt");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$columns = [
    "sambutan" => "TEXT NULL",
    "link_fb" => "VARCHAR(255) NULL",
    "link_ig" => "VARCHAR(255) NULL",
    "link_yt" => "VARCHAR(255) NULL"
];

foreach ($columns as $col => $type) {
    $check = $mysqli->query("SHOW COLUMNS FROM setting LIKE '$col'");
    if ($check->num_rows == 0) {
        $sql = "ALTER TABLE setting ADD COLUMN $col $type";
        if ($mysqli->query($sql) === TRUE) {
            echo "Column $col added successfully.\n";
        } else {
            echo "Error adding column $col: " . $mysqli->error . "\n";
        }
    } else {
        echo "Column $col already exists.\n";
    }
}

$mysqli->close();
?>
