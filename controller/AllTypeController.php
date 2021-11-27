<?php
    include_once("../controller/Init.php");

    $allTypesSQL = 'SELECT * FROM types';
    $allTypesRep = $bdd -> prepare($allTypesSQL);
    $allTypesResult = $allTypesRep -> execute();
    $types = $allTypesRep -> fetchall(PDO::FETCH_ASSOC);

    if(!empty($types))
    {
        $allTypesTable = http_build_query($types);
        header('location:../vue/AllTypeVue.php?'.$allTypesTable);
    }
    else 
    {
        ReturnInfo("Aucun types n'existe.");
        include('../vue/TypeForm.php');
    }
?>