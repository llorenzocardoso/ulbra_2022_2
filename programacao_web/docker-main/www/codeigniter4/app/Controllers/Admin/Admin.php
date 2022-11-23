<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Admin extends BaseController{

    public function index(){
        //testar o login
        $session = \Config\Services::session();

        if($session -> has('user')){
           echo view('admin/templates/header');
           echo view('admin/main/home');
           echo view('admin/templates/footer');
        }else{
            return redirect()->to(base_url('admin/login'));
        }

    }

    public function login(){
        echo view('admin/main/login');
    }

    public function logout(){
        $session = \Config\Services::session();
        $session -> destroy();
        return redirect()->to(base_url('admin/login'));
    }
}