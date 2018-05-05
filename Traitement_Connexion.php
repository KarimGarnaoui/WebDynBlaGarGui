<?php

	//Recuperation du login, et pseudo rentré
	$login = isset($_POST["Login"])?$_POST["Login"] : ""; 
	$pseudo = isset($_POST["pseudo"])?$_POST["pseudo"] : ""; 

	//Conexion a la bdd
	$database = "ecemplois";
 	$db_handle = mysqli_connect('localhost', 'root',''); 
	$db_found = mysqli_select_db($db_handle, $database);

	//initialisation des variables
	$erreur = "";
	$connexion =false;

	//Verification que le formùulaire est fonctionnel: aucun champs vides

	if($login == ""){

		$erreur .= "Le champ login employe est vide. <br>";
	}

	if($pseudo == ""){

		$erreur .= "Le champ pseudo d'identification est vide. <br>";
	}
	if($erreur == ""){

		echo "Formulaire valide <br>"; 
	}

	else {

		echo "Erreur: <br> $erreur <br>"; 
	}


//Si la bdd est trouvee
if($db_found){


	//Remplir un array de tous les pseudo et email des inscrits
	$sql1 = "SELECT email, pseudo FROM utilisateur";
	
	$selection= mysqli_query($db_handle, $sql1);
	
	$log=array();

	while($data=mysqli_fetch_assoc($selection)){
			$log[$data['email']] =$data['pseudo'];
		}

	$sql = "SELECT * FROM utilisateur where (email='$login' AND pseudo = '$pseudo')" ;
	$selection= mysqli_query($db_handle, $sql);
	$donnees=mysqli_fetch_assoc($selection);
	setcookie('prenom',$donnees['prenom'], 0);
	setcookie('nom',$donnees['nom'], 0);
	setcookie('email',$donnees['email'], 0);
	$num_user = $donnees['numero_utilisateur'] ; 
	setcookie('numero_utilisateur',$donnees['numero_utilisateur'], 0);
	setcookie('tel',$donnees['tel'], 0);
	setcookie('statut',$donnees['statut'], 0);
	setcookie('diplome',$donnees['diplome'], 0);
	setcookie('nbr_amis',$donnees['nbr_amis'], 0);
	setcookie('pseudo',$donnees['pseudo'], 0);
		

	
	$sql = "SELECT * FROM accessibilite where (numero_utilisateur='$num_user' AND pdp = '1')" ;
	$selection= mysqli_query($db_handle, $sql);	
	$donnees=mysqli_fetch_assoc($selection);
	echo"".$donnees['lien'] ; 
	setcookie('pdp',$donnees['lien'], 0);

		


///Verifie si ils sont dans la bdd
	for($i=0;$i<count($log);$i++)
	{
		if( $log[$login]==$pseudo)
		{
			$connexion=true;

		}

		else {
			$connexion=false; 
		}
		      
	}

	if($connexion)
	{
		header('Location: Accueil.php');
		echo"Connexion acceptee<br>";
		
	}

	else {
		echo"Connexion refusee <br>";
	}
}

else{
	echo"Database not found <br>";
}





	

?>