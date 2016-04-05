<?php
// Start the session
session_start();

if($_GET['task']=='register') {
  include 'templates/addUser.php';
} else {
  if($_GET['task']=='resetUser') {
    if(isset($_SESSION['name'])){
      // New session set!
      $_SESSION["name"] = "Nieznajomy";
  
      //save user info in server:
      $ip = $_SERVER['REMOTE_ADDR'];
      $browser = $_SERVER['HTTP_USER_AGENT'];
      $referrer = $_SERVER['HTTP_REFERER'];

      //Save in session:
      $_SESSION["ip"] = $ip;
      $_SESSION["browser"] = $browser;
      $_SESSION["referrer"] = $referrer;
      
      if ($referred == "") {
        $referrer = "This page was accessed directly";
      }
    }
  }
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
}
?>