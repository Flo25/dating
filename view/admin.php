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
Bienvenue <?php echo htmlentities(trim($_SESSION['pseudo'])).' '.'"ADMIN"'; ?>!<br />

	<a href="index.php?page=bloqCompte">Bloquer un compte</a> <br />
	<a href="index.php?page=suppr">Supprimer un compte</a> <br />
	<a href="deconnexion.php">Deconnexion</a> <br />
</body>

</html>