<?php 
session_start();
require_once('fonction_client.php');
require_once('admin/db_connect.php');

$rdvParPage = 5;
$id_session = $_SESSION['id_client'];
$rdvTotalesReq = get_bdd()->query("SELECT id FROM rdv WHERE id_client='$id_session'");
$rdvTotales = $rdvTotalesReq->rowCount();
$pagesTotales = ceil($rdvTotales/$rdvParPage);
if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
   $_GET['page'] = intval($_GET['page']);
   $pageCourante = $_GET['page'];
} else {
   $pageCourante = 1;
}
$depart = ($pageCourante-1)*$rdvParPage;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mes rendez-vous</title>
<link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/master.css">
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<body>
<div id="overlay"></div>
<div id="mobile-menu">
  <ul>
    <li class="page-scroll"><a href="index.php">Le salon</a></li>
    <li class="page-scroll"><a href="index.php#ourteam">L'équipe</a></li>
    <li><a href="prestations.php">Prestations</a></li>
    <li><a href="rendez-vous.php">Rendez-vous</a></li>
    <li><a href="portfolio.php">Portfolio</a></li>
    <li><a href="#contact">Contact</a></li>
    <?php
      if(isset($_SESSION['id_client'])){
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
              <li class="page-scroll"><a href="index.php#ourteam">L'équipe</a></li>
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
                if(isset($_SESSION['id_client'])){
                  ?>
                  <li>
                  <a href="">Mon compte</a>
                <ul>
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


  <section class="blog">
  	<div class="pagetitle wow fadeInUp">
      	<div class="container">
      	   <div class="row">	
        	<div class="col-lg-7 col-sm-6">
               	<h1>Mes rendez-vous</h1>	

            </div>
            <div class="rssdiv">
            	<div class="rssfeed">
                	<a href="rendez-vous.php">
                        <h5>Prendre un rendez-vous</h5>
                    </a>
                </div>
            </div>
           </div>	
        </div>
    </div>
  </section>
  <section>

    <div style="margin: 20px 50px 50px 50px;">
    <?php if($rdvTotales>0){?>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Nom Prénom</th>
            <th scope="col">Prestation</th>
            <th scope="col">Date et heure</th>
            <th scope="col">Commentaire</th>
            <th scope="col">Etat</th>
          </tr>
        </thead>
    <tbody>
      <?php  
      $req = get_bdd()->query('SELECT * FROM rdv WHERE id_client='.$id_session.' ORDER BY id DESC LIMIT '.$depart.','.$rdvParPage);
      while ($donnees = $req->fetch()){ 
        $result = explode('|', $donnees['titre'], 3);
        $result2 = explode(' ', $donnees['debut'], 2);
        $date = date("d-m-Y", strtotime($result2[0]));
        $heure = substr($result2[1], 0,5);
      ?>
      <tr>
        <td><?php echo $result[0];?></td>
        <td><?php echo ucwords($result[1]);?></td>
        <td><?php echo $date." à ".$heure ?></td>
        <td><?php echo $result[2];?></td>
        <td><?php switch ($donnees['valide']) {
          case "0":
            echo "En attente";
            break;
          case "1":
            echo "Valider";
            break;
          case "2":
            echo "Refuser";
            break;
          case "2":
            echo "Annuler";
            break;

          default:
          echo "En attente";
} ?> - Annuler</td>
      </tr>
        <?php } ?>
    </tbody>
  </table>    
  <div style="text-align:center;margin-top:20px;">
  <?php
      for($i=1;$i<=$pagesTotales;$i++) {
         if($i == $pageCourante) {
            echo $i.' ';
         } else {
            echo '<a href="mes-rendez-vous.php?page='.$i.'">'.$i.'</a> ';
         }
      }
      ?>

</div>
    </div>
  <?php }else{ 
  ?>
  <h3 style="text-align:center;">Vous n'avez demandé aucun rendez-vous</h3>
 <?php
  }?>

     
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
              <div class="social-icon"> <a href="https://www.facebook.com/audreycoiffure59270" class="facebook"></a> <a href="#" class="twitter"></a> </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 pull-right">
			<div id="ContactSuccessMessage"></div>
			<div id="ContactErrorMessage"></div>
          <form name="ContactForm" id="ContactForm" method="post">
            <div class="form-group pull-left">
              <input type="text" class="form-control required" name="ContactFullName" id="ContactFullName" placeholder="Nom prénom"  >
            </div>
            <div class="form-group pull-left marright0">
              <input type="text" class="form-control required" name="ContactCompanyName" id="ContactCompanyName" placeholder="Mail">
            </div>
            <div class="textarea pull-left">
              <textarea placeholder="Message" name="ContactDescription" id="ContactDescription" class="form-control"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Envoyer" >
          </form>
          <div class="coypright" style="text-align: center;">
        
            <a>Mentions légales</a><span> - </span>
            <a>Conditions générales d'utilisation</a>
            <p>Audrey Coiffure - EIRL VANDENBROUCKE</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <a href="#" class="scrollup">Top</a>		
</div>
<script src="js/jquery.1.11.2.js"></script> 
<script src="js/bootstrap.js"></script> 
<script src="js/function.js"></script>
<script src="js/modernizr-2.js"></script> 
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
</body>
</html>
