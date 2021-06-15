<?php
require_once('db_connect.php'); 
require_once('../fonction_client.php'); 
session_start();

if(isset($_SESSION['rang'])){

        ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="utf-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
                <meta name="description" content="" />
                <meta name="author" content="" />
                <title>Edition compte</title>
                <link href="../css/styles_connexion.css" rel="stylesheet" />
                <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body class="">
                <div id="layoutAuthentication">
                    <div id="layoutAuthentication_content">
                        <main>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-5">
                                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Edition du compte </h3></div>
                                            <div class="card-body">
                            
                                <?php
                                if(isset($_GET['type']) && $_GET['type'] == 'edit' && isset($_GET['id'])){
                                    
                                    $id_client = (int) $_GET['id'];
                                    if(isset($_POST['modification'])){

                                        $nom = htmlspecialchars($_POST['inputNom'], ENT_QUOTES);
                                        $prenom = htmlspecialchars($_POST['inputPrenom'], ENT_QUOTES);
                                        $email = htmlspecialchars(strtolower($_POST['inputEmail']), ENT_QUOTES);
                                        $naissance = htmlspecialchars($_POST['inputNaissance'], ENT_QUOTES);
                                        $ville = htmlspecialchars($_POST['inputVille'], ENT_QUOTES);
                                        $postal = htmlspecialchars($_POST['inputPostal'], ENT_QUOTES);
                                        $phone =  htmlspecialchars($_POST['inputPhone'], ENT_QUOTES);
                                        
                                        $nom = ucwords(strtolower($nom));
                                        $prenom = ucwords(strtolower($prenom));
                                        $ville = ucwords(strtolower($ville));
                                
                                
                                        $sql = get_bdd()->prepare("SELECT * FROM clients WHERE mail ='$email' AND id !='$id_client'");
                                        $sql->execute();
                                        $n_email = $sql->rowCount();
                                
                                        if($n_email == 0){
                                
                                            try{
                                                $sql = "UPDATE clients SET
                                                        nom ='$nom', 
                                                        prenom = '$prenom', 
                                                        date_de_naissance = '$naissance',
                                                        mail = '$email',
                                                        ville = '$ville',
                                                        code_postal = '$postal',
                                                        phone = '$phone'
                                                        WHERE id ='$id_client'";
                                
                                                $req = get_bdd()->prepare($sql);
                                                $req->execute();
                                            }
                                            catch (Exception $e) {
                                                echo 'Exception reçue : ',  $e->getMessage(), "\n";
                                            }
                                
                                            ?>
                                            <script>
                                                swal({
                                                    title: "Modification réussie 😁 !",
                                                    icon: "success",
                                                    type: "success"
                                                }).then(function() {
                                                    window.location = "clients.php";
                                                });
                                            </script>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <script>
                                                swal("Oops! Email invalide", "Un compte existe déjà sur cette adresse email", "error");
                                            </script>
                                            <?php
                                        }
                                    }
                                    ?>
                                        <form action="client_edit.php?type=edit&id=<?=$id_client?>" method="post">
                                        <h3 class="text-center"><?=get_infos_client('nom',$id_client);?></h3> <br>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <label for="inputNom">Nom</label>
                                            <input type="text" class="form-control" id="inputNom" name="inputNom" value="<?=get_infos_client('nom',$id_client);?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="inputPrenom">Prénom</label>
                                            <input type="text" class="form-control" id="inputPrenom" name="inputPrenom" value="<?=get_infos_client('prenom',$id_client);?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail">Email</label>
                                            <input type="email" class="form-control" id ="inputEmail" name="inputEmail" value="<?=get_infos_client('mail',$id_client);?>">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputPhone">Numéro de téléphone</label>
                                            <input type="text" class="form-control" id ="inputPhone" name="inputPhone" value="<?=get_infos_client('phone',$id_client);?>">
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputNaissance">Date de naissance</label>
                                            <input type="text" class="form-control" id ="inputNaissance" name="inputNaissance" value="<?=get_infos_client('date_de_naissance',$id_client);?>">
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-7">
                                            <label for="inputVille">Ville</label>
                                            <input type="text" class="form-control" id="inputVille" name="inputVille" value="<?=get_infos_client('ville',$id_client);?>">
                                            </div>
                                            <div class="form-group col-md-5">
                                            <label for="inputPostal">Code Postal</label>
                                            <input type="text" class="form-control" id="inputPostal" name="inputPostal" value="<?=get_infos_client('code_postal',$id_client);?>">
                                            </div>
                                        </div>
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a href="client_edit.php?type=delete&id=<?=$id_client?>" class="btn btn-outline-danger" role="button">Supprimer le compte</a>
                                                <a href="clients.php" class="btn btn-outline-secondary" role="button">Annuler</a>
                                                <input type="submit" name ="modification" value="Modifier" class="btn btn-outline-success">
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
    }
            
    if(isset($_GET['type']) && $_GET['type'] == 'delete' && isset($_GET['id'])){

        $id_client = $_GET['id'];
        $sql = get_bdd()->prepare('DELETE FROM clients WHERE id = ?');
        $sql->execute(array($id_client));

        ?>
        <script>
            swal({
                title: "Suppression du compte réussie 😁 !",
                icon: "success",
                type: "success"
            }).then(function() {
                window.location = "clients.php";
            });
        </script>
        <?php
    }
}
else{
    header('Location: connexion.php');  
}
    ?>