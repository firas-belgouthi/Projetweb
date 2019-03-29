<?PHP
include "../entities/reclamationH.php";
include "../core/reclamationC.php";
$reclamation=new Reclamation(75757575,32322323,'Ravi','Bonne continuation');
$reclamationC=new ReclamationC();
$reclamationC->afficherReclamation($reclamation);
echo "****************";
echo "<br>";
echo "Id:".$employe->getId();
echo "<br>";
echo "Id_client:".$employe->getId_client();
echo "<br>";
echo "Type:".$employe->getTyp();
echo "<br>";
echo "Content:".$employe->getContent();
echo "<br>";


?>