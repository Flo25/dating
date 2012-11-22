<?php
session_start();//On démarre la session


 
//On se connecte à MySQL
mysql_connect('localhost', 'root', 'root');
mysql_select_db('dating');
 
//On inclut le contrôleur s'il existe et s'il est spécifié

if (!empty($_GET['page']) && is_file('controller/'.$_GET['page'].'.php'))
{
        include 'controller/'.$_GET['page'].'.php';
	  
}
else
{
        include 'controller/accueil.php';
}
 
//On ferme la connexion à MySQL
mysql_close();
?>