<?php

class Membre extends User {
    
	private $pseudo;
	private $dateNaissance;
	
    const QUALITE = "FO";
    
	
    function __construct($email="",$mdp="",$pseudo="",$dateNaissance="")
	{  
		$this->pseudo = $pseudo;
		$this->dateNaissance = $dateNaissance;
		parent::__construct($email, $mdp);
    }

	
    public function inscription()
	{
		$date = $_POST['dateNaissance'];
		$date = str_replace ( "/" , "-" , $date );
		$dateNaissance = date("Y-m-d", strtotime($date)); 
		
        $connexion = ConnexionBD::getInstance();
		$cnx=$connexion->getLcn();
		
		$sql = "INSERT INTO membre (email,mdp,pseudo,dateNaissance,sexe,qualite,etat) VALUES (?,?,?,?,?,?,?)";
		$req = $cnx->prepare($sql);
		$param = array($_POST['email'],$_POST['mdp'],$_POST['pseudo'],$dateNaissance,$_POST['sexe'],self::QUALITE,'O');
		$req->execute($param);
    }
    
    public function modifProfil()
	{
        $connexion = ConnexionBD::getInstance();
		$cnx=$connexion->getLcn();
		
		$sql = "UPDATE profil SET lieu=?, job=?, poids=?, taille=?, origine=?, cheveux=?, yeux=?, photo=? WHERE idMembre='"$_SESSION['id']"' ";
		$req = $cnx->prepare($sql);
		$param = array($_POST['lieu'],$_POST['job'],$_POST['poids'],$_POST['taille'],$_POST['origine'],$_POST['cheveux'],$_POST['yeux'],$_POST['photo']);
		$req->execute($param);
    }
	
	public function demandeMdp()
	{
		$connexion = ConnexionBD::getInstance();
		
		$sql = "SELECT email FROM membre WHERE email = '".$email."' ";
		$req = $connexion->prepare($sql);
		$req->execute();
		 
		if($req->rowCount() != 1)//si le nombre de lignes retourne par la requete != 1
		{
			echo "'mail inconnu'. ' ' . '<a href=mdp_oublie.php>Cliquez ici pour recommencer</a>'";
		}
		else
		{
			//=====Déclaration des messages au format texte et au format HTML.
			$message_txt = "http://127.0.0.1:8888/";
			$message_html = "<html><head></head><body><b>Salut à tous</b>, <a href=http://127.0.0.1:8888/modif_mdp.php>Cliquez ici pour modifier votre mot de passe.</a></body></html>";
			//==========
			 
			//=====Création de la boundary
			$boundary = "-----=".md5(rand());
			//==========
			 
			//=====Définition du sujet.
			$sujet = "Mot de passe perdu !";
			//=========
			 
			//=====Création du header de l'e-mail.
			$header = "From: \"Admin\"<j.florian@hotmail.fr>".$passage_ligne;
			$header.= "Reply-to: \"Admin\" <j.florian@hotmail.fr>".$passage_ligne;
			$header.= "MIME-Version: 1.0".$passage_ligne;
			$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
			//==========
			 
			//=====Création du message.
			$message = $passage_ligne."--".$boundary.$passage_ligne;
			//=====Ajout du message au format texte.
			$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_txt.$passage_ligne;
			//==========
			$message.= $passage_ligne."--".$boundary.$passage_ligne;
			//=====Ajout du message au format HTML
			$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_html.$passage_ligne;
			//==========
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			//==========
		 
		//=====Envoi de l'e-mail.
		if(!mail($email,$sujet,$message,$header))
		echo 'probleme lors de l\'envoi du mail' . ' ' . '<a href=mdp_oublie.php>Cliquez ici</a>';
		else
		echo 'mail envoye' . ' ' . '<a href=index.php>Cliquez ici pour revenir à l accueil</a>';
		}
	}
	
	public function saisieNewMdp()
	{
		$connexion = ConnexionBD::getInstance();
		
		$sql = "SELECT mdp FROM membre WHERE email='".$email."'";
		$req = $connexion->prepare($sql);
		$req->execute();
		$data =$req->fetch()
	  
		$sql2 = "UPDATE membre SET mdp = '".md5($mdp)."' WHERE mdp = '".$data ['mdp']."' ";
		$req2 = $connexion->prepare($sql2);
		$req2->execute();
	}
	
	public function bloqAmis()
	{
		$connexion = ConnexionBD::getInstance();
		
		$sql = "UPDATE amis SET etat = 'B' WHERE idMembreE = '".$_SESSION['id']."' AND idMembreR = '".$_GET['id']."' ";
		$req = $connexion->prepare($sql);
		$req->execute();
	}
	
	public function signalerAbus()
	{
		//=====Déclaration des messages au format texte et au format HTML.
			$message_txt = "http://127.0.0.1:8888/";
			$message_html = "<html><head></head><body><b>Salut à tous</b>, <a href=http://127.0.0.1:8888/bloquerCompte.php>Bloquer le compte de l'utilisateur en question.</a></body></html>";
			//==========
			 
			//=====Création de la boundary
			$boundary = "-----=".md5(rand());
			//==========
			 
			//=====Définition du sujet.
			$sujet = "Signaler un abus !";
			//=========
			 
			//=====Création du header de l'e-mail.
			$header = "From: \"Admin\"<j.florian@hotmail.fr>".$passage_ligne;
			$header.= "Reply-to: \"Admin\" <j.florian@hotmail.fr>".$passage_ligne;
			$header.= "MIME-Version: 1.0".$passage_ligne;
			$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
			//==========
			 
			//=====Création du message.
			$message = $passage_ligne."--".$boundary.$passage_ligne;
			//=====Ajout du message au format texte.
			$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_txt.$passage_ligne;
			//==========
			$message.= $passage_ligne."--".$boundary.$passage_ligne;
			//=====Ajout du message au format HTML
			$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_html.$passage_ligne;
			//==========
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			//==========
		 
		//=====Envoi de l'e-mail.
		if(!mail($email,$sujet,$message,$header))
		echo 'probleme lors de l\'envoi du mail' . ' ' . '<a href=signalerAbus.php>Cliquez ici</a>';
		else
		echo 'mail envoye' . ' ' . '<a href=index.php>Cliquez ici pour revenir à l accueil</a>';
		
	}*/
	
	public function getPseudo()
	{
		return $this->pseudo;
	}
	
	public function setPseudo()
	{
		$this->pseudo = $pseudo;
	}
	
	public function getDateNaissance()
	{
		return $this->dateNaissance;
	}
	
	public function setDateNaissance()
	{
		$this->dateNaissance = $dateNaissance;
	}
    
}

?>
