<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Database Restorer Controller
 * Memperbaiki tabel-tabel yang hilang di GarudaCBT
 * 
 * Akses: http://localhost/GarudaCBT/Restorer
 */
class Restorer extends CI_Controller {

    public function index()
    {
        $this->load->database();
        
        $results = [];
        
        // 1. school_profile - Untuk profil sekolah di dashboard
        if (!$this->db->table_exists('school_profile')) {
            $sql = "CREATE TABLE `school_profile` (
              `id_school_profile` int(11) NOT NULL AUTO_INCREMENT,
              `nama_sekolah` varchar(255) NOT NULL DEFAULT 'Nama Sekolah',
              `alamat_sekolah` text,
              `logo_sekolah` varchar(255) DEFAULT 'uploads/settings/logo.png',
              `admin_name` varchar(255) DEFAULT 'Administrator',
              `admin_foto` varchar(255) DEFAULT 'uploads/settings/admin.jpg',
              `kepala_sekolah` varchar(255) DEFAULT 'Kepala Sekolah',
              `nip_kepala` varchar(50) DEFAULT '',
              `tanda_tangan` varchar(255) DEFAULT 'uploads/settings/ttd.png',
              PRIMARY KEY (`id_school_profile`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            $this->db->query($sql);
            $this->db->query("INSERT INTO `school_profile` (`nama_sekolah`, `alamat_sekolah`) VALUES ('Garuda CBT', 'Alamat Sekolah')");
            $results[] = ["status" => "created", "table" => "school_profile"];
        } else {
            $results[] = ["status" => "exists", "table" => "school_profile"];
        }
        
        // 2. master_slider - Untuk slider homepage
        if (!$this->db->table_exists('master_slider')) {
            $sql = "CREATE TABLE `master_slider` (
              `id_slider` int(11) NOT NULL AUTO_INCREMENT,
              `judul` varchar(255) DEFAULT NULL,
              `deskripsi` text,
              `gambar` varchar(255) DEFAULT NULL,
              `link` varchar(255) DEFAULT NULL,
              `urutan` int(11) DEFAULT 0,
              `active` int(11) DEFAULT 1,
              `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
              `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              PRIMARY KEY (`id_slider`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            $this->db->query($sql);
            $results[] = ["status" => "created", "table" => "master_slider"];
        } else {
            $results[] = ["status" => "exists", "table" => "master_slider"];
        }
        
        // 3. master_gallery - Untuk galeri foto
        if (!$this->db->table_exists('master_gallery')) {
            $sql = "CREATE TABLE `master_gallery` (
              `id_gallery` int(11) NOT NULL AUTO_INCREMENT,
              `judul` varchar(255) DEFAULT NULL,
              `deskripsi` text,
              `gambar` varchar(255) DEFAULT NULL,
              `kategori` varchar(100) DEFAULT NULL,
              `status` int(11) DEFAULT 1,
              `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
              `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              PRIMARY KEY (`id_gallery`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            $this->db->query($sql);
            $results[] = ["status" => "created", "table" => "master_gallery"];
        } else {
            $results[] = ["status" => "exists", "table" => "master_gallery"];
        }
        
        // 4. quotes - Untuk kutipan/testimoni
        if (!$this->db->table_exists('quotes')) {
            $sql = "CREATE TABLE `quotes` (
              `id_quote` int(11) NOT NULL AUTO_INCREMENT,
              `quote` text,
              `author` varchar(255) DEFAULT NULL,
              `jabatan` varchar(255) DEFAULT NULL,
              `foto` varchar(255) DEFAULT NULL,
              `status` int(11) DEFAULT 1,
              `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
              PRIMARY KEY (`id_quote`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            $this->db->query($sql);
            $results[] = ["status" => "created", "table" => "quotes"];
        } else {
            $results[] = ["status" => "exists", "table" => "quotes"];
        }
        
        // 5. master_link - Untuk tautan luar
        if (!$this->db->table_exists('master_link')) {
            $sql = "CREATE TABLE `master_link` (
              `id_link` int(11) NOT NULL AUTO_INCREMENT,
              `nama_link` varchar(255) DEFAULT NULL,
              `url` varchar(500) DEFAULT NULL,
              `icon` varchar(100) DEFAULT NULL,
              `urutan` int(11) DEFAULT 0,
              `status` int(11) DEFAULT 1,
              `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
              PRIMARY KEY (`id_link`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            $this->db->query($sql);
            $results[] = ["status" => "created", "table" => "master_link"];
        } else {
            $results[] = ["status" => "exists", "table" => "master_link"];
        }
        
        // Display hasil
        $this->showResults($results);
    }
    
    private function showResults($results) {
        echo '<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Restorer - GarudaCBT</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; padding: 40px 20px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 16px; box-shadow: 0 20px 60px rgba(0,0,0,0.2); }
        h1 { color: #333; margin-bottom: 10px; font-size: 24px; }
        .subtitle { color: #666; margin-bottom: 30px; font-size: 14px; }
        .table-list { margin: 20px 0; }
        .table-item { display: flex; align-items: center; padding: 15px; margin: 10px 0; border-radius: 10px; }
        .table-item.created { background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%); border-left: 4px solid #28a745; }
        .table-item.exists { background: linear-gradient(135deg, #fff3cd 0%, #ffeeba 100%); border-left: 4px solid #ffc107; }
        .table-item .icon { font-size: 24px; margin-right: 15px; }
        .table-item .name { font-weight: 600; color: #333; }
        .table-item .status { margin-left: auto; font-size: 12px; padding: 4px 10px; border-radius: 20px; }
        .table-item.created .status { background: #28a745; color: white; }
        .table-item.exists .status { background: #ffc107; color: #333; }
        .summary { margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 10px; text-align: center; }
        .summary h3 { color: #28a745; margin-bottom: 10px; }
        .btn { display: inline-block; padding: 12px 30px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; border-radius: 8px; margin-top: 15px; font-weight: 600; transition: transform 0.2s; }
        .btn:hover { transform: translateY(-2px); }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔧 Database Restorer</h1>
        <p class="subtitle">Memperbaiki tabel-tabel yang hilang di GarudaCBT</p>
        
        <div class="table-list">';
        
        $created = 0;
        $exists = 0;
        
        foreach ($results as $result) {
            $statusClass = $result['status'];
            $icon = $result['status'] === 'created' ? '✅' : '⏩';
            $statusText = $result['status'] === 'created' ? 'Dibuat' : 'Sudah Ada';
            
            if ($result['status'] === 'created') $created++;
            else $exists++;
            
            echo '<div class="table-item ' . $statusClass . '">
                <span class="icon">' . $icon . '</span>
                <span class="name">' . $result['table'] . '</span>
                <span class="status">' . $statusText . '</span>
            </div>';
        }
        
        echo '</div>
        
        <div class="summary">
            <h3>✨ Selesai!</h3>
            <p>' . $created . ' tabel dibuat, ' . $exists . ' tabel sudah ada sebelumnya.</p>
            <a href="' . base_url('dashboard') . '" class="btn">← Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>';
    }
}
