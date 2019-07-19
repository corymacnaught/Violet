<?php
	class CommandeVO{
		private $numeroClient;
		private $descriptionVin;
		private $dateCommande;
		
		public function CommandeVO(){
		}
		
		public function getNumeroClient(){
			return $this->numeroClient;
		}
		
		public function getDescriptionVin(){
			return $this->descriptionVin;
		}
		
		public function getDateCommande(){
			return $this->dateCommande;
		}
		
		public function setNumeroClient($numeroClient){
			$this->numeroClient = $numeroClient;
		}
		
		public function setDescriptionVin($descriptionVin){
			$this->descriptionVin = $descriptionVin;
		}
		
		public function setDateCommande($dateCommande){
			$this->dateCommande = $dateCommande;
		}
	}
?>