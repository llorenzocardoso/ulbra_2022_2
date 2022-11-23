<?php

namespace App\Controllers;

class Site extends BaseController
{
    public function index(){
        $this::view('home');
    }

    public function view($page){
        echo view('templates/header');
        echo view("site/{$page}");
        echo view('templates/footer');
    }
}
