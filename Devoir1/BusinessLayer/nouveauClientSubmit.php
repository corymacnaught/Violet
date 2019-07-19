<?php
include 'C:\xampp\htdocs\Devoir1\DataAccessLayer\Client\ClientVO.php';
include 'C:\xampp\htdocs\Devoir1\DataAccessLayer\Client\ClientDAO.php';

$clientvo = new ClientVO();

if(isset($_POST['prenom'])) $clientvo->setPrenom($_POST['prenom']);
else $clientvo->setPrenom("");

if(isset($_POST['nom'])) $clientvo->setNom($_POST['nom']);
else $clientvo->setNom("");

if(isset($_POST['dateDeNaissance'])) $clientvo->setDateDeNaissance($_POST['dateDeNaissance']);
else $clientvo->setDateDeNaissance("");

if(isset($_POST['adresse'])) $clientvo->setAdresse($_POST['adresse']);
else $clientvo->setAdresse("");

if(isset($_POST['telephone'])) $clientvo->setTelephone($_POST['telephone']);
else $clientvo->setTelephone("");

$clientdao = new ClientDAO();
$clientdao->createClient($clientvo);
?>

<html>
	<meta charset="utf-8"/>
	<head>
		<title>Nouveau Client Confirmation</title>
		<link rel="stylesheet" href="/Devoir1/Styles/styleNouveauClientSubmit7.css"/>
	</head>
	<body>
		<header>
			<div class="bodyHeader">
				<a href="/Devoir1">
					<img id="imgGrapes" src="/Devoir1/Images/handDrawnGrape.png" alt="Logo">
				</a>
				<h1 id="violet">Violet</h1>
				<a href="/Devoir1/Telechargements/commander.html">
					<h2 id="commander">Commander</h2>
				</a>
				<a href="/Devoir1/Telechargements/mesCommandes.html">
					<h2 id="commandes">Mes Commandes</h2>
				</a>
			</div>
		</header>
		<div class="bodyBody">
			<header id="bodyBodyHeader">
			</header>
			<div class="commandeForm">
				<header id="commandeFormHeader">
					<h3>Confirmation</h3>
				</header>
				<div>
					<p>
						<h4>Merci d'avoir créé un compte avec nous.</h4> <br> <br>
						<h4>Votre numéro d'identification (important) est: 
						<?php
							$id = $clientdao->getAutoIncrementValue();
							echo $id->id;
						?>
						</h4> <br> <br>
						<h4> <a id="ici" href="/Devoir1/Telechargements/commander.html">Cliquez ici pour commander.</a></h4>
					</p>
				</div>
				<div class="logo">
					<img id="imgGrapes" src="/Devoir1/Images/handDrawnGrape.png" alt="Grapes">
					<h5 id="violet">Violet</h4>
				</div>
			</div>
		</div>
	</body>
</html>