<?php
session_start();

if($_POST["name"] != "" ) {
	// Set session variables
	$_SESSION["name"] = $_POST["name"];
} else {
	// remove all session variables
	session_unset();

	// destroy the session
	session_destroy(); 
}
header("Location: index.php");
die();
?>

<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>
From session: <?php echo $_SESSION["name"]; ?>

</body>
</html>

