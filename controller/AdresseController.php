<?php
    include_once("../controller/Init.php");

    if (isset($_POST['number']) && isset($_POST['name']) && isset($_POST['city']) && isset($_POST['cp']))
    { 
        if (strlen($_POST['number']) > 1 && strlen($_POST['name']) > 1 && strlen($_POST['city']) > 1 && strlen($_POST['cp']) > 4)
        {
            $adresseExistSQL = 'SELECT num_street, name_street FROM adresses WHERE name_street=:name_street AND num_street=:num_street';
            $adresseExistRep = $bdd -> prepare($adresseExistSQL);
            $adresseExistResult = $adresseExistRep -> execute(array(
                ':num_street' => $_POST['number'],
                ':name_street' => $_POST['name']
            ));
            $adresseExistData = $adresseExistRep -> fetch();

            if (!$adresseExistData)
            {
                $adresseSQL = 'INSERT INTO `adresses`(`num_street`, `name_street`, `city`, `cp`) VALUES (:num_street, :name_street, :city, :cp)';
                $adresseInsert = $bdd -> prepare($adresseSQL);
                $result = $adresseInsert -> execute(array(
                    ':num_street' => $_POST['number'],
                    ':name_street' => $_POST['name'],
                    ':city' => $_POST['city'],
                    ':cp' => $_POST['cp']
                ));

                echo "Vous venez d'enregistrer l'adresse: " . $_POST['number'] . " " . $_POST['name'] . " à " . $_POST['city'] . " (" . $_POST['cp'] . ")";
                ReturnInfo("Vous venez d'enregistrer l'adresse: " . $_POST['number'] . " " . $_POST['name'] . " à " . $_POST['city'] . " (" . $_POST['cp'] . ")");
                include('../vue/AdresseForm.php');
            }
            else 
            {
                ReturnInfo("Une adresse existe déjà avec le nom: " . $_POST['number'] . " " . $_POST['name']);
                include('../vue/AdresseForm.php');
            }
        }
        else 
        {
            ReturnInfo("Une adresse existe déjà avec le nom: " . $_POST['number'] . " " . $_POST['name']);
            include('../vue/AdresseForm.php');
        }
    }
    else 
    {  
        ReturnInfo("Une adresse existe déjà avec le nom: " . $_POST['number'] . " " . $_POST['name']);
        include('../vue/AdresseForm.php');
    }

?>