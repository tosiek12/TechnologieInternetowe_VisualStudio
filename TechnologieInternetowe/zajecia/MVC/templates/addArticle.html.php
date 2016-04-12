<?php
require_once 'PageBouilder.php';
includeHeader(); 
?>

<h1>Dodaj artykul</h1>
<form action="?task=articles&amp;action=insert" method="post">

  <table style='width: auto;'>
    <tr>
      <td>Nazwa:</td>
      <td>
        <input type="text" name="title" />
      </td>
    </tr>
    <tr>
      <td>Cena:</td>
      <td>
        <input type="text" name="author" />
      </td>
    </tr>
    <tr>
      <td>Data dodania:</td>
      <td>
        <input type="text" name="date_add" value="<?= date("Y:m:d"); ?>" />
      </td>
    </tr>
    <tr>
      <td>Opis:</td>
      <td>
        <textarea name="content"></textarea>
      </td>
    </tr>
    <tr>
      <td>Kategoria:</td>
      <td>
        <select name="cat" size="0">
          <? foreach($this->get('catsData') as $cats) { ?>
            
          <option value=""
            <?= $cats['id'] ;?>"><?= $cats['name']; ?>
          </option>
          <? } ?>
    
        </select>
      </td>
    </tr>
    
  </table>
    <input type="submit" value="Dodaj" />
</form>
 
<?php include 'templates/footer.html.php'; ?>