<?php

class Femme extends Membre {
	
    const SEXE = "femme";
    
	
    function __construct($email,$mdp,$pseudo,$dateNaissance)
	{  
		parent::__construct($email,$mdp,$pseudo,$dateNaissance);
    }

	
    public function demandeContact()
	{
        $connexion = ConnexionBD::getInstance();
		
		$sql = "INSERT INTO amis (etat,confirm,idMembreE,idMembreR) VALUES (?,?,?)";
		$req = $connexion->prepare($sql);
		$param = array('O','N',$_SESSION['id'],$_GET['id']);
		$req->execute($param);
    }
    
    
}

?>
