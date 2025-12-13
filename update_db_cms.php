<?php
$mysqli = new mysqli("localhost", "root", "", "garudacbt");

if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

// 1. Create posts table
$sql_posts = "CREATE TABLE IF NOT EXISTS `posts` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `isi` longtext NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `id_user` int NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '1' COMMENT '1=publish, 0=draft',
  `kategori` varchar(50) DEFAULT 'Berita',
  `views` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;";

if ($mysqli->query($sql_posts) === TRUE) {
    echo "Table posts created successfully.\n";
} else {
    echo "Error creating table posts: " . $mysqli->error . "\n";
}

// 2. Add columns to setting
$columns = [
    "sejarah" => "LONGTEXT NULL",
    "visi_misi" => "LONGTEXT NULL",
    "struktur_organisasi" => "VARCHAR(255) NULL",
    "link_fb" => "VARCHAR(255) NULL",
    "link_ig" => "VARCHAR(255) NULL",
    "link_yt" => "VARCHAR(255) NULL"
    // sambutan is already added 
];

foreach ($columns as $col => $type) {
    $check = $mysqli->query("SHOW COLUMNS FROM setting LIKE '$col'");
    if ($check->num_rows == 0) {
        $sql = "ALTER TABLE setting ADD COLUMN $col $type";
        if ($mysqli->query($sql) === TRUE) {
            echo "Column $col added successfully.\n";
        } else {
            // Ignore row size error if it happens again, we can't fix it easily without changing table engine/format
             echo "Error adding column $col: " . $mysqli->error . "\n";
        }
    } else {
        echo "Column $col already exists.\n";
    }
}

$mysqli->close();
?>
