<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location: index.php');
    exit();
}

/* Gestion de la suppression de l'utilisateur
// get id to delete
$id = $_GET['id'];
$tab = array();

//ouverture du fichier
$file = fopen('users.csv','r');
if($file){
    while(!feof($file)){
        array_push($tab, fgets($file));
    }
    fclose($file);
}

//var_dump($tab[1]);die;
//toutes les lignes de notre fichier sont stockées dans le tableau tab...
$fic = fopen('users.csv', 'w');
if($fic){
//on efface l'intégralité du fichier
    while(!feof($fic)){
        fputs('');
    }
    fclose($fic);
    $fic = fopen('users.csv', 'a+');
//finalement on recopie toutes les données sans la ligne à supprimer
    $nb = count($tab);
    $del = $id;
    for($i=0;$i<$tab;$i++){
        $fic = fputcsv($fic,$tab[$i]);
    }
    fclose($fic);
}
?>
*/