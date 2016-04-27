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
          if (isset($_GET['login']))
          {
               // no special book is requested, we'll show a list of all available books
               //$books = $this->model->getBookList();
               include 'view/viewLoguj.php';
          }
          else
          {
               // show the requested book
               //$book = $this->model->getBook($_GET['book']);
               include 'view/mainPage.php';
          }
     }
}

?>