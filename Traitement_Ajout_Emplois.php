<?php
	$connexion= new mysqli('localhost','root','','ecemplois') ;
	if($connexion->connect_error) echo "Erreur la connexion est refusée. " ;

	$profession = isset($_POST["profession"])?$_POST["profession"] : ""; 
	$diplome = isset($_POST["diplome"])?$_POST["diplome"] : ""; 
	$description = isset($_POST["description"])?$_POST["description"] : ""; 

	$sql = "INSERT INTO emplois (profession,diplome,description) VALUES ('$profession','$diplome','$description')" ; 
	echo "SQL : $sql";
	if($connexion->query($sql)===true)echo "success";


	if(isset($_COOKIE['numero_utilisateur'])) $numero_utilisateur = $_COOKIE['numero_utilisateur'];



    $sql6="SELECT etrecontactpro.numero_utilisateur2 FROM utilisateur join etrecontactpro on utilisateur.numero_utilisateur=etrecontactpro.numero_utilisateur1 where utilisateur.numero_utilisateur='$numero_utilisateur'";

									$selection6= mysqli_query($connexion, $sql6);

									while($data6=mysqli_fetch_assoc($selection6))
									{
										$numero_recepteur1=$data6["numero_utilisateur2"];

										$sql7= "INSERT INTO notification (numero_emetteur,numero_recepteur,description) VALUES ('$numero_utilisateur','$numero_recepteur1','Ajout d emplois')";

									if ($connexion->query($sql7) === TRUE) 
									{ 
										echo "La requete d'insertion7 a ete executee" ;
										
									}	
								}



	$sql8="SELECT etrecontactpro.numero_utilisateur1 FROM utilisateur join etrecontactpro on utilisateur.numero_utilisateur=etrecontactpro.numero_utilisateur2 where utilisateur.numero_utilisateur='$numero_utilisateur'";

									$selection8= mysqli_query($connexion, $sql8);

									while($data8=mysqli_fetch_assoc($selection8))
									{
										$numero_recepteur2=$data8["numero_utilisateur1"];

										$sql9= "INSERT INTO notification (numero_emetteur,numero_recepteur,description) VALUES ('$numero_utilisateur','$numero_recepteur2','Ajout d emplois')";

									if ($connexion->query($sql9) === TRUE) 
									{ 
										echo "La requete d'insertion9 a ete executee" ;
										
									}	

		
								}


	header('Location: Emplois.php');						
	$connexion->close();

?>