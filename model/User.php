<?php

class User {

    protected $email;
    protected $mdp;
    
    function __construct($email="", $mdp="") 
	{
        $this->email = $email;
        $this->mdp = $mdp;
    }
   
    public function authentification()
    {
		$connexion = ConnexionBD::getInstance();
		$cnx=$connexion->getLcn();
		$sql = "SELECT pseudo FROM membre WHERE email=? AND mdp=?";
		$req=$cnx->prepare($sql);
		$param = array($_POST['email'],$_POST['mdp']);
		$req->execute($param);
		
		$data = $req->fetch();
		
		return $data;
    }
	
	public function recherche($annee2="",$annee1="")
	{
		$connexion = ConnexionBD::getInstance();
		$cnx=$connexion->getLcn();
		
		$list=array();
		$sql = "SELECT email FROM membre WHERE sexe=? AND YEAR(dateNaissance)>=? AND YEAR(dateNaissance)<=?";
		$req = $cnx->prepare($sql);
		$param = array($_POST['sexe'],$annee2,$annee1);
		$req->execute($param);
		
		while ($data =$req->fetch())
        {
                $list[] = $data;
        }

        return $list;
	}

    public function getEmail()
	{
        return $this->email;
    }

    public function setEmail($email)
	{
        $this->email = $email;
    }

    public function getMdp()
	{
        return $this->mdp;
    }

    public function setMdp($mdp) 
	{
        $this->mdp = $mdp;
    }

}

?>