<?php
include 'controller/Controller.php';
require_once 'Functions.php';

class PermissionController extends Controller{

  public function login() {
    $view=$this->loadView('PermissionView');
    $view->login();
  }
  
  public function logoff() {
    clearSessionAndRedirect();
  }
  
  public function restricted() {
    $view=$this->loadView('PermissionView');
    $view->restricted();
  }
}
?>