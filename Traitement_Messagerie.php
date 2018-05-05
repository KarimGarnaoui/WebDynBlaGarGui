<?php
	 $msg = isset($_POST["msg"])?$_POST["msg"] : ""; 
	 $user_2 = isset($_POST["destinataire"])?$_POST["destinataire"] : ""; 
	 $date = date("Y-m-d H:i:s") ; 
	 if(isset($_COOKIE['numero_utilisateur'])) $user_1 = $_COOKIE['numero_utilisateur'];
	 
	 setcookie('destinataire',$user_2,0);
	 $Connexion = new mysqli( 'localhost' , 'root' , '' , 'ecemplois' ) ;
	 if ($Connexion->connect_error) echo "Erreur lors de la connexion à la base de donnée" ; 
	 if($msg != ""){
	 	$sql = "INSERT INTO message (user_1,user_2,auteur,message,date) VALUES ('$user_1', '$user_2', '$user_1', '$msg', '$date')" ;
	 	$Connexion->query($sql) ; 
	 }
	 

	 echo " Emetteur : $user_1 <br> Destinataire : $user_2 <br> Message : $msg <br> Date : $date <br> Heure : $heure" ; 
	 header('Location: Messagerie.php');
?>