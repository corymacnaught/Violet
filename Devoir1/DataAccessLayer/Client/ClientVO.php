<?php
	class ClientVO{
		private $numeroClient;
		private $prenom;
		private $nom;
		private $dateDeNaissance;
		private $adresse;
		private $telephone;
		
		public function ClientVO(){
		}
		
		public function getNumeroClient(){
			return $this->numeroClient;
		}
		
		public function getPrenom(){
			return $this->prenom;
		}
		
		public function getNom(){
			return $this->nom;
		}
		
		public function getDateDeNaissance(){
			return $this->dateDeNaissance;
		}
		
		public function getAdresse(){
			return $this->adresse;
		}
		
		public function getTelephone(){
			return $this->telephone;
		}
		
		public function setPrenom($prenom){
			$this->prenom = $prenom;
		}
		
		public function setNom($nom){
			$this->nom = $nom;
		}
		
		public function setDateDeNaissance($dateDeNaissance){
			$this->dateDeNaissance = $dateDeNaissance;
		}
		
		public function setAdresse($adresse){
			$this->adresse = $adresse;
		}
		
		public function setTelephone($telephone){
			$this->telephone = $telephone;
		}
	}
?>