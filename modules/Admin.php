<?php


class Admin extends User {
    
	
    const qualite = "BO";
    
    function __construct($email,$mdp)
	{ 
        parent::__construct($email,$mdp);
    }
    
    public function bloqCompte() 
	{
        $connexion = ConnexionBD::getInstance();
		
		$sql = "UPDATE membre SET etat = 'B' WHERE idMembreR = '".$_GET['id']."' ";
		$req = $connexion->prepare($sql);
		$req->execute();
    }
    
    public function supprimCompte() 
	{
        $connexion = ConnexionBD::getInstance();
		
		$sql = "DELETE FROM membre WHERE idMembreR = '".$_GET['id']."' ";
		$req = $connexion->prepare($sql);
		$req->execute();
    }
    
}

?>
