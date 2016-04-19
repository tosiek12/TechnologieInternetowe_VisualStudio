<?php
require_once 'PageBuilder.php';
includeHeader(); 
?>

<div class='body'>
  <h1>Dodaj artykul</h1>
  <div class='withTable'>
    <form action="?task=articles&amp;action=insert" method="post">
    <table >
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
          <input type="text" name="date_add" value=""<?= date("Y:m:d"); ?>" />
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
              <?= $cats['id'] ;?>"> <?=$cats['name'];?>
            </option>
            <? } ?>
    
        
          </select>
        </td>
      </tr>

    </table>
    <input type="submit" value="Dodaj" />
  </form>
  </div>
</div>
<?php includeFooter(); ?>