<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Debug Exam Visibility v2</h1>";

$mysqli = new mysqli("localhost", "root", "", "GarudaCBT");

if ($mysqli->connect_error) {
    echo "Connect failed (GarudaCBT): " . $mysqli->connect_error . "<br>";
    $mysqli = new mysqli("localhost", "root", "", "garudacbt");
    if ($mysqli->connect_error) {
        die("Connect failed (garudacbt): " . $mysqli->connect_error);
    }
}
echo "Connected to DB.<br>";

function checkQuery($mysqli, $sql) {
    $res = $mysqli->query($sql);
    if (!$res) {
        echo "<div style='color:red'>Query Failed: $sql<br>Error: " . $mysqli->error . "</div>";
        return false;
    }
    return $res;
}

// 1. User
$username = 'kombon';
echo "<h2>1. Student Info ($username)</h2>";
$res = checkQuery($mysqli, "SELECT * FROM master_siswa WHERE username = '$username' OR nis = '$username'");
$siswa = null;
if ($res && $res->num_rows > 0) {
    $siswa = $res->fetch_assoc();
    echo "Found student ID: " . $siswa['id_siswa'] . ", Kelas: " . $siswa['id_kelas'] . ", Status: " . (isset($siswa['status']) ? $siswa['status'] : '?') . "<br>";
} else {
    echo "Student not found.<br>";
}

// 2. TP & SMT
echo "<h2>2. Active Year/Semester</h2>";
$res_tp = checkQuery($mysqli, "SELECT * FROM master_tp WHERE aktif=1");
if ($res_tp && $res_tp->num_rows > 0) {
    $tp = $res_tp->fetch_object();
    echo "TP: " . $tp->id_tp . " (" . $tp->tahun . ")<br>";
} else {
    $tp = null;
    echo "Active TP not found.<br>";
}

$res_smt = checkQuery($mysqli, "SELECT * FROM master_smt WHERE aktif=1");
if ($res_smt && $res_smt->num_rows > 0) {
    $smt = $res_smt->fetch_object();
    echo "SMT: " . $smt->id_smt . " (" . $smt->smt . ")<br>";
} else {
    $smt = null;
    echo "Active SMT not found.<br>";
}

// 3. Exams
echo "<h2>3. Exam Listings</h2>";
if ($tp && $smt && $siswa) {
    $today = time();
    $sql = "SELECT * FROM cbt_jadwal WHERE id_tp = {$tp->id_tp} AND id_smt = {$smt->id_smt}";
    $res = checkQuery($mysqli, $sql);
    
    if ($res) {
        echo "Found " . $res->num_rows . " exams.<br>";
        while ($row = $res->fetch_object()) {
            echo "<hr>";
            echo "Exam ID: {$row->id_jadwal}<br>";
            echo "Range: {$row->tgl_mulai} to {$row->tgl_selesai}<br>";
            
            // Checks
            $is_time = ($today >= strtotime($row->tgl_mulai) && $today <= strtotime($row->tgl_selesai));
            echo "Time Valid: " . ($is_time ? "YES" : "NO") . "<br>";
            
            $is_status = ($row->status == '1');
            echo "Status Active: " . ($is_status ? "YES" : "NO") . " (Val: {$row->status})<br>";
            
            $bank_kelas = unserialize($row->bank_kelas);
            $is_class = false;
            echo "Classes: ";
            if (is_array($bank_kelas)) {
                foreach ($bank_kelas as $bk) {
                    echo "[id:{$bk['kelas_id']}] ";
                    if ($bk['kelas_id'] == $siswa['id_kelas']) $is_class = true;
                }
            }
            echo "<br>Class Valid: " . ($is_class ? "YES" : "NO") . " (Student Class: {$siswa['id_kelas']})<br>";

            // Religion
            // Original Code: ($jadwal->soal_agama == "-" || $jadwal->soal_agama == "0" || $jadwal->soal_agama == $siswa->agama)
            $is_agama = ($row->soal_agama == "-" || $row->soal_agama == "0" || $row->soal_agama == $siswa['agama']);
            echo "Agama Valid: " . ($is_agama ? "YES" : "NO") . " (Exam: {$row->soal_agama}, Student: {$siswa['agama']})<br>";

            // Overall
            if ($is_time && $is_status && $is_class && $is_agama) {
                echo "<strong style='color:green'>RESULT: SHOULD BE VISIBLE</strong><br>";
            } else {
                echo "<strong style='color:red'>RESULT: HIDDEN</strong><br>";
            }
        }
    }
} else {
    echo "Skipping exam check because TP, SMT, or Student missing.<br>";
}
?>
