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
		
		$sql = "SELECT * FROM membre WHERE email=? AND mdp=?";
		$req = $connexion->prepare($sql);
		$param = array($_POST['email'],$_POST['mdp']);
		$req->execute($param);
		
		$data = $req->fetch();
		
		if(empty($data))
		{
			echo "pas de connexion";
		}
		else
		{
			echo "Connexion OK";
		}
    }
	
	public function recherche()
	{
		$connexion = ConnexionBD::getInstance();
		
		$list=array();
		$sql = "SELECT * FROM membre WHERE sexe=? BETWEEN age=? and age=?";
		$req = $connexion->prepare($sql);
		$param = array($_POST['sexe'],$_POST['age1'],$_POST['age2']);
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