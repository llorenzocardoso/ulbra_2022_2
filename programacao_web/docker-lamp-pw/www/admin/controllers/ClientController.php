<?php

class ClientController{

    var $ClientModel;

    public function __construct(){
        if(!isset($_SESSION['user'])){
            header('Location:?controller=main&action=login');
        }
        require_once('models/ClientModel.php');
        $this -> ClientModel = new ClientModel();
    }

    public function register(){
        require_once('views/templates/header.php');
        require_once('views/client/register.php');
        require_once('views/templates/footer.php');
    }
    public function registerView(){
        if (isset($_POST['accept'])){
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
        $result = $this -> ClientModel->listClients();

        $arrayClients =  array();
        while ($line = $result->fetch_assoc()) {
            array_push($arrayClients, $line);
        }
        require_once('views/templates/header.php');
        require_once('views/client/listClients.php');
        require_once('views/templates/footer.php');
    }

    public function detailsClient($idClient){
        $result = $this -> ClientModel->consultClient($idClient);
        if ($arrayClient = $result->fetch_assoc()){
            require_once('views/templates/header.php');
            require_once('views/client/detailsClient.php');
            require_once('views/templates/footer.php');
        }
    }

    public function insertClient(){
        require_once('views/templates/header.php');
        require_once('views/client/insertClient.php');
        require_once('views/templates/footer.php');
    }

    public function insertClientAction(){
        
        $client = array(
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'address' => $_POST['address']
        );

        $this -> ClientModel -> insertClient($client);
        header('Location:?controller=client&action=listClients');
    }

    public function updateClient($idClient){
        $result = $this -> ClientModel->consultClient($idClient);
        if ($arrayClient = $result->fetch_assoc()){
            require_once('views/templates/header.php');
            require_once('views/client/updateClient.php');
            require_once('views/templates/footer.php');
        }
    }
}
