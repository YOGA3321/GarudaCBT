<?php
$mysqli = new mysqli("localhost", "root", "", "garudacbt");

$sql = "CREATE TABLE IF NOT EXISTS `school_profile` (
  `id_profile` int(11) NOT NULL AUTO_INCREMENT,
  `sejarah` longtext,
  `visi_misi` longtext,
  `struktur_organisasi` varchar(255) DEFAULT NULL,
  `link_fb` varchar(255) DEFAULT NULL,
  `link_ig` varchar(255) DEFAULT NULL,
  `link_yt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_profile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;";

if ($mysqli->query($sql) === TRUE) {
    echo "Table school_profile created successfully.\n";
    // Insert default row if empty
    $check = $mysqli->query("SELECT * FROM school_profile");
    if ($check->num_rows == 0) {
        $mysqli->query("INSERT INTO school_profile VALUES (1, NULL, NULL, NULL, NULL, NULL, NULL)");
        echo "Default row inserted.\n";
    }
} else {
    echo "Error creating table: " . $mysqli->error . "\n";
}
$mysqli->close();
