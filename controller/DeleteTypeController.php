<?php
    include_once("../controller/Init.php");

    if (isset($_GET['id']))
    {
        $delTypesSQL = 'DELETE FROM `types` WHERE id = :id';
        $delTypesRep = $bdd -> prepare($delTypesSQL);
        $delTypesResult=$delTypesRep->execute(array(
            ':id'=>$_GET['id']
        ));

        include('AllTypeController.php');
    }

?>