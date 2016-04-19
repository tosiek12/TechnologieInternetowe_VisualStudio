<?php
require_once 'PageBuilder.php';
includeHeader(); 
?>

<div class='body'>
	<h1>Lista kategorii</h1>

	<table>
		<tbody>
			<tr>
				<td>Nazwa</td>
				<td></td>
			</tr>
			<?php foreach($this->get('catsData') as $cats) { ?> 
			<tr>
				<td><?php echo $cats['name']; ?></td>
				<?php require_once 'Functions.php'; if(isLogged()){echo('<td><a href="?task=categories&action=delete&id='.$cats['id'].'">usun</a></td>');} ?>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<?php includeFooter(); ?>