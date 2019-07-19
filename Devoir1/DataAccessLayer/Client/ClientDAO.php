<?php
	class ClientDAO{
		
		protected $pdo;
		
		public function ClientDAO(){
			try {
				$strConnection = 'mysql:host=localhost;dbname=clientvin';
				$arrExtraParam = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
				PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8");
				$this->pdo = new PDO($strConnection, 'root', '', $arrExtraParam);
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
				catch(PDOException $e) {
					$msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
						die($msg);
			}	
		}
		
		public function getAutoIncrementValue(){
			$query = "SELECT max(NumeroClient) id FROM client;";
			$prep = $this->pdo->prepare($query);
			$prep->execute();
			$autoIncrement = $prep->fetch(PDO::FETCH_OBJ);
			return $autoIncrement;
		}
		
		public function getClient($NumeroClient){
			$query = "SELECT * FROM client WHERE NumeroClient=" . $NumeroClient . ";";
			$prep = $this->pdo->prepare($query);
			$prep->execute();
			$client = $prep->fetch(PDO::FETCH_OBJ);
			return $client;
		}
		
		public function getAllClients(){
			$query = "SELECT * FROM client;";
			$prep = $this->pdo->prepare($query);
			$prep->execute();
			return $prep->fetchAll(PDO::FETCH_OBJ);
		}
		
		public function createClient(ClientVO $client){
			$query = "INSERT INTO client (Prenom, Nom, DateDeNaissance, Adresse, Telephone) "
				. "VALUES ('" . $client->getPrenom()
				. "','" . $client->getNom()
				. "','" . $client->getDateDeNaissance()
				. "','" . $client->getAdresse()
				. "','" . $client->getTelephone() . "');";
			
			$prep = $this->pdo->prepare($query);
			$prep->execute();
		}
	}
?>