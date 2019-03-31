<HTML>
<head>
</head>
<body>
<?PHP
include "../entities/reclamationH.php";
include "../core/reclamationC.php";
if (isset($_GET['id'])){
	$reclamationC=new reclamationC();
    $result=$reclamationC->recupererReclamation($_GET['id']);
	foreach($result as $row){
		$id=$row['id'];
		$id_client=$row['id_client'];
		$type=$row['type'];
		$content=$row['content'];
?>
<form method="POST">
<table>
<caption>Modifier reclamation</caption>
<tr>
<td>id</td>
<td><input type="number" name="id" value="<?PHP echo $id ?>"></td>
</tr>
<tr>
<td>id_client</td>
<td><input type="text" name="id_client" value="<?PHP echo $id_client ?>"></td>
</tr>
<tr>
<td>type</td>
<td><input type="text" name="type" value="<?PHP echo $type ?>"></td>
</tr>
<tr>
<td>content</td>
<td><input type="number" name="content" value="<?PHP echo $content ?>"></td>
</tr>
<tr>
<td></td>
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
	$reclamation=new reclamation($_POST['id'],$_POST['id_client'],$_POST['type'],$_POST['content']);
	$reclamationC->modifierReclamation($reclamation,$_POST['id_ini']);
	echo $_POST['id_ini'];
	header('Location: afficherReclamation.php');
}
?>
</body>
</HTMl>