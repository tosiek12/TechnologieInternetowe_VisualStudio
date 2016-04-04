<? include 'templates/header.html.php'; ?>
 
<h1>Lista artykułów</h1>
<table>
    <tr>
        <td>Tytuł</td>
        <td>Data dodania</td>
        <td>Autor</td>
        <td>Kategoria</td>
        <td>&nbsp;</td>
    </tr>
	<?php foreach($this->get('articles') as $articles) { ?> 
	
	<tr>
	    <td><a href="?task=articles&amp;action=one&amp;id=<?php echo $articles['id']; ?>"><?php echo $articles['title']; ?></a></td>
        <td><?php echo  $articles['date_add']; ?></td>
        <td><?php echo $articles['autor']; ?></td>
        <td><?php echo $articles['name']; ?></td>
        <td><a href="?task=articles&amp;action=delete&amp;id=<?php echo $articles['id']; ?>">usuń</a></td>
	</tr>
	<?php } ?>
</table>
 
<? include 'templates/footer.html.php'; ?>