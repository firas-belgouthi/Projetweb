<?PHP
include "../entities/avisH.php";
include "../core/avisC.php";

if (isset($_POST['id']) and isset($_POST['id_client']) and isset($_POST['evaluation'])){
$avis1=new avis($_POST['id'],$_POST['id_client'],$_POST['evaluation']);
//Partie2
/*
var_dump($avis1);
}
*/
//Partie3
$avis1C=new AvisC();
$avis1C->ajouterAvis($avis1);
header('Location: afficherAvis.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>