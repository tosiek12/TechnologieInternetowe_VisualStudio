<?php
require_once 'PageBuilder.php';
includeHeader(); 
?>
<div class='body'>
  <h1>Dodaj kategorie</h1>
  <form action="?task=categories&action=insert" method="post">
    Nazwa kategorii: <input type="text" name="name" />
    <input type="submit" value="Dodaj" />
  </form>
</div>
<?php includeFooter(); ?>