<?php
include 'controller/categories.php';
if($_GET['task']=='categories') {
    $ob = new CategoriesController();
    
    if (isset($_GET['action']) && !empty($_GET['action'])) {
      $ob->$_GET['action']();
    } else {
      echo 'Add \'&action\' to address';
    }
}
?>