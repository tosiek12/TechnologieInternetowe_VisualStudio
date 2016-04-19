<?php
require_once 'PageBuilder.php';
includeHeader(); 
?>
<div class='body'>
  <h1>Lista artykulow</h1>
  <div class='allArticles'>
    <?php foreach($this->get('articles') as $articles) { ?>
    <div class='article'>
      <table>
        <tr style='text-align:center;'>
          <td>
            <img class='small' src='http://cdn11.podroze.smcloud.net/t/image/t/133471/gory-w-polsce-morskie-oko_334865.jpg'/>
          </td>
        </tr>
        <tr class='title'>
          <td>
               <?php echo('<a href="?task=articles&amp;action=one&amp;id='.$articles['id'].'">'.$articles['title'].'</a>'); ?>
          </td>
        </tr>
        <tr>
          <td>
            <?php echo  $articles['date_add']; ?>
          </td>
        </tr>
        <tr>
          <td>
            <?php echo $articles['autor']; ?>
          </td>
        </tr>
        <tr>
          <td>
            <?php echo $articles['name']; ?>
          </td>
        </tr>
        <tr>
          <?php 
            require_once 'Functions.php';
            if(isLogged())
            {
              echo('<td><a href="?task=articles&amp;action=delete&amp;id='.$articles['id'].'">usun</a></td>');
            } 
          ?>
        </tr>
      </table>
    </div>
    <?php } ?>
  </div>
</div>
<?php includeFooter(); ?>