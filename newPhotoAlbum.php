<?php 
              
$résultat="";

$nomalbum=isset($_POST["nomalbum"])? $_POST["nomalbum"] : "";
$image=$_FILES['imageajouter']['name'];

$numero_user = $_COOKIE['numero_utilisateur'];

$albumphotoAdd='albums/'.$numero_user.'/'.$nomalbum.'/'.$image;
echo"$albumphotoAdd";


$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

$extension_upload = strtolower(  substr(  strrchr($_FILES['imageajouter']['name'], '.')  ,1)  );

///source: openclassroom
if (in_array($extension_upload,$extensions_valides)) {
    
    $resultat = move_uploaded_file($_FILES['imageajouter']['tmp_name'],$albumphotoAdd);
}


header('Location: Photos.php');

?>