<?php
session_start();
require('db_connect.php');

// Restriction, permets de voir la page uniquement aux utilisateurs connectés sinon erreur 404
if(!empty($_SESSION['identifiant'])){

    if(isset($_POST['delete']) && isset($_POST['id']) ) {
        $id = $_POST['id'];
        $sql = "DELETE FROM prestations WHERE id='$id'";
        $req = get_bdd()->prepare($sql);
        $req->execute();

        $msg ="La prestation a été supprimmer";
    }
    if(isset($_POST['ajouter'])) {
        $nom = $_POST['nom'];
        $temps = $_POST['temps'];

        $parsed = date_parse($temps);
        $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60;

        $sql = "INSERT INTO prestations(id, nom, temps) values (NULL, '$nom', '$seconds')";
        $req = get_bdd()->prepare($sql);
        $req->execute();
        $msg ="La prestation a été ajouté";
    
    }
    $sql = get_bdd()->prepare("SELECT id FROM prestations");
    $sql->execute();
    $count = $sql->rowCount();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Personnalisation</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <?php require_once('includes/header.php'); ?>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    <?php
                        if(!empty($msg)){
                    ?>
                        <div class="alert alert-success" role="alert" style="margin-top:20px;">
                <?php echo $msg ?>
                </div>
                    <?php
                        }
                    ?>
                        <h1 class="mt-4">Les Prestations</h1>

                                    <div class="card-body">
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ajouter">Ajouter une prestation</button>
                                
                                    <!-- Modal -->
                                    <div class="modal fade" id="ajouter" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ajouter une prestation</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-8">
                                                            <label for="nom">Nom</label>
                                                            <input type="text" class="form-control" id="nom" name="nom" maxlength="50" required>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="temps">Temps</label>
                                                            <input type="time" class="form-control" id="temps" name="temps" required>
                                                        </div>
                                                    </div>
                                                    </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
<?php if($count>0){?>
                                    <table class="table table-bordered table-striped" style="margin-top:20px;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $req = get_bdd()->query('SELECT * FROM prestations');
                                                while ($donnees = $req->fetch()){
                                            ?>
                                            <tr>
                                                <td><?php echo ucwords($donnees['nom']); ?></td>
                                                <td>
                                                    <div class="row">

                                                        <div style="margin-left:10px;margin-right:10px;">
                                                            <form action="" method="post">
                                                            <input id="<?php echo $donnees['id']; ?>" name="id" type="hidden" value="<?php echo $donnees['id']; ?>">
                                                                <button type="submit" name="delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php } ?>

                                    </div>
                                </div>
                            </div>   
                          
                            </div>
                    </div>
                </main>
                <?php require_once('includes/footer.php'); ?>
            </div>
            
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
<?php
}
else{
    header('Location: connexion.php');  
}