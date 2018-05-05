 <?php 
 								//IOnitialisation des variables
 	  							$image="";
 								$titre="";
					   			$description_evenement="";
					   			$acces="";
					   			$numero_utilisateur="";
					   			$image="";
					   			$lien="";
					   			$lien2="";
					   			$date="";
					   			$heure="";
					   			$description="";
					   			$sentiment="";
					   			$compteur="";



		// Recuperationn des donnees du formulaire
 		$nom_evenement= isset($_POST["nom_evenement"])?$_POST["nom_evenement"] : ""; 
 		
		$description_evenement = isset($_POST["descriptif_evenement"])?$_POST["descriptif_evenement"] : ""; 
		$lien2= isset($_POST["lien"])?$_POST["lien"] : "";
		$sentiment = isset($_POST["humeur"])?$_POST["humeur"] : "";
		$description = isset($_POST["description"])?$_POST["description"] : "";
		$action = isset($_POST["action"])?$_POST["action"] : "";
		$acces = isset($_POST["statut"])?$_POST["statut"] : "";

		//utimlise les cookies pour identifier l'utilisateur actuel

		if(isset($_COOKIE['numero_utilisateur'])) $numero_utilisateur = $_COOKIE['numero_utilisateur'];
		$date= date("Y-m-d");
	    $heure=date("H:i:s");
	    if(isset($_COOKIE['nom']))
		{
			$nom=$_COOKIE['nom'];
		}
		if(isset($_COOKIE['prenom']))
		{
			$prenom=$_COOKIE['prenom'];
		}

	

						
		//Connexion a la bdd
		$loc="localhost";
		$login="root";
		$password="";
		$database="ecemplois";
		$erreur=1;


		//Connexion a la base de donnee avec les identifiants et le login adéquats
		$conni= new mysqli($loc,$login,$password,$database);
		if($conni->connect_error){
			echo "Erreur la connexion est refusée. ";
			}
    	else{
			echo "vamos";
			}

			// Memees requetes que pour publier mais avec quelques modification pour partager

			$sql = "INSERT INTO evenement (descriptif_evenement,nom_evenement,statut, numero_utilisateur,action, Date, Heure) VALUES ('$description_evenement','$nom_evenement','$acces','$numero_utilisateur','$action','$date','$heure')";

								
									if ($conni->query($sql) === TRUE) 
									{ 
										echo "La requete d'insertion a ete executee" ;
										
									}

									$sql4="SELECT AUTO_INCREMENT as last_id FROM INFORMATION_SCHEMA.TABLES where table_name='evenement'";
									$selection= mysqli_query($conni, $sql4);

									while($data=mysqli_fetch_assoc($selection))
									{
										$numero_evenement=$data["last_id"];
									}

									$numero_evenement=$numero_evenement-1;
									setcookie('numero_evenement',$numero_evenement, 0);
									setcookie('lien',$lien, 0);

								
									
										$description = isset($_POST["description"])?$_POST["description"] : "";
										$sentiment = isset($_POST["humeur"])?$_POST["humeur"] : "";

										

									$current = file_get_contents($lien2);
										if(isset($_COOKIE['numero_utilisateur']))
										{										
											while($erreur == 1)
											{
												$sql2 = "INSERT INTO piece_jointe (lien,Date,Heure,description,sentiment) VALUES ('$lien2','$date','$heure','$description','$sentiment')";

												if ($conni->query($sql2) === TRUE)
												{
													echo "La requete d'insertion2 a ete executee" ;
													
													$file = $lien2;
													file_put_contents($file, $current);
													$erreur = 0 ;
												} 
												else
												{
													$compteur = $compteur+1 ;
													$lien2 = "images/(".$compteur.")"."image.png";
												}
											}
													
										}								
									
									
									
									$sql3 = "INSERT INTO contenir (lien,numero_evenement) VALUES ('$lien2','$numero_evenement')";
									
									if ($conni->query($sql3) === TRUE) 
									{ 
										echo "La requete d'insertion3 a ete executee" ;
										
									}	

									$sql5= "INSERT INTO accessibilite (numero_utilisateur,lien) VALUES ('$numero_utilisateur','$lien2')";

									if ($conni->query($sql5) === TRUE) 
									{ 
										echo "La requete d'insertion5 a ete executee" ;
										
									}

									header('Location: Accueil.php');						

									$conni->close();	


  ?>