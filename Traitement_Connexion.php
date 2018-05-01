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
		echo"Connexion acceptee<br>";
		header('Location: Accueil.html');
	}

	else {
		echo"Connexion refusee <br>";
	}
}

else{
	echo"Database not found <br>";
}





	

?>