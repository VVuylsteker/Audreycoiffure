<?php

require_once('db_connect.php');

$req2 = get_bdd()->query('SELECT * FROM salaries WHERE actif="1"');

?>
        <div class="sb-nav-fixed">
            <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                <a class="navbar-brand" href="index.php">Administration</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            </nav>
        </div>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Accueil</div>
                                <a class="nav-link" href="index.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Tableau de bord
                                </a>
                            <div class="sb-sidenav-menu-heading">Personnalisation</div>
    
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="far fa-file-alt"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="personnalisation1.php">Le salon & l'équipe</a>
                                    <a class="nav-link" href="personnalisation2.php">Prestations</a>
                                    <a class="nav-link" href="personnalisation3.php">Rendez-vous</a>
                                    <a class="nav-link" href="personnalisation4.php">Portfolio</a>

                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Rendez-vous</div>
                            <a class="nav-link" href="demande_rdv.php">
                                <div class="sb-nav-link-icon"><i class="far fa-calendar-plus"></i></div>
                                Demande
                            </a>
                            <a class="nav-link" href="annulation_rdv.php">
                                <div class="sb-nav-link-icon"><i class="far fa-calendar-times"></i></div>
                                Annulation
                            </a>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#planning" aria-expanded="false" aria-controls="planning">
                                <div class="sb-nav-link-icon"><i class="far fa-calendar"></i></div>
                                Planning
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="planning" aria-labelledby="headingTwo" data-parent="#planning">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="planning">

                                <?php 
                                        while ($donnees = $req2->fetch()){
                                    ?>             
                                    <a class="nav-link" href="planning.php?id=<?php echo $donnees['id']; ?>"><?php echo $donnees['nom']." ".$donnees['prenom']; ?></a>
                                    <?php
                                    }
                                    ?>
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">Autres</div>
                            <a class="nav-link" href="clients.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Clients
                            </a>
                                <a class="nav-link" href="salaries.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div> Salariés
                            </a>
                            <a class="nav-link" href="../index.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-arrow-alt-circle-left"></i></div>
                                    Retour sur le site
                                </a>
                            
                        </div>
                    </div>
                    <a class="nav-link" href="deconnexion.php" style="color:grey">Se déconnecter </a><div class="sb-sidenav-footer">
                        
                        <div class="small">Connecté en tant que :</div>
                        <?php if(isset($_SESSION['identifiant'])){ echo $_SESSION['identifiant'];}?>
                    </div>
                </nav>
            </div>
        </div>

