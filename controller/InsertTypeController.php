<?php
    include_once("../controller/Init.php");

    if (isset($_POST['label']))
    { 
        if (strlen($_POST['label'] > 1))
        {
            $typesExistSQL = 'SELECT * FROM types WHERE label=:label';
            $typesExistRep = $bdd -> prepare($typesExistSQL);
            $typesExistResult = $typesExistRep -> execute(array(
                ':label' => $_POST['label']
            ));
            $typesExistData = $typesExistRep -> fetch();

            if (!$typesExistData)
            {
                $typesSQL = 'INSERT INTO `types`(`label`) VALUES (:label)';
                $typesInsert = $bdd -> prepare($typesSQL);
                $result = $typesInsert -> execute(array(
                    ':label'=>$_POST['label']
                ));

                echo "Vous venez d'enregistrer le type: " . $_POST['label'];
                ReturnInfo("Vous venez d'enregistrer le type: " . $_POST['label']);
                include('../vue/TypeForm.php');
            }
            else 
            {
                ReturnInfo("Un type existe déjà avec le nom: " . $_POST['label']);
                include('../vue/TypeForm.php');
            }
        }
        else 
        {
            ReturnInfo("Vous n\'avez pas renseigner toutes les informations.");
            include('../vue/TypeForm.php');
        }
    }
    else 
    {  
        ReturnInfo("Vous n\'avez pas renseigner toutes les informations.");
        include('../vue/TypeForm.php');
    }

?>