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
						float: left ; 
					}
					[id*="pikevent"]
					{
						border: 1px black solid;
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
					button{
						width:30px;
						height: 10px;
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
				<div class="container-fluid" id="titre">	<h3> Evènements </h3> </div>

				 <form action="Traitement_Publication.php" method="post" enctype="multipart/form-data">
					<div id="publier" class="container-fluid" >		
				<tr>
					<input  type="text" name="titre" placeholder="titre">
					<h8> Accessibilité: </h8>
					<input type="radio" name="acces" value="amis" id="dive" /> <label for="amis">Amis</label>
       				<input type="radio" name="acces" value="reseau" id="dive" /> <label for="reseau">Reseau</label>
       				<input type="radio" name="acces" value="tous" id="dive" /> <label for="tous">Tous</label>
       				</tr>
				<tr>
					<input  id="page" type="text" name="description" placeholder="Exprimez-vous ..."> <br> <br>
				</tr>
                  	<tr >
                  	 <span type="file" class="glyphicon glyphicon-paperclip"></span> Ajouter une image: </td>
                      <input type="file" id ="dive" name="image">     <br> 
					<input type="text" id="dive" name="description" placeholder="Commenter la piece jointe ..."> 
					<input type="radio" name="humeur" value="contente" id="dive" /> <label for="contente">Content</label>
       				<input type="radio" name="humeur" value="triste" id="dive" /> <label for="triste">Triste</label>
       				<input type="radio" name="humeur" value="enerve" id="dive" /> <label for="enerve">Enerve</label> <br> <br>
				
				</tr>

                     <tr>
			         	<td colspan="2" align="right"><input type="submit" name="Publier" value="publication"></td></p>
			         </tr>
                  </form>
                  </div>

                 <?php 

                  		$database = "ecemplois";
					 	$db_handle = mysqli_connect('localhost', 'root',''); 
						$db_found = mysqli_select_db($db_handle, $database);

						$nom_evenement="";
						$descriptif_evenement="";
						$lien="";
						$date="";
						$heure="";

							if(isset($_COOKIE['numero_evenement']) )
							{
								$numero_evenement=$_COOKIE['numero_evenement'];
							}

						if($db_found){
							$sql1 = "SELECT nom_evenement, descriptif_evenement FROM evenement where numero_evenement='$numero_evenement'";
							$selection= mysqli_query($db_handle, $sql1);


							while($data=mysqli_fetch_assoc($selection)){
									$nom_evenement =$data['nom_evenement'];
									$descriptif_evenement =$data['descriptif_evenement'];
								}

								$sql2 = "SELECT piece_jointe.lien, sentiment, date, heure FROM contenir JOIN evenement on evenement.numero_evenement=contenir.numero_evenement JOIN piece_jointe on contenir.lien=piece_jointe.lien where evenement.numero_evenement='$numero_evenement'";



								$selection2= mysqli_query($db_handle, $sql2);

								while($data2=mysqli_fetch_assoc($selection2)){
									$lien =$data2['lien'];
									$sentiment =$data2['sentiment'];
									$date =$data2['date'];
									$heure =$data2['heure'];
								}

							echo"<div id = 'event1' class='container-fluid'>";
							echo"<h4> $nom_evenement </h4>";
							echo"<p id='pborder'>";
							echo"Description <br>";
							echo"$descriptif_evenement <br><br><br>";
							echo"</p>";
							echo"<p align='right'><img id='pikevent' src=$lien width='148' height='148' ></p>";
							echo"<p>Publication de : Franklin</p>";
							echo"<footer>";
							echo"<p align='left'> Publier le $date à $heure heure</p>";
							echo"<p align='right'><a href='Aimer.php'><span class='glyphicon glyphicon-thumbs-up'></span> J'aime &nbsp&nbsp&nbsp&nbsp<a href='Partager.php'><span class='glyphicon glyphicon-share'></span> Partager</p>";
							echo"</footer>";
						echo"</div>";
					}

                  ?> 
	

					   
			    </div>


			</div> 

		</body>

</html>