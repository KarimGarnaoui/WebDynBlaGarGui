<?php 
              
$nomalbum=isset($_POST["nomalbum"])? $_POST["nomalbum"] : "";
$numero_user = $_COOKIE['numero_utilisateur'];
$albumAdd='albums/'.$numero_user.'/'.$nomalbum;
echo "$albumAdd";
        $dossier = $albumAdd;
        if(!is_dir($dossier)){
        mkdir($dossier);
        }

header('Location: Photos.php');

?>