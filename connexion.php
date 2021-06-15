<?php
session_start();
require_once('admin/db_connect.php')
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Connexion - Audreycoiffure</title>
        <link href="css/styles_connexion.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                    <a href="index.php"><img src="images/logo_2.png" class="img-fluid"></a>
                                        <h3 class="text-center font-weight-light my-4">Connexion</h3>
                                    </div>
                                    <div class="card-body">
                                    <form action="connexion.php" method="post">
                                    <div class="form-group">
                                    <a href="inscription.php">Nouveau ? S'inscrire</a>
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1" for="inputEmailAddress">Adresse email</label>
                                                <input class="form-control py-4" required name="inputIdentifiant" id="inputIdentifiant" type="text" placeholder="email@exemple.com" />
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1" for="inputPassword">Mot de passe</label>
                                                <input class="form-control py-4" required name="inputPassword" id="inputPassword" type="password" placeholder="*************" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" name="rememberPasswordCheck" id="rememberPasswordCheck" type="checkbox" checked/>
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Se souvenir de moi </label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="mot-de-passe.php">Mot de passe oublié ?</a>
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

<?php

if(isset($_POST['connexion'])){


    $id = htmlspecialchars(strtolower($_POST['inputIdentifiant']), ENT_QUOTES);
    $pwd = htmlspecialchars($_POST['inputPassword'], ENT_QUOTES);
    
    $sql = get_bdd()->prepare("SELECT * FROM clients WHERE mail ='$id'");
    $sql->execute();
    $n_id = $sql->rowCount();

    if($n_id > 0){

        $get_infos = $sql->fetch();
        $pwd_hash = $get_infos['mot_de_passe'];

            if(password_verify($pwd, $pwd_hash)){

                if(isset($_POST['rememberPasswordCheck'])){ // si checkbox cochée ajout du cookie 
                    $stay_connected = True;
                    $id_client =  $get_infos['id'];

                    // setcookie($stay_connected, $id_client, time() + (86400 * 356), "/"); // 86400 = 1 day
                }
                    $_SESSION['id_client'] = $get_infos['id'];
                ?>
                <script>
                    swal({
                        title: "Connexion réussie !",
                        text: "Envie d'un nouvelle coupe de cheveux <?=$get_infos['prenom'] ;?> ?",
                        icon: "success",
                        type: "success"
                    }).then(function() {
                        window.location = "mes-rendez-vous.php";
                    });
                </script>
                <?php
            }
            else{
                ?>
                <script>
                    swal("Oups... ", "Mot de passe incorrect", "error");
                </script>
                <?php
            }

        }
        else{
            ?>
            <script>
                swal("Oups... ", "Aucun compte n'appartient à cet email", "error");
            </script>
            <?php
        }
    }

    
    


/*  
}
*/
?>
