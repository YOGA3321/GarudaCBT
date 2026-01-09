<?php
$file = 'application/controllers/Siswa.php';
$content = file_get_contents($file);
$pos = strpos($content, 'strtotime');
if ($pos !== false) {
    echo "Found at $pos: \n";
    echo substr($content, max(0, $pos - 50), 100);
} else {
    echo "Not found 'strtotime'";
}
echo "\n---\n";
$pos2 = strpos($content, '$today');
if ($pos2 !== false) {
    echo "Found variable \$today at $pos2: \n";
    echo substr($content, max(0, $pos2 - 20), 100);
}
?>
