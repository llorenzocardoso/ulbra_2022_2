<?php

class ClientModel{

    var $Connection;

    public function __construct(){
        require_once('db/ConnectClass.php');
        $ConnectClass = new ConnectClass();
        $ConnectClass -> openConnect();
        $this -> Connection = $ConnectClass -> getConn();
    }

    public function listClients(){
        $sql = "SELECT * FROM clients";
        return $this -> Connection -> query($sql);
    }

    public function consultClient($idClient){
        $sql = "
            SELECT * FROM clients
            WHERE
            idClient = $idClient
        ";
        return $this -> Connection -> query($sql);
    }

    public function insertClient($client){
        $sql ="
            INSERT INTO
                clients (name, phone, email, address)
            VALUES(
                '{$client['name']}',
                '{$client['phone']}', 
                '{$client['email']}',
                '{$client['address']}'
            )
        ";

        return $this -> Connection -> query($sql);
    }
}