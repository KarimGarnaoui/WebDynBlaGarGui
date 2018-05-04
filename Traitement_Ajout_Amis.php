<?php
	
	 $connexion = new mysqli( 'localhost' , 'root' , '' , 'ecemplois' ) ;
	 if ($connexion->connect_error) echo "Erreur lors de la connexion à la base de donnée" ; 

	 $reponse = isset($_POST["choix"])?$_POST["choix"] : "";
	 $numero_emetteur = isset($_POST["numero_emetteur"])?$_POST["numero_emetteur"] : "";

	 if(isset($_COOKIE['numero_utilisateur'])) $numero_utilisateur = $_COOKIE['numero_utilisateur'] ; 
	 echo "<br>Réponse : $reponse";
	 echo "<br>Emetteur : $numero_emetteur";
	 if($reponse=='Accepter'){

	 	$sql = "INSERT INTO etreamis (numero_utilisateur1,numero_utilisateur2) VALUES ('$numero_utilisateur','$numero_emetteur')" ;
	 	echo "<br> SQL : $sql"; 
		if($selection = mysqli_query($connexion,$sql) === TRUE) echo "success"; 
		}
		$sql = "DELETE FROM notification WHERE ((description='Demande d amis') AND (numero_emetteur='$numero_emetteur') AND (numero_recepteur='$numero_utilisateur'))" ; 
		echo "<br> SQL : $sql"; 
		if($selection = mysqli_query($connexion,$sql) === TRUE) echo "success"; 
	 

	 

	 header('Location: Accueil.php');
?>