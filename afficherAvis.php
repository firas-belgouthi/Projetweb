<?PHP
include "../core/avisC.php";
$avis1C=new AvisC();
$listeAvis=$avis1C->afficheravis1();

//var_dump($listeAvis->fetchAll());
?>
<table border="1">
<tr>
<td>Id</td>
<td>Id_Client</td>
<td>Evaluation</td>
<td>supprimer</td>
<td>modifier</td>
</tr>

<?PHP
foreach($listeAvis as $row){
	?>
	<tr>
	<td><?PHP echo $row['id']; ?></td>
	<td><?PHP echo $row['id_client']; ?></td>
	<td><?PHP echo $row['evaluation']; ?></td>
	<td><form method="POST" action="supprimerAvis.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
	</form>
	</td>
	<td><a href="modifierAvis.php?id=<?PHP echo $row['id']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>


