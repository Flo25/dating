<?php

session_start();

//On inclut le modèle
include('/../model/ConnexionBD.php');
include('/../model/User.php');
include('/../model/Membre.php');
 
/* On effectue ici diverses actions, comme supprimer des news, par exemple. ;)
Il n'y en aura aucune dans ce tutoriel pour rester simple, mais libre à vous d'en rajouter. */
 
//On récupère les news
if(!empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['pseudo']) && !empty($_POST['dateNaissance']) && !empty($_POST['sexe']))
{
	$membre = new Membre();
	$inscription = $membre->inscription();
	
	/*foreach($auth as $tab)
	{
		echo $tab['dateNaissance']; ?> <br /> <?php
	}*/
}
else
{
	//On inclut la vue
	include('/../view/inscription.php');
}
?>