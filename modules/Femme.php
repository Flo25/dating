<?php

class Femme extends Client {
	
    const SEXE = "femme";
    
	
    function __construct($login,$mdp,$email,$pseudo,$dateNaissance)
	{  
		parent::__construct($login,$mdp,$email,$pseudo,$dateNaissance);
    }

	
    public function demandeContact()
	{
        
    }
    
    
}

?>
