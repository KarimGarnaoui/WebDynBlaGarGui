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
			      	[id*="messagerie"] 
			      	{ 
			      		padding-right: 20px;
			      		padding-left: 20px;
			      		padding-bottom: 5px;
			      		background-color: rgb(30, 30, 30) ;
			      		color: white;
			      		border-radius: 5px;
			      		font-weight:bold;
			      		width: 78%;
			      		height: 700px;
			      		float : left;

			      	}
			      	[id*="messagePan"] 
			      	{ 
			      		padding-right: 20px;
			      		padding-left: 20px;
			      		padding-bottom: 5px;
			      		background-color: rgb(230, 230, 230) ;
			      		color: black;
			      		border-radius: 10px;
			      		width: 65%;
			      		height: 600px ; 
			      		font-weight:bold;
			      		float : right;

			      	}
			      	[id*="coontactPan"] 
			      	{ 
			      		padding-right: 20px;
			      		padding-left: 20px;
			      		padding-bottom: 5px;
			      		background-color: rgb(230, 230, 230) ;
			      		color: black;
			      		border-radius: 10px;
			      		font-weight:bold;
			      		width: 30%;
			      		height: 600px ; 
			      		float : left;

			      	}
			      	[id*="contact"] 
			      	{ 
			      		padding-right: 20px;
			      		padding-left: 20px;
			      		padding-bottom: 5px;
			      		background-color: rgb(230, 230, 230) ;
			      		color: black;
			      		border: 1px black solid;
			      		border-radius: 5px;
			      		width: 90% ;
			      		height: 30px ; 
			      		font-weight:bold;
			      		float : center;

			      	}

			      	[id*="affmsg"] 
			      	{ 
			      		height: 475px;
			      	}
			      	
			      	h4 
			      	{
					    font-weight: bold;
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
					  	<li><a href="MonReseau.html">Mon Réseau <span class="glyphicon glyphicon-globe"></span></a></li>
					  	<li><a href="Notifications.html">Notifications <span class="glyphicon glyphicon-exclamation-sign"></span> </a></li>
					  	<li><a href="Emplois.html">Emplois <span class="glyphicon glyphicon-briefcase"></span></a></li>
					  	<li><a href="Photos.html">Photos <span class="glyphicon glyphicon-picture"></span></a></li>
					  	<li><a href="Messagerie.html">Messagerie <span class="glyphicon glyphicon-comment"></span></a></li>
				     </ul>
				     <form class="navbar-form navbar-right">
						        <input type="search" class="input-sm form-control" placeholder="Recherche">
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
					    		<a href="Profil.html"><span class="glyphicon glyphicon-user"></span> Profil <br>
					    		<a href="Connexion.html"><span class="glyphicon glyphicon-off"></span> Deconnexion <br> <br>
					    	</td>
					    </tr>
					    
					</table>
			    </div>

			    
			    <!-- Affichage des evênements  -->

			    <div id="messagerie" class="container-fluid">
					<h4>Messages</h4><br>

					<div id="coontactPan" class="container-fluid">
						<h4>Contacts</h4><br>
							<?php
								$Login    = "root"      ; 
						        $Pass     = ""          ;
						        $DataBase = "ecemplois"   ;  
						        $Serveur  = "localhost" ;

						        $Connexion = new mysqli( $Serveur , $Login , $Pass , $DataBase ) ;
						        if ($Connexion->connect_error) 
						        {
						            echo "Erreur lors de la connexion à la base de donnée" ; 
						        }

						        $sql = "SELECT * FROM utilisateur 
						        		JOIN etreamis 
						        		WHERE (utilisateur.numero_utilisateur = etreamis.numero_utilisateur1 
						        		OR utilisateur.numero_utilisateur = etreamis.numero_utilisateur2) 
						        		GROUP BY utilisateur.numero_utilisateur";
						        $selection = mysqli_query($Connexion,$sql);

						        while($donnees =  mysqli_fetch_assoc($selection))
						        {
						            echo "<div id='contact' class='container-fluid'>".$donnees['prenom']."&nbsp" .$donnees['nom'] ."</div><br>" ;
        						}

							?>
						
					</div>

					<div id="messagePan" class="container-fluid">
						<h4>Messagerie instantannée</h4><br>
						<div id="affmsg" class="container-fluid">
							
						</div>
						<footer>
							<div id="navibar" class="navbar navbar-inverse">
							    <form>
									<div id="msgbar" class="col-xs-8"><input type="text" class="form-control" placeholder="Messages..."></div>
								    <div id="butbar"class="col-xs-1"><button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-ok"></span></button></div>
								</form>
							</div>
						</footer>
					</div>


				</div>
			    


			</div> 

		</body>
</html> 