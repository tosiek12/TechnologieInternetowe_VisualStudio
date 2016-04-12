<!DOCTYPE html>
  <html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <link href="css/style.css" rel="stylesheet" type="text/css" />
      <script src="js/jquery-2.2.0.min.js"></script>
      <script type="text/javascript" src="js/jquery_use.js"></script>

    </head>

    <body>
      <nav>
        <ul>
		  <li>
            <a class="dropbtn" href="?task=articles&amp;action=index">Przedmioty</a>
          </li>
          <li>
            <a class="dropbtn" href="?task=categories&action=index">Lista kategorii</a>
          </li>

          <li class="dropdown">
            <a class="dropbtn"  >Administrator</a>
			<div class='dropdown-content'>
				<a class="dropbtn" href="?task=categories&action=add">Dodaj kategorie</a>
				<a class="dropbtn" href="?task=articles&amp;action=add">Dodaj produkt</a>
			</div>
          </li>

          <li class="dropdown">
            <a class="dropbtn"  >js-scripts</a>
			<div class='dropdown-content'>
				<a class="dropbtn" href="#" onclick="koloruj()">Koloruj Pasma</a>
				<a class="dropbtn" href="#" onclick="dodajObraz()">DodajObraz</a>
			</div>
          </li>

		  <li class="dropdown">
            <a class="dropbtn"  >Panel uzytkownika</a>
			<ul class='dropdown-content'>
				<a class="dropbtn" href="?task=permission&action=login">Login</a>
				<?php require_once 'Functions.php'; if(isLogged()){echo('<a class="dropbtn" href="?task=permission&action=logoff">Logoff</a>');} ?>
            </ul>
          </li>
        </ul>
      </nav>
