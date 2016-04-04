<?php


session_start();

if($_GET['task']=='categories') {
    include 'controller/CategoriesController.php';
    $ob = new CategoriesController();
    if (isset($_GET['action']) && !empty($_GET['action'])) {
      $ob->$_GET['action']();
    } else {
      echo 'Add \'&action\' to address';
    }
} else if($_GET['task']=='articles') {
    include 'controller/ArticlesController.php';
    $ob = new ArticlesController();
    $ob->$_GET['action']();
} else {
    include 'controller/ArticlesController.php';
    $ob = new ArticlesController();
    $ob->index();
}
?>