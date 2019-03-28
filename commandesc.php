<?PHP
include "../config.php";
class commandesc {
function affichercommande ($commandes){
		echo "numero cmd: ".$commandes->getnumcmd()."<br>";
		echo "client: ".$commandes->getclient()."<br>";
		echo "produit: ".$commandes->getproduit()."<br>";
		echo "prix unitaire: ".$commandes->getprixu()."<br>";
		echo "quantite: ".$commandes->getquantite()."<br>";
		echo "date: ".$commandes->getdate()."<br>";
		echo "heure: ".$commandes->getheure()."<br>";
		echo "panier: ".$commandes->getpanier()."<br>";
	}
	function ajoutercommandes($commandes){
		$sql="insert into commandes (numcmd,client,produit,prixu,quantite,date,heure,panier) values (:numcmd,:client,:produit,:prixu,:quantite,:date,:heure,:panier)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $numcmd=$commandes->getnumcmd();
        $client=$commandes->getclient();
        $produit=$commandes->getproduit();
        $prixu=$commandes->getprixu();
        $quantite=$commandes->getquantite();
        $date=$commandes->getdate();
        $heure=$commandes->getheure();
        $panier=$commandes->getpanier();
		$req->bindValue(':numcmd',$numcmd);
		$req->bindValue(':client',$client);
		$req->bindValue(':produit',$produit);
		$req->bindValue(':prixu',$prixu);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':date',$date);
		$req->bindValue('heure',$heure);
		$req->bindValue('panier',$panier);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function affichercommandes(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From commandes";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimercommandes($numcmd){
		$sql="DELETE FROM commandes where numcmd= :numcmd";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':numcmd',$numcmd);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifiercommandes($commandes,$numcmd){
		$sql="UPDATE commandes SET numcmd=:numcmd, client=:client,produit=:produit,prixu=:prixu,quantite=:quantite,date=:date,heure=:heure,panier=:panier WHERE numcmd=:numcmd";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$numcmd=$commandes->getnumcmd();
        $client=$commandes->getclient();
        $produit=$commandes->getproduit();
        $prixu=$commandes->getprixu();
        $quantite=$commandes->getquantite();
        $date=$commandes->getdate();
        $heure=$commandes->getheure();
        $panier=$commandes->getpanier();
		$datas = array(':numcmd'=>$numcmd, ':client'=>$client, ':produit'=>$produit,':prixu'=>$prixu,':quantite'=>$quantite,':date'=>$date,':heure'=>$heure,':panier'=>$panier);
		$req->bindValue(':numcmd',$numcmd);
		$req->bindValue(':client',$client);
		$req->bindValue(':produit',$produit);
		$req->bindValue(':prixu',$prixu);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':date',$date);
		$req->bindValue(':heure',$heure);
		$req->bindValue(':panier',$panier);
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recuperercommandes($numcmd){
		$sql="SELECT * from commandes where numcmd=$numcmd";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function recherchercommandes($str){
		$sql="select * from commandes where numcmd like '%"+$str+"%' or client like '%"+$str+"%' or produit like '%"+$str+"%' or prixu like '%"+$str+"%'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>