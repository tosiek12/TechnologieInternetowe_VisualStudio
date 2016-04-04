<!DOCTYPE html>
  <html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <link href="css/style.css" rel="stylesheet" type="text/css" />
      <script src="js/jquery-2.2.0.min.js"></script>
    </head>

    <body>
      <nav >
        <ul>
          <li>
            <a class="dropbtn" href="?task=categories&action=add">Dodaj kategorie</a>
          </li>
          <li>
            <a class="dropbtn" href="?task=categories&action=index">Lista kategorii</a>
          </li>
          <li>
            <a class="dropbtn" href="?task=articles&amp;action=add">Dodaj artykul</a>
          </li>
          <li>
            <a class="dropbtn" href="?task=articles&amp;action=index">Lista artykulow</a>
          </li>

          <li class="dropdown">
            <a class="dropbtn"  href="#">js-scripts</a>
			<div class='dropdown-content'>
				<a href="#" onclick="koloruj()">Koloruj Pasma</a>
				<a href="#" onclick="dodajObraz()">DodajObraz</a>
			</div>
          </li>
        </ul>
      </nav>
