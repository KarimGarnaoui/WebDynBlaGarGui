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

			      	[id*="msgbar"] 
			      	{ 
			      		vertical-align: middle;
			      	}
			      	
			      	
			      	h4 
			      	{
					    font-weight: bold;
					}
					p[id=contact]{
						border: 1px black solid;
						border-radius: 10px ; 
						padding-left: 10px ; 
					}
					p[id=usermsg]{
						border: 1px black solid;
						border-radius: 10px ;
						padding-left: 10px ;
						padding-right: 10px ;
						float: right ; 
						display: inline-block;
						color: blue ; 
						border-color: blue ; 
					}
					p[id=destmsg]{
						border: 1px black solid;
						border-radius: 10px ;
						padding-left: 10px ;
						padding-right: 10px ;
						float: left ; 
						display: inline-block;
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
					  	<li><a href="Photos.html">Photos <span class="glyphicon glyphicon-picture"></span></a></li>
					  	<li class="active"><a href="Messagerie.php">Messagerie <span class="glyphicon glyphicon-comment"></span></a></li>
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

									echo "<td><img src='".$pdp."' class='img-circle' alt='".$pdp."' width='80' height='80'> &nbsp&nbsp</td><br>" ;
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
					<form action="Traitement_Messagerie.php" method="post">
						<div id="coontactPan" class="container-fluid">
							<h4>Contacts</h4><br>

								<?php

							        $Connexion = new mysqli( 'localhost' , "root" , "" , "ecemplois" ) ;
							        if ($Connexion->connect_error)echo "Erreur lors de la connexion à la base de donnée" ;
							        if(isset($_COOKIE['numero_utilisateur'])) $numero_utilisateur = $_COOKIE['numero_utilisateur'];
							        
							        $sql = "SELECT * FROM utilisateur 
							        		JOIN etreamis 
							        		WHERE (('$numero_utilisateur' = etreamis.numero_utilisateur1 OR '$numero_utilisateur' = etreamis.numero_utilisateur2) 
							        		AND (utilisateur.numero_utilisateur = etreamis.numero_utilisateur1 OR utilisateur.numero_utilisateur = etreamis.numero_utilisateur2) )
							        		GROUP BY utilisateur.numero_utilisateur";
							        $selection = mysqli_query($Connexion,$sql);

							        if(isset($_COOKIE['destinataire'])){
							        	$user_2 = $_COOKIE['destinataire'] ;
							        }
							        
							        while($donnees =  mysqli_fetch_assoc($selection))
							        {
							        	if($donnees['numero_utilisateur']!=$numero_utilisateur)
							        	{
							        		// echo "<input type='button' value='".$donnees['prenom']." " .$donnees['nom'] ."'/><br><br>" ;
								        	if(isset($_COOKIE['destinataire'])){
									        	if($user_2 == $donnees['numero_utilisateur']) 
									        	{
													echo "<p id='contact'>
													<input type='radio' name='destinataire' id='".$donnees['numero_utilisateur'] ."' value='".$donnees['numero_utilisateur'] ."' checked='checked'/>
													<label for='".$donnees['numero_utilisateur'] ."'>&nbsp" .$donnees['prenom'] ." " .$donnees['nom'] ."</label></p><br>" ;
												}
												else 
												{

									           		 echo "<p id='contact'>
									           		 <input type='radio' name='destinataire' id='".$donnees['numero_utilisateur'] ."' value='".$donnees['numero_utilisateur'] ."'/>
									           		 <label for='".$donnees['numero_utilisateur'] ."'>&nbsp" .$donnees['prenom'] ." " .$donnees['nom'] ."</label></p><br>" ;
									        	}
											}

											
							        	}
							           

	        						}

								?>
							<button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-ok"></span></button>
						</div>

						<div id="messagePan" class="container-fluid">
							<h4>Messagerie instantannée</h4><br>
							<div id="affmsg" class="container-fluid">

								<!-- <p id="usermsg"><strong>Hello, ça va ?</p> <br><br>
								<p id="destmsg">Bien et toi ?</p> <br><br>
								<p id="usermsg"><strong>Tranquille</p> <br><br> -->

								<?php 
									$Connexion = new mysqli( 'localhost' , "root" , "" , "ecemplois" ) ;
							        if ($Connexion->connect_error)echo "Erreur lors de la connexion à la base de donnée" ;
							        if(isset($_COOKIE['numero_utilisateur'])) $numero_utilisateur = $_COOKIE['numero_utilisateur'];
							        
							        if(isset($_COOKIE['destinataire'])){

							         $user_2 = $_COOKIE['destinataire'];
							         $sql = "SELECT * FROM message WHERE ((user_1 = $numero_utilisateur AND user_2 = $user_2) OR (user_2 = $numero_utilisateur AND user_1 = $user_2)) ORDER BY heure DESC LIMIT 0, 10" ;
							         $selection = mysqli_query($Connexion,$sql);

							        while($donnees =  mysqli_fetch_assoc($selection)){

							        	if($donnees['message']!=""){
							        		if($donnees['auteur'] == $numero_utilisateur) echo "<p id='usermsg'>".$donnees['message']."</p><br><br>" ;
							            	else echo "<p id='destmsg'>".$donnees['message']."</p><br><br>" ;
							        	}
							            
							        }
							        }
							        
								?>
							</div>
							<footer>
								<div id="navibar" class="navbar navbar-inverse">
								    <div class="navbar-form navbar-left">
										<input type="text" name="msg" class="input-sm form-control" placeholder="Messages...">
									    <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-ok"></span></button>
									</div>
								</div>
							</footer>
						</div>
					</form>

				</div>
			    


			</div> 

		</body>
</html> 