<?php

//On inclut le modèle
include('/../model/ConnexionBD.php');
include('/../model/User.php');
 
/* On effectue ici diverses actions, comme supprimer des news, par exemple. ;)
Il n'y en aura aucune dans ce tutoriel pour rester simple, mais libre à vous d'en rajouter. */
 
//On récupère les news
if(!empty($_POST['sexe']) && !empty($_POST['age1']) && !empty($_POST['age2']))
{

	$annee1 = date('Y') - $_POST['age1'];
	$annee2 = date('Y') - $_POST['age2'];
	
	echo $annee2.'<br>'.' '.$annee1; ?> <br /> <?php

	$user = new User();
	$auth = $user->recherche($annee2,$annee1);
	
	foreach($auth as $tab)
	{
		echo '<br>'.$tab['email'].'<br>';
	}
}
else
{
	//On inclut la vue
	include('/../view/recherche.php');
}
?>