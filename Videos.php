<!DOCTYPE html>
	<html lang="en">
		<head>
			 <title>Accueil</title>
			 <meta charset="utf-8">
             <meta name="viewport" content="width=device-width, initial-scale=1">
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
			     
			      h4 
                    {
                        font-weight: bold;
                    }
                 
                  [id*="videosource"]
                   {
                       
                       float: left;
                       margin: 10px;
                       width: 40%;
                       border: 1px black solid;
				       border-radius: 5px ;
                       padding-top: 5px;
                   }
                 
                 [id*="vid"]
                 {
                  text-align: left;
                  margin:10px;  
                   
                 }
                 
                 [id*="ajouterunevideo"]
                 {
                     text-align: center;
                     align-items: center;
                 }
                 
                 [id*="videoadd"]
                 {
                     margin-left: 40%;
                     
                 }
                
					
    		</style>
			 
		</head>
		<body>
            
            <?php 
            $numero_utilisateur = $_COOKIE['numero_utilisateur'];
            $videoUserAdd='videos/'.$numero_utilisateur.'/';
            $dossierUser = $videoUserAdd;
            if(!is_dir($dossierUser))
            {
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
              <li><a href="MesAmis.php">Mes Amis <span class="glyphicon glyphicon-user"></span></a></li>
					  	<li><a href="Notifications.php">Notifications <span class="glyphicon glyphicon-exclamation-sign"></span> </a></li>
					  	<li><a href="Emplois.php">Emplois <span class="glyphicon glyphicon-briefcase"></span></a></li>
					  	<li><a href="Photos.php">Photos <span class="glyphicon glyphicon-picture"></span></a></li>
                        <li class="active"><a href="Videos.php">Vidéos <span class="glyphicon glyphicon-film"></span></a></li>
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

			    
			    <!-- Affichage des videos  -->
                
                
                <div class="container" id="vid">
                    
                    <h2>Vos Vidéos</h2><br><br><br><br><br><br><br>
            
                
                    
               </div>  
                
                <?php
                                        //parcours tous les fichiers et affiche les videos dans un div propre à chacune avec le nom de la video en titre 
                                        $numero_user2 = $_COOKIE['numero_utilisateur'];
                                        $iterator = new DirectoryIterator('videos/');
                                        $document = "";   
                                        $document2 = "";
                                        $document3 = "";
                                        $nomfichier = "";
                                        $nomfichier2 = ""; 
                                        $nomfichier3="";
                                        $nomIMG = "";
                                        $nomimageF = "";
                                        $chaine = "";
                                        
                                        
                        
                                        
                                             foreach($iterator as $document)
                                             {
                                              
                                             $nomfichier = $document->getFilename();
                                                   
                                            if($document==$numero_user2){     
                                            if(!$document->isDot()){
                                                
                                              
                                                
                                              $nomIMG = 'videos/' . $numero_user2 . "/"; 
                                              $iterator2 = new DirectoryIterator($nomIMG);
                                                
                                              foreach($iterator2 as $document2 )
                                              {
                                             
                                              $nomfichier2 = $document2->getFilename();
                                                
                                                  
                                              if(!$document2->isDot()){
                                                    echo"<div class='container' id='videosource'>";
                                                  
                                                  $nomimage = $nomIMG . $nomfichier2;
                                                  $chaine = $nomfichier2;
                                                  
                                                  ///source: https://openclassrooms.com/forum/sujet/suppression-d-un-bout-d-une-chaine-de-caractere-15783
                                                  $chaine=strstr($chaine , '.mp4', true);  
                                                  
                                                        echo"<p style='font-size:25px; text-decoration: underline; text-align: center'>$chaine</p>";          
                                                        echo"<div class='embed-responsive embed-responsive-16by9'>";
                                                        echo"<video controls>";
                                                        echo"<source src=$nomimage type='video/mp4'>";    
                                                        echo"</video>";
                                                        echo"</div>";
                                                        echo"</div>";        
                                                  
                                                  
                                                    }     
                                                }
                                            }
                                        }
                                    } 
   
                                    ?>
                </div>
                      <!--explorateur de fichier qui permet de choisir la video à upload-->
                        <div class="container" id="ajouterunevideo">
                                    <br>Ajouter une vidéo: <br>
                                    <form action="newVideo.php" method="post" enctype="multipart/form-data">
                                        <input type="file" name="a" id="videoadd"><br>
                                        <input type="submit" value="Ajouter"><br><br>
                                    </form>
                        </div>
			 

		</body>
</html> 