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
        $result = $model->getUser_protected($_POST['name'],$_POST['password']);
       }else {
        $result = $model->getUser_simple($_POST['name'],$_POST['password']);
       }
       
       if($result) {
          $_SESSION['username']=$_POST['name'];
          $this->redirect('index.php','Success!</br>You will be redirected to main page in 5 sec.</br>');
        }else {
           
           $this->redirect('index.php?view=login','Error!</br>You will be redirected to log in page in 5 sec.</br>');
        }
     }
     
     private function logout() {
        session_destroy();
        session_start();
        echo('Logged out!</br>');
        
        $this->redirect('index.php', 'Bye!</br>You will be redirected to main page in 5 sec.</br>');
     }
     
     private function redirect($page, $msg) {
        $_SESSION['redir_msg'] = $msg;
        $_SESSION['redir_page'] = $page;
        // load view:
        include 'view/redirectView.php';
     }
     
}

?>