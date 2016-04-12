<?php
include 'controller/Controller.php';
require_once 'Functions.php';

class ArticlesController extends Controller{
  public function index() {
      $view=$this->loadView('ArticlesView');
      $view->index();
  }
  public function one() {
      $view=$this->loadView('ArticlesView');
      $view->one();
  }
  public function add() {
      $view=$this->loadView('ArticlesView');
      $view->add();
  }
  
  public function insert() {
     if(isAdmin()){
        $model=$this->loadModel('ArticlesModel');
        $model->insert($_POST);
        $this->redirect('?task=articles&action=index');
      } else {
        $view=$this->loadView('PermissionView');
        $view->restricted();
      }
  }
  
  public function delete() {
      if(isAdmin()){
        $model=$this->loadModel('ArticlesModel');
        $model->delete($_GET['id']);
        $this->redirect('?task=articles&action=index');
      } else {
        $view=$this->loadView('PermissionView');
        $view->restricted();
      }
  }
}
?>