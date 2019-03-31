<?PHP
include "../entities/reclamationH.php";
include "../core/reclamationC.php";
$reclamation=new Reclamation(75757575,32322323,'Ravi','Bonne continuation');
$reclamationC=new ReclamationC();
$reclamationC->afficherReclamation($reclamation);
echo "****************";
echo "<br>";
echo "Id:".$reclamation->getId();
echo "<br>";
echo "Id_client:".$reclamation->getId_client();
echo "<br>";
echo "Type:".$reclamation->getTyp();
echo "<br>";
echo "Content:".$reclamation->getContent();
echo "<br>";


?>