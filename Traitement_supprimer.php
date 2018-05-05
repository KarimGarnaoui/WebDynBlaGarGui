 <?php
$numero_evenement = isset($_POST["numero_evenement"])?$_POST["numero_evenement"] : ""; 

									
									//connexion a la bdd
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


//suprrime un evenement si on l'a demande dans le form de acceil.php

$sql="DELETE FROM evenement where numero_evenement='$numero_evenement'";



if ($conni->query($sql) === TRUE) 
									{ 
										echo "La requete d'insertion a ete executee" ;
										
									}

									//appel de Accueil.php
									header('Location: Accueil.php');




 ?>