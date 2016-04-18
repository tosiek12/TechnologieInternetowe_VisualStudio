<?php

function isAdmin() {
  $res = false;
  if(isset($_SESSION['name'])){ 
    if($_SESSION["name"] == "admin") {
      $res = true;
    }
  }
  return $res;
}

function isLogged() {
  $res = false;
  if(isset($_SESSION['name'])){ 
    if($_SESSION["name"] <>'Nieznajomy') {
      $res = true;
    }
  }
  return $res;
}

function isMobile() {
  $res = false;
  if(isset($_SESSION['isMobile'])){ 
      $res = $_SESSION["isMobile"];
  }
  return $res;
}

function clearSessionAndRedirect() {
    session_start();
    session_unset();// remove all session variables
    session_destroy(); 
    header("Location: index.php");
    die();
}

function saveAndRedirect()
{
    session_start();
  // Set session variables
  $_SESSION["name"] = $_POST["name"];
  header("Location: index.php");
  die();
}

function SetSesionParameters() {
  // Start the session
  session_start();

  //check if it is on mobile device!
  require_once 'Mobile_Detect.php';
  $detect = new Mobile_Detect;
  $_SESSION['isMobile'] = $detect->isMobile();

  if(!isset($_SESSION['name'])){
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
?>