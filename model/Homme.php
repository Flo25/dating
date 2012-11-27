<?php

class Homme extends Membre {
	
    const SEXE = "homme";
    
	
    function __construct($email,$mdp,$pseudo,$dateNaissance)
	{  
		parent::__construct($email,$mdp,$pseudo,$dateNaissance);
    }

	
    public function validerContact()
	{
        $connexion = ConnexionBD::getInstance();
		
		$sql = "UPDATE amis SET confirm = 'O' WHERE idMembreE = '".$_SESSION['id']."' AND idMembreR = '".$_GET['id']."' ";
		$req = $connexion->prepare($sql);
		$req->execute();
    }
	
	public function effectuerPaiement()
	{
		$connexion = ConnexionBD::getInstance();
		
		$sql = "INSERT INTO paiement (numCarte,nomCarte,dateExp,crypto,montant) VALUES (?,?,?,?,?)";
		$req = $connexion->prepare($sql);
		$param = array($_POST['numCarte'],$_POST['nomCarte'],$_POST['dateExp'],$_POST['crypto'],$_POST['montant']);
		$req->execute($param);
	}
    
    
}

?>
