<!DOCTYPE html>
	<html lang="en">
		<head>
			 <title>Accueil</title>
			 <meta charset="utf-8">
			 <meta name="viewport" content="width=device-width, initial-scale=1">
			 <link rel="stylesheet"
			 href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			 <style type="text/css">
			      [id*="principal"] 
			      	{ 
			      		padding-right: 10px;
			      		padding-left: 10px;
			      		padding-bottom: 5px;
			      		background-color: rgb(200, 200, 200) ;
			      		border-radius: 5px;
			      		font-weight:bold;
			      		width: 20%;
			      		float : right;
			      	}
			      	[id*="evenement"] 
			      	{ 
			      		padding-right: 20px;
			      		padding-left: 20px;
			      		padding-bottom: 5px;
			      		background-color: rgb(30, 30, 30) ;
			      		color: white;
			      		border-radius: 5px;
			      		font-weight:bold;
			      		width: 78%;
			      		height: 700px ; 
			      		float : left;

			      	}
			      	[id*="event1"] 
			      	{ 
			      		padding-right: 20px;
			      		padding-left: 20px;
			      		padding-bottom: 5px;
			      		background-color: rgb(230, 230, 230) ;
			      		border-radius: 10px;
			      		color : black;
			      		width: 80%;
			      		float : center;

			      	}
			      	h4 
			      	{
					    font-weight: bold;
					}
					[id*="pborder"]
					{
						border: 1px black solid;
						border-radius: 5px ; 
						width: 50% ; 
						float: left ; 
					}
					[id*="pikevent"]
					{
						border: 1px black solid;
						border-radius: 5px ; 
						width: 150px; 
						height: 150px;
					}
					
    		</style>
			 
		</head>
		<body>
			<div class="container">
				
				<!-- Onglets + barre de recherche  -->
				<div class="navbar navbar-inverse">
					<div class="container-fluid">
 					 <ul class="nav navbar-nav">
					  	<li class="active"><a href="Accueil.html">Accueil <span class="glyphicon glyphicon-home"></span></a></li>
					  	<li><a href="MonReseau.php">Mon Réseau <span class="glyphicon glyphicon-globe"></span></a></li>
					  	<li><a href="Notifications.html">Notifications <span class="glyphicon glyphicon-exclamation-sign"></span> </a></li>
					  	<li><a href="Emplois.html">Emplois <span class="glyphicon glyphicon-briefcase"></span></a></li>
					  	<li><a href="Photos.php">Photos <span class="glyphicon glyphicon-picture"></span></a></li>
					  	<li><a href="Messagerie.php">Messagerie <span class="glyphicon glyphicon-comment"></span></a></li>
				     </ul>
				     <form class="navbar-form navbar-right">
						        <input type="text" class="input-sm form-control" placeholder="Recherche">
						        <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span></button>
				     </form>
					</div>
				</div>

				<!-- Affichage informations profile  -->
				<div id="principal" class="container-fluid">
					<table id="profil" align="right">
						<tr><td colspan="2"><center><p>Utilisateur connecté</p></center></td></tr>
					    <tr>
					    		<?php 
					    			$prenom = "prenom" ; 
					    			$nom = "nom" ; 
					    			$pdp = "" ; 
					    			if(isset($_COOKIE['prenom'])) $prenom = $_COOKIE['prenom'];
									if(isset($_COOKIE['nom'])) $nom = $_COOKIE['nom'];
									if(isset($_COOKIE['pdp'])) $pdp = $_COOKIE['pdp'];

									echo "<td><img src='".$pdp."' class='img-circle' alt='Profil' width='80' height='80'> &nbsp&nbsp</td><br>" ;
									echo "<td> $prenom <br> $nom <br>" ;
					    		?> 
					    		<a href="Profil.php"><span class="glyphicon glyphicon-user"></span> Profil <br>
					    		<a href="Connexion.html"><span class="glyphicon glyphicon-off"></span> Deconnexion <br> <br>
					    	</td>
					    </tr>
					    
					</table>
			    </div>

			    
			    <!-- Affichage des evênements  -->

			    <div id="evenement" class="container-fluid">
					<h3>Evènements</h3><br><br><br>
						<div id = "event1" class="container-fluid">
							<h4>Fiesta Bamboula chez JPS</h4>
							<p id="pborder">
								Description <br>
								Soirée chez Jean-Pierre Segado au lac de Chevreuil WAZAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAA<br><br><br>
							</p>
							<p align="right"><img id="pikevent" src="chevreuil.jpg" width="148" height="148" ></p>
							<p>Publication de : Franklin</p>
							<footer>
								<p align="right"><a href="Aimer.php"><span class="glyphicon glyphicon-thumbs-up"></span> J'aime &nbsp&nbsp&nbsp&nbsp<a href="Partager.php"><span class="glyphicon glyphicon-share"></span> Partager</p>

							</footer>

						</div>
			    </div>


			</div> 

		</body>
</html> 