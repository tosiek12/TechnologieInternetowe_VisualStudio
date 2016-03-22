<!DOCTYPE html>
<html>
	<head>
		
		<title> <?php echo $title ?> </title>
		<link rel="stylesheet" type="text/css" href="style.css">

        <script src="js/jquery-2.2.0.min.js"></script>
	</head>

	<body>

	<?php include "menu.php";
	echo $content;
	?>

	<?php
		$servername = "mysql.agh.edu.pl";
		$username = "atrad";
		$password = "GSnx6QgH";
		$dbname = "atrad";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT id, firstname, lastname FROM MyGuests";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
			}
		} else {
			echo "0 results";
		}
		$conn->close();
	?> 
		
    </body>
</html>