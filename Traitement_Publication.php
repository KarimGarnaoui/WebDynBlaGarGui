 <?php 								
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



					   				$titre= isset($_POST["titre"])?$_POST["titre"] : ""; 
									$description_evenement = isset($_POST["description_evenement"])?$_POST["description_evenement"] : ""; 
									$acces = isset($_POST["acces"])?$_POST["acces"] : "";
									$action = isset($_POST["action"])?$_POST["action"] : "";
									if(isset($_COOKIE['numero_utilisateur'])) $numero_utilisateur = $_COOKIE['numero_utilisateur'];
									$image=$_FILES['image']['name'];
									$lien="images/".$image;
									$lien2=$_FILES['image']['tmp_name'];
									$date= date("Y-m-d");
								    $heure=date("H:i:s");

									
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

									$sql = "INSERT INTO evenement (numero_evenement,descriptif_evenement,nom_evenement,statut, numero_utilisateur,action, date, heure) VALUES ('','$description_evenement','$titre','$acces','$numero_utilisateur','$action','$date','$heure')";

								
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

									if($image!="")
									{
									
										$description = isset($_POST["description"])?$_POST["description"] : "";
										$sentiment = isset($_POST["humeur"])?$_POST["humeur"] : "";



										
										if(isset($_COOKIE['numero_utilisateur']))
										{										
											while($erreur == 1) 
											{
												$sql2 = "INSERT INTO piece_jointe (lien,date,heure,description,sentiment) VALUES ('$lien','$date','$heure','$description','$sentiment')";

												if ($conni->query($sql2) === TRUE)
												{
													echo "La requete d'insertion2 a ete executee" ;
													$current = file_get_contents($lien2);
													$file = $lien;
													file_put_contents($file, $current);
													$erreur = 0 ;
												} 
												else
												{
													$compteur = $compteur+1 ;
													$lien = "images/(".$compteur.")".$_FILES['image']['name'];
													echo "<br>Nom image : $lien";
												}
											}
													
										}
																		
									
									
									
									$sql3 = "INSERT INTO contenir (lien,numero_evenement) VALUES ('$lien','$numero_evenement')";
									
									if ($conni->query($sql3) === TRUE) 
									{ 
										echo "La requete d'insertion3 a ete executee" ;
										
									}	

									$sql5= "INSERT INTO accessibilite (numero_utilisateur,lien,pdp) VALUES ('$numero_utilisateur','$lien','')";

									if ($conni->query($sql5) === TRUE) 
									{ 
										echo "La requete d'insertion5 a ete executee" ;
										
									}	

									}





									header('Location: Accueil.php');						

									$conni->close();	
									?> 