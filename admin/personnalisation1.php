<?php
session_start();
require('db_connect.php');

function change(){
    $myfile = fopen("../index.html", "w") or die("Unable to open file!");
    $txt = "John Doe\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    return 0;
}
change();
if(!empty($_SESSION['identifiant'])){

    if(isset($_POST['salon'])) {
    
        $titre = $_POST['titre'];
        $req1 = get_bdd()->prepare("UPDATE personnalisation SET contenu = '$titre' WHERE id = '1'");
        $req1->execute();

        $description = $_POST['description'];
        $req2 = get_bdd()->prepare("UPDATE personnalisation SET contenu = '$description' WHERE id = '2'");
        $req2->execute();

        $msg ="Les modifications du salon ont été apportées avec succès";
    }
    if(isset($_POST['equipe'])) {
    
        $titre = $_POST['titre_equipe'];
        $req1 = get_bdd()->prepare("UPDATE personnalisation SET contenu = '$titre' WHERE id = '9'");
        $req1->execute();

        $description = $_POST['description_equipe'];
        $req2 = get_bdd()->prepare("UPDATE personnalisation SET contenu = '$description' WHERE id = '10'");
        $req2->execute();

        $msg ="Les modifications de l'équipe ont été apportées avec succès";
    }
    if(isset($_POST['presentation'])) {
        $titre = $_POST['titre'];
        $req1 = get_bdd()->prepare("UPDATE personnalisation SET contenu = '$titre' WHERE id = '12'");
        $req1->execute();

        $description = $_POST['description'];
        $req2 = get_bdd()->prepare("UPDATE personnalisation SET contenu = '$description' WHERE id = '13'");
        $req2->execute();

        $msg ="Les modifications de présentation ont été apportées avec succès";
    }
    $result_background = get_bdd()->query("SELECT contenu FROM personnalisation WHERE description='image_background'")->fetch();
    
    $titre1 = get_bdd()->query("SELECT id, contenu FROM personnalisation WHERE description='titre_index'")->fetch();
    $description1 = get_bdd()->query("SELECT id, contenu FROM personnalisation WHERE description='description_index'")->fetch();

    $titre2 = get_bdd()->query("SELECT id, contenu FROM personnalisation WHERE description='titre_equipe'")->fetch();
    $description2 = get_bdd()->query("SELECT id, contenu FROM personnalisation WHERE description='description_equipe'")->fetch();

    $titre3 = get_bdd()->query("SELECT id, contenu FROM personnalisation WHERE description='titre_presentation'")->fetch();
    $description3 = get_bdd()->query("SELECT id, contenu FROM personnalisation WHERE description='description_presentation'")->fetch();

    if(isset($_POST['couverture']) && !empty($_POST['couverture'])){

        if($_FILES['couverture']['error'] == 0){

            $extension = strrchr($_FILES['couverture']['name'],'.');
            if($extension == '.jpg' || $extension == '.png' || $extension == '.gif' || $extension == '.bmp'){
                $nom = '../images/couverture'.$extension;
                move_uploaded_file($_FILES['couverture']['tmp_name'], $nom);
                $update_image = "UPDATE personnalisation SET contenu = '$nom' WHERE id = '3'";
                $req3 = get_bdd()->prepare($update_image);
                $req3->execute();
                $msg ="L'image de fond a été changer avec succès";
            }else{
                $msg ="ERREUR : L'image de fond doit être au format JPG , PNG , GIF ou BMP";
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

                        <h1 class="mt-4">Le Salon</h1>

                        <div class="card mb-4">
                            <div class="card-header">
                            <i class="far fa-images"></i>
                                Image de fond
                            </div>
                            <div class="card-body">
                            <div class="alert alert-secondary" role="alert">La taille recommandé de l'image de fond est de 2560x1080.</div>
                                <h6>L'image de fond actuel est :</h6>
                                <a class="btn btn-primary" href="<?php echo $result_background['contenu']; ?>" role="button" target="_blank">Voir</a>
                                <form method="POST" action="" enctype="multipart/form-data">

                                <div class="form-row" style="margin-top:20px;">

                                    <div class="form-group col-md-6">
                                        
                                        <label class="custom-file-label" for="couverture">Choisir...</label>
                                        <input type="file" class="custom-file-input" id="couverture" name="couverture">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <input type= "submit" class="btn btn-primary" name="couverture" value="Mettre à jour l'image de fond">

                                    </div>

                                </div>
                            </form>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                            <i class="fas fa-heading"></i>
                                Titre et description
                            </div>
                            <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="titre">Titre</label>
                                    <input type="text" class="form-control" id="titre" name="titre" maxlength="50" value="<?php echo $titre1['contenu']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" rows="5" name="description"><?php echo $description1['contenu']; ?></textarea>
                                </div>
                                <button type="submit" name="salon" class="btn btn-primary">Changer</button>
                            </form>
                            </div>
                        </div>


                


                        <h1 class="mt-4">L'équipe</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                            <i class="fas fa-heading"></i>
                                Titre et description
                            </div>
                            <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="titre">Titre</label>
                                    <input type="text" class="form-control" id="titre_equipe" maxlength="50" name="titre_equipe" value="<?php echo $titre2['contenu']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description_equipe" rows="5" name="description_equipe"><?php echo $description2['contenu']; ?></textarea>
                                </div>
                                <button type="submit" name="equipe" class="btn btn-primary">Changer</button>
                            </form>
                            </div>
                        </div>

                        <h1 class="mt-4">Présentation</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                            <i class="fas fa-heading"></i>
                                Titre et description
                            </div>
                            <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="titre">Titre</label>
                                    <input type="text" class="form-control" id="titre" maxlength="50" name="titre" value="<?php echo $titre3['contenu']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" rows="5" name="description"><?php echo $description3['contenu']; ?></textarea>
                                </div>
                                <button type="submit" name="presentation" class="btn btn-primary">Changer</button>
                            </form>
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