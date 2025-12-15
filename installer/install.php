<?php
error_reporting(0);
$db_config_path = '../application/config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST) {

    require_once('includes/taskCoreClass.php');
    require_once('includes/databaseLibrary.php');

    $core = new Core();
    $database = new Database();

    $message = '';
    if ($core->checkEmpty($_POST) == true) {
        if ($database->create_database($_POST) == false) {
            $message = $core->show_message('error',
                "ERROR#001<br>Gagal membuat database, pastikan semua parameter diisi dengan benar.");
        } else if ($database->create_tables($_POST) == false) {
            $message = $core->show_message('error',
                "ERROR#002<br>Gagal membuat database, pastikan semua parameter diisi dengan benar.");
        // ... existing checks ...
        } else if ($core->checkFile() == false) {
             $message = $core->show_message('error', "ERROR#003<br>File application/config/database.php tidak ditemukan");

        } else if ($core->write_db_config($_POST) == false) {
             $message = $core->show_message('error', "ERROR#004<br>dw write_db_config failed");
        
        } else {
            // SUCCESS: Database Created & Config Written
            // NOW: Generate .env file (Auto Environment Config)
            
            $host = $_POST['hostname'];
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $name = $_POST['database'];
            
            // Define .env paths
            $envFile = dirname(dirname(__FILE__)) . '/.env';
            $envExample = dirname(dirname(__FILE__)) . '/.env.example';
            
            // Get content from example or default
            if (file_exists($envExample)) {
                 $envContent = file_get_contents($envExample);
                 
            } else {
                 $envContent = "LOCALHOST_DB_HOST=localhost\nLOCALHOST_DB_NAME=garudacbt\nLOCALHOST_DB_USER=root\nLOCALHOST_DB_PASS=\n\nHOSTING_DB_HOST=localhost\nHOSTING_DB_NAME=u116133173_sekolah\nHOSTING_DB_USER=u116133173_sekolah\nHOSTING_DB_PASS=@Yogabd46\n\nHOSTING_DOMAIN=domainanda.com\nAPP_URL=";
            }
            
            // Update Localhost Credentials (Assumption: Installing on local/hybrid)
            $envContent = preg_replace('/^LOCALHOST_DB_HOST=.*$/m', 'LOCALHOST_DB_HOST=' . $host, $envContent);
            $envContent = preg_replace('/^LOCALHOST_DB_NAME=.*$/m', 'LOCALHOST_DB_NAME=' . $name, $envContent);
            $envContent = preg_replace('/^LOCALHOST_DB_USER=.*$/m', 'LOCALHOST_DB_USER=' . $user, $envContent);
            $envContent = preg_replace('/^LOCALHOST_DB_PASS=.*$/m', 'LOCALHOST_DB_PASS=' . $pass, $envContent);
            
            // Update Hosting Credentials (Mirroring for safety/convenience)
            $envContent = preg_replace('/^HOSTING_DB_HOST=.*$/m', 'HOSTING_DB_HOST=' . $host, $envContent);
            $envContent = preg_replace('/^HOSTING_DB_NAME=.*$/m', 'HOSTING_DB_NAME=' . $name, $envContent);
            $envContent = preg_replace('/^HOSTING_DB_USER=.*$/m', 'HOSTING_DB_USER=' . $user, $envContent);
            $envContent = preg_replace('/^HOSTING_DB_PASS=.*$/m', 'HOSTING_DB_PASS=' . $pass, $envContent);
            
            // Detect Domain & Protocol
            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
            if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
                $protocol = "https://";
            }
            // Remove /installer from URL to get Root URL
            $current_host = $_SERVER['HTTP_HOST'];
            $app_url = $protocol . $current_host . str_replace('installer/install.php', '', $_SERVER['SCRIPT_NAME']);
            
            $envContent = preg_replace('/^HOSTING_DOMAIN=.*$/m', 'HOSTING_DOMAIN=' . $current_host, $envContent);
            $envContent = preg_replace('/^APP_URL=.*$/m', 'APP_URL=' . $app_url, $envContent);
            $envContent = preg_replace('/^# APP_URL=.*$/m', 'APP_URL=' . $app_url, $envContent);

            // Write .env
            @file_put_contents($envFile, $envContent);
        }
    } else {
        $message = $core->show_message('error',
            "ERROR#005<br>Gagal membuat database, pastikan semua parameter diisi dengan benar.");
    }

    echo $message;
}
