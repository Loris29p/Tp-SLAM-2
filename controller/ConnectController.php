<?php
    session_start();
    include_once("../controller/Init.php");

    if (isset($_POST['email']) && isset($_POST['password']))
    { 
        if (strlen($_POST['email']) > 5 AND strlen($_POST['password']) > 1)
        {
            $connectSQL = 'SELECT id, name, lastname, email, password, id_role FROM users WHERE email=:email';
            $connectRep = $bdd -> prepare($connectSQL);
            $connectResult = $connectRep -> execute(array(
                ':email' => $_POST['email']
            ));
            $connectData = $connectRep -> fetch();

            if ($connectData)
            {
                $IsPasswordValid = password_verify($_POST['password'], $connectData['password']);

                if ($IsPasswordValid)
                {
                    $_SESSION['email'] = $connectData['email'];
                    $_SESSION['id'] = $connectData['id'];
                    $_SESSION['name'] = $connectData['name'];
                    $_SESSION['lastname'] = $connectData['lastname'];
                    $_SESSION['id_role'] = $connectData['id_role'];
                }
                else 
                {
                    ReturnInfo("Vous n\'avez pas renseigner le bon mot de passe !");
                    include('../vue/ConnectForm.php');
                }
            }
            else 
            {
                ReturnInfo("Votre email n'est pas enregistrer.");
                include('../vue/RegisterForm.php');
            }
        }
        else 
        {
            ReturnInfo("Vous n\'avez pas renseigner toutes les informations.");
            include('../vue/ConnectForm.php');
        }
    }
    else {
        ReturnInfo("Vous n\'avez pas renseigner toutes les informations.");
        include('../vue/ConnectForm.php');
    }
?>