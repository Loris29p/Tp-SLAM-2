<?php
    include_once("../controller/Init.php");

    $allUsersSQL = 'SELECT id, name, lastname, email, id_role FROM users';
    $allUsersRep = $bdd -> prepare($allUsersSQL);
    $allUsersResult = $allUsersRep -> execute();
    $Users = $allUsersRep -> fetchall(PDO::FETCH_ASSOC);

    if(!empty($Users))
    {
        $allUsersTable = http_build_query($Users);
        header('location:../vue/AllUsersVue.php?'.$allUsersTable);
    }
    else 
    {
        ReturnInfo("Aucun Users n'existe.");
        include('../vue/RegisterForm.php');
    }
?>