<?php

class Homme extends Client {
	
    const SEXE = "homme";
    
	
    function __construct($login,$mdp,$email,$pseudo,$dateNaissance)
	{  
		parent::__construct($login,$mdp,$email,$pseudo,$dateNaissance);
    }

	
    public function validerContact()
	{
        
    }
	
	public function effectuerPaiement()
	{
	
	}
    
    
}

?>
