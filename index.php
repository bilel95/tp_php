<?php
session_start();
if(isset($_SESSION['user'])){
    header('location: profil.php');
    exit();
}
?>
<form method="POST" action="connexion.php">
    <label for="email">Email:
        <input type="email" name="email" id="email" >
    </label>
    <label for="mdp"> Mot de passe:
        <input type="password" name="mdp" id="mdp" >
    </label>
    <input type="submit" name="Valid" value="Envoyer">
</form>

<?php

// Display errors
if (isset($_GET['error']))
{
    switch ($_GET['error'])
    {
        case 'vide':
            echo 'Veuillez renseigner tous les champs!';
            break;
        case 'notMail':
            echo 'Adresse mail invalide !';
            break;
        case 'notFound':
            echo 'Utilisateur ou mot de passe inconnu';
    }
}
?>