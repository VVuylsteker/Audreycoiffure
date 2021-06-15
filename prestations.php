<?php 
session_start();
require_once('admin/db_connect.php');

$result_background = get_bdd()->query("SELECT contenu FROM personnalisation WHERE description='image_background'")->fetch();
$lien_bg = substr($result_background['contenu'],3);

$background_homme = get_bdd()->query("SELECT contenu FROM personnalisation WHERE description='background_homme'")->fetch();
$lien_bg_homme = substr($background_homme['contenu'],3);

$background_femme = get_bdd()->query("SELECT contenu FROM personnalisation WHERE description='background_femme'")->fetch();
$lien_bg_femme = substr($background_femme['contenu'],3);

$background_enfant = get_bdd()->query("SELECT contenu FROM personnalisation WHERE description='background_enfant'")->fetch();
$lien_bg_enfant = substr($background_enfant['contenu'],3);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Nos Prestations</title>
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


  <div class="sliderfull">
  <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classicslider1" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;"> 
    <!-- START REVOLUTION SLIDER 5.0.7 auto mode -->
    <div id="rev_slider_4_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
      <ul>
        <!-- SLIDE  -->
        <li data-index="rs-16" data-transition="zoomout" data-slotamount="default"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description=""> 
          <!-- MAIN IMAGE --> 
          <img src="<?php echo $lien_bg; ?>"  alt="slider"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina> 
        </li>
      </ul>
      <div class="tp-static-layers"></div>
      <div class="tp-bannertimer" style="height: 7px; background-color: rgba(255, 255, 255, 0.25);"></div>
    </div>
  </div>
</div>

  <section id="services" class="col-padtop">
    <div class="container">
      <div class="row marbottom">
        <div class="col-lg-12 text-center" style="margin-bottom:30px;">
            <h2>Nos prestations</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar luctus est eget congue. Nam auctor nisi est, nec tempus lacus.</p>
        </div>
      </div>
      
      <div class="row marbottom wow fadeInUp">
        <div class="col-sm-12 col-md-7 col-lg-7 col-padright-none">
          <div class="subtitle">
            <h2 class="titile col-xs-offset-1 col-sm-offset-0 col-md-offset-1 " id="homme">Homme</h2>
          </div>
          <img src="<?php echo $lien_bg_homme; ?>" class="img-responsive" alt="coiffure homme" height="394" width="684"> 
         </div>
        <div class="col-sm-12 col-md-5 col-lg-5 col-padleft-none">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>prestation</th>
                <th>durée</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Shampooing + coupe</td>
                <td>30 minutes</td>
             
              </tr>
              <tr>
                <td>Rituel de barbe</td>
                <td>$90</td>
              
              </tr>

                <td>Cut</td>
                <td>$</td>
                
              </tr>
              <tr>
                <td>Cut</td>
                <td>$</td>
              
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      
      <div class="row marbottom wow fadeInUp">
        <div class="col-sm-12 col-md-7 col-lg-7 col-padleft-none displayhide">
          <img src="<?php echo $lien_bg_femme; ?>" class="img-responsive" alt="coiffure femme"height="394" width="684"> </div>
        <div class="col-sm-12 col-md-5 col-lg-5 col-padright-none">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>COLOUR</th>
                <th>Jnr</th>
                <th>Snr</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="bigw">Permanent, Demi Gloss</td>
                <td class="smallw">from $70</td>
                <td>from $80</td>
              </tr>
              <tr>
                <td>Colour Correction</td>
                <td>from $90</td>
                <td>from $110</td>
              </tr>
              <tr>
                <td>Fashion Foiling</td>
                <td>from $75</td>
                <td>from $85</td>
              </tr>
              <tr>
                <td>Tint roots</td>
                <td>$75</td>
                <td>$85</td>
              </tr>
              <tr>
                <td>Tint and foils</td>
                <td>$110</td>
                <td>$120</td>
              </tr>
              <tr>
                <td>Half Head - Short</td>
                <td>from $120</td>
                <td>from $130</td>
              </tr>
              <tr>
                <td>Half Head - Long</td>
                <td>from $150</td>
                <td>from $170</td>
              </tr>
              <tr>
                <td>Full Head - Short</td>
                <td>from $160</td>
                <td>from $180</td>
              </tr>
              <tr>
                <td>Full Head - Long</td>
                <td>from $220</td>
                <td>from $250</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="col-sm-12 col-md-7 col-lg-7 col-padleft-none displayvisible">
          <div class="subtitle">
            <h2 class="titile col-xs-offset-2" id="femme">FEMME</h2>
          </div>
          <img src="<?php echo $lien_bg_femme; ?>" class="img-responsive" alt="coiffure femme"> </div>
      </div>

      <div class="row wow fadeInUp">
        <div class="col-sm-12 col-md-7 col-lg-7 col-padright-none">
          <div class="subtitle">
            <h2 class="titile col-xs-offset-1" id="enfant">ENFANT et adolescant</h2>
          </div>
          <img src="<?php echo $lien_bg_enfant; ?>" class="img-responsive" alt="coiffure enfant"> </div>
        <div class="col-sm-12 col-md-5 col-lg-5 col-padleft-none">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>STYLE</th>
                <th>PRICE</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Blowdrying - Short</td>
                <td>$60</td>
              </tr>
              <tr>
                <td>Blowdrying - Medium</td>
                <td>$70</td>
              </tr>
              <tr>
                <td>Blowdrying - Long</td>
                <td>$80</td>
              </tr>
              <tr>
                <td>Formals</td>
                <td>$130</td>
              </tr>
              <tr>
                <td>Bride</td>
                <td>$180</td>
              </tr>
              <tr>
                <td>Style</td>
                <td>$</td>
              </tr>
              <tr>
                <td>Style</td>
                <td>$</td>
              </tr>
              <tr>
                <td>Style</td>
                <td>$</td>
              </tr>
              <tr>
                <td>Style</td>
                <td>$</td>
              </tr>
            </tbody>
          </table>
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

</html>
