<?php
session_start();
if (!isset($_SESSION['pseudo'])) {
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
</body>

</html>