<?php
	$connexion= new mysqli('localhost','root','','ecemplois') ;
	if($connexion->connect_error) echo "Erreur la connexion est refusée. " ;

	$profession = isset($_POST["profession"])?$_POST["profession"] : ""; 
	$diplome = isset($_POST["diplome"])?$_POST["diplome"] : ""; 
	$description = isset($_POST["description"])?$_POST["description"] : ""; 

	$sql = "INSERT INTO emplois (profession,diplome,description) VALUES ('$profession','$diplome','$description')" ; 

	if($connexion->query($sql)===true)echo "success";

	header('Location: Emplois.php');						
	$connexion->close();

?>