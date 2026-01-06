<?php
if (extension_loaded('gd')) {
    echo "GD Installed\n";
    $info = gd_info();
    echo "WebP Support: " . ($info['WebP Support'] ? 'Yes' : 'No') . "\n";
} else {
    echo "GD Not Installed\n";
}
