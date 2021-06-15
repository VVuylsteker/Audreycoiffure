<?php
session_start();
require('db_connect.php');

if(!empty($_SESSION['identifiant'])){
    if(isset($_POST['changer_titre_et_description'])) {

        $titre = $_POST['titre'];
        $req1 = get_bdd()->prepare("UPDATE personnalisation SET contenu = '$titre' WHERE id = '7'");
        $req1->execute();

        $description = $_POST['description'];
        $req2 = get_bdd()->prepare("UPDATE personnalisation SET contenu = '$description' WHERE id = '8'");
        $req2->execute();

        $info = $_POST['system_rdv'];
        $req3 = get_bdd()->prepare("UPDATE personnalisation SET contenu = '$info' WHERE id = '11'");
        $req3->execute();

        $msg ="Les modifications ont été apportées avec succès";
    }
    
    $req = get_bdd()->query('SELECT contenu FROM personnalisation WHERE description ="system_rdv"')->fetch();
    $a = $req['contenu'];

    $titre = get_bdd()->query("SELECT id, contenu FROM personnalisation WHERE description='titre_rdv'")->fetch();
    $description = get_bdd()->query("SELECT id, contenu FROM personnalisation WHERE description='description_rdv'")->fetch();
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
                        <h1 class="mt-4">Rendez-vous</h1>

                        <div class="card mb-4">
                            <div class="card-header">
                            <i class="fas fa-heading"></i>
                                Titre et description
                            </div>
                            <div class="card-body">
                            <form action="" method="post">
                            <div class="form-group">
                            <label>Le système de demande de rendez-vous est actuellement : </label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="system_rdv" id="activer" value="1">
                                    <label class="form-check-label" for="activer">Activer</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="system_rdv" id="desactiver" value="0" >
                                    <label class="form-check-label" for="desactiver">Désactiver</label>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label for="titre">Titre</label>
                                    <input type="text" class="form-control" id="titre" name="titre" value="<?php echo $titre['contenu']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" rows="5" name="description"><?php echo $description['contenu']; ?></textarea>
                                </div>
                                <button type="submit" name="changer_titre_et_description" class="btn btn-primary">Changer</button>
                            </form>
                            </div>
                        </div>

                    </div>
                </main>
                <?php require_once('includes/footer.php'); ?>
            </div>
            
        </div>
        <script>
 var info = <?php echo json_encode($a); ?>;
 if(info==1){
    document.getElementById("activer").checked = true;
    
 }else{
    document.getElementById("desactiver").checked = true;
    
 }
</script>
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