<?PHP
include "../core/avisC.php";
$avisC=new AvisC();
if (isset($_POST["id"])){
	$avisC->supprimerAvis($_POST["id"]);
	header('Location: afficherAvis.php');
}

?>