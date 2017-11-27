<?php
session_start();

if(isset($_POST['email'], $_POST['mdp'], $_POST['Valid'])  ) {
    if(!empty($_POST['email']) && !empty($_POST['mdp']) ){
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['mdp']);
        // verification type email
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            // Test if user exist
            $fic = fopen("users.csv", "a+");
            $length = count($fic);
            $status = 'deconnecte';
            while($tab=fgetcsv($fic,100,','))
            {
                if($email === $tab[0] && sha1($password) === $tab[1]){
                    $_SESSION['user'] = $email;
                    header('location: profil.php');
                    $status = 'connecte';
                }
            }
            if($status === 'deconnecte'){
                header('location: index.php?error=notFound');
            }
        }else{
            header('location: index.php?error=notMail');
        }
    }else {
        header('location: index.php?error=vide');
    }
}