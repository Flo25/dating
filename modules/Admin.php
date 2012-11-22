<?php


class Admin extends User {
    
    const qualite = "BO";
    
    function __construct($login,$mdp,$email)
	{ 
        parent::__construct($login,$mdp,$email);
    }
    
	
    public function bloqCompte() 
	{
        
    }
    
    public function suppCompte() 
	{
        
    }
    
    public function modifierAuteur() {
        
    }
   
    public function envoiFormMdp() 
	{
        
    }
    
}

?>
