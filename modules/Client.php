<?php

class Client extends User {
    
	private $pseudo;
	private $dateNaissance;
	
    const QUALITE = "FO";
    
	
    function __construct($login,$mdp,$email,$pseudo,$dateNaissance)
	{  
		$this->pseudo = $pseudo;
		$this->dateNaissance = $dateNaissance;
		parent::__construct($login, $mdp, $email);
    }

	
    public function inscription()
	{
        $connexion = ConnexionBD::getInstance();
		
		$sql = "INSERT INTO client (";
		$req = $connexion->prepare($sql);
		$param = array($_POST['login'],$_POST['mdp']);
		$req->execute($param);
    }
    
    public function modifProfil()
	{
        
    }
	
	public function demandeMdp()
	{
	
	}
	
	public function saisieNewMdp()
	{
	
	}
	
	public function demandeBloq()
	{
	
	}
	
	public function getPseudo()
	{
		return $this->pseudo;
	}
	
	public function setPseudo()
	{
		$this->pseudo = $pseudo;
	}
	
	public function getDateNaissance()
	{
		return $this->dateNaissance;
	}
	
	public function setDateNaissance()
	{
		$this->dateNaissance = $dateNaissance;
	}
    
}

?>
