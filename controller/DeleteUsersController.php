<?php
    include_once("../controller/Init.php");

    if (isset($_GET['id']))
    {
        $delUsersSQL = 'DELETE FROM `users` WHERE id = :id';
        $delUsersRep = $bdd -> prepare($delUsersSQL);
        $delUsersResult=$delUsersRep->execute(array(
            ':id'=>$_GET['id']
        ));

        include('AllUsersController.php');
    }

?>