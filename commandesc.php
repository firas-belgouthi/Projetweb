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
		$sql="	SElECT numcmd,quantite,p.nom as 'produit',prix,date,heure,c.id as 'user',c.nom 'name',prenom From commandes inner join produit p on produit=id inner join client c on client=c.id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function tri($str,$stc){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="	SElECT numcmd,quantite,p.nom as 'produit',prix,date,heure,c.id as 'user',c.nom 'name',prenom From commandes inner join produit p on produit=id inner join client c on client=c.id order by $str $stc";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function affichercommandesp(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT numcmd,quantite,nom,prix,date,heure From commandes inner join produit on produit=id where client=5 and paye=0";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function commandeparclient($str){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="	SElECT numcmd,quantite,p.nom as 'produit',prix,date,heure,c.id as 'user',c.nom 'name',prenom From commandes inner join produit p on produit=id inner join client c on client=c.id where client=$str";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function commandespayees(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="	SElECT numcmd,quantite,p.nom as 'produit',prix,date,heure,c.id as 'user',c.nom 'name',prenom From commandes inner join produit p on produit=id inner join client c on client=c.id where paye=1";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function commandesnonpayees(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="	SElECT numcmd,quantite,p.nom as 'produit',prix,date,heure,c.id as 'user',c.nom 'name',prenom From commandes inner join produit p on produit=id inner join client c on client=c.id where paye=0";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
		function afficherhiscommandes(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT numcmd,quantite,nom,prix,date,heure From commandes inner join produit on produit=id where client=5 and paye=1 order by date";
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
	function prixtotal(){
		$sql="select (sum(quantite*prix)) as 'pt' from produit inner join commandes on produit=id where client=5 and paye=0";
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

	function nextcommande(){
		$sql="select (max(numcmd)+1) as 'max' from commandes";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
function idproduit($str){
		$sql="select id from produit where nom like '".$str."' ";
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