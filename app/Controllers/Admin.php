<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {

        $data = [
            'judul' => 'Dashboard',
            'subjudul' => 'admin',
            'page' => 'admin/dashboard.php',
            'navbar' => 'admin/template/navbar.php',
            'footer' => 'admin/template/footer.php',
            'sidebar' => 'admin/template/sidebar.php',
        ];
        // Tampilkan view untuk dashboard admin
        return view('admin/template/header', $data);
    }
    public function users()
    {

        $data = [
            'judul' => 'Users Data',
            'subjudul' => 'users',
            'page' => 'admin/article.php',
            'navbar' => 'admin/template/navbar.php',
            'footer' => 'admin/template/footer.php',
            'sidebar' => 'admin/template/sidebar.php',
        ];
        // Tampilkan view untuk dashboard admin
        return view('admin/template/header', $data);
    }
    public function article()
    {

        $data = [
            'judul' => 'Article Data',
            'subjudul' => 'article',
            'page' => 'admin/article.php',
            'navbar' => 'admin/template/navbar.php',
            'footer' => 'admin/template/footer.php',
            'sidebar' => 'admin/template/sidebar.php',
        ];
        // Tampilkan view untuk dashboard admin
        return view('admin/template/header', $data);
    }

    public function ml()
    {

        $data = [
            'judul' => 'Mechine Learning Data',
            'subjudul' => 'ml',
            'page' => 'admin/article.php',
            'navbar' => 'admin/template/navbar.php',
            'footer' => 'admin/template/footer.php',
            'sidebar' => 'admin/template/sidebar.php',
        ];
        // Tampilkan view untuk dashboard admin
        return view('admin/template/header', $data);
    }
    public function models()
    {

        $data = [
            'judul' => 'Models Data',
            'subjudul' => 'models',
            'page' => 'admin/article.php',
            'navbar' => 'admin/template/navbar.php',
            'footer' => 'admin/template/footer.php',
            'sidebar' => 'admin/template/sidebar.php',
        ];
        // Tampilkan view untuk dashboard admin
        return view('admin/template/header', $data);
    }
}
