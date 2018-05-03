<?php 

	$connexion= new mysqli('localhost','root','','ecemplois') ;
	if($connexion->connect_error) echo "Erreur la connexion est refusée. " ;

	$nom_image = "images/".$_FILES['image']['name'];
	$tempo = $_FILES['image']['tmp_name'];
	$date= date("Y-m-d");
	$heure=date("H:i:s");
	echo "Image : $nom_image<br>";
	echo "Tmp : $tempo<br>";
	echo "Date : $date<br>";
	echo "Heure : $heure";
	
	if(isset($_COOKIE['numero_utilisateur'])) $numero_utilisateur = $_COOKIE['numero_utilisateur'];
	$compteur = 0 ; 
	$erreur = 1 ; 

	

	if(isset($_COOKIE['numero_utilisateur']))
	{
		

		

		while($erreur == 1) 
		{
			$sql = "INSERT INTO piece_jointe (lien,date,heure) VALUES ('$nom_image','$date','$heure')" ;
			if ($connexion->query($sql) === TRUE)
			{
				copy($tempo, $nom_image);
				$sql = "UPDATE accessibilite SET pdp = 0 WHERE (numero_utilisateur=$numero_utilisateur AND pdp = 1)" ; 
				$connexion->query($sql) === TRUE;

				$sql = "INSERT INTO accessibilite (numero_utilisateur,lien,pdp) VALUES ('$numero_utilisateur','$nom_image',1)" ; 
				$connexion->query($sql) === TRUE;
				$erreur = 0 ;
			} 
			else
			{
				$compteur = $compteur+1 ;
				$nom_image = "images/(".$compteur.")".$_FILES['image']['name'];
				echo "<br>Nom image : $nom_image";
			}
		}
		

		
	}

	
	header('Location: Profil.php');						
	$connexion->close();
?>