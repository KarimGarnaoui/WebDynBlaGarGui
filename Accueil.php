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
			      		position:absolute;


			      	}
			      	[id*="resolvpb"] 
			      	{ 

			      		padding-right: 20px;
			      		padding-left: 20px;
			      		padding-bottom: 5px;
			      		margin: 20px;
			      		border-radius: 10px;
			  			height: 300px ;
			      		color : black;

			      	}

			      		[id*="publier"] 
			      	{ 
			      		padding-right: 20px;
			      		padding-left: 20px;
			      		padding-top: 10px;
			      		padding-bottom: 10px;
			      		margin-bottom: 50px;
			      		margin-right: 80px;
			      		margin-top: 2px;
			      		background-color: rgb(230, 230, 230) ;
			      		border-radius: 10px;
			      		color : black;
			      		width: 70%;
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
						float:left;
					}

					[id*="pborder2"]
					{
						
						border: 1px ;
						border-radius: 5px ; 
						width: 30% ;
						margin-right: 10%; 
						float: right;
					}

					[id*="pikevent"]
					{
						border:none;
						border: 1px;
						border-radius: 5px ; 
						width: 150px; 
						height: 150px;

					}

					[id*="titre"]
					{
						margin-right: 200px;
					}

					[id*="page"]
					{
						margin-top: 10px;
						width:400px;
						height:50px;
					}
					
					[id*="pagebis"]
					{
						margin-top: 10px;
						width:250px;
						margin-left: 70px;
						height:20px;

					}

					[id*="page2"]
					{
						margin-top: 10px;
						width:400px;
						height:50px;
					}

					[id*="page3"]
					{
						margin-top: 10px;
						width:200px;
						height:50px;
						display: inline;
					}

			
					

					[id*="dive"]
					{
						display: inline;
					

					}
					[id*="dive"]
					{
						display: inline;
						margin-right: right;
					}

					[id*="foot"]
					{
						position:relative;	
						bottom:0;
						right: 0;
						font-size:1em;
					}

					[id*="itali"]
					{
						font-style: italic;


					}

					[id*="supr"]
					{
						float:right;
						margin-right: 40px;


					}
					button{
						width:60px;
						height: 20px;
					}

					
    		</style>
			 
		</head>
		<body>
			<div class="container">
				
				<!-- Onglets + barre de recherche  -->
				<div class="navbar navbar-inverse">
					<div class="container-fluid">
 					 <ul class="nav navbar-nav">
					  	<li class="active"><a href="Accueil.php">Accueil <span class="glyphicon glyphicon-home"></span></a></li>
					  	<li><a href="MonReseau.php">Mon Réseau <span class="glyphicon glyphicon-globe"></span></a></li>
					  	<li><a href="Notifications.php">Notifications <span class="glyphicon glyphicon-exclamation-sign"></span> </a></li>
					  	<li><a href="Emplois.phpl">Emplois <span class="glyphicon glyphicon-briefcase"></span></a></li>
					  	<li><a href="Photos.php">Photos <span class="glyphicon glyphicon-picture"></span></a></li>
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
					    		<a href="Connexion.html"><span class="glyphicon glyphicon-off"></span> Deconnexion <br> <br>
					    	</td>
					    </tr>
					    
					</table>
			    </div>

			    
			    <!-- Affichage des evênements  -->

			    <div id="evenement" class="container-fluid">
				<div class="container-fluid" id="titre">	<h3> Evènements </h3> </div>

				 <form action="Traitement_Publication.php" method="post" enctype="multipart/form-data">
					<div id="publier" class="container-fluid" >		
				<tr>
					<input  type="text" name="titre" placeholder="titre">
					&nbsp &nbsp &nbsp 
					<h8> Accessibilité: </h8>
					&nbsp
					<input type="radio" name="acces" value="amis" id="dive" /> <label for="amis">Amis</label>
       				<input type="radio" name="acces" value="reseau" id="dive" /> <label for="reseau">Reseau</label>
       				<input type="radio" name="acces" value="tous" id="dive" /> <label for="tous">Tous</label>
       				</tr>
				<tr>
					<input  id="page" type="text" name="description_evenement" placeholder="Exprimez-vous ..."> <br> <br>
				</tr>
                  	<tr >
                  	 <span type="file" class="glyphicon glyphicon-paperclip"></span> Ajouter une image: </td>
                      <input type="file" id ="dive" name="image">     <br> 
					<input type="text" id="dive" name="description" placeholder="Commenter la piece jointe ..."> 
					&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
       				<input type="text" id="dive" name="action" placeholder="Que faites vous ..."> 
       				<br> <br>
       				<h8> Humeur: </h8>
       				&nbsp &nbsp &nbsp
					<input type="radio" name="humeur" value="contente" id="dive" /> <label for="contente">Content</label>
       				<input type="radio" name="humeur" value="triste" id="dive" /> <label for="triste">Triste</label>
       				<input type="radio" name="humeur" value="enerve" id="dive" /> <label for="enerve">Enerve</label> <br> <br>
				
				</tr>

                     <tr>
			         	<td colspan="2" align="right"><input type="submit" name="Publier" value="publication"></td></p>
			         </tr>
                  </form>
                  </div>
                 <div class="container-fluid">
                 <?php 

                  		$database = "ecemplois";
					 	$db_handle = mysqli_connect('localhost', 'root',''); 
						$db_found = mysqli_select_db($db_handle, $database);

						$nom_evenement="";
						$descriptif_evenement="";
						$lien="";
						$date="";
						$heure="";

						if(isset($_COOKIE['numero_utilisateur'])) $numero_utilisateur = $_COOKIE['numero_utilisateur'] ;
							

							if(isset($_COOKIE['nom']))
							{
								$nom=$_COOKIE['nom'];
							}
							if(isset($_COOKIE['prenom']))
							{
								$prenom=$_COOKIE['prenom'];
							}

						if($db_found){
							 

							
								$sql2 = "SELECT * FROM evenement JOIN piece_jointe JOIN contenir JOIN etreamis JOIN etrecontactpro
    									 WHERE         ((((   ( (etreamis.numero_utilisateur1 = evenement.numero_utilisateur) AND (etreamis.numero_utilisateur2 = '$numero_utilisateur') ) 
    									                    OR( (etreamis.numero_utilisateur2 = evenement.numero_utilisateur) AND (etreamis.numero_utilisateur1 = '$numero_utilisateur') )) OR (evenement.numero_utilisateur='$numero_utilisateur')))
    									                    AND ( ( (evenement.statut = 'amis') OR (evenement.numero_utilisateur='$numero_utilisateur') )
    									                       OR ( (evenement.statut = 'tous') OR (evenement.numero_utilisateur='$numero_utilisateur')))) 

    									               OR ((( ((etrecontactpro.numero_utilisateur1 = evenement.numero_utilisateur) AND (etrecontactpro.numero_utilisateur2 = '$numero_utilisateur') )
    									                    OR((etrecontactpro.numero_utilisateur2 = evenement.numero_utilisateur) AND (etrecontactpro.numero_utilisateur1 = '$numero_utilisateur') ))

    									                    OR (evenement.numero_utilisateur='$numero_utilisateur')))AND (  ( (evenement.statut = 'reseau') 
    									                    OR (evenement.numero_utilisateur='$numero_utilisateur') )OR ( (evenement.statut = 'tous') 
    									                    OR (evenement.numero_utilisateur='$numero_utilisateur')))
										GROUP BY evenement.numero_evenement";



								$selection2= mysqli_query($db_handle, $sql2);

								while($data2=mysqli_fetch_assoc($selection2)){

									$lien =$data2['lien'];
									$sentiment =$data2['sentiment'];
									$date =$data2['Date'];
									$heure =$data2['Heure'];
									$description =$data2['description'];
									$action =$data2['action'];
									$nom_evenement =$data2['nom_evenement'];
									$descriptif_evenement =$data2['descriptif_evenement'];
									$statut =$data2['statut'];
									$numero_evenement =$data2['numero_evenement'];
							


							echo"<form action='Traitement_supprimer.php' method='post'>";
							echo"<p colspan='2' align='right' id='supr'><input type='submit' name='Supprimer' value='Supprimer'> </p> <br>";
							echo"<input type='hidden' name='numero_evenement' value='$numero_evenement'> ";
							echo"</form>";

							echo "<div id='resolvpb' class='container-fluid'> ";
							echo"<form action='Traitement_Partager.php' method='post'>";
							echo"<div id = 'event1' class='container-fluid'>";
							echo"<input type='hidden' name='nom_evenement' value='$nom_evenement'> <h4> $nom_evenement </h4>";
							echo"<p id='pborder'>";
							if($lien!="")
							{
							echo"<input type='hidden' name='humeur' value='$sentiment'> <i>$sentiment en train de $action </i><br> <br>";
							echo"<input type='hidden' name='action' value='$action'> ";
							echo"<input type='hidden' name='statut' value='$statut'> ";
							
						}	
							echo"<input type='hidden' name='descriptif_evenement' value='$descriptif_evenement'> $descriptif_evenement <br>";
							echo"</p>";
							if($lien!="")
							{
							echo"<input type='hidden'  name='lien' value='$lien'> <p align='center' id='image'> <a href=$lien> <img id='pikevent' src=$lien width='148' height='148' > </a></p>";
							echo"<p id='pborder2'>";
							echo"<input type='hidden' name='description' value='$description'> $description";
							echo"</p><br><br>";
							}
							echo"<br> <br>";
							echo"<footer>";
							echo"<small>";
							echo" <input type='hidden' name='nom' value=' $prenom $nom'> <i><p id='foot'>Publication de : $prenom $nom ";
							echo"le $date à $heure heure </i>";
						    
						    echo"&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
						   echo"<span class='glyphicon glyphicon-share'></span>  <input type='submit' href='Partager.php' value='Partager'> &nbsp&nbsp&nbsp&nbsp 
						   <span class='glyphicon glyphicon-edit'></span>  <input type='submit' href='Comenter.php' value='Comentaire'> &nbsp&nbsp&nbsp&nbsp  	
						    	<span class='glyphicon glyphicon-thumbs-up'></span>  <button href='Aimer.php'  value='J aime'>J aime </button></p>";
							
							echo"</small>";
							echo"</footer>";
						    echo"</div>";
						    echo"</div>";
						    echo"<br> <br>";
						    echo"</form>";
						}


						
					
				}

                  ?> 
				</div>

					   
			    </div>


			</div> 

		</body>

</html>