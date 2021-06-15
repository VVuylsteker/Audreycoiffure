<?php
session_start();
require('db_connect.php');

// Restriction, permets de voir la page uniquement aux utilisateurs connectés sinon erreur 404
if(!empty($_SESSION['identifiant'])){


    if(isset($_POST["ajouter_categorie"])){
        $nom = $_POST["nom"];
        $sql = "INSERT INTO categorie_portfolio VALUES (null, '$nom')";
        $req = get_bdd()->prepare($sql);
        $req->execute();
        $msg ="La categorie a été ajouter avec succès";
    }
        if(isset($_POST['desactiver']) && isset($_POST['id']) ) {
            $id = $_POST['id'];
            $sql = "DELETE FROM categorie_portfolio WHERE id='$id'";
            $req = get_bdd()->prepare($sql);
            $req->execute();
            $msg ="La categorie a été supprimmer avec succès";
        }
        if(isset($_POST['delete']) && isset($_POST['id']) ) {
            $id = $_POST['id'];
            $sql = "DELETE FROM portfolio WHERE id='$id'";
            $req = get_bdd()->prepare($sql);
            $req->execute();
            $msg ="L'image a été supprimmer avec succès";
        }

    if(isset($_POST['ajouter_image'])){

        $titre = $_POST["titre"];
        $description = $_POST["description"];
        $categorie = $_POST["categorie"];
        $extension = strrchr($_FILES['image']['name'],'.');
    
        $id_img = get_bdd()->query('SELECT * FROM portfolio')->rowCount();
        $image = '../images/portfolio/'.$id_img.$extension;
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
        $a = substr($image, 3);
    
        $sql = "INSERT INTO portfolio VALUES (null, '$titre', '$description', '$a', '$categorie')";
        $req = get_bdd()->prepare($sql);
        $req->execute();
        
        $msg ="L'image a été ajouter avec succès";
        
    }
    $sql = get_bdd()->prepare("SELECT id FROM categorie_portfolio");
    $sql->execute();
    $count = $sql->rowCount();
    $sql2 = get_bdd()->prepare("SELECT id FROM portfolio");
    $sql2->execute();
    $count2 = $sql2->rowCount();

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
                        <h1 class="mt-4">Le Portfolio</h1>


                            <div class="accordion" id="accordionExample">
                            <div class="card">
                            
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Personnaliser les catégories
                                        </button>
                                        </h2>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ajouter">Ajouter une catégorie</button>
                                
                                    <!-- Modal -->
                                    <div class="modal fade" id="ajouter" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ajouter une catégorie</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="nom">Nom</label>
                                                            <input type="text" class="form-control" id="nom" name="nom" required>
                                                        </div>
                                                    </div>
                                                    </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary" name="ajouter_categorie">Ajouter</button>
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
                                                $req = get_bdd()->query('SELECT * FROM categorie_portfolio');
                                                while ($donnees = $req->fetch()){
                                            ?>
                                            <tr>
                                                <td><?php echo ucwords($donnees['nom']); ?></td>
                                                <td>
                                                    <div class="row">

                                                        <div style="margin-left:10px;margin-right:10px;">
                                                            <form action="" method="post">
                                                            <input id="<?php echo $donnees['id']; ?>" name="id" type="hidden" value="<?php echo $donnees['id']; ?>">
                                                                <button type="submit" name="desactiver" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Personnaliser les images
                                    </button>
                                </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">

                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ajouter_image">Ajouter une image</button>
                                
                                    <!-- Modal -->
                                    <div class="modal fade" id="ajouter_image" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ajouter une image</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="" enctype="multipart/form-data">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="titre">Nom</label>
                                                            <input type="text" class="form-control" id="titre" name="titre" required>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="description">Description</label>
                                                            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                                                        </div>  
                                                        <div class="form-group col-md-12">

                                                      <label class="custom-file-label" for="couverture">Choisir...</label>
                                                     <input type="file" class="custom-file-input" id="image" name="image" required>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="categorie">Catégorie</label>
                                                            <select class="custom-select" name="categorie" id="categorie" required>
                                                            <?php 
                                                            $req4 = get_bdd()->query('SELECT * FROM categorie_portfolio');
                                                            while ($donnees = $req4->fetch()){ ?>
                                                            <option value="<?php echo $donnees['id']; ?>"><?php echo ucwords($donnees['nom']); ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                        
                                                    </div>
                                                    </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary" id ="ajouter_image" name="ajouter_image">Ajouter</button>
                                                        </div> 
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($count2>0){?>
                                    <table class="table table-bordered table-striped" style="margin-top:20px;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Titre</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Catégorie</th>
                                                <th scope="col">Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $req = get_bdd()->query('SELECT * FROM portfolio ORDER BY id DESC');
                                                while ($donnees = $req->fetch()){
                                                $abc = $donnees['categorie'];
                                                $abc2 = get_bdd()->query("SELECT nom FROM categorie_portfolio WHERE id='$abc'")->fetch();

                                            ?>
                                            <tr>
                                            <td><?php echo ucwords($donnees['titre']); ?></td>
                                            <td><?php echo ucwords($donnees['description']); ?></td>
                                            <td> <a href="../<?php echo $donnees['lien']; ?>" target="_blank">Voir</a></td>
                                            <td><?php echo ucwords($abc2['nom']); ?></td>
                                                
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
                                    <?php }?>

                                    </div>
                                </div>
                            </div>                                </div>
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