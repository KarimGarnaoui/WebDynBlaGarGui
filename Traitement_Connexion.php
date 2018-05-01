<?php
	$login = isset($_POST["Login"])?$_POST["Login"] : ""; 
	$pseudo = isset($_POST["pseudo"])?$_POST["pseudo"] : ""; 

	$database = "ecemplois";
 	$db_handle = mysqli_connect('localhost', 'root',''); 
	$db_found = mysqli_select_db($db_handle, $database);


	$erreur = "";
	$connexion =false;

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



if($db_found){
	$sql1 = "SELECT email, pseudo FROM utilisateur";
	//$sql2= "SELECT pseudo FROM utilisateur";

	$selection= mysqli_query($db_handle, $sql1);
	//$pseudoregi = mysqli_query($db_handle, $sql2);

	$log=array();

	while($data=mysqli_fetch_assoc($selection)){
			$log[$data['email']] =$data['pseudo'];
		}

	$sql = "SELECT * FROM utilisateur where (email='$login' AND pseudo = '$pseudo')" ;
	$selection= mysqli_query($db_handle, $sql);
	while($donnees=mysqli_fetch_assoc($selection)){
			setcookie('prenom',$donnees['prenom'], 0);
			setcookie('nom',$donnees['nom'], 0);
			setcookie('email',$donnees['email'], 0);
			setcookie('numero_utilisateur',$donnees['numero_utilisateur'], 0);
			setcookie('tel',$donnees['tel'], 0);
			setcookie('statut',$donnees['statut'], 0);
			setcookie('diplome',$donnees['diplome'], 0);
			setcookie('nbr_amis',$donnees['nbr_amis'], 0);
			setcookie('pseudo',$donnees['pseudo'], 0);
		}

		


//$log = array($emailregi=> $pseudoregi);
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