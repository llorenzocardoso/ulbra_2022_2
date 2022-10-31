<?php
session_start();

if (!isset($_GET['controller'])) {
  require_once('controllers/MainController.php');
  $MainController = new MainController();
  $MainController->index();
} else {
  switch ($_REQUEST['controller']){
    case 'main':
      require_once('controllers/MainController.php');
      $MainController = new MainController();
      if (!isset($_GET['action'])) {
        $MainController->index();
      } else {
        switch ($_REQUEST['action']) {
          case 'login':
            $MainController->login();
          break;
          case 'logout':
            $MainController->logout();
          break;
        }
      }
    break;

    case 'user':
      require_once('controllers/UserController.php');
      $UserController = new UserController();
      if (!isset($_GET['action'])) {
      } else {
        switch ($_REQUEST['action']) {
          case 'validateLogin':
            $UserController->validateLogin();
        }
      }
    break;

    case 'client':
      require_once('controllers/ClientController.php');
      $client = new ClientController();
      if(!isset($_GET['action'])){
          $client -> index();
      }else{
        switch($_REQUEST['action']){
          case 'listClients':
            $client -> listClients();
          break;
          case 'detailsClient':
            $client -> detailsClient($_GET['id']);
          break;
          case 'insertClient':
            $client -> insertClient();
          break;
          case 'insertClientAction':
            $client -> insertClientAction();
          break;
          case 'updateClient':
            $client -> updateClient($_GET['id']);
          break;
          case 'updateClientAction':
            $client -> updateClientAction($_GET['id']);
          break;
          case 'deleteClient':
            $client -> deleteClient($_GET['id']);
          break;
        }
      }
    break;

    case 'site':
      require_once('controllers/SiteController.php');
      $SiteController = new SiteController();
      if(!isset($_GET['action'])){
        $SiteController -> home();
      }else{
        switch ($_REQUEST['action']) {
          case 'home':
            $SiteController -> home();
          break;
        }
      }
    break; 
  }
}