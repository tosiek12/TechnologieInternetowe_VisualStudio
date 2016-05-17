<?php
include_once("model/model.php");

class Controller {
     public $model;	

     public function __construct()  
     {  
          $this->model = new Model();
     } 
	
     public function invoke()
     {
      if( isset($_SESSION['username'])) {
        include 'view/mainPageLogged.php';
      } else {
        include 'view/mainPageUnlogged.php';
      }
     }
}

?>