<?php
	class CommandeDAO{
		
		protected $pdo;
		
		public function CommandeDAO(){
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
		
		public function getCommande($NumeroClient){
			$query = "SELECT * FROM commande WHERE NumeroClient=" . $NumeroClient . ";";
			$prep = $this->pdo->prepare($query);
			$prep->execute();
			$commande = $prep->fetchAll(PDO::FETCH_OBJ);
			return $commande;
		}
		
		public function getAllCommandes(){
			$query = "SELECT * FROM commande;";
			$prep = $this->pdo->prepare($query);
			$prep->execute();
			return $prep->fetchAll(PDO::FETCH_OBJ);
		}
		
		public function createCommande(CommandeVO $commande){
			$query = "INSERT INTO commande (NumeroClient, DescriptionVin, Date) "
				. "VALUES ('" . $commande->getNumeroClient()
				. "','" . $commande->getDescriptionVin()
				. "','" . $commande->getDateCommande() . "');";
			
			$prep = $this->pdo->prepare($query);
			$prep->execute();
		}
	}
?>