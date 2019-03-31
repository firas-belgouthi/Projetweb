<?PHP
include "../entities/avisH.php";
include "../core/avisC.php";
$avis=new Avis(75757575,3232323,'avis');
$avisC=new AvisC();
$avisC->afficherAvis($avis);
echo "****************";
echo "<br>";
echo "id:".$avis->getId();
echo "<br>";
echo "id_client:".$avis->getId_client();
echo "<br>";
echo "evaluation:".$avis->getEvaluation();
echo "<br>";

?>