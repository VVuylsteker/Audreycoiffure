<?php
require('db_connect.php'); 
session_start();

if(isset($_SESSION['rang'])){?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Clients - Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" rel="stylesheet" crossorigin="anonymous" />
        <?php require_once('includes/header.php'); ?>

        <style>
        	.unbold {font-weight: normal;}
        </style>

    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Les clients</h1>

        <table id="example" class="cell-border hover">
        <thead>
            <tr>
                <th>Date d'inscription</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Ville</th>
                <th>Code postal</th>
                <th>Date de naissance</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody >
        <?php

        $sql = get_bdd()->prepare("SELECT * FROM clients");
        $sql->execute();
        while ($data = $sql->fetch()){?>
            <tr>
            <th class ="unbold"><?=$data['date_inscription'];?></th>
            <th class ="unbold"><?=$data['prenom'];?></th>
            <th class ="unbold"><?=$data['nom'];?></th>
            <th class ="unbold"><?=$data['mail'];?></th>
            <th class ="unbold"><?=$data['phone'];?></th>
            <th class ="unbold"><?=$data['ville'];?></th>
            <th class ="unbold"><?=$data['code_postal'];?></th>
            <th class ="unbold"><?=$data['date_de_naissance'];?></th>
            <th ><a class="btn btn-secondary" href="client_edit.php?type=edit&id=<?=$data['id']?>"><i class="fas fa-user-edit" style="color:white;"></i></a></th>
            </tr>
            <?php
        }
        ?>

        </tbody>
        <tfoot>
        <tr>
                <th>Date d'inscription</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Ville</th>
                <th>Code postal</th>
                <th>Date de naissance</th>
                <th>Edit</th>
            </tr>
        </tfoot>
    </table>
                </div>

                </main><?php require_once('includes/footer.php'); ?>
            </div>
                            
        </div>


        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- <script src="js/scripts.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script>
        
        $(document).ready(function() {
            $('#example').DataTable({
            
            "language": {
            "lengthMenu": "Nombre de lignes _MENU_ par page",
            "zeroRecords": "Aucun résultat",
            "info": "Affichage page _PAGE_ sur _PAGES_",
            "infoEmpty": "Aucun résultat",
            "infoFiltered": "(Filtrage sur _MAX_ données)",
            "search": "Rechercher :",
            paginate: {
            previous: '‹',
            next:     '›'
            },
            aria: {
                paginate: {
                    previous: 'Précèdent',
                    next:     'Suivant'
                }
            }
        }
        ,
        responsive: true

        
                  
     });
            } );</script>
    </body>

</html>
<?php
        

}else{
    header('Location: login.php');  
}
?> 


