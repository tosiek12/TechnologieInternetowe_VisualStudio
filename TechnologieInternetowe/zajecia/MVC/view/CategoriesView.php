<?php
include 'view/View.php';
 
class CategoriesView extends View{
    public function  index() {
        $cat=$this->loadModel('CategoriesModel');
        $this->set('catsData', $cat->getAll());
        $this->render('indexCategory');
    }
    public function  add() {
        $this->render('addCategory');
    }
}
?>