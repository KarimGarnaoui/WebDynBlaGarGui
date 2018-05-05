<?php
	//Recupere ce qu il y a dans le form et sup^p^rime en utilisant ces donnees

	 $connexion = new mysqli( 'localhost' , 'root' , '' , 'ecemplois' ) ;
	 if ($connexion->connect_error) echo "Erreur lors de la connexion à la base de donnée" ; 
	 $numero_recepteur = isset($_POST["numero_recepteur"])?$_POST["numero_recepteur"] : "";

	 $sql = "DELETE FROM utilisateur WHERE numero_utilisateur=$numero_recepteur" ; 
	 echo "SQL : $sql<br>";
	 if($selection = mysqli_query($connexion,$sql) === TRUE) echo "success"; ;

	 header('Location: Accueil.php');
?>