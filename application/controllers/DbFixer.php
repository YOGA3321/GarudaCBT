<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DbFixer extends CI_Controller {

    public function index() {
        $this->load->database();
        $this->load->library('datatables');
        $this->load->model('Users_model', 'users');

        echo "<h1>Debug DataTables Library</h1>";

        try {
            // Need to simulate POST data for Datatables if strictly required, 
            // but IgnitedDatatables usually works without it (returns all data or default limit).
            // However, it usually reads $_POST for draw, length, start etc.
            
            $_POST['draw'] = 1;
            $_POST['start'] = 0;
            $_POST['length'] = 10;
            
            $result = $this->users->getDataadmin();
            
            echo "<p>Result Type: " . gettype($result) . "</p>";
            echo "<p>Result Length: " . strlen($result) . "</p>";
            echo "<hr>";
            echo $result;

        } catch (Exception $e) {
            echo "<pre>Exception: " . $e->getMessage() . "</pre>";
        }

        echo "<hr><p>Selesai Debug DataTables.</p>";
    }
}
