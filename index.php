<?php
 
//On inclut le contrôleur s'il existe et s'il est spécifié

if (!empty($_GET['page']) && is_file('controller/'.$_GET['page'].'.php'))
{
	include 'controller/'.$_GET['page'].'.php';  
}
else
{
	include 'view/accueil.php';
}
?>