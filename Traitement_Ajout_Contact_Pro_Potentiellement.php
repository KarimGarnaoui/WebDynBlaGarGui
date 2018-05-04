<?php
	
	 $connexion = new mysqli( 'localhost' , 'root' , '' , 'ecemplois' ) ;
	 if ($connexion->connect_error) echo "Erreur lors de la connexion à la base de donnée" ; 
	 $numero_recepteur = isset($_POST["numero_recepteur"])?$_POST["numero_recepteur"] : "";
	 if(isset($_COOKIE['numero_utilisateur'])) $numero_utilisateur = $_COOKIE['numero_utilisateur'] ; 

	 $sql = "INSERT INTO notification (description,numero_emetteur,numero_recepteur) VALUES ('Demande de contact pro','$numero_utilisateur','$numero_recepteur')" ; 
	 echo "SQL : $sql<br>";
	 if($selection = mysqli_query($connexion,$sql) === TRUE) echo "success"; ;

	 header('Location: Accueil.php');
?>