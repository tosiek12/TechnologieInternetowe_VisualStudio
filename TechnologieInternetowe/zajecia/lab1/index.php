<?php
session_start();

if (isset($_GET['view']))
{
  if($_GET['view']=='login') {
    include_once("controller/controllerLogin.php");
    $controller = new ControllerLogin();
  }
} else {
  //Load default controller:
  include_once("controller/controller.php");
  $controller = new Controller();
}

$controller->invoke();

?>