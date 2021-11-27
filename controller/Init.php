<?php

    try 
    {
        $bdd = new PDO('mysql:host=localhost;dbname=project_slam' , 'root', '' );
    } 
    catch (PDOException $e) 
    {
        echo 'Échec lors de la connexion: ' . $e->getMessage();
    }
    
    function ReturnInfo($msg)
    {
        echo '<script type="text/javascript">';
        echo " alert('$msg')";  //not showing an alert box.
        echo '</script>';
    }
?>