<?php

class ProductController{

    public function register(){
        require_once('views/templates/header.php');
        require_once('views/client/register.php');
        require_once('views/templates/footer.php');
    }
    public function registerView(){
        if (isset($_POST['accept'])) {
            $accept = true;
            $accept = "Termo aceito.";
        }else{
            $accept = false;
            $accept = "Termo não aceito.";
        }

        $arrayClient = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'gender' => $_POST['gender'],
            'accept' => $accept,
        );

        require_once('views/templates/header.php');
        require_once('views/client/registerView.php');
        require_once('views/templates/footer.php');
    }

    public function listClients(){
        require_once('models/ClientModel.php');
        $ClientModel = new ClientModel();
        $result = $ClientModel -> listClients();

        $arrayClients =  array();
        while($line = $result -> fetch_assoc()){
            array_push($arrayClients, $line);
        }
        require_once('views/templates/header.php');
        require_once('views/client/listClients.php');
        require_once('views/templates/footer.php');
    }

    public function listProducts(){
        require_once('models/ProductModel.php');
        $ProductModel = new ProductModel();
        $result = $ProductModel -> listProducts();

        $arrayProducts =  array();
        while($line = $result -> fetch_assoc()){
            array_push($arrayProducts, $line);
        }
        require_once('views/templates/header.php');
        require_once('views/client/listProducts.php');
        require_once('views/templates/footer.php');
    }
}