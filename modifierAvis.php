<HTML>
<head>
</head>
<body>
<?PHP
include "../entities/avisH.php";
include "../core/avisC.php";
if (isset($_GET['id'])){
	$avisC=new avisC();
    $result=$avisC->recupererAvis($_GET['id']);
	foreach($result as $row){
		$id=$row['id'];
		$id_client=$row['id_client'];
		$evaluation=$row['evaluation'];
		
?>
<form method="POST">
<table>
<caption>Modifier Avis</caption>
<tr>
<td>id</td>
<td><input type="number" name="id" value="<?PHP echo $id ?>"></td>
</tr>
<tr>
<td>id_client</td>
<td><input type="number" name="id_client" value="<?PHP echo $id_client ?>"></td>
</tr>
<tr>
<td>evaluation</td>
<td><input type="text" name="evaluation" value="<?PHP echo $evaluation ?>"></td>
</tr>
<tr>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="id_ini" value="<?PHP echo $_GET['id'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$avis=new avis($_POST['id'],$_POST['id_client'],$_POST['evaluation']);
	$avisC->modifierAvis($avis,$_POST['id_ini']);
	echo $_POST['id_ini'];
	header('Location: afficherAvis.php');
}
?>
</body>
</HTMl>