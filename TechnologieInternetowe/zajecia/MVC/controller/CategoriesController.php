<?php
include 'controller/Controller.php';

class CategoriesController extends Controller{
  public function index() {
    $view=$this->loadView('CategoriesView');
    $view->index();
  }
  public function add() {
    $view=$this->loadView('CategoriesView');
    $view->add();
  }
  public function insert() {
    $model=$this->loadModel('CategoriesModel');
    $model->insert($_POST);
    $this->redirect('?task=categories&action=index');
  } 
}
?>