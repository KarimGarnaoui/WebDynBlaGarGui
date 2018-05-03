<?php 

	$connexion= new mysqli('localhost','root','','ecemplois') ;
	if($connexion->connect_error) echo "Erreur la connexion est refusée. " ;

	$prenom = isset($_POST["prenom"])?$_POST["prenom"] : ""; 
	$nom = isset($_POST["nom"])?$_POST["nom"] : ""; 
	$email = isset($_POST["email"])?$_POST["email"] : ""; 
	$diplome = isset($_POST["diplome"])?$_POST["diplome"] : ""; 
	$tel = isset($_POST["tel"])?$_POST["tel"] : ""; 

	setcookie('prenom',$prenom, 0);
	setcookie('nom',$nom, 0);
	setcookie('email',$email, 0);
	setcookie('diplome',$diplome, 0);
	setcookie('tel',$tel, 0);
	
	if(isset($_COOKIE['numero_utilisateur'])) $numero_utilisateur = $_COOKIE['numero_utilisateur'];
	

	echo"prenom : $prenom <br>nom : $nom<br>email : $email<br>diplome : $diplome<br>tel : $tel" ;
	echo "<br>Requete SQL : UPDATE utilisateur 
			SET 
				nom = '$nom' ,
				prenom = '$prenom' ,
				tel = '$tel' ,
				diplome = '$diplome' ,
				email = '$email' 
			WHERE (numero_utilisateur=$numero_utilisateur)"; 

	$sql = "UPDATE utilisateur 
			SET 
				nom = '$nom' ,
				prenom = '$prenom' ,
				tel = '$tel' ,
				diplome = '$diplome' ,
				email = '$email' 
			WHERE (numero_utilisateur=$numero_utilisateur)" ; 

	if($connexion->query($sql)===true)echo "success";

			

	
	header('Location: Profil.php');						
	$connexion->close();
?>