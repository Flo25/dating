<?php
session_start();
if (empty($_SESSION['pseudo'])) 
{
	header ('Location: /dating/index.php');
	exit();
}
?>

<html>
<head>
<title>Espace membre</title>
</head>

<body>
Bienvenue <?php echo htmlentities(trim($_SESSION['pseudo'])); ?>!<br />

	<a href="index.php?page=modif">Modifier profil</a> <br />
	<a href="index.php?page=liste">Liste d'amis</a> <br />
	<a href="deconnexion.php">Deconnexion</a> <br />
</body>

</html>