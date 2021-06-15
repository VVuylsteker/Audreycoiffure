<?php
session_start();
include('db_connect.php');

if(!empty($_SESSION['identifiant'])){
    if(isset($_POST["supprimer"])){
        $id = $_POST["id"];
        $sql = "DELETE FROM rdv WHERE id='$id'";
        $req = get_bdd()->prepare($sql);
        $req->execute();
        $msg ="Le rendez-vous a été supprimmer";
    }
    $req = get_bdd()->query('SELECT * FROM rdv WHERE valide="3" ORDER BY id DESC');
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Annulation de rendez-vous - Admin</title>
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
                        <h1 class="mt-4">Les annulations de rendez-vous</h1>
                        <p>Il y a actuellement <span id="demande"></span> annulations de rendez vous</p>
                        <?php
                        if(!empty($msg)){
                    ?>
                        <div class="alert alert-success" role="alert" style="margin-top:20px;">
                <?php echo $msg ?>
                </div>
                    <?php
                        }
                    ?>
                        <div class="row">
                        <?php
                            while ($donnees = $req->fetch()){
             
                            $id_client = $donnees['id_client'];
                            $nom_prenom_client = get_bdd()->query("SELECT nom, prenom, phone FROM clients WHERE id='$id_client'")->fetch();

                            $id_salaries = $donnees['id_salaries'];
                            $prenom_salarie = get_bdd()->query("SELECT prenom FROM salaries WHERE id='$id_salaries'")->fetch();

                            $result = explode('|', $donnees['titre'], 3);
                            $date_heure = explode(' ', $donnees['debut'], 2);
                            $date = date("d-m-Y", strtotime($date_heure[0]));
                            $heure = substr($date_heure[1], 0,5);

                                            ?>
                                             <div class="col-xl-3 col-md-6">
                                <div class="card" style="margin-bottom:20px;">

                                    <div class="card-body">
                                        <table class="table table-borderless">
                                        
                                            <tbody>
                                                <tr>
                                                    <th>Pour :</th>
                                                    <td><?php echo ucwords($result[0]);?></td>
                                                </tr>
                                                <tr>
                                                    <th>Prestation :</th>
                                                    <td><?php echo ucwords($result[1]);?></td>
                                                </tr>
                                                <tr>                                                
                                                    <th>Le :</th>
                                                    <td><?php echo $date." à ".$heure ?></td>
                                                </tr>
                                                <tr>                                                    
                                                    <th>Avec :</th>
                                                    <td><?php echo ucwords($prenom_salarie['prenom']);?></td></tr>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="card-footer text-center">
                                    <form action="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $donnees['id']; ?>">
                                        <button class="btn btn-secondary float-right" type="submit" name="supprimer" id="">D'accord</button>
                                    <form>
                                    </div>
                                </div>
                            </div>

                                            <?php
                                            }
                                            ?>
                            
                            
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
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>


function autoRefresh()
                                {
                                  $("#demande").load("test.php?id=4");
                                  }
                                  setInterval('autoRefresh()', 1000); 
                                  
                                

</script>
<?php
}
else{
    header('Location: connexion.php');  
}
?>

