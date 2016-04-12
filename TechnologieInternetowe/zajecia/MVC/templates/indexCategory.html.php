<?php
require_once 'PageBouilder.php';
includeHeader(); 
?>


</pre>
<h1>Lista kategorii</h1>

<table>
<tbody>
<tr>
<td>Nazwa</td>
<td>Akcja</td>
</tr>
<?php foreach($this->get('catsData') as $cats) { ?> 
<tr>
<td><?php echo $cats['name']; ?></td>
<td><a href="?task=categories&action=delete&id=<?php echo $cats['id']; ?>">usun</a></td>
</tr>
<?php } ?>
</tbody>
</table>

<?php include 'templates/footer.html.php'; ?>