<?php
    include_once("../controller/Init.php");

    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['lastname']) && isset($_POST['name']))
    { 
        if (strlen($_POST['email']) > 5 && strlen($_POST['password']) > 1 && strlen($_POST['lastname']) > 1 && strlen($_POST['name']) > 1)
        {
            $existSQL = 'SELECT email FROM users WHERE email=:email';
            $existRep = $bdd -> prepare($existSQL);
            $existResult = $existRep -> execute(array(
                ':email' => $_POST['email']
            ));
            $existData = $existRep -> fetch();
    
            if (!$existData)
            {
                $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
                $registerSQL = 'INSERT INTO `users`(`name`, `lastname`, `password`, `email`) VALUES (:name, :lastname, :password, :email)';
                $stmt = $bdd -> prepare($registerSQL);
                $resultat = $stmt->execute(array(
                    ':email' => $_POST['email'],
                    ':password' => $pass_hash, 
                    ':name' => $_POST['name'], 
                    ':lastname' => $_POST['lastname']
                ));
            }
            else 
            {
                ReturnInfo("Un compte existe déjà avec le mail: " . $_POST['email']);
                include('../vue/ConnectForm.php');
            }
        }
        else 
        {
            ReturnInfo("Vous n\'avez pas renseigner toutes les informations.");
            include('../vue/RegisterForm.php');
        }
    }
    else 
    {  
        ReturnInfo("Vous n\'avez pas renseigner toutes les informations.");
        include('../vue/RegisterForm.php');
    }

?>