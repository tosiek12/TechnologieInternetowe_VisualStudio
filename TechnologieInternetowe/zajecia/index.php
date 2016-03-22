<?php
// Start the session
session_start();
if(!isset($_SESSION['name'])){
  // Set session variables
  $_SESSION["name"] = "Nieznajomy";
  //save user info in server:
  
  $ip = $_SERVER['REMOTE_ADDR'];
  $browser = $_SERVER['HTTP_USER_AGENT'];
  $referrer = $_SERVER['HTTP_REFERER'];

   if ($referred == "") {
    $referrer = "This page was accessed directly";
    }

  echo "<b>Visitor IP address:</b><br/>" . $ip . "<br/>";
  echo "<b>Browser (User Agent) Info:</b><br/>" . $browser . "<br/>";
  echo "<b>Referrer:</b><br/>" . $referrer . "<br/>";
  
  
}
?>

<?php 

$title = "test";
$content = "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<form action='welcome_post.php' method='post'>
    Name: <input type='text' name='name'><br>
    E-mail: <input type='text' name='email'><br>
    <input type='submit'>
</form>";

include("template.php");
?>