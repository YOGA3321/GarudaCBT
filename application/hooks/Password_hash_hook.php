<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Password Hash Hook
 * 
 * This hook intercepts guru creation/import requests and hashes passwords
 * BEFORE the obfuscated controller processes them.
 * 
 * This solves the problem where Dataguru.php stores passwords in plaintext
 * because the source code is obfuscated and cannot be edited directly.
 */
class Password_hash_hook {
    
    /**
     * Hash guru password before controller processes the request
     */
    public function hash_guru_password() {
        // Only process if this is a POST request
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }
        
        // Get the current URI to check if it's a guru-related endpoint
        $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
        
        // Check if this is a guru creation or import endpoint
        $is_guru_create = (
            strpos($uri, 'dataguru/create') !== false ||
            strpos($uri, 'dataguru/do_import') !== false ||
            strpos($uri, 'Dataguru/create') !== false ||
            strpos($uri, 'Dataguru/do_import') !== false
        );
        
        if (!$is_guru_create) {
            return;
        }
        
        // Hash password for manual creation (single guru)
        if (isset($_POST['password']) && !empty($_POST['password'])) {
            // Only hash if not already hashed (bcrypt hashes start with $2y$)
            if (strpos($_POST['password'], '$2y$') !== 0) {
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
            }
        }
        
        // Hash passwords for import (array of gurus)
        if (isset($_POST['guru']) && is_array($_POST['guru'])) {
            foreach ($_POST['guru'] as $key => $guru) {
                // Password is typically in index 6 for import
                if (isset($guru['6']) && !empty($guru['6'])) {
                    // Only hash if not already hashed
                    if (strpos($guru['6'], '$2y$') !== 0) {
                        $_POST['guru'][$key]['6'] = password_hash($guru['6'], PASSWORD_BCRYPT);
                    }
                }
                // Also check for 'password' key
                if (isset($guru['password']) && !empty($guru['password'])) {
                    if (strpos($guru['password'], '$2y$') !== 0) {
                        $_POST['guru'][$key]['password'] = password_hash($guru['password'], PASSWORD_BCRYPT);
                    }
                }
            }
        }
    }
}
