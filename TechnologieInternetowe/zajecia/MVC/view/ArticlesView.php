<?php
include 'view/View.php';
require_once 'Functions.php';

class ArticlesView extends View{
    public function  index() {
        $art=$this->loadModel('ArticlesModel');
        $this->set('articles', $art->getAll());
		if(isMobile()) {
			$this->render('indexArticle','templates/mobile/');
		}else {
			$this->render('indexArticle');
		}
    }
    public function  one() {
        $art=$this->loadModel('ArticlesModel');
        $this->set('articles', $art->getOne($_GET['id']));

        $this->render('oneArticle');
    }
    public function add() {
        $cat=$this->loadModel('CategoriesModel');
        $this->set('catsData', $cat->getAll());

        $this->render('addArticle');
    }
}