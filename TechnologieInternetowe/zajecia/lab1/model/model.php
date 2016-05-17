<?php
class Model {
    private $conn2;
    private $conn;
    
   public function getUser_simple($name, $password) {
    //Open connection:
	  if($this->connect_Secured()) {
		  $query="SELECT * FROM config_users where login = '".$name."' and password = '".$password."';";
		  
      $select=$this->conn->query($query);
		  if ($select->num_rows > 0) {
			  $select->close();
        return 1;		  
      } else {
		    return 0;
      }
	  } else {
      return 0;
	  }
  }

  public function getUser_protected($name, $password) {	
	  //Open connection:
	  if($this->connect_Secured()) {
		  $query = sprintf("SELECT * FROM config_users WHERE login='%s' AND password='%s'",
              mysql_real_escape_string($name),
              mysql_real_escape_string($password));
			
		  $select=$this->conn->query($query);
		  if ($select->num_rows > 0) {
			  $select->close();
        return 1;		  
      } else {
		    return 0;
      }
	  } else {
      return 0;
	  }
  }
  
  private function connect_mysql() {
	  //Open connection:
	  try {
		  require 'config/sql.php';
		
		  $conn=mysql_connect($host, $user, $pass, $dbase);
		  // Check connection
		  if ($conn->connect_error) {
			  throw new Exception('Connection failed: '.$conn->connect_error);
		  }
		  return $conn;
	  }
	  catch(DBException $e) {
		  echo 'The connect can not create: ' . $e->getMessage();
	  }
	  return 0;
  }

  private function connect() {
	  //Open connection:
	  try {
		  require 'config/sql.php';
		
		  $conn=new mysqli($host, $user, $pass, $dbase);
		
		  // Check connection
		  if ($conn->connect_error) {
			  throw new Exception('Connection failed: '.$conn->connect_error);
		  }
		  return $conn;
	  }
	  catch(DBException $e) {
		  echo 'The connect can not create: ' . $e->getMessage();
	  }
	  return 0;
  }
  
  private function connect_Secured() {
    $this->conn2 = $this->connect_mysql();
	  $this->conn = $this->connect();
    if($this->conn == 0) {
      return 0;
    }
    return 1;
  }
}

?>