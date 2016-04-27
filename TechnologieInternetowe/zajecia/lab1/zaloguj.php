
<?php
echo('Simple<br/>');
getUser_simple();

echo('<br/>---------------------------------------------------------------------<br/>Protected<br/>');
getUser_protected();

function getUser() {
	$name =$_POST['name'];
	$password =$_POST['password'];
	
	$config_password;
	
	$conn =connect();
	//Open connection:
	if($conn != 0) {
		$query="SELECT password FROM config_users where login = '".$name."';";
		echo("SQL: ".$query."<br/>");	
		echo("<br/>");
		
		$select=$conn->query($query);
		
		echo('results: '.$select->num_rows."<br/>");
		if ($select->num_rows > 0) {
			// output data of each row
			echo(print_r($select).'<br/><br/>');
			
			while($row = $select->fetch_assoc()) {
				$config_password = $row['password'];
				echo(print_r($row).'<br/>');
				echo('wynik:'. $config_password.'<br/>');
			}
			//check password:
			
			echo("login z formularza: ".$name."<br/>");	
			echo("password z formularza: ".$password."<br/>");	
			
			echo("<br/>");	
			echo("password z serwera: ".$config_password."<br/>");
			if($config_password ==  $password) {
				echo('logged!'."<br/>");	
				
			}else {
			
				echo('password is wrong'."<br/>");	
			}
			
		}else {
			echo('user not found'."<br/>");	
		}
		
		$select->close();
	} else {
		echo('error'."<br/>");	
	}
}

function getUser_simple() {

	$name =$_POST['name'];
	$password =$_POST['password'];
	
	$config_password;
	
	$conn2 =connect_mysql();
	$conn = connect();
	
	//Open connection:
	if($conn != 0) {
		$query="SELECT * FROM config_users where login = '".$name."' and password = '".$password."';";
		
		echo("SQL: ".$query."<br/>");	
		echo("<br/>");
		
		$select=$conn->query($query);
		
		echo('results: '.$select->num_rows."<br/>");
		
		if ($select->num_rows > 0) {
			echo('logged!'."<br/>");
			$select->close();
		} else {
			echo('user or login is wrong '."<br/>");	
		}
		
	} else {
		echo('error'."<br/>");	
	}
}

function getUser_protected() {
	$name =$_POST['name'];
	$password =$_POST['password'];
	
	$config_password;
	
	$conn2 =connect_mysql();
	$conn = connect();
	
	//Open connection:
	if($conn != 0) {
		$query = sprintf("SELECT * FROM config_users WHERE login='%s' AND password='%s'",
            mysql_real_escape_string($name),
            mysql_real_escape_string($password));
			
		echo("SQL: ".$query."<br/>");	
		echo("<br/>");
		
		$select=$conn->query($query);
		
		echo('results: '.$select->num_rows."<br/>");
		
		if ($select->num_rows > 0) {
			echo('logged!'."<br/>");
			$select->close();
		} else {
			echo('user or login is wrong '."<br/>");	
		}
		
	} else {
		echo('error'."<br/>");	
	}
}

function connect_mysql() {
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

function connect() {
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
?>