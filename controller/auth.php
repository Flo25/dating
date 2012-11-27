<?php

session_start();

//On inclut le modèle
include('/../model/ConnexionBD.php');
include('/../model/User.php');
 
/* On effectue ici diverses actions, comme supprimer des news, par exemple. ;)
Il n'y en aura aucune dans ce tutoriel pour rester simple, mais libre à vous d'en rajouter. */
 
//On récupère les news
if(!empty($_POST['email']) && !empty($_POST['mdp']))
{
	$user = new User();
	$auth = $user->authentification();
	if(empty($auth))
		{
			echo "pas de connexion";
		}
		else
		{
			$_SESSION['pseudo'] = $auth['pseudo'];
			header ('Location: /dating/view/espaceperso.php');
		}
}
else
{
	//On inclut la vue
	include('/../view/auth.php');
}
?>