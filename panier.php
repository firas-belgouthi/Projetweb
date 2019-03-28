<?PHP
class panier{
	private $id;
	private $client;
	private $prix;
	private $date;
	private $heure;
	function __construct($id,$client,$prix,$date,$heure){
		$this->id=$id;
		$this->client=$client;
		$this->prix=$prix;
		$this->date=$date;
		$this->heure=$heure;
	}
	
	function getid(){
		return $this->id;
	}
	function getclient(){
		return $this->client;
	}
	function getprix(){
		return $this->prix;
	}
	function getdate(){
		return $this->date;
	}
	function getheure(){
		return $this->heure;
	}
	function setid($id){
		$this->id=$id;
	}
	function setclient($client){
		$this->client=$client;
	}
	function setprix($prix){
		$this->prix=$prix;
	}
	function setdate($date){
		$this->date=$date;
	}
	function setheure($heure){
		$this->heure=$heure;
	}
}

?>