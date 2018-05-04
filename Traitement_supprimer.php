 <?php
$numero_evenement = isset($_POST["numero_evenement"])?$_POST["numero_evenement"] : ""; 


									$loc="localhost";
									$login="root";
									$password="";
									$database="ecemplois";
									//$numero_evenement=$numero_evenement-1;


									//Connexion a la base de donnee avec les identifiants et le login adéquats
									$conni= new mysqli($loc,$login,$password,$database);


									if($conni->connect_error){
									echo "Erreur la connexion est refusée. ";
									}
									else{
										echo "vamos";
									}




$sql="DELETE FROM evenement where numero_evenement='$numero_evenement'";



if ($conni->query($sql) === TRUE) 
									{ 
										echo "La requete d'insertion a ete executee" ;
										
									}


									header('Location: Accueil.php');




 ?>