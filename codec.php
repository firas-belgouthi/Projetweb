<?PHP
include "../config.php";
class codec {
	function ajoutcode($code){
		$sql="insert into code (num,montant,validite,dateajout,user) values (:num,:montant,:validite,:dateajout,:user)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $num=$code->getnum();
        $montant=$code->getmontant();
        $validite=$code->getvalidite();
        $dateajout=$code->getdateajout();
        $user=$code->getuser();
		$req->bindValue(':num',$num);
		$req->bindValue(':montant',$montant);
		$req->bindValue(':validite',$validite);
		$req->bindValue(':dateajout',$dateajout);
		$req->bindValue(':user',$user);
            $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	function affichercode(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From code";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function affichercodep(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT num,montant From code where user=5";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimercode($num){
		$sql="DELETE FROM code where num= :num";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':num',$num);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifiercode($code,$num){
		$sql="UPDATE code SET num=:num, montant=:montant,validite=:validite,dateajout=:dateajout,user=:user WHERE num=:num";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$num=$code->getnum();
        $montant=$code->getmontant();
        $validite=$code->getvalidite();
        $dateajout=$code->getdateajout();
        $user=$code->getuser();
		$datas = array(':num'=>$num, ':montant'=>$montant, ':validite'=>$validite,':dateajout'=>$dateajout
			,':user'=>$user);
		$req->bindValue(':num',$num);
		$req->bindValue(':montant',$montant);
		$req->bindValue(':validite',$validite);
		$req->bindValue(':dateajout',$dateajout);
		$req->bindValue(':user',$user);
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function solde(){
		$sql="select solde from client where id=5";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
function montant($str){
		$sql="select montant from code where num=$str";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste; 
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}	
function validite($str){
		$sql="select validite from code where num=$str";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste; 
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}	
function dateajout($str){
		$sql="select dateajout from code where num=$str";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste; 
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}	
	function modifiersolde($str){
		$sql="UPDATE client SET solde=solde+$str WHERE id=5";
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
	function soldenouv(){
		$sql="select (select solde from client where id=5)-(select (sum(quantite*prix)) as 'pt' from produit inner join commandes on produit=id where client=5 and paye=0) as 'sn' from dual";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifiersolde2($str){
		$sql="UPDATE client SET solde=$str WHERE id=5";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste; 
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifiercommandes(){
		$sql="UPDATE commandes SET paye=1 WHERE client=5";
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
	function afficherclient(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT id,nom,prenom from client where id=5";
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

	/*function recuperercommandes($numcmd){
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
	*/

	/*
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

*/
	?>