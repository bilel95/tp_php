<?php
session_start();

if(!isset($_SESSION['user'])){
    header('location: index.php');
    exit();
}
if($_GET['success'] == 'true'){
    echo 'l\'utilisateur a été ajouté avec succès ';
}
echo 'Bonjour'.$_SESSION['user'].'<br>';
echo 'Liste des utilisateurs <br>';
$fic = fopen("users.csv", "a+");
$line = 0;
while($tab=fgetcsv($fic,1024,','))
{
    echo $tab[0] .'  <a href="delete.php?id='.$line.'">Supprimer</a><br />';
    $line++;
}
fclose($fic);
?>
<a href="logout.php">Déconnexion</a>

<form method="POST" action="inscription.php">
    <h1>Ajouter un utilisateur</h1>
    <label for="addEmail">Email:
        <input type="addEmail" name="addEmail" id="addEmail" >
    </label>
    <label for="addPassword"> Mot de passe:
        <input type="password" name="addPassword" id="addPassword" >
    </label>
    <input type="submit" name="Valid" value="Envoyer">
</form>

<?php

if (isset($_GET['error']))
{
    switch ($_GET['error'])
    {
        case 'userExist':
            echo 'L\'utilisateur existe déjà!';
            break;
        case 'vide':
            echo 'Veuillez renseigner tous les champs!';
            break;
        case 'notMail':
            echo 'Adresse mail invalide !';
        case 'passwordSize':
            echo 'Mot de passe trop court';
    }
}
?>

