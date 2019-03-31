<?PHP
include "../core/reclamationC.php";
$reclamation1C=new ReclamationC();
$listeReclamations=$reclamation1C->afficherReclamations();

//var_dump($listeReclamations->fetchAll());
?>
<table border="1">
<tr>
<td>Id</td>
<td>Id_Client</td>
<td>Type</td>
<td>Content</td>
<td>supprimer</td>
<td>modifier</td>
</tr>

<?PHP
foreach($listeReclamations as $row){
	?>
	<tr>
	<td><?PHP echo $row['id']; ?></td>
	<td><?PHP echo $row['id_client']; ?></td>
	<td><?PHP echo $row['type']; ?></td>
	<td><?PHP echo $row['content']; ?></td>
	<td><form method="POST" action="supprimerReclamation.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
	</form>
	</td>
	<td><a href="modifierReclamation.php?id=<?PHP echo $row['id']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>


