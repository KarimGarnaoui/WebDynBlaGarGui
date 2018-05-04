<?php
	
	 $connexion = new mysqli( 'localhost' , 'root' , '' , 'ecemplois' ) ;
	 if ($connexion->connect_error) echo "Erreur lors de la connexion à la base de donnée" ; 

	 $numero_utilisateur = isset($_POST["numero_utilisateur"])?$_POST["numero_utilisateur"] : "";
	 $prenom = isset($_POST["prenom"])?$_POST["prenom"] : "";
	 $nom = isset($_POST["nom"])?$_POST["nom"] : "";
	 $email = isset($_POST["email"])?$_POST["email"] : "";
	 $pseudo = isset($_POST["pseudo"])?$_POST["pseudo"] : "";
	 $tel = isset($_POST["tel"])?$_POST["tel"] : "";
	 $statut = isset($_POST["statut"])?$_POST["statut"] : "";
	 $diplome = isset($_POST["diplome"])?$_POST["diplome"] : "";

	 $sql = "INSERT INTO utilisateur (prenom,nom,tel,email,pseudo,statut,diplome) VALUES ('$prenom','$nom','$tel','$email','$pseudo','$statut','$diplome')" ; 
	 echo "SQL : $sql<br>";
	 if($selection = mysqli_query($connexion,$sql) === TRUE) echo "success"; ;

	 //header('Location: Accueil.php');
?>