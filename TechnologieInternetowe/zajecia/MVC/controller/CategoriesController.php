<?php
include 'controller/Controller.php';
require_once 'Functions.php';

class CategoriesController extends Controller{
  public function index() {
    $view=$this->loadView('CategoriesView');
    $view->index();
  }
  
  public function add() {
      if(isAdmin()){
        $view=$this->loadView('CategoriesView');
        $view->add();
      } else {
        $view=$this->loadView('PermissionView');
        $view->restricted();
      }
  }
  
  //actions:
  public function delete() {
      if(isAdmin()){
        $model=$this->loadModel('CategoriesModel');
        $model->delete($_GET['id']);
        $this->redirect('?task=categories&action=index');
      } else {
        $view=$this->loadView('PermissionView');
        $view->restricted();
      }
  }
  
  public function insert() {
      if(isAdmin()){
        $model=$this->loadModel('CategoriesModel');
        $model->insert($_POST);
        $this->redirect('?task=categories&action=index');
      } else {
        $view=$this->loadView('PermissionView');
        $view->restricted();
      }
  } 
}
?>