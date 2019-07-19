<!DOCTYPE html>
<html>
	<meta charset="utf-8"/>
	<head>
		<title>Mes Commandes</title>
		<link rel="stylesheet" href="/Devoir1/Styles/styleMesCommande7.css"/>
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
			<div class="bodyBodyHeader"></div>
				<div class="commandeSheet">
					<header class="commandeSheetHeader">
						<h3 id="commandeSheetHeaderDescription">Description du vin</h3>
						<h3 id="commandeSheetHeaderDate">Date</h3>
						<h3 id="commandeSheetHeaderStatut">Statut</h3>
					</header>
					
					<?php
						include 'C:\xampp\htdocs\Devoir1\DataAccessLayer\Commande\CommandeVO.php';
						include 'C:\xampp\htdocs\Devoir1\DataAccessLayer\Commande\CommandeDAO.php';
						
						$commandedao=new CommandeDAO();
						$commandevoArray=$commandedao->getCommande($_POST['identification']);
					?>
					<script>
						var commandevoArray = <?php echo json_encode($commandevoArray); ?>;
						//var commandevoArray
						if(commandevoArray.length > 0){
							for(var i=0; i<commandevoArray.length; i++){
								if (i%2==0) document.write("<div style=\"background-color: #ffffff;\" class=\"commandeSheetRows\">");
								else 		document.write("<div style=\"background-color: #fba4a2;\" class=\"commandeSheetRows\">");
									document.write("<h4 id=\"commandeSheetRowsDescription\">" + commandevoArray[i].DescriptionVin + "</h4>");
									document.write("<h4 id=\"commandeSheetRowsDate\">" + commandevoArray[i].Date + "</h4>");
									document.write("<h4 id=\"commandeSheetRowsStatut\">en attente</h4>");
								document.write("</div>");
							}
						}
						else{
							document.write("<div style=\"background-color: #ffffff;\" class=\"commandeSheetRows\">");
							document.write("<h4 id=\"commandeSheetRowsDescription\" style=\"width: 700px;\">Aucune commandes<br>Si vous voulez commander, <a href=\"/Devoir1/Telechargements/commander.html\">Cliquez ici</a></h4>");
							document.write("</div>");
						}
					</script>
				</div>
		</div>
	</body>
</html>