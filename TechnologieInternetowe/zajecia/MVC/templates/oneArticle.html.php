<?php
require_once 'PageBuilder.php';
includeHeader(); 
?>
<div class='body'>
	<? foreach($this->get('articles') as $articles) { ?>

	<h1><?= $articles['title']; ?></h1>

	autor: <?= $articles['autor']; ?>, data dodania: <?= $articles['date_add']; ?><br />
	Kategoria: <?= $articles['name']; ?>
 
	<p><?= $articles['content']; ?></p>

		<? } ?>
    
    <table>
      <tr>
        <td>Ocen artykul: </td>
        <td>
          <?php require_once 'Functions.php';
          if(!isLogged()){
          echo('Musisz sie zalogowac');
          }else {
           echo('<button class="button button1" onClick="ocen('.$articles['id'].',3)">Super!</button>');
           echo('<button class="button button2" onClick="ocen('.$articles['id'].',2)">Ok.</button>');
           echo('<button class="button button3" onClick="ocen('.$articles['id'].',1)">Slabo...</button>');
          }?>
          
          <script type="text/javascript">
            function ocen(id,ocena) {
              console.log('test');
              $.ajax({
                url: "welcome_post.php",
                type: "POST",
                async: true,
                data: { sql:"(" + id + "," + ocena +")"},
                dataType: "html",

                success: function(data) {
                    console.log('succes');
                }
              });
            }
          </script>
        </td>
      </tr>
    </table>
</div>

<?php includeFooter(); ?>