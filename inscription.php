<?php
session_start();

if(!isset($_SESSION['user'])){
    header('location: index.php');
    exit();
}

if(isset($_POST['addEmail'], $_POST['addPassword'], $_POST['Valid'])) {
    if(!empty($_POST['addEmail']) && !empty($_POST['addPassword'])){
        $email = htmlspecialchars($_POST['addEmail']);
        $password = htmlspecialchars($_POST['addPassword']);
        // verification size of password
        if(strlen($password) < 6){
            header('location: profil.php?error=passwordSize');
            exit;
        }
        // verification type email
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            // Test if user exist
            $fic = fopen("users.csv", "a+");
            $length = count($fic);
            $exist = false;
            while($tab=fgetcsv($fic,100,','))
            {
                if($email === $tab[0] ){
                    $exist = true;
                }
            }
            if($exist){
                header('location: profil.php?error=userExist');
            } else {
                $user = [$email,sha1($password)];
                $fp = fopen('users.csv', 'a+');
                    fputcsv($fp,$user,',');
                fclose($fp);
                header('location: profil.php?success=true');
            }
        }else{
            header('location: profil.php?error=notMail');
        }
    }else {
        header('location: profil.php?error=vide');
    }
}