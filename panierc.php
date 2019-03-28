<?PHP
include "../config.php";
class panierc {
function afficherpanier1($panier){
		echo "id: ".$panier->getnumcmd()."<br>";
		echo "client: ".$panier->getclient()."<br>";
		echo "prix: ".$panier->getprix()."<br>";
		echo "date: ".$panier->getdate()."<br>";
		echo "heure: ".$panier->getheure()."<br>";
	}
	function ajouterpanier($panier){
		$sql="insert into panier (id,client,prix,date,heure) values (:id,:client,:prix,:date,:heure)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id=$panier->getid();
        $client=$panier->getclient();
        $prix=$panier->getprix();
        $date=$panier->getdate();
        $heure=$panier->getheure();
		$req->bindValue(':id',$id);
		$req->bindValue(':client',$client);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':date',$date);
		$req->bindValue('heure',$heure);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherpanier(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From panier";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerpanier($id){
		$sql="DELETE FROM panier where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierpanier($panier,$id){
		$sql="UPDATE panier SET id=:id, client=:client,prix=:prix,date=:date,heure=:heure, WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$id=$panier->getid();
        $client=$panier->getclient();
        $prix=$panier->getprix();
        $date=$panier->getdate();
        $heure=$panier->getheure();
		$datas = array(':id'=>$id, ':client'=>$client,':prix'=>$prix,':date'=>$date,':heure'=>$heure);
		$req->bindValue(':id',$numcmd);
		$req->bindValue(':client',$client);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':date',$date);
		$req->bindValue(':heure',$heure);
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererpanier($id){
		$sql="SELECT * from panier where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
/*	function recherchercommandes($tarif){
		$sql="SELECT * from employe where tarifHoraire=$tarif";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}*/
}

?>