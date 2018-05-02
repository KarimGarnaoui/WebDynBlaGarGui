 <?php 
					   				$titre= isset($_POST["titre"])?$_POST["titre"] : ""; 
									$description = isset($_POST["description"])?$_POST["description"] : ""; 
									$acces = isset($_POST["acces"])?$_POST["acces"] : "";
									if(isset($_COOKIE['numero_utilisateur'])) $numero_utilisateur = $_COOKIE['numero_utilisateur'];
									$image=$_FILES['image']['name'];
									$lien="images/".$image;
									$lien2=$_FILES['image']['tmp_name'];

									
									$loc="localhost";
									$login="root";
									$password="";
									$database="ecemplois";


									//Connexion a la base de donnee avec les identifiants et le login adéquats
									$conni= new mysqli($loc,$login,$password,$database);

									if($conni->connect_error){
									echo "Erreur la connexion est refusée. ";
									}
									else{
										echo "vamos";
									}

									

									$sql = "INSERT INTO evenement (numero_evenement,descriptif_evenement,nom_evenement,statut, numero_utilisateur) VALUES ('','$description','$titre','$acces','$numero_utilisateur')";

									if ($conni->query($sql) === TRUE) 
									{ 
										echo "La requete d'insertion a ete executee" ;
										
									}

									if($image!="")
									{
										$date= date("Y-m-d");
										$heure=date("H:i:s");
										$description2 = isset($_POST["description"])?$_POST["description"] : "";
										$sentiment = isset($_POST["humeur"])?$_POST["humeur"] : "";
										

										$sql2 = "INSERT INTO piece_jointe (lien,date,heure,description,sentiment) VALUES ('$lien','$date','$heure','$description2','$sentiment')";
										

										if ($conni->query($sql2) === TRUE) 
									{ 
										echo "La requete d'insertion2 a ete executee" ;
										$current = file_get_contents($lien2);
										$file = "images/".$image;
										file_put_contents($file, $current);
									}

									$sql4="SELECT AUTO_INCREMENT as last_id FROM INFORMATION_SCHEMA.TABLES where table_name='evenement'";
									$selection= mysqli_query($conni, $sql4);

									while($data=mysqli_fetch_assoc($selection))
									{
										$numero_evenement=$data["last_id"];
									}
									
									$numero_evenement=$numero_evenement-1;

									setcookie('numero_evenement',$numero_evenement, 0);
									
									$sql3 = "INSERT INTO contenir (lien,numero_evenement) VALUES ('$lien','$numero_evenement')";
									
									if ($conni->query($sql3) === TRUE) 
									{ 
										echo "La requete d'insertion3 a ete executee" ;
										
									}	
									}	
									header('Location: Accueil.php');						

									$conni->close();	
									?> 
			