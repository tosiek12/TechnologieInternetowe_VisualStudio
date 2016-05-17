<html>
	<head>
		<title>Just another simple page in PHP </title>
	</head>
	
	<body>
		<div class='body'>
		  <h3><?php echo($_SESSION['redir_msg']); ?></h3>
		</div>
		<?php echo('<script> document.ready(window.setTimeout(function(){location.href = "'.$_SESSION['redir_page'].'"},5000));</script>'); ?>
	</body>
</html>
