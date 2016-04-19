<?php
require_once 'Functions.php';

if(isset($_POST['submitLogin']))
{
   saveAndRedirect();
} else if(isset($_POST['submitLogin']))
{
   saveAndRedirect();
}else if(isset($_POST['sql']))
{
  try {
      require 'config/sql.php';
      
      $conn=new mysqli($host, $user, $pass, $dbase);
      // Check connection
		  if ($conn->connect_error) {
        throw new Exception('Connection failed: '.$conn->connect_error);
		  }
  }
  catch(DBException $e) {
      echo 'The connect can not create: ' . $e->getMessage();
  }
  
  $sql = "INSERT INTO actionLog (userName, action) VALUES ".$_POST['sql'];
  
  echo ($sql);
  $ins=$conn->prepare($sql);
  $ins->execute();
  $ins->close();
}


?>