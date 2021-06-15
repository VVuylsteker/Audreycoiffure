<?php
require('db_connect.php'); 
session_start();
$id = $_GET['id'];

if (isset($_POST['delete'])){

	$sql = "UPDATE salaries SET actif='0' WHERE id='$id'";
	$req = get_bdd()->prepare($sql);
	$req->execute();
    header("Location: salaries.php");
	
}
if (isset($_POST['update'])){

	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$identifiant = $_POST['identifiant'];
	$mot_de_passe = $_POST['mot_de_passe'];
	$mdp = password_hash($mot_de_passe, PASSWORD_BCRYPT);
	$a="";
	foreach($_POST['jour'] as $jours){
		$a .= $jours.",";
	}
	$jour_de_travail = substr($a, 0, (strlen($a)-1));
	$adresse = $_POST['adresse'];
	$ville = $_POST['ville'];
	$code_postal = $_POST['code_postal'];
	$telephone = $_POST['telephone'];
	$telephone_secours = $_POST['telephone_secours'];

	$rang = '1';
	$actif = '1';

	$sql = "UPDATE salaries SET nom='$nom', prenom='$prenom', identifiant='$identifiant', mot_de_passe='$mdp', jour_de_travail='$jour_de_travail', adresse='$adresse', ville='$ville', code_postal='$code_postal', telephone='$telephone', telephone_secours='$telephone_secours' WHERE id='$id'";
	$req = get_bdd()->prepare($sql);
	$req->execute();

    header("Location: salaries.php");
	
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
                <title>Edition salarie</title>
                <link href="../css/styles_connexion.css" rel="stylesheet" />
                <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            </head>
            <body>
                <div id="layoutAuthentication">
                    <div id="layoutAuthentication_content">
                        <main>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-10">
                                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Edition du salarie</h3></div>
                                            <div class="card-body">
                                            <?php if(isset($_GET['id'])){
                                                $id = $_GET['id'];
                                                $infos = get_bdd()->query("SELECT * FROM salaries WHERE id ='$id'")->fetch();
                                                //var_dump($infos);
                                                $jours = explode(",", $infos['jour_de_travail']);

                                                ?>
                                                <form method="POST" action="">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="nom">Nom</label>
                                                            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $infos['nom'] ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="prenom">Prénom</label>
                                                            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $infos['prenom'] ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="identifiant">Identifiant</label>
                                                            <input type="text" class="form-control" id="identifiant" name="identifiant" value="<?php echo $infos['identifiant'] ?>" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="mot_de_passe">Mot de passe</label>
                                                            <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jour de travail</label><br>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="lundi" value="lundi" name="jour[]">
                                                            <label class="form-check-label" for="lundi">Lundi</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="mardi" value="mardi" name="jour[]">
                                                            <label class="form-check-label" for="mardi">Mardi</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="mercredi" value="mercredi" name="jour[]">
                                                            <label class="form-check-label" for="mercredi">Mercredi</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="jeudi" value="jeudi" name="jour[]">
                                                            <label class="form-check-label" for="jeudi">Jeudi</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="vendredi" value="vendredi" name="jour[]">
                                                            <label class="form-check-label" for="vendredi">Vendredi</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="samedi" value="samedi" name="jour[]">
                                                            <label class="form-check-label" for="samedi">Samedi</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="dimanche" value="dimanche" name="jour[]">
                                                            <label class="form-check-label" for="dimanche">Dimanche</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="adresse">Adresse</label>
                                                            <input type="text" class="form-control" id="adresse" name="adresse"  value="<?php echo $infos['adresse'] ?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="ville">Ville</label>
                                                            <input type="text" class="form-control" id="ville" name="ville" value="<?php echo $infos['ville'] ?>">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="code_postal">Code Postal</label>
                                                            <input type="text" class="form-control" id="code_postal" name="code_postal"  value="<?php echo $infos['code_postal'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="telephone">Téléphone</label>
                                                            <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo $infos['telephone'] ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="telephone_secours">Téléphone en cas d'accident</label>
                                                            <input type="text" class="form-control" id="telephone_secours" name="telephone_secours" value="<?php echo $infos['telephone_secours'] ?>">
                                                        </div>
                                                    </div>
                                                    </div>
                                                        <div class="modal-footer d-flex align-items-center justify-content-between mt-4 mb-0">
                                                        <a href="salaries.php" class="btn btn-outline-secondary" role="button">Annuler</a>
                                                            <button type="submit" class="btn btn-outline-success" name="update">Modifier</button>
 </form>                                                <form action="" method="post">
                                                    <button type="submit" class="btn btn-outline-danger" name="delete" id="delete">Supprimer le compte</button>
                                                </form>
                                                        </div>
                                               

                                   
                                            
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

                        <?php
                    

                                            }else{header('Location: connexion.php'); } ?>
            </body>
        </html>    
    