<!DOCTYPE html>
	<html lang="en">
		<head>
			 <title>ECEmplois</title>
			 <meta charset="utf-8">
			 <meta name="viewport" content="width=device-width, initial-scale=1">
			 <link rel="stylesheet"
			 href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			 <style type="text/css">
			      [id*="principal"] 
			      	{ 
			      		
			      		background-color: rgb(30, 30, 30) ;
			      		border-radius: 5px;
			      		font-weight:bold;
			      		height: 700px ;
			      		color: white ;
			      		padding: 20px ; 
			      	}
			      	[id*="photoProfil"] 
			      	{ 
			      		margin-top: 20px ;  
			      		margin-bottom: : 20px ;
			      		margin-left: : 10px ;
			      		margin-right: : 10px ;
			      		border : 1px white solid;
			      		border-radius: 5px ; 
			      		width: 400px; 
			      		height: 500px ; 
			      		padding: 20px ; 
			      		position: relative;
			      		float: left;
			      	}
			      	
			      	[id*="infosProfil"] 
			      	{ 
			      		margin-top: 20px ;  
			      		margin-bottom: : 20px ;
			      		margin-left: : 10px ;
			      		margin-right: : 10px ; 
			      		border : 1px white solid;
			      		border-radius: 5px ; 
			      		width: 610px; 
			      		height: 500px ; 
			      		padding: 20px ;  
			      		position: absolute;
			      		
			      	}
			      	[id*="enregistrer"] 
			      	{ 
			      		position:absolute; 
			      		bottom:15px;
			      		right: 15px ; 
			      		color: black ; 

			      	}
			      	[id*="gauche"] 
			      	{ 
			      		float: left;

			      		width: 440px; 
			      		height: 540px ;  

			      	}
			      	[id*="droite"] 
			      	{  
			      		float: right ; 

			      		width: 650px; 
			      		height: 540px ; 
			      	}
			      	[id*="champ"]{
			      		color: black ; 
			      		margin : 10px;
			      	}
			      	
					
    		</style>
			 
		</head>
		<body>
			<div class="container">
				
				<!-- Onglets + barre de recherche  -->
				<div class="navbar navbar-inverse">
					<div class="container-fluid">
 					 <ul class="nav navbar-nav">
					  	<li><a href="Accueil.php">Accueil <span class="glyphicon glyphicon-home"></span></a></li>
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

				<div id="principal" class = "container-fluid">

					<p>Profil</p> 

					<div id="gauche" class="container-fluid"><div id="photoProfil" class="container-fluid">
						<form action="Traitement_Photo_Profil.php" method="post" enctype="multipart/form-data">
							<p>Photo de profil</p>
							<?php 
								$connexion= new mysqli('localhost','root','','ecemplois') ;
								if($connexion->connect_error) echo "Erreur la connexion est refusée. " ;
								if(isset($_COOKIE['numero_utilisateur'])) $numero_utilisateur = $_COOKIE['numero_utilisateur'];

								$sql = "SELECT * FROM accessibilite where (numero_utilisateur='$numero_utilisateur' AND pdp = '1')" ;
								$selection = mysqli_query($connexion,$sql);
								$donnees=mysqli_fetch_assoc($selection); 
								setcookie('pdp',$donnees['lien'], 0);

								echo "<img src=".$donnees['lien']." width='300' height='300'> ";
							?>
							<br><br>
							<span class="glyphicon glyphicon-paperclip"></span> Changer de photo de profil  
	                        <input type="file" id ="dive" name="image">
	                        <input id="enregistrer" class="btn btn-primary btn-sm" type="submit" value="Enregistrer">
	                    </form>
					</div></div>
					<div id="droite" class="container-fluid"><div id="infosProfil" class="container-fluid">
						<form action="Traitement_Infos_Profil.php" method="post">
							<p>Informations personnelles</p>
							<?php

							if(isset($_COOKIE['prenom'])) $prenom = $_COOKIE['prenom'];
							if(isset($_COOKIE['nom'])) $nom = $_COOKIE['nom'];
							if(isset($_COOKIE['email'])) $email = $_COOKIE['email'];
							if(isset($_COOKIE['tel'])) $tel = $_COOKIE['tel'];
							if(isset($_COOKIE['diplome'])) $diplome = $_COOKIE['diplome'];


								echo"<table>
									<tr>
										<td>Prénom :</td>
										<td><input id='champ' type='text' name='prenom' value=".$prenom."></td>
									</tr>
									<tr>
										<td>Nom :</td>
										<td><input id='champ' type='text' name='nom' value=".$nom."></td>
									</tr>
									<tr>
										<td>Email :</td>
										<td><input id='champ' type='text' name='email' value=".$email."></td>
									</tr>
									<tr>
										<td>Téléphone :</td>
										<td><input id='champ' type='text' name='tel' value=".$tel."></td>
									</tr>
									<tr>
										<td>Diplome :</td>
										<td><input id='champ' type='text' name='diplome' value=".$diplome."></td>
									</tr>
									<tr>
										<td>Statut :</td>
										<td><p id='champ' name='statut'>Admin</p></td>
									</tr>
								</table>" ;
							?>
	                        <input id='enregistrer' class='btn btn-primary btn-sm' type='submit' value='Enregistrer'>
                        </form>
                        
					</div></div>
					


				</div>

			</div>

		</body>
</html> 