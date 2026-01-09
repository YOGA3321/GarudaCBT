<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "# DB Inspection v4 (Corrected)\n\n";

$mysqli = new mysqli("localhost", "root", "", "GarudaCBT");
if ($mysqli->connect_error) die("Connect failed: " . $mysqli->connect_error);

// Check TP
echo "## TP Data\n";
$res = $mysqli->query("SELECT * FROM master_tp WHERE active=1");
if ($res && $res->num_rows > 0) {
    $active_tp = $res->fetch_object();
    echo "Active TP: {$active_tp->id_tp} ({$active_tp->tahun})\n";
} else {
    die("CRITICAL: No active TP found.\n");
}

// Check SMT
echo "\n## SMT Data\n";
$res = $mysqli->query("SELECT * FROM master_smt WHERE active=1");
if ($res && $res->num_rows > 0) {
    $active_smt = $res->fetch_object();
    echo "Active SMT: {$active_smt->id_smt} ({$active_smt->smt})\n";
} else {
    die("CRITICAL: No active SMT found.\n");
}

// Check Student
echo "\n## Student Data (kombon)\n";
// Note: master_siswa might join with kelas_siswa for current class?
// Let's check master_siswa first
$res = $mysqli->query("SELECT * FROM master_siswa WHERE username='kombon' OR nis='kombon'");
$siswa = $res->fetch_object();
if ($siswa) {
    echo "ID: {$siswa->id_siswa}\n";
    echo "Nama: {$siswa->nama}\n";
    // Check kelas_siswa for current TP/SMT
    $sql_kelas = "SELECT * FROM kelas_siswa WHERE id_siswa = {$siswa->id_siswa} AND id_tp = {$active_tp->id_tp} AND id_smt = {$active_smt->id_smt}";
    $res_kelas = $mysqli->query($sql_kelas);
    if ($res_kelas && $res_kelas->num_rows > 0) {
        $ks = $res_kelas->fetch_object();
        echo "Kelas (Active TP/SMT): {$ks->id_kelas}\n";
        $siswa_kelas_id = $ks->id_kelas;
    } else {
        echo "Kelas: Not found in kelas_siswa for active TP/SMT. Using master_siswa.id_kelas: {$siswa->id_kelas}\n";
        $siswa_kelas_id = $siswa->id_kelas;
    }
    echo "Agama: {$siswa->agama}\n";
} else {
    die("Student not found.\n");
}


// Check Jadwal
echo "\n## CBT Jadwal Data\n";
$sql = "SELECT * FROM cbt_jadwal WHERE id_tp={$active_tp->id_tp} AND id_smt={$active_smt->id_smt}";
$res = $mysqli->query($sql);
echo "Exams found for active TP/SMT: " . $res->num_rows . "\n";

while ($row = $res->fetch_object()) {
    echo "--------------------------------------------------\n";
    echo "Exam ID: {$row->id_jadwal}\n";
    echo "Dates: {$row->tgl_mulai} to {$row->tgl_selesai}\n";
    
    // Time Check
    $now = time();
    $start = strtotime($row->tgl_mulai);
    $end = strtotime($row->tgl_selesai);
    $is_time = ($now >= $start && $now <= $end);
    echo "Time Valid: " . ($is_time ? "YES" : "NO") . " (Now: $now, Start: $start, End: $end)\n";
    
    // Status
    $is_status = ($row->status == '1');
    echo "Status Active: " . ($is_status ? "YES" : "NO") . "\n";
    
    // Class Target
    $bank_kelas = unserialize($row->bank_kelas);
    $is_class = false;
    echo "Target Classes: ";
    if (is_array($bank_kelas)) {
        foreach ($bank_kelas as $bk) {
            echo "[{$bk['kelas_id']}] ";
            if ($bk['kelas_id'] == $siswa_kelas_id) $is_class = true;
        }
    }
    echo "\nClass Valid: " . ($is_class ? "YES" : "NO") . "\n";
    
    // Outcome
    if ($is_time && $is_status && $is_class) {
        echo ">> SHOULD BE VISIBLE <<\n";
    } else {
        echo ">> HIDDEN <<\n";
    }
}
?>
