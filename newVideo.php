<?php 
              
$résultat="";

$video=$_FILES['a']['name'];

$numero_user = $_COOKIE['numero_utilisateur'];

$videoAdd='videos/'.$numero_user.'/'.$video;
echo"$videoAdd";

$extensions_valides = array('mp4');

$extension_upload = strtolower(  substr(  strrchr($_FILES['a']['name'], '.')  ,1)  );

///source: openclassroom
if (in_array($extension_upload,$extensions_valides)) {
    
    $resultat = move_uploaded_file($_FILES['a']['tmp_name'],$videoAdd);
}


header('Location: Videos.php');

?>