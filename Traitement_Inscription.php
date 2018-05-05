<?php
	$prenom = isset($_POST["Prenom"])?$_POST["Prenom"] : ""; 
	$nom = isset($_POST["Nom"])?$_POST["Nom"] : ""; 
	$mail = isset($_POST["Mail"])?$_POST["Mail"] : ""; 
	$diplome = isset($_POST["Diplome"])?$_POST["Diplome"] : ""; 
	$pseudo = isset($_POST["Pseudo"])?$_POST["Pseudo"] : ""; 
	$tel = isset($_POST["Tel"])?$_POST["Tel"] : ""; 


	$loc="localhost";
	$login="root";
	$password="";
	$database="ecemplois";


	//Connexion a la base de donnee avec les identifiants et le login adéquats
	$conni= new mysqli($loc,$login,$password,$database);

	$erreur = "";
	$connexion =false;

	//verification que les champs ne sont pas vides

	if($prenom == ""){

		$erreur .= "Le champ login employe est vide. <br>";
	}

	if($nom == ""){

		$erreur .= "Le champ pseudo d'identification est vide. <br>";
	}

if($mail == ""){

		$erreur .= "Le champ pseudo d'identification est vide. <br>";
	}
	if($diplome == ""){

		$erreur .= "Le champ pseudo d'identification est vide. <br>";
	}
	if($pseudo == ""){

		$erreur .= "Le champ pseudo d'identification est vide. <br>";
	}
	if($tel == ""){

		$erreur .= "Le champ pseudo d'identification est vide. <br>";
	}

	if($erreur == ""){

		echo "Formulaire valide <br>"; 
	}

	else {

		echo "Erreur: <br> $erreur <br>"; 
	}

//verification que lma connexion a la bdd est fonctionnelle
if($conni->connect_error){
		echo "Erreur la connexion est refusée. ";
		}
		else{
			echo "Vamos. ";
		}

		//creation d'un utilisateur dans la bdd 

	$sql = "INSERT INTO utilisateur (nom,prenom,email,pseudo, diplome,tel) VALUES ('$nom','$prenom','$mail','$pseudo', '$diplome','$tel')";
	echo "<br> SQL : $sql";
	
	if ($conni->query($sql) === TRUE) 
		{ 
			echo "La requete d'insertion d'un employe a ete executee" ; 
			header('Location: Connexion.html');

		}
		$conni->close();	

?>