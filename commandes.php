<?PHP
class commandes{
	private $numcmd;
	private $client;
	private $produit;
	private $prixu;
	private $quantite;
	private $date;
	private $heure;
	private $panier;
	function __construct($numcmd,$client,$produit,$prixu,$quantite,$date,$heure,$panier){
		$this->numcmd=$numcmd;
		$this->client=$client;
		$this->produit=$produit;
		$this->prixu=$prixu;
		$this->quantite=$quantite;
		$this->date=$date;
		$this->heure=$heure;
		$this->panier=$panier;
	}
	
	function getnumcmd(){
		return $this->numcmd;
	}
	function getclient(){
		return $this->client;
	}
	function getproduit(){
		return $this->produit;
	}
	function getprixu(){
		return $this->prixu;
	}
	function getquantite(){
		return $this->quantite;
	}
	function getdate(){
		return $this->date;
	}
	function getheure(){
		return $this->heure;
	}
	function getpanier(){
		return $this->panier;
	}

	function setnumcmd($numcmd){
		$this->numcmd=$numcmd;
	}
	function setclient($client){
		$this->client=$client;
	}
	function setproduit($produit){
		$this->produit=$produit;
	}
	function setprixu($prixu){
		$this->prixu=$prixu;
	}
	function setquantite($quantite){
		$this->quantite=$quantite;
	}
	function setdate($date){
		$this->date=$date;
	}
	function setheure($heure){
		$this->heure=$heure;
	}
	function setpanier($panier){
		$this->panier=$panier;
	}
}

?>