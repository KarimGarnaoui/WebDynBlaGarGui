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
					[id*="pikevent"]
					{
						border: 1px black solid;
						border-radius: 5px ; 
						width: 75px; 
						height: 75px;
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
					  	<li class="active"><a href="MonReseau.php">Mon Réseau <span class="glyphicon glyphicon-globe"></span></a></li>
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
					<h3>Contacts</h3><br><br><br>
					<?php 
						

						$Connexion = new mysqli( 'localhost' , "root" , "" , "ecemplois" ) ;
						if ($Connexion->connect_error)echo "Erreur lors de la connexion à la base de donnée" ;
						if(isset($_COOKIE['numero_utilisateur'])) $numero_utilisateur = $_COOKIE['numero_utilisateur'];

						$sql = "SELECT * FROM utilisateur 
							        		JOIN etrecontactpro 
							        		WHERE (('$numero_utilisateur' = etrecontactpro.numero_utilisateur1 OR '$numero_utilisateur' = etrecontactpro.numero_utilisateur2) 
							        		AND (utilisateur.numero_utilisateur = etrecontactpro.numero_utilisateur1 OR utilisateur.numero_utilisateur = etrecontactpro.numero_utilisateur2) )
							        		GROUP BY utilisateur.numero_utilisateur";
				        $selection = mysqli_query($Connexion,$sql);

				        while($donnees =  mysqli_fetch_assoc($selection))
				        {
				        	if($donnees['numero_utilisateur']!=$numero_utilisateur)
				        	{
					        	echo "<div id = 'contact' class='container-fluid'>" ;
					        	echo "<h4>".$donnees['prenom']." ".$donnees['nom'] ."<br></h4>" ; 
					        	echo "<p id='pborder'>" ; 
					        		echo "<span class='glyphicon glyphicon-comment'></span>&nbsp  ".$donnees['email']."<br>" ; 
					        		echo "<span class='glyphicon glyphicon-phone'></span>&nbsp ".$donnees['tel']."<br><br><br>" ; 
					        	echo "</p>" ;
					        	$num_user_actuel = $donnees['numero_utilisateur'] ; 
					        	$sqlPhoto = "SELECT lien FROM accessibilite WHERE (numero_utilisateur = $num_user_actuel AND pdp = 1)" ; 
					        	$selectionPhoto = mysqli_query($Connexion,$sqlPhoto);
					        	$donneesPhoto =  mysqli_fetch_assoc($selectionPhoto) ; 

					        	echo "<p align='right'><img id='pikevent' src=".$donneesPhoto['lien']." width='148' height='148' ></p>" ; 
					        	echo "</div>" ; 
				        	}
						}

					?>	
			    </div>


			</div> 

		</body>
</html> 