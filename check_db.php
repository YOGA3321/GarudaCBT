<?php
// Script to check DB structure
define('BASEPATH', 'check');
include 'index.php';

$CI =& get_instance();
$tables = $CI->db->list_tables();
echo "Tables:\n";
print_r($tables);

echo "\nColumns in 'posts':\n";
if (in_array('posts', $tables)) {
    $fields = $CI->db->list_fields('posts');
    print_r($fields);
}

echo "\nColumns in 'quotes' (if exists):\n";
if (in_array('quotes', $tables)) {
    $fields = $CI->db->list_fields('quotes');
    print_r($fields);
} else {
    echo "Table 'quotes' does not exist.\n";
}

echo "\nColumns in 'comments' (if exists):\n";
if (in_array('comments', $tables)) {
    $fields = $CI->db->list_fields('comments');
    print_r($fields);
} else {
    echo "Table 'comments' does not exist.\n";
}

echo "\nColumns in 'video' (if exists):\n";
if (in_array('video', $tables)) {
    $fields = $CI->db->list_fields('video');
    print_r($fields);
} else {
    echo "Table 'video' does not exist.\n";
}
?>
