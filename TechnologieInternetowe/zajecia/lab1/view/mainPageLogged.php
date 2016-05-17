<html>
	<head>
		<title>Just another simple page in PHP </title>
	</head>
	
	<body>
		<div class='body'>
		  <h2>Witaj <?php echo($_SESSION['username']); ?></h2>
		  <p><a href = "?view=login&action=logout"> Logout </a> </p>
		</div>
		
	</body>
</html>
