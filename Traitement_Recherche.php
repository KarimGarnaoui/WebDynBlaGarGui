<!DOCTYPE html>
	<html lang="en">
		<head>
			 <title>Mon Réseau</title>
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
			      		width: 45%;
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
						width: 77% ; 
						height: 100px;
						float: left ; 
					}
					[id*="photo"]
					{
						width: 22% ; 
						margin: 0;
						float: right ; 
					}
					[id*="pikevent"]
					{
						border: 1px black solid;
						border-radius: 5px ; 
						width: 75px; 
						height: 75px;
					}
					[id*="notif"]
					{
						font-size: .8em ;
						margin: 0px ; 
						padding: 0px ; 
						background-color: transparent;
						color: blue ; 
						font-weight: bold;
						border: none ; 
					}
					[id*="notif2"]
					{
						font-size: .8em ;
						margin: 0px ; 
						padding: 0px ; 
						background-color: transparent;
						color: red ; 
						font-weight: bold;
						border: none ; 
					}
					p{
						padding: 0px;
						margin: 0px;
					}
					.bouton_submit:hover{
						color: rgb(150,150,250); 
						text-decoration: underline;
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
					  	<li><a href="Notifications.php">Notifications <span class="glyphicon glyphicon-exclamation-sign"></span> </a></li>
					  	<li><a href="Emplois.php">Emplois <span class="glyphicon glyphicon-briefcase"></span></a></li>
					  	<li><a href="Photos.php">Photos <span class="glyphicon glyphicon-picture"></span></a></li>
					  	<li><a href="Videos.php">Vidéos <span class="glyphicon glyphicon-film"></span></a></li>
					  	<li><a href="Messagerie.php">Messagerie <span class="glyphicon glyphicon-comment"></span></a></li>
				     </ul>
				     <form action="Traitement_Recherche" method="post" class="navbar-form navbar-right">
						        <input type="search" class="input-sm form-control" name="recherche" placeholder="Recherche">
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
					    		<a href="Connexion.html"><span class="glyphicon glyphicon-off"></span> Deconnexion <br> 
					    			<?php
                  if(isset($_COOKIE['statut'])) $statut = $_COOKIE['statut'];
                  if($statut=='Administrateur') echo"<a href='Admin.php'><span class='glyphicon glyphicon-cog'></span> Admin";
                  ?>
					    	</td>
					    </tr>
					    
					</table>
			    </div>

			    
			    <!-- Affichage des evênements  -->

			    <div id="monreseau" class="container-fluid">
					<h3>Résultats de la recherche : </h3>
					<?php 
						$recherche = isset($_POST["recherche"])?$_POST["recherche"] : ""; 
						echo "<p>'$recherche'</p><br>";
						$Connexion = new mysqli( 'localhost' , "root" , "" , "ecemplois" ) ;
						if ($Connexion->connect_error)echo "Erreur lors de la connexion à la base de donnée" ;
						if(isset($_COOKIE['numero_utilisateur'])) $numero_utilisateur = $_COOKIE['numero_utilisateur'];
						$recherche = "%".$recherche."%" ;
						$sql = "SELECT * FROM utilisateur WHERE ((prenom LIKE '$recherche')OR(nom LIKE '$recherche'))";
				        $selection = mysqli_query($Connexion,$sql);
				        echo "<div class='container-fluid'>";
				        echo "<h4><span class='glyphicon glyphicon-user'> Personnes : </h4>";
				        while($donnees =  mysqli_fetch_assoc($selection))
				        {
				        	if($donnees['numero_utilisateur']!=$numero_utilisateur)
				        	{
					        	echo "<div id = 'contact' class='container-fluid'>" ;
					        	
					        	echo "<h4>".$donnees['prenom']." ".$donnees['nom'] ."<br></h4>" ; 
					        	echo "<div id='pborder' class='container-fluid'>" ; 
					        		
					        	
					        		echo "<form action='Traitement_Ajout_Amis_Potentiellement' method='post'>"; 
					        		echo "<span class='glyphicon glyphicon-comment'></span>&nbsp  ".$donnees['email']."<br>" ; 
					        		echo "<span class='glyphicon glyphicon-phone'></span>&nbsp ".$donnees['tel']."<br>" ;
					        		
						        		echo "<input type='submit' value='+Amis' id='notif' class='bouton_submit'> <br>" ; 
						        		echo "<input type='hidden' value=".$donnees['numero_utilisateur']." name='numero_recepteur'>" ; 
						        		
					        		echo "</form>";
					        		echo "<form action='Traitement_Ajout_Contact_Pro_Potentiellement' method='post'>";
					        			
						        		echo "<input type='submit' value='+Contact pro' id='notif' class='bouton_submit'>" ; 
						        		echo "<input type='hidden' value=".$donnees['numero_utilisateur']." name='numero_recepteur'>" ;
						        		
					        		echo "</form>";
					        		if(isset($_COOKIE['statut'])) $statut = $_COOKIE['statut'];
					        		if($statut=='Administrateur'){
					        		echo "<form action='Traitement_Supprimer_Utilisateur.php' method='post'>";
					        			
						        		echo "<input type='submit' value='-Supprimer l utilisateur' id='notif2' class='bouton_submit'>" ; 
						        		echo "<input type='hidden' value=".$donnees['numero_utilisateur']." name='numero_recepteur'>" ;
						        		
					        		echo "</form>";
					        	}
					        		echo "</div>";
					        	
					        	$num_user_actuel = $donnees['numero_utilisateur'] ; 
					        	$sqlPhoto = "SELECT lien FROM accessibilite WHERE (numero_utilisateur = $num_user_actuel AND pdp = 1)" ; 
					        	$selectionPhoto = mysqli_query($Connexion,$sqlPhoto);
					        	$donneesPhoto =  mysqli_fetch_assoc($selectionPhoto) ; 
					        	echo "<p id='photo'><img id='pikevent' src=".$donneesPhoto['lien']." width='148' height='148' ></p><br>" ; 
					 
					        	echo "</div>" ; 
				        	}
						}
						echo "</div>";
						$sql = "SELECT * FROM emplois WHERE ((profession LIKE '$recherche')OR(description LIKE '$recherche'))";
				        $selection = mysqli_query($Connexion,$sql);
				        echo "<div class='container-fluid'>";
				        echo "<h4><span class='glyphicon glyphicon-briefcase'> Offre d'emplois : </h4>";
				        while($donnees =  mysqli_fetch_assoc($selection))
				        {
				        	
					        	echo "<div id = 'contact' class='container-fluid'>" ;
					        	echo "<h4> Profession : ".$donnees['profession']."<br></h4>" ; 
					        	echo "<p id='pborder'>" ; 
					        		echo "Description : ".$donnees['description']."<br>" ;  
					        	echo "</p>" ; 
					        	echo "</div>" ; 
				        	
						}
						echo "</div>";
					?>	
			    </div>


			</div> 

		</body>
</html> 