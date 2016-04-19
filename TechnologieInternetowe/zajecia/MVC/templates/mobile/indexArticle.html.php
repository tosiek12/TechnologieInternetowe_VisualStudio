<?php
require_once 'PageBuilder.php';
includeHeader(); 
?>
<div class='body'>
  <h1>Lista artykulow</h1>
  <img class='small' src='http://www.doleby.pl/wp-content/uploads/2012/10/wakacyjne-zdjecia027.jpg'/>
  <table>
    <tr>
      <td>Tytul</td>
      <td>Data dodania</td>
      <td>Autor</td>
      <td>Kategoria</td>
      <td>&nbsp;</td>
    </tr>
    <?php foreach($this->get('articles') as $articles) { ?>
    <tr>
      <td>
        <?php echo('<a href="?task=articles&amp;action=one&amp;id='.$articles['id'].'">'.$articles['title'].'</a>'); ?>
      </td>
      <td>
        <?php echo  $articles['date_add']; ?>
      </td>
      <td>
        <?php echo $articles['autor']; ?>
      </td>
      <td>
        <?php echo $articles['name']; ?>
      </td>
      <?php require_once 'Functions.php'; if(isLogged()){echo('<td><a href="?task=articles&amp;action=delete&amp;id='.$articles['id'].'">usun</a></td>');} ?>
    </tr>
    <?php } ?>
  </table>
</div>
<?php includeFooter(); ?>