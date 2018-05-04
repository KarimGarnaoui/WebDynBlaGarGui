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
			      		padding-right: 10px;
			      		padding-left: 10px;
			      		padding-bottom: 5px;
			      		background-color: rgb(200, 200, 200) ;
			      		border-radius: 5px;
			      		font-weight:bold;
			      		width: 20%;
			      		float : right;
			      	}
			      	[id*="monreseau"] 
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
			      	[id*="contact"] 
			      	{ 
			      		padding-right: 20px;
			      		padding-left: 20px;
			      		padding-bottom: 5px;
			      		background-color: rgb(230, 230, 230) ;
			      		border-radius: 10px;
			      		color : black;
			      		width: 40%;
			      		float: left ;
			      		margin-left: 20px;
			      		margin-bottom: 20px;

			      	}
			      	h4 
			      	{
					    font-weight: bold;
					}
					[id*="pborder"]
					{
						width: 70% ; 
						float: left ; 
					}
					[id*="enregistrer"]
					{
						float: right;
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
					  	<li><a href="MesAmis.php">Mes Amis <span class="glyphicon glyphicon-user"></span></a></li>
					  	<li class="active"><a href="Notifications.php">Notifications <span class="glyphicon glyphicon-exclamation-sign"></span> </a></li>
					  	<li><a href="Emplois.php">Emplois <span class="glyphicon glyphicon-briefcase"></span></a></li>
					  	<li><a href="Photos.php">Photos <span class="glyphicon glyphicon-picture"></span></a></li>
					  	<li><a href="Messagerie.php">Messagerie <span class="glyphicon glyphicon-comment"></span></a></li>
				     </ul>
				     <form action="Traitement_Recherche" method="post" class="navbar-form navbar-right">
						        <input type="search" class="input-sm form-control" placeholder="Recherche">
						        <button type="submit" name="recherche" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span></button>
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

			    <div id="monreseau" class="container-fluid">
					<h3>Notifications</h3><br><br><br>
					<?php 

						$Connexion = new mysqli( 'localhost' , "root" , "" , "ecemplois" ) ;
						if ($Connexion->connect_error)echo "Erreur lors de la connexion à la base de donnée" ;
						if(isset($_COOKIE['numero_utilisateur'])) $numero_utilisateur = $_COOKIE['numero_utilisateur'];

						

						$sql = "SELECT * FROM notification WHERE numero_recepteur = $numero_utilisateur";
				        $selection = mysqli_query($Connexion,$sql);

				        while($donnees =  mysqli_fetch_assoc($selection))
				        {
				        		$numero_emetteur = $donnees['numero_emetteur'] ;
				        		$sql_emetteur = "SELECT * FROM utilisateur WHERE numero_utilisateur = '$numero_emetteur'";
				        		$selection_emetteur = mysqli_query($Connexion,$sql_emetteur) ; 
				        		$donnees_emetteur =  mysqli_fetch_assoc($selection_emetteur) ;
				        		$nom_emetteur = $donnees_emetteur['nom'];
				        		$prenom_emetteur = $donnees_emetteur['prenom'];
				        		$numero_emetteur = $donnees_emetteur['numero_utilisateur'];
				        	if($donnees['description'] == 'Demande d amis'){
				        		echo "<form action='Traitement_Ajout_Amis.php' method='post'>";
					        	echo "<div id = 'contact' class='container-fluid'>" ;
					        	echo "<h4>".$donnees['description']."<br></h4>" ; 
					        	echo "<p>".$prenom_emetteur." ".$nom_emetteur."</p>" ;
					        	echo "<input type='hidden' value='".$numero_emetteur."' name='numero_emetteur' "; 
					        	echo "<p><input type='radio' id = 'Accepter' name='choix' value='Accepter'><label for='Accepter'>&nbsp Accepter</label></p>" ; 
					        	echo "<p><input type='radio' id = 'Refuser' name='choix' value='Refuser'><label for='Refuser'>&nbsp Refuser</label></p>" ; 
					        	echo "<p id='enregistrer'><input type='submit' value='Confirmer'></p>" ;
					        	echo "</div>" ; 
					        	echo "</form>";
				        	}
				        	if($donnees['description'] == 'Demande de contact pro'){
				        		echo "<form action='Traitement_Ajout_Contact_Pro.php' method='post'>";
					        	echo "<div id = 'contact' class='container-fluid'>" ;
					        	echo "<h4>".$donnees['description']."<br></h4>" ; 
					        	echo "<p>".$prenom_emetteur." ".$nom_emetteur."</p>" ;
					        	echo "<input type='hidden' value='".$numero_emetteur."' name='numero_emetteur' "; 
					        	echo "<p><input type='radio' id = 'Accepter' name='choix' value='Accepter'><label for='Accepter'>&nbsp Accepter</label></p>" ; 
					        	echo "<p><input type='radio' id = 'Refuser' name='choix' value='Refuser'><label for='Refuser'>&nbsp Refuser</label></p>" ; 
					        	echo "<p id='enregistrer'><input type='submit' value='Confirmer'></p>" ;
					        	echo "</div>" ; 
					        	echo "</form>";
				        	}
				        		
				        	
						}

					?>	
			    </div>


			</div> 

		</body>
</html> 