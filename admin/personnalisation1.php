<?php
session_start();
require('db_connect.php');

function verifApostrophe($text){
    $text = str_replace("'", "\'", $text);
    return $text;
}
function changeIndex(){

    $result_background = get_bdd()->query("SELECT contenu FROM personnalisation WHERE description='image_background'")->fetch();
    $lien_bg = substr($result_background['contenu'],3);
    $result_titre = get_bdd()->query("SELECT contenu FROM personnalisation WHERE description='titre_index'")->fetch();
    $result_description = get_bdd()->query("SELECT contenu FROM personnalisation WHERE description='description_index'")->fetch();
    $result_titre_equipe = get_bdd()->query("SELECT id, contenu FROM personnalisation WHERE description='titre_equipe'")->fetch();
    $result_description_equipe = get_bdd()->query("SELECT id, contenu FROM personnalisation WHERE description='description_equipe'")->fetch();
    $presentation_titre = get_bdd()->query("SELECT id, contenu FROM personnalisation WHERE description='titre_presentation'")->fetch();
    $presentation_description = get_bdd()->query("SELECT id, contenu FROM personnalisation WHERE description='description_presentation'")->fetch();


    $myfile = fopen("../index.php", "w") or die("Impossible d'ouvrir le fichier !");
    $txt = '
    <?php
session_start();
require_once(\'fonction_client.php\');
require_once(\'admin/db_connect.php\');
require_once(\'admin/compteur.php\');


add_visit();


?>
    <!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Salon - Audrey Coiffure</title>
            <link href=\'https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,300\' rel=\'stylesheet\' type=\'text/css\'>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">
            <link rel="stylesheet" type="text/css" href="css/master.css">
            <link rel="icon" href="images/favicon.ico" />
        </head>
        <body>
            <div id="overlay"></div>
            <div id="mobile-menu">
            <ul>
                <li class="page-scroll"><a href="index.php">Le salon</a></li>
                <li class="page-scroll"><a href="index.php#ourteam">L\'équipe</a></li>
                <li><a href="prestations.php">Prestations</a></li>
                <li><a href="rendez-vous.php">Rendez-vous</a></li>
                <li><a href="portfolio.php">Portfolio</a></li>
                <li><a href="#contact">Contact</a></li>
                <?php
                if(isset($_SESSION[\'id_client\'])){
                ?>
                <li><a href="mes-rendez-vous.php">Mes Rendez-vous</a></li>
                <li><a href="deconnexion.php">Se déconnecter</a></li>
                <?php
                }else{
                ?>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <?php
                }
                ?>
            </ul>
            </div>
            <div id="page">
            <header id="pagetop">
                <nav>
                <div class="container">
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="logo page-scroll"><a href="#pagetop"><img src="images/logo.png" alt="logo"></a></div>
                        <div class="mm-toggle-wrap">
                        <div class="mm-toggle"> <i class="icon-menu"><img src="images/menu-icon.png" alt="Menu"></i></div>
                        </div>
                        <ul class="menu">
                        <li class="page-scroll"><a href="index.php">Le Salon</a></li>
                        <li class="page-scroll"><a href="index.php#ourteam">L\'équipe</a></li>
                        <li><a href="prestations.php">Prestations</a>
                            <ul>
                            <li><a href="prestations.php#homme">Homme</a></li>
                            <li><a href="prestations.php#femme">Femme</a></li>
                            <li><a href="prestations.php#enfant">Enfant</a></li>
                            </ul>
                        </li>
                        <li><a href="rendez-vous.php">Rendez-vous</a></li>
                        <li><a href="portfolio.php">Portfolio</a></li>
                        
                        <li><a href="#contact">Contact</a></li>
                        <?php
                            if(isset($_SESSION[\'id_client\'])){
                            ?>
                            <li>
                            <a href="">Mon compte</a>
                            <ul>
                            <li><a href="mes-rendez-vous.php">Paramètres</a></li>
                            <li><a href="mes-rendez-vous.php">Mes Rendez-vous</a></li>
                            <li><a href="deconnexion.php">Se déconnecter</a></li>
                            </ul>
                            </li>
                            <?php
                            }
                            else{
                            ?>
                            <li><a href="connexion.php">Connexion</a></li>
                            <li><a href="inscription.php">Inscription</a></li>
                            <?php
                            }
                        ?>
                        </ul>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                </nav>
            </header>
            
            <div class="sliderfull">
            <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classicslider1" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;"> 
            <!-- START REVOLUTION SLIDER 5.0.7 auto mode -->
            <div id="rev_slider_4_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
                <ul>
                <!-- SLIDE  -->
                <li data-index="rs-16" data-transition="zoomout" data-slotamount="default"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description=""> 
                    <!-- MAIN IMAGE --> 
                    <img src='.$lien_bg.' alt="slider"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina> 
                </li>
                </ul>
                <div class="tp-static-layers"></div>
                <div class="tp-bannertimer" style="height: 7px; background-color: rgba(255, 255, 255, 0.25);"></div>
            </div>
            </div>
            </div>
            
            <section class="slider-titile">
            <div class="container">
            <div class="row">
            <div class="col-lg-11 pull-right">
            <div class="titile-bg">
                <h1>'.$result_titre['contenu'].'</h1>
            </div>
            <div class="white-bg">
            <p style="text-align: justify;">'.$result_description['contenu'].'</p>
            </div> 
            </div>
            </div>
            </div>
            </section>
            <section id="salon" class="col-padtop wow fadeInUp">
            <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 col-padright-none wow fadeInLeft"><img src="images/salon1.jpg" alt="Saloon" /></div>
                <div class="col-sm-6 col-md-6 col-lg-6 col-padleft-none wow fadeInRight"><img src="images/salon2.jpg" alt="Saloon" /></div>
                <div class="col-sm-6 col-md-6 col-lg-6 col-padleft-none wow fadeInRight"><img src="images/salon3.jpg" alt="Saloon" /></div>
            </div>
            </div>

            </section>

            
  <section id="ourteam" class="wow fadeInUp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-4 col-lg-4">
        <h2>'.$result_titre_equipe['contenu'].'</h2>
        <div class="ourteamd">
          <p style="text-align: justify;">'.$result_description_equipe['contenu'].'</p>
        </div>
      </div>
      <div class="col-sm-12 col-md-8 col-lg-8">
        <div class="responsive">
          <div> 
            <div class="third-effect">
                <img src="https://www.placehold.it/384x444" class="img-responsive" alt="Our Team">
            </div>
            <div class="team">
              <h3>Sara Anderson</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar luctus est eget congue. Nam auctor nisi est, nec tempus lacus.</p>
            </div>
          </div>

          <div> 
             <div class="third-effect">
                <img src="https://www.placehold.it/384x444" class="img-responsive" alt="Our Team">
            </div> 
            <div class="team">
              <h3>Medona Johnson</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar luctus est eget congue. Nam auctor nisi est, nec tempus lacus.</p>
            </div>
          </div>

          <div> 
            <div class="third-effect">
                <img src="https://www.placehold.it/384x444" class="img-responsive" alt="Our Team">
            </div> 
            <div class="team">
              <h3>Andria Joseph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar luctus est eget congue. Nam auctor nisi est, nec tempus lacus.</p>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</section>

<section id="video" class="col-padtop wow fadeInUp">
<div class="container">
  <div class="row">
    <div class="col-md-7 col-lg-8">
      <div class="responsive-object">
        <iframe src="https://www.youtube.com/embed/7ZgTqlGGSNc?rel=0&amp;controls=0&amp;showinfo=0" allowfullscreen></iframe>
      </div>
    </div>
    <div class="col-md-5 col-lg-4 pull-right">
      <h2>'.$presentation_titre['contenu'].'</h2>
      <p style="text-align:justify;">'.$presentation_description['contenu'].'</p>
    </div>
  </div>
</div>
</section>


<section id="contact" class="wow fadeInUp">
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2>Contact</h2>
    </div>
    <div class="col-sm-12 col-md-8 col-lg-8">
      <div class="contactmap">
        <div class="mapcont">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d161769.52135333332!2d2.7442918752586523!3d50.68934421231165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47dcdc79a5e10cc3%3A0xe7941e875666e92b!2sAudrey%20Coiffure!5e0!3m2!1sfr!2sfr!4v1612823091525!5m2!1sfr!2sfr" style="border:0"></iframe>
        </div>
        <div class="social">
        <h6>Audrey Coiffure</h6>
          <p>12 Rue de Berthen, 59270 Saint-Jans-Cappel</p>
          <span>Téléphone : <a href="tel:0328402086">03 28 40 20 86</a></span>
          <div class="social-icon"> <a href="https://www.facebook.com/audreycoiffure59270" class="facebook"></a> <a href="https://www.instagram.com/coiffureaudrey" class="twitter"></a> </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4 pull-right">
              <?php
                    if(!empty($msg)){
                ?>
                    <div class="alert alert-success" role="alert" style="margin-top:20px;">
            <?php echo nl2br($msg);  ?>
            </div>
                <?php
                    }elseif(!empty($msg_erreur)){
                      ?>
                      <div id="ContactErrorMessage"><div class="alert alert-danger" role="alert" style="margin-top:20px;">
              <?php echo $msg_erreur ?>
              </div></div>
              <form action="" name="ContactForm" id="ContactForm" method="post">
        <div class="form-group pull-left">
          <input type="text" class="form-control required" name="nom_prenom" id="nom_prenom" placeholder="Nom prénom" required>
        </div>
        <div class="form-group pull-left marright0">
          <input type="mail" class="form-control required" name="mail" id="mail" placeholder="Mail" required>
        </div>
        <div class="textarea pull-left ">
          <textarea placeholder="Message" name="description" id="description" class="form-control" required></textarea>
        </div>
        <button type="submit" name="message" class="btn btn-primary">ENVOYER</button>
      </form>
                    <?php }
                    
                    else { ?>


      <form action="" name="ContactForm" id="ContactForm" method="post">
        <div class="form-group pull-left">
          <input type="text" class="form-control required" name="nom_prenom" id="nom_prenom" placeholder="Nom prénom" required>
        </div>
        <div class="form-group pull-left marright0">
          <input type="mail" class="form-control required" name="mail" id="mail" placeholder="Mail" required>
        </div>
        <div class="textarea pull-left ">
          <textarea placeholder="Message" name="description" id="description" class="form-control" required></textarea>
        </div>
        <button type="submit" name="message" class="btn btn-primary">ENVOYER</button>
      </form> <?php }
                ?>
      
      <div class="coypright" style="text-align: center;">
    
        <a>Mentions légales</a><span> - </span>
        <a>Protection des données</a><br>
        <a>Conditions générales d\'utilisation</a>
        <p>Audrey Coiffure - EIRL VANDENBROUCKE</p>
      </div>
    </div>
  </div>
</div>
</section>


<a href="#" class="scrollup">Top</a>
</body>
<script src="js/jquery.1.11.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/function.js"></script>
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/parallax.js"></script> 
<script src="js/scorll.js"></script> 
<script src="js/jquery.easing.min.js"></script> 
<script src="js/slick.js"></script> 
<script src="js/menu.js"></script> 
<script src="js/ios-timer.js"></script> 
<script src="js/jquery.fencybox.js"></script> 
<script src="js/jquery.portfolio.js"></script> 
<script src="js/jquery.mousewheel-3.0.6.pack.js"></script>
<script src="js/wow.js"></script>
<script src="js/jquery.validate.js"></script>
<!-- REVOLUTION JS FILES --> 
<script type="text/javascript" src="js/revoluation/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="js/revoluation/jquery.themepunch.revolution.min.js"></script> 
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
(Load Extensions only on Local File Systems ! 
The following part can be removed on Server for On Demand Loading) --> 
<script type="text/javascript" src="js/revoluation/revolution.extension.layeranimation.min.js"></script> 
<script type="text/javascript" src="js/revoluation/revolution.extension.migration.min.js"></script> 
<script type="text/javascript" src="js/revoluation/revolution.extension.navigation.min.js"></script> 
<script type="text/javascript" src="js/revoluation/revolution.extension.parallax.min.js"></script> 
<script type="text/javascript" src="js/revoluation/revolution.extension.slideanims.min.js"></script> 
<script type="text/javascript" src="js/revoluation/revoluationfunction.js"></script> 
<script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>
</html>

    
    ';
    fwrite($myfile, $txt);
    fclose($myfile);
    return 0;
}

if(!empty($_SESSION['identifiant'])){

    if(isset($_POST['salon'])) {
    
        $titre = verifApostrophe($_POST['titre']);
        $req1 = get_bdd()->prepare("UPDATE personnalisation SET contenu = '$titre' WHERE id = '1'");
        $req1->execute();

        $description = verifApostrophe($_POST['description']);
        $req2 = get_bdd()->prepare("UPDATE personnalisation SET contenu = '$description' WHERE id = '2'");
        $req2->execute();

        changeIndex();

        $msg ="Les modifications du salon ont été apportées avec succès";
    }
    if(isset($_POST['equipe'])) {
    
        $titre = verifApostrophe($_POST['titre_equipe']);
        $req1 = get_bdd()->prepare("UPDATE personnalisation SET contenu = '$titre' WHERE id = '9'");
        $req1->execute();

        $description = verifApostrophe($_POST['description_equipe']);
        $req2 = get_bdd()->prepare("UPDATE personnalisation SET contenu = '$description' WHERE id = '10'");
        $req2->execute();

        changeIndex();

        $msg ="Les modifications de l'équipe ont été apportées avec succès";
    }
    if(isset($_POST['presentation'])) {
        $titre = verifApostrophe($_POST['description']);
        $req1 = get_bdd()->prepare("UPDATE personnalisation SET contenu = '$titre' WHERE id = '12'");
        $req1->execute();

        $description = verifApostrophe($_POST['description']);
        $req2 = get_bdd()->prepare("UPDATE personnalisation SET contenu = '$description' WHERE id = '13'");
        $req2->execute();

        changeIndex();

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