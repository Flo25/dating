<?php

class User {

    protected $login;
    protected $mdp;
    protected $email;
    
    function __construct($login="", $mdp="", $email="") 
	{
        $this->login = $login;
        $this->mdp = $mdp;
        $this->email = $email;
    }
   
    public function authentification()
    {
		$connexion = ConnexionBD::getInstance();
		
		$sql = "SELECT * FROM user WHERE login=? AND mdp=?";
		$req = $connexion->prepare($sql);
		$param = array($_POST['login'],$_POST['mdp']);
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
		$sql = "SELECT * FROM client WHERE sexe=? AND age=?";
		$req = $connexion->prepare($sql);
		$param = array($_POST['sexe'],$_POST['age']);
		$req->execute($param);
 
        while ($data =$req->fetch())
        {
                $list[] = $data;
        }
 
        return $list;
	
	}

    public function getLogin() 
	{
        return $this->login;
    }

    public function setLogin($login) 
	{
        $this->login = $login;
    }

    public function getMdp()
	{
        return $this->mdp;
    }

    public function setMdp($mdp) 
	{
        $this->mdp = $mdp;
    }

    public function getEmail()
	{
        return $this->email;
    }

    public function setEmail($email)
	{
        $this->email = $email;
    }


}

?>