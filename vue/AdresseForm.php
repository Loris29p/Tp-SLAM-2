<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Project SLAM (Poilly Loris)</title>
        <link rel="shortcut icon" type="image/png" href="../assets/imgs/favicon.png" />
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
        <link rel="stylesheet" href="../assets/css/Header-Blue.css">
        <link rel="stylesheet" href="../assets/css/Navigation-Clean.css">
        <link rel="stylesheet" href="../assets/css/styles.css">
    </head>

    <body>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean">
            <div class="container"><a class="navbar-brand">Project SLAM (Poilly Loris)</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="../vue/RegisterForm.php">Register Form</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="../vue/ConnectForm.php">Connect Form</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="../controller/AllUsersController.php">All Users</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="../vue/TypeForm.php">Type Form</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="../controller/AllTypeController.php">All Types</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="../vue/AdresseForm.php">Adresse Form</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="../controller/AllAdresseController.php">All Adresses</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <form action="../controller/AdresseController.php" method="post">
            Adresses : <br><br>
            Numéro de rue : <input id ="number" type="text" name="number"><br><br>
            Nom de rue : <input id ="name" type="text" name="name"><br><br>
            Ville : <input id ="city" type="text" name="city"><br><br>
            Code Postal : <input id ="cp" type="text" name="cp"><br><br>
            <input type="submit" value="Valider"><br><br>
        </form>
    </body>
</html>