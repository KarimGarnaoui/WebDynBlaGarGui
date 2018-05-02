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
			      	[id*="photograph"]
                     {
			      		width: 40%;
                        float : left;
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
					  	<li class="active"><a href="Photos.php">Photos <span class="glyphicon glyphicon-picture"></span></a></li>
					  	<li><a href="Messagerie.php">Messagerie <span class="glyphicon glyphicon-comment"></span></a></li>
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

			    
			    <!-- Affichage des photos  -->

			    <div id="photo" class="container-fluid">
                    
					<h3>Vos photos</h3><br><br><br>
                    
                    <div id="sousMenu" class="container-fluid">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#photos">Photos</a></li>
                                <li><a data-toggle="tab" href="#album">Albums</a></li>
                            </ul>
                    </div>
                    
                 <div class="tab-content">
                    <div id="photos" class="tab-pane fade in active">
                       <div class="row"> 
                 <?php
                     
                     $loc="localhost";
	                 $login="root";
	                 $password="";
	                 $database="ecemplois";
                     $value="";
                     
                     $array_photo=array();
                     
                     $db_handle = mysqli_connect($loc, $login, $password); 
	                 $db_found = mysqli_select_db($db_handle, $database);
	
                     $numero_user = $_COOKIE['numero_utilisateur'];
                       
                     if($db_found){
                         
                     $sql="SELECT lien FROM accessibilite WHERE numero_utilisateur='$numero_user'";
                         
                     $selection= mysqli_query($db_handle, $sql);
                         
                     while($donnees=mysqli_fetch_assoc($selection)){
                        
                         $array_photo[$donnees['lien']] =$donnees['lien'];
                     }
                    
                      
                      foreach ($array_photo as $value){
                          
                                     echo"<div id='photograph' class='thumbnail'>";
                                     echo"<a href=$value target='_blank'>";
                                     echo"<img src=$value style='width:50%'>";
                                     echo"<div class='caption'>";
                                     echo"<footer>";
                                     echo"<p align='right'><a href='Aimer.php'><span class='glyphicon glyphicon-thumbs-up'></span> J'aime &nbsp&nbsp&nbsp&nbsp<a href='Partager.php'><span class='glyphicon glyphicon-share'></span> Partager</p>";
                                     echo"</a>";
                                     echo"</a>";
                                     echo"</footer>";
                                     echo"</div>";
                                     echo"</div>";
                      }     
                         
	                }
                     
                  ?>                      
                                      
                           
                                </div>
                         </div>
                    <div id="album" class="tab-pane fade"></div>
                             
                    
                  </div>
                                    Ajouter une image: <br>  
                                    <form action="ajouter.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="imageadd" id="imageadd"><br>
                                    <input type="submit" value="Ajouter" name="addimg"><br><br>
                                    </form>
                                    
                    
			    </div>
                    
                    

			</div> 

		</body>
</html>