<?php
include('db_connect.php');
session_start();

if(isset($_POST['connexion'])){ 

    $identifiant = strtolower($_POST['inputIdentifiant']);
    $password = $_POST['inputPassword'];

    $reponse = get_bdd()->query("SELECT * FROM salaries WHERE identifiant = '$identifiant' AND actif = 1");
    $userexist = $reponse->rowCount();
    $reponse->execute();
    $data = $reponse->fetch();
    $pwd_hash = $data['mot_de_passe'];
    if ($userexist > 0){
        if(password_verify($password, $pwd_hash)){
            $_SESSION['identifiant'] = $data['identifiant'];
            $_SESSION['rang'] = $data['rang'];
            header('Location: index.php');  
        }
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Connexion - Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <img src="../images/logo_2.png" class="img-fluid">
                                        <h3 class="text-center font-weight-light my-4">Administration </h3>
                                    </div>
                                    <div class="card-body">
                                    <form action="" method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Identifiant</label>
                                                <input class="form-control py-4" name="inputIdentifiant" id="inputIdentifiant" type="text" placeholder="Identifiant" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Mot de passe</label>
                                                <input class="form-control py-4" name="inputPassword" id="inputPassword" type="password" placeholder="Mot de passe" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" checked/>
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Se souvenir de moi </label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="../connexion.php">Je suis un client ?</a>
                                                <input type="submit" name ="connexion" value="Se connecter" class="btn btn-dark">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>


