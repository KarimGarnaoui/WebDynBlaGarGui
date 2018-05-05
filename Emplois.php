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
			      [id*="principal"] /*Mise en page du composant */
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

			      	[id*="emploisPan"] /*Mise en page du composant */
			      	{ 
			      		padding-right: 10px;
			      		padding-left: 10px;
			      		padding-bottom: 5px;
			      		background-color: rgb(30, 30, 30) ;
			      		border-radius: 5px;
			      		font-weight:bold;
			      		width: 78%;
			      		float : left;
			      	}
			      	[id*="ajoutEmplois"] /*Mise en page du composant */
			      	{ 
			      		padding-left  : 10px;
			      		margin : 10px;
			      		margin-left : 50px;
			      		border : 1px white solid;
			      		background-color: rgb(30, 30, 30) ;
			      		border-radius: 5px;
			      		font-weight:bold;
			      		height: 150px;
			      		width: 80%;
			      	}
			      	[id*="affichageEmplois"] /*Mise en page du composant */
			      	{ 
			      		padding-left : 10px;
			      		margin : 10px;
			      		margin-top : 20px;
			      		margin-left : 50px;
			      		border : 1px white solid;
			      		background-color: rgb(30, 30, 30) ;
			      		border-radius: 5px;
			      		font-weight:bold;
			      		width: 80% ; 
			      	}
			      	[id*="ajouter"] /*Mise en page du composant */
			      	{ 
			      		position: relative;
			      		float: right;
			      		bottom: 20px;
			      	}
			      	[id*="liste"] /*Mise en page du composant */
			      	{ 
			      		padding:10px;
			      		margin: 10px ; 
			      		background-color: rgb(230, 230, 230) ;
			      		border-radius: 5px;
			      		font-weight:bold;
			      		width: 400px;
			      		height: 100px;
			      		float : left;
			      	}

			      	h4{ /*Mise en page du composant */
			      		color: white ;
			      		margin: 20px;
			      	}
			      	h5{ /*Mise en page du composant */
			      		color: white ; 
			      	}
			      	td[id=creationEmplois]{ /*Mise en page du composant */
			      		color: white ; 
			      		padding-left: 20px ; 
			      		padding-right: 20px ; 
			      		padding-top: 8px;
			      		padding-bottom: 8px ; 
			      	}
			      	p[id=espace] /*Mise en page du composant */
			      	{
			      		color: black ; 
			      		font-weight: normal ;
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
					  	<li class="active"><a href="Emplois.php">Emplois <span class="glyphicon glyphicon-briefcase"></span></a></li>
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

				<!-- Affichage emplois  -->
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

									echo "<td><img src='".$pdp."' class='img-circle' alt='".$pdp."' width='80' height='80'> &nbsp&nbsp</td><br>" ;
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

			    <div id="emploisPan" class="container-fluid">
			    	<h4>Emplois</h4>
			    	<?php
			    		$connexion= new mysqli('localhost','root','','ecemplois') ;
						if($connexion->connect_error) echo "Erreur la connexion est refusée. " ;
						if(isset($_COOKIE['statut'])) $statut = $_COOKIE['statut'];
			    		if($statut=='Administrateur'){

				    		echo"<div id='ajoutEmplois' class='container-fluid'>
							    		<h5>Ajouter un emplois (Admin)</h5>
							    		<form action='Traitement_Ajout_Emplois.php' method='post'>
							    			<table>
							    				<tr>
							    					<td id='creationEmplois'>Profession : </td>
							    					<td><input type='text' name='profession'></td>
							    				</tr>
							    				<tr>
							    					<td id='creationEmplois'>Diplome necessaire : </td>
							    					<td><input type='text' name='diplome'></td>
							    				</tr>
							    				<tr>
							    					<td id='creationEmplois'>Description : </td>
							    					<td><input type='text' name='description'></td>
							    				</tr>
							    			</table>
							    			<input id='ajouter' type='submit' value='Ajouter'>
							    		</form>
							    	</div>" ;	
			    		}
				    	
			    	?>
			    	<div id="affichageEmplois" class="container-fluid">
			    		<h5>Rechercher une offre d'emplois</h5>
			    		
			    			<?php
			    				$connexion= new mysqli('localhost','root','','ecemplois') ;
								if($connexion->connect_error) echo "Erreur la connexion est refusée. " ;
								if(isset($_COOKIE['diplome'])) $diplome = $_COOKIE['diplome'];
		    					

		    					$sql = "SELECT * FROM emplois WHERE diplome = '$diplome'" ; 
		    					$selection = mysqli_query($connexion,$sql);

		    					while($donnees =  mysqli_fetch_assoc($selection)){
		    						echo"<div id='liste' class='container-fluid'>" ;
						            echo "<p id='espace'><b>Profession :</b> ".$donnees['profession']."</p>";
		    						echo "<p id='espace'><b>Description</b> : ".$donnees['description']."";
		    						echo"</div>" ;
						        }
			    			?>
			    		
			    	</div>
			    </div>

			</div> 

		</body>
</html> 