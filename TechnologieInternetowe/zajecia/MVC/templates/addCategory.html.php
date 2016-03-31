<?php include 'templates/header.html.php'; ?>
</pre>
<h1>Dodaj kategorie</h1>
<form action="?task=categories&action=insert" method="post">
  Nazwa kategorii: <input type="text" name="name" />
  <input type="submit" value="Dodaj" />
</form>
<pre>
 <?php include 'templates/footer.html.php'; ?>