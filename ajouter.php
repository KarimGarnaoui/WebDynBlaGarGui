<?php

$loc="localhost";
$login="root";
$password="";
$database="ecemplois";

$connexion= new mysqli($loc,$login,$password,$database);
$db_handle = mysqli_connect($loc, $login, $password); 
$db_found = mysqli_select_db($db_handle, $database);

$numero_user = $_COOKIE['numero_utilisateur'];

$image=$_FILES['imageajouter']['name'];
$link="images/".$image;
$link2=$_FILES['imageajouter']['tmp_name'];

//première requete qui permet d'insérer l'image choisie dans la table piece_jointe de la bdd
$sql="INSERT INTO piece_jointe (lien) VALUES ('$link')"; 
echo "<br> SQL  : $sql";

if(mysqli_query($db_handle, $sql)){
  echo "$link" ;
  echo "$numero_user";
   
    
$current = file_get_contents($link2);
$file = "images/".$image;
file_put_contents($file, $current);
    

}

else {
    echo"error";
     }
//deuxième requete qui permet d'insérer l'image choisie dans la table accessibilite de la bdd
$sql2="INSERT INTO accessibilite (numero_utilisateur,lien) VALUES ('$numero_user','$link')";
echo "<br> SQL 2 : $sql2";

if(mysqli_query($db_handle, $sql2)){
   
}
else{
    echo "nop";
}

 header('Location: Photos.php');

?>