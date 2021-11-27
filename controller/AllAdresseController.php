<?php
    include_once("../controller/Init.php");

    $allAdressesSQL = 'SELECT * FROM adresses';
    $allAdressesRep = $bdd -> prepare($allAdressesSQL);
    $allAdressesResult = $allAdressesRep -> execute();
    $Adresses = $allAdressesRep -> fetchall(PDO::FETCH_ASSOC);

    if(!empty($Adresses))
    {
        $allAdressesTable = http_build_query($Adresses);
        header('location:../vue/AllAdresseVue.php?'.$allAdressesTable);
    }
    else 
    {
        ReturnInfo("Aucune adresses n'existe.");
        include('../vue/AdresseForm.php');
    }
?>