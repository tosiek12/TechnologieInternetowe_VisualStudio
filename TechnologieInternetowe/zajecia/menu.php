<?php
session_start();
?>
<nav >
	<ul>
		<li><a class="dropbtn" href="index.html">Glowna</a></li>
		<li><a class="dropbtn" href="gory.html">Obrazek</a></li>
		<li class="dropdown">
			<a class="dropbtn" href="table.html">Tablica</a>
			<div class="dropdown-content">
				<a href="#" onclick="koloruj()">Koloruj Pasma</a>
				<a href="#" onclick="dodajObraz()">DodajObraz</a>
			</div>
		</li>
		<li><a class="dropbtn" href="generowanie.html">generowanie <?php print_r($_SESSION); ?></a></li>
	</ul>
</nav>
