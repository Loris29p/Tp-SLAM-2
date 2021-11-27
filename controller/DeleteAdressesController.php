<?php
    include_once("../controller/Init.php");

    if (isset($_GET['id']))
    {
        $delAdressesSQL = 'DELETE FROM `adresses` WHERE id = :id';
        $delAdressesRep = $bdd -> prepare($delAdressesSQL);
        $delAdressesResult=$delAdressesRep->execute(array(
            ':id'=>$_GET['id']
        ));

        include('AllAdresseController.php');
    }

?>