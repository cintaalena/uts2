<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class SecurePage extends BaseController
{
    public function index()
    {
        try {
            // Simulasi logika yang hanya bisa dijalankan oleh user terautentikasi
            return view('secure_view');
        } catch (\Throwable $e) {
            log_message('error', '[SECURE ERROR] '.$e->getMessage());
            return view('errors/custom_error');
        }
    }

    public function unauthorized()
    {
        return view('errors/custom_error');
    }
}
