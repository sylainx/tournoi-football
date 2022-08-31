<?php
    
    class ConnexionBD
    {

		// online
        // private $host    = 'fdb32.awardspace.net';  // nom de l'host
        // private $nomBase    = '4161789_tournoisoccer';    // nom de la base de donnée
        // private $user    = '4161789_tournoisoccer';       // utilisateur server
        // private $pwd    = "hiR0q/(85.WYjK3[";       // mot de passe server

		// local
        private $host    = 'localhost';  // nom de l'host
        private $nomBase    = 'tournoisoccer';    // nom de la base de donnée
        private $user    = 'root';       // utilisateur
        private $pwd    = '';       // mot de passe (il faudra peut-être mettre '' sous Windows) 
		
        private $connexion;
		
		function __construct($host = null, $nomBase = null, $user = null, $pwd = null){
			if($host != null){
		        $this->host = $host;
		        $this->nomBase = $nomBase;
		        $this->user = $user;          
		        $this->pwd = $pwd;
			}
			try{
		    	$this->connexion = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->nomBase,
					$this->user, $this->pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8MB4', 
					PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
				);
				$this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				}catch (PDOException $e){
		        echo 'Erreur : Impossible de se connecter  à la base !';
				die();
			}
		}
		
		public function connexion(){
			return $this->connexion;
		}
  	}
  	
  	$base = new connexionBD;
  	
  	$bdd = $base->connexion();

?>
