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

$sql="INSERT INTO piece_jointe (lien, descripion, sentiment, date, heure) VALUES ('$link', '', '', '', '')"; 

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

$sql2="INSERT INTO accessibilite (numero_utilisateur,lien, pdp) VALUES ('$numero_user','$link','')";

if(mysqli_query($db_handle, $sql2)){
    echo "yh";
}
else{
    echo "nop";
}

 header('Location: Photos.php');

?>