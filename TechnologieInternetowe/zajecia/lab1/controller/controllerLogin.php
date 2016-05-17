<?php
include_once("model/model.php");

class ControllerLogin {
     public $model;	

     public function __construct()  
     {  
          $this->model = new Model();
     } 
	
     public function invoke()
     {
      if(isset($_GET['action']))
      {
        if($_GET['action'] =='login') {
          $this->logIn();
        } else if($_GET['action'] =='logout') {
          $this->logout();
        }
      } else {
        // Login page:
        include 'view/viewLoguj.php';
      }
     }
     
     private function logIn() {
       $model = new Model();
       if(isset($_POST['useSecured'])) {
        echo('usedSecured<\br>');
        $result = $model->getUser_protected($_POST['name'],$_POST['password']);
       }else {
        echo('usedNormal<\br>');
        $result = $model->getUser_simple($_POST['name'],$_POST['password']);
       }
       
       if($result) {
          $_SESSION['username']=$_POST['name'];
          
          echo('Success!</br>');
          echo('You will be redirected to main page in 5 sec.</br>');
          $redirPage = 'index.php';
        }else {
          echo('Error!</br>');
          echo('You will be redirected to log in page in 5 sec.</br>');
          $redirPage = 'index.php?view=login';
        }
        echo('<script> document.ready(window.setTimeout(function(){location.href = "'.$redirPage.'"},5000));</script>');
     }
     
     private function logout() {
        session_destroy();
        session_start();
        echo('Logged out!</br>');
       
        $redirPage = 'index.php';
        echo('You will be redirected to main page in page in 5 sec.</br>');
        echo('<script> document.ready(window.setTimeout(function(){location.href = "'.$redirPage.'"},5000));</script>');
     }
}

?>