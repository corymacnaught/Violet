<?php
include 'C:\xampp\htdocs\Devoir1\DataAccessLayer\Client\ClientVO.php';
include 'C:\xampp\htdocs\Devoir1\DataAccessLayer\Client\ClientDAO.php';
include 'C:\xampp\htdocs\Devoir1\DataAccessLayer\Commande\CommandeVO.php';
include 'C:\xampp\htdocs\Devoir1\DataAccessLayer\Commande\CommandeDAO.php';

$clientdao = new ClientDAO();

if(isset($_POST['identification'])){
	$clientvo = $clientdao->getClient($_POST['identification']);
	
	$valide = 1;
	
	if ($clientvo != null){
		
		$commandevo = new CommandeVO();
		
		if(isset($_POST['identification'])) $commandevo->setNumeroClient($_POST['identification']);
		else $commandevo->setNumeroClient("");
			
		if(isset($_POST['vin'])) $commandevo->setDescriptionVin($_POST['vin']);
		else $commandevo->setDescriptionVin("");
		
		$commandevo->setDateCommande(date("Y/m/d"));
		
		$commandedao = new CommandeDAO();
		$commandedao->createCommande($commandevo);
	}
	else{
		$valide = 2;
	}
}
?>

<html>
	<meta charset="utf-8"/>
	<head>
		<title>Confirmation de la Commande</title>
		<link rel="stylesheet" href="/Devoir1/Styles/styleCommandeConfirmation7.css"/>
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
					<script type="text/javascript">
						var valide = <?php echo $valide ?>;
						
						if (valide == 1){
							document.write("<h4><br><br>Merci d'avoir choisi Violet pour faire vos achats!<br>Votre commande a bien été processé et est maintenant en cours de traitement.<br>La commande devrait être livré à votre porte en deux jours.</h4>");
							document.write("<h4><br><br>LA COMMANDE<br>Description du vin: <?php if($clientvo != null) echo $commandevo->getDescriptionVin();?><br>Date de la commande: <?php if($clientvo != null) echo $commandevo->getDateCommande();?><br>Status: En attente</h4>");
							document.write("<h4><br><br>Pour retourner et commander une autre type de vin, <a href=\"/Devoir1/Telechargements/commander.html\">veuillez cliquer ici</a></h4>");
							document.write("<h4>Si vous aillez des questions, appelez le numéro (123) 456-7890 pour le support de 8h à 20h EST </h4>");
						}
						else{
							document.write("<h4><br><br>Merci d'avoir choisi Violet pour faire vos achats!<br>Malheureusement il y avait un problème à processé votre commande parce qu'il n'existe pas de compte lié au numéro d'identification rentré.</h4>");
							document.write("<h4><br><br>Si vous n'ayez pas un compte, <a href=\"/Devoir1/Telechargements/nouveauClient.html\">cliquez ici pour en créé un</a></h4>");
							document.write("<h4><br><br>Si vous croyez avoir rentré la mauvaise numéro, <a href=\"/Devoir1/Telechargements/commander.html\">veuillez cliquer ici pour commander à nouveau</a></h4>");
							document.write("<h4>Si vous aillez des questions, appelez le numéro (123) 456-7890 pour le support de 8h à 20h EST </h4>");
						}
					</script>
				</div>
				<div class="logo">
					<img id="imgGrapes" src="/Devoir1/Images/handDrawnGrape.png" alt="Grapes">
					<h5 id="violet">Violet</h5>
				</div>
			</div>
		</div>
	</body>
</html>