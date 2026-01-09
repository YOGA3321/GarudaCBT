<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "# DB Inspection v3\n\n";

$mysqli = new mysqli("localhost", "root", "", "GarudaCBT");
if ($mysqli->connect_error) die("Connect failed: " . $mysqli->connect_error);

// Check TP
echo "## TP Data\n";
$res = $mysqli->query("SELECT * FROM master_tp");
$active_tp = null;
while ($row = $res->fetch_object()) {
    echo "- ID: {$row->id_tp}, Tahun: {$row->tahun}, Aktif: {$row->aktif}\n";
    if ($row->aktif == 1) $active_tp = $row;
}

// Check SMT
echo "\n## SMT Data\n";
$res = $mysqli->query("SELECT * FROM master_smt");
$active_smt = null;
while ($row = $res->fetch_object()) {
    echo "- ID: {$row->id_smt}, SMT: {$row->smt}, Aktif: {$row->aktif}\n";
    if ($row->aktif == 1) $active_smt = $row;
}

if (!$active_tp || !$active_smt) {
    die("\nCRITICAL: No active TP or SMT found!\n");
}

echo "\nActive TP ID: {$active_tp->id_tp}\n";
echo "Active SMT ID: {$active_smt->id_smt}\n";

// Check Jadwal
echo "\n## CBT Jadwal Data\n";
$res = $mysqli->query("SELECT * FROM cbt_jadwal");
if ($res->num_rows == 0) echo "No exams found in table.\n";
while ($row = $res->fetch_object()) {
    echo "Exam ID: {$row->id_jadwal}\n";
    echo "  TP/SMT: {$row->id_tp} / {$row->id_smt}\n";
    echo "  Dates: {$row->tgl_mulai} -> {$row->tgl_selesai}\n";
    echo "  Status: {$row->status}\n";
    echo "  Bank Kelas: {$row->bank_kelas}\n";
    echo "  Religion: {$row->soal_agama}\n";
    
    // Check Match
    $match_tp = ($row->id_tp == $active_tp->id_tp);
    $match_smt = ($row->id_smt == $active_smt->id_smt);
    echo "  Matches Active TP/SMT? " . ($match_tp && $match_smt ? "YES" : "NO (TP:$match_tp, SMT:$match_smt)") . "\n";
}

// Check Student
echo "\n## Student Data (kombon)\n";
$res = $mysqli->query("SELECT * FROM master_siswa WHERE username='kombon' OR nis='kombon'");
if ($row = $res->fetch_object()) {
    echo "ID: {$row->id_siswa}\n";
    echo "Kelas: {$row->id_kelas}\n";
    echo "Agama: {$row->agama}\n";
} else {
    echo "Student 'kombon' not found.\n";
}
?>
