<?php

class ConnexionBD {
	
	private static $instance;
    private $pilote = "mysql"; //pilote
    private $db_srv = "127.0.0.1"; //serveur
    private $db_user = "root"; //utilisateur
    private $db_pwd = "root"; //mot de passe
    private $db_name = "dating"; // nom de la base
    private $port="3306";//port de cnx
	private $lcn;


    private function __construct() 
	{
        //---on essaye d'executer des instructions qui pourraient generer des erreurs!
        try {
            //----on se connecte en utilisant les parametres
            $this->lcn = new PDO("$this->pilote:host=$this->db_srv;dbname=$this->db_name;$this->port", $this->db_user, $this->db_pwd);
            //---on modifie un des attribut par default pour gerer les erreur sur tt le script pas seulement sur la connection
            $this->lcn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->lcn->exec("SET NAMES 'UTF8'");
        }
        //on attrape les erreur a ce niveau
        catch (PDOException $e) {
            $lcn = "Echec de l'exécution : " . $e->getMessage();
        }
    }


    public function seDeconnecter($lcn) 
	{
        $lcn = null;
    }
	
	public static function getInstance()
		{
			if(!isset(self::$instance))
			{
				//$class = _CLASS_ ;
				self::$instance = new ConnexionBD();
				echo "<br />La classe est instanciée";
			}
			else
			{
				echo "<br />La classe est déjà instanciée";
			}
			return self::$instance;
		}

    public function getPilote() {
        return $this->pilote;
    }

    public function setPilote($pilote) {
        $this->pilote = $pilote;
    }

    public function getDb_srv() {
        return $this->db_srv;
    }

    public function setDb_srv($db_srv) {
        $this->db_srv = $db_srv;
    }

    public function getDb_user() {
        return $this->db_user;
    }

    public function setDb_user($db_user) {
        $this->db_user = $db_user;
    }

    public function getDb_pwd() {
        return $this->db_pwd;
    }

    public function setDb_pwd($db_pwd) {
        $this->db_pwd = $db_pwd;
    }

    public function getDb_name() {
        return $this->db_name;
    }

    public function setDb_name($db_name) {
        $this->db_name = $db_name;
    }
	
	public function getLcn() {
        return $this->lcn;
    }

    public function setLcn($lcn) {
        $this->lcn = $lcn;
    }

}

?>
