<?php
$content = file_get_contents('application/controllers/Siswa.php');
$tokens = token_get_all($content);

$decoded_content = '';

foreach ($tokens as $token) {
    if (is_array($token)) {
        list($id, $text) = $token;
        if ($id === T_CONSTANT_ENCAPSED_STRING) {
            // Try to decode the string
            // Remove surrounding quotes
            $first = $text[0];
            $last = substr($text, -1);
            if (($first === '"' && $last === '"') || ($first === "'" && $last === "'")) {
                $inner = substr($text, 1, -1);
                // Decode octal and hex escapes manually or via eval (careful with eval)
                // Safer to use stripcslashes but it might not handle all PHP escapes exactly same as source
                // Let's use a robust regex replacement for \xHH and \OOO
                
                $decoded = preg_replace_callback('/\\\\([0-7]{1,3})/', function($m) {
                    return chr(octdec($m[1]));
                }, $inner);
                
                $decoded = preg_replace_callback('/\\\\x([0-9A-Fa-f]{1,2})/', function($m) {
                    return chr(hexdec($m[1]));
                }, $decoded);
                
                // If the decoded string looks like a valid identifier or readable text, use it
                // Wrap in quotes
                $decoded_content .= '"' . addslashes($decoded) . '"';
            } else {
                $decoded_content .= $text;
            }
        } else {
            $decoded_content .= $text;
        }
    } else {
        $decoded_content .= $token;
    }
}

file_put_contents('Siswa_decoded.php', $decoded_content);
echo "Decoded Siswa.php to Siswa_decoded.php\n";
?>
