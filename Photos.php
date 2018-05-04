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
			      		padding-top: 5px;
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
                        border: 1px black solid;
						border-radius: 5px ; 
                        margin: 10px;
                        background: #E2CDFA;
                        
                     }
                 
                    [id*="albumsaff"]
                     {
			      		width: 40%;
                        float : left;
                        border: 1px black solid;
						border-radius: 5px ; 
                        margin: 10px;
                        text-align: center;
                        background: #E2E5E6;
                        
                        
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
                 
                 [id*="album"]
                 {
                    text-align: center;
                    margin:10px;
                 }
                 
                 [id*="photos"]
                 {
                    text-align: center;
                    margin:10px;
                 }
                 
                 [id*="imageadd"]
                 {
                     margin-left: 40%;
                     
                 }
					
    		</style>
			 
		</head>
		<body>
            <?php 
            $numero_utilisateur = $_COOKIE['numero_utilisateur'];
            $albumUserAdd='albums/'.$numero_utilisateur.'/';
            $dossierUser = $albumUserAdd;
            if(!is_dir($dossierUser)){
            mkdir($dossierUser);
        }
            ?>
			<div class="container">
				
				<!-- Onglets + barre de recherche  -->
				<div class="navbar navbar-inverse">
					<div class="container-fluid">
 					 <ul class="nav navbar-nav">
					  	<li><a href="Accueil.php">Accueil <span class="glyphicon glyphicon-home"></span></a></li>
					  	<li><a href="MonReseau.php">Mon Réseau <span class="glyphicon glyphicon-globe"></span></a></li>
					  	<li><a href="Notifications.php">Notifications <span class="glyphicon glyphicon-exclamation-sign"></span> </a></li>
					  	<li><a href="Emplois.php">Emplois <span class="glyphicon glyphicon-briefcase"></span></a></li>
					  	<li class="active"><a href="Photos.php">Photos <span class="glyphicon glyphicon-picture"></span></a></li>
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
                         
                     $sql="SELECT * FROM accessibilite WHERE numero_utilisateur='$numero_user'";
                         
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
                        
                                    Ajouter une image: <br>  
                                    <form action="ajouter.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="imageajouter" id="imageadd"><br>
                                    <input type="submit" value="Ajouter" name="addimg"><br><br>
                                    </form>
                        
                         </div>
                     
                    <div id="album" class="tab-pane fade">
                        <div class="row">
                        
                                    <?php
                            
                                        $numero_user2 = $_COOKIE['numero_utilisateur'];
                                        $iterator = new DirectoryIterator('albums/');
                                        $document = "";   
                                        $document2 = "";
                                        $document3 = "";
                                        $nomfichier = "";
                                        $nomfichier2 = ""; 
                                        $nomfichier3="";
                                        $nomIMG = "";
                                        $nomimageF = "";
                                        
                        
                                        
                                             foreach($iterator as $document)
                                             {
                                              
                                             $nomfichier = $document->getFilename();
                                                   
                                            if($document==$numero_user){     
                                            if(!$document->isDot()){
                                            
                                                
                                              $nomIMG = 'albums/' . $numero_user2 . "/"; 
                                              $iterator2 = new DirectoryIterator($nomIMG);
                                                
                                              foreach($iterator2 as $document2 )
                                              {
                                              
                                              $nomfichier2 = $document2->getFilename();
                                                
                                                  
                                              if(!$document2->isDot()){
                                                   echo"<div id='albumsaff' class='text'>";
                                                   echo"<p style='font-size:25px; text-decoration: underline;'>$nomfichier2</p>";
                                                  
                                                  $nomimage = $nomIMG . $nomfichier2.'/';
                                                  $iterator3 = new DirectoryIterator($nomimage);
                                                  
                                                  foreach($iterator3 as $document3){
                                                      
                                                      $nomfichier3 = $document3->getFilename();
                                                      
                                                      if(!$document3->isDot()){
                                                          $nomimageF = $nomimage . $nomfichier3;
            
                                                          
                                              echo"<div id='photograph' class='thumbnail'>";
                                              echo"<a href=$nomimageF target='_blank'>";
                                              echo"<img src=$nomimageF style='width:50%'>";
                                              echo"<div class='caption'>";
                                              echo"<footer>";
                                              echo"<p align='right' ><a href='Aimer.php'><span class='glyphicon glyphicon-thumbs-up'></span> J'aime &nbsp&nbsp&nbsp&nbsp<a  href='Partager.php'><span class='glyphicon glyphicon-share'></span> Partager</p>";
                                              echo"</a>";
                                              echo"</a>";
                                              echo"</footer>";
                                              echo"</div>";
                                              echo"</div>";
                                                          
                                                      }
                                                  
                                                  }
                                                  echo"</div>";
                                                  
                                              }
                                                  
                                                  
                                              }            
                                        
                                                
                                              }
                                             }
                                         }   
                            
                        
                                    ?>
                            
                                    
                        
                     </div>
                        
                                    Ajouter un album: <br>  
                                    <form action="newAlbum.php" method="post" enctype="multipart/form-data">
                                        <input type="text" name="nomalbum" id="albumAdd"><br>
                                        <input type="submit" value="Créer"><br><br><br>
                                    </form>
                        
                                    Ajouter une photo à un album: <br>
                                    <form action="newPhotoAlbum.php" method="post" enctype="multipart/form-data">
                                        <input type="text" name="nomalbum" id="albumphotoAdd" placeholder="Nom de l'album"><br>
                                        <input type="file" name="imageajouter" id="imageadd"><br>
                                        <input type="submit" value="Ajouter"><br><br>
                                    </form>
                    </div>
                             
                    
                  </div>
                                    
                                   
                    
			    </div>
                    
                    

			</div> 

		</body>
</html> 