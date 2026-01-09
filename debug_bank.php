<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$mysqli = new mysqli("localhost", "root", "", "GarudaCBT");

echo "Checking Bank Soal ID=1\n"; // Assuming exam uses bank_id=1 from previous output
$res = $mysqli->query("SELECT * FROM cbt_bank_soal WHERE id_bank=1");
if ($row = $res->fetch_object()) {
    echo "Bank Kode: " . $row->bank_kode . "\n";
    echo "Bank Kelas (Raw): " . $row->bank_kelas . "\n";
    $bk = unserialize($row->bank_kelas);
    echo "Bank Kelas (Unserialized): " . print_r($bk, true) . "\n";
} else {
    echo "Bank ID 1 not found.\n";
    // Check if id_jadwal=1 uses a different bank
    $jad = $mysqli->query("SELECT id_bank FROM cbt_jadwal WHERE id_jadwal=1")->fetch_object();
    if ($jad) {
       echo "Jadwal 1 uses Bank ID: " . $jad->id_bank . "\n";
       $res2 = $mysqli->query("SELECT * FROM cbt_bank_soal WHERE id_bank=" . $jad->id_bank);
       if ($row2 = $res2->fetch_object()) {
           echo "Bank Kelas: " . print_r(unserialize($row2->bank_kelas), true);
       }
    }
}
?>
