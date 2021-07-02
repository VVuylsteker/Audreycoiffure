<?php
require('db_connect.php');
session_start();
if(isset($_POST['ajouter_salarie'])){

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

	$sql = "INSERT INTO salaries(id, nom, prenom, identifiant, mot_de_passe, jour_de_travail, adresse, ville, code_postal, telephone, telephone_secours, rang, actif) values (NULL, '$nom', '$prenom', '$identifiant', '$mdp', '$jour_de_travail', '$adresse', '$ville', '$code_postal', '$telephone', '$telephone_secours', '$rang', '$actif')";
	$req = get_bdd()->prepare($sql);
	$req->execute();

    $msg ="Le salarie a été ajouter";
	
}
$req = get_bdd()->query('SELECT * FROM salaries WHERE actif="1"');

if(isset($_SESSION['rang'])){
    
        ?>
        <!DOCTYPE html>
        <html lang="fr">
            <head>
                <meta charset="utf-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
                <meta name="description" content=""/>
                <meta name="author" content=""/>
                <title>Salariés - Admin</title>
                <link href="css/styles.css" rel="stylesheet" />
        
                <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
                <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
                <?php require('includes/header.php'); ?>
            </head>
            <body class="sb-nav-fixed">
                <div id="layoutSidenav">
                    <div id="layoutSidenav_content">
                        <main>
                            <div class="container-fluid">
                                <h1 class="mt-4">Les salariés</h1>
                                
                                    <?php
                                    // Uniquement un salarié de rang 1 peut ajouter d'autre salarié
                                        if($_SESSION['rang']==1){
                                    ?>
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ajouter">Ajouter un salarié</button>
                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ajouter">Ajouter un congé</button>
                                    <?php
                                        }
                                    ?>
<?php
                        if(!empty($msg)){
                    ?>
                        <div class="alert alert-success" role="alert" style="margin-top:20px;">
                <?php echo $msg ?>
                </div>
                    <?php
                        }
                    ?>
                                    <!-- Modal -->
                                    <div class="modal fade" id="ajouter" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ajouter un salarié</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="nom">Nom</label>
                                                            <input type="text" class="form-control" id="nom" name="nom" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="prenom">Prénom</label>
                                                            <input type="text" class="form-control" id="prenom" name="prenom" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="identifiant">Identifiant</label>
                                                            <input type="text" class="form-control" id="identifiant" name="identifiant" required>
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
                                                            <input type="text" class="form-control" id="adresse" name="adresse">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="ville">Ville</label>
                                                            <input type="text" class="form-control" id="ville" name="ville">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="code_postal">Code Postal</label>
                                                            <input type="text" class="form-control" id="code_postal" name="code_postal">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="telephone">Téléphone</label>
                                                            <input type="text" class="form-control" id="telephone" name="telephone">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="telephone_secours">Téléphone en cas d'accident</label>
                                                            <input type="text" class="form-control" id="telephone_secours" name="telephone_secours">
                                                        </div>
                                                    </div>
                                                    </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary" name="ajouter_salarie">Ajouter</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
        

                                    <table class="table table-bordered table-striped" style="margin-top:20px;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Prénom</th>
                                                <th scope="col">Jour de travail</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                while ($donnees = $req->fetch()){
                                            ?>
                                            <tr>
                                                <td><?php echo $donnees['nom']; ?></td>
                                                <td><?php echo $donnees['prenom']; ?></td>
                                                <td>
                                                    <ul>
                                                        <?php
                                                            if($donnees['jour_de_travail'] != ''){
                                                            $jours = preg_split("[,]", $donnees['jour_de_travail']);
                                                            foreach ($jours as $jour){
                                                        ?>
                                                            <li><?php echo ucwords($jour)?></li>
                                                        <?php
                                                        }}
                                                        ?>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <?php
                                                            if(isset($_POST[$donnees['id']])) {
                                                                $id = $donnees['id'];
                                                                $sql = "UPDATE salaries SET actif='0' WHERE id='$id'";
                                                                $req = get_bdd()->prepare($sql);
                                                                $req->execute();
                                                            }
                                                    ?>

                                                        <div class="row">
                                                        <!--La classe bg-info ajoute un fond bleu à l'élément-->
                                                        <?php if($_SESSION['rang'] == '1' || $_SESSION['identifiant'] == $donnees['identifiant']){ ?>
                                                            <div style="margin-left:10px;margin-right:10px;">
                                                                <a class="btn btn-secondary" href="salarie_edit?id=<?php echo $donnees['id']; ?>"><i class="fas fa-user-edit" style=></i></a>
                                                            </div>
                                                        <?php } ?>

                                                        </div>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    </div>

                        </main><?php require('includes/footer.php'); ?>
                    </div>
                                    
                </div>

                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
                <script src="js/scripts.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
                <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
                <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
                <script src="assets/demo/datatables-demo.js"></script>
            </body>
        
        </html>
        <?php
        

}
else{
    header('Location: login.php');  
}
?>