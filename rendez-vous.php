<?php
session_start();
require_once('admin/db_connect.php');

$id = $_SESSION['id_client'];
$today = date("Y-m-j"); 
$day_max = date('Y-m-j', strtotime($today. ' + 90 days'));

$req = get_bdd()->query('SELECT id, prenom FROM salaries WHERE actif="1" ORDER BY prenom ASC');
$req1 = get_bdd()->query('SELECT nom, temps FROM prestations');
$req2 = get_bdd()->query('SELECT * FROM personnalisation WHERE description ="system_rdv"')->fetch();
$req3 = get_bdd()->query("SELECT prenom, mail, cle_validation, valide FROM clients WHERE id='$id'")->fetch();

$result_background = get_bdd()->query("SELECT contenu FROM personnalisation WHERE description='image_background'")->fetch();
$lien_bg = substr($result_background['contenu'],3);

$result_titre = get_bdd()->query("SELECT id, contenu FROM personnalisation WHERE description='titre_rdv'")->fetch();
$result_description = get_bdd()->query("SELECT id, contenu FROM personnalisation WHERE description='description_rdv'")->fetch();


if(isset($_POST['send_mail'])){
  $verif = $req3['cle_validation'];
  $mail = $req3['mail'];
  $prenom = $req3['prenom'];

  $header="MIME-Version: 1.0\r\n";
  $header.='From:"AudreyCoiffure"<contact@audreycoiffure59.fr>'."\n";
  $header.='Content-Type:text/html; charset="uft-8"'."\n";
  $header.='Content-Transfer-Encoding: 8bit';

  $message='
  <html xmlns:v="urn:schemas-microsoft-com:vml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    
        <title>Material Design for Bootstrap</title>
    
        <style type="text/css">
            body {
                width: 100%;
                background-color: #ffffff;
                margin: 0;
                padding: 0;
                -webkit-font-smoothing: antialiased;
                mso-margin-top-alt: 0px;
                mso-margin-bottom-alt: 0px;
                mso-padding-alt: 0px 0px 0px 0px;
            }
    
            p,
            h1,
            h2,
            h3,
            h4 {
                margin-top: 0;
                margin-bottom: 0;
                padding-top: 0;
                padding-bottom: 0;
            }
    
            span.preheader {
                display: none;
                font-size: 1px;
            }
    
            html {
                width: 100%;
            }
    
            table {
                font-size: 14px;
                border: 0;
            }
            /* ----------- responsivity ----------- */
    
            @media only screen and (max-width: 640px) {
                /*------ top header ------ */
                .main-header {
                    font-size: 20px !important;
                }
                .main-section-header {
                    font-size: 28px !important;
                }
                .show {
                    display: block !important;
                }
                .hide {
                    display: none !important;
                }
                .align-center {
                    text-align: center !important;
                }
                .no-bg {
                    background: none !important;
                }
                /*----- main image -------*/
                .main-image img {
                    width: 440px !important;
                    height: auto !important;
                }
                /* ====== divider ====== */
                .divider img {
                    width: 440px !important;
                }
                /*-------- container --------*/
                .container590 {
                    width: 440px !important;
                }
                .container580 {
                    width: 400px !important;
                }
                .main-button {
                    width: 220px !important;
                }
                /*-------- secions ----------*/
                .section-img img {
                    width: 320px !important;
                    height: auto !important;
                }
                .team-img img {
                    width: 100% !important;
                    height: auto !important;
                }
            }
    
            @media only screen and (max-width: 479px) {
                /*------ top header ------ */
                .main-header {
                    font-size: 18px !important;
                }
                .main-section-header {
                    font-size: 26px !important;
                }
                /* ====== divider ====== */
                .divider img {
                    width: 280px !important;
                }
                /*-------- container --------*/
                .container590 {
                    width: 280px !important;
                }
                .container590 {
                    width: 280px !important;
                }
                .container580 {
                    width: 260px !important;
                }
                /*-------- secions ----------*/
                .section-img img {
                    width: 280px !important;
                    height: auto !important;
                }
            }
        </style>
        <!--[if gte mso 9]><style type=”text/css”>
            body {
            font-family: arial, sans-serif!important;
            }
            </style>
        <![endif]-->
    </head>
    
    
    <body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <!-- pre-header -->
        <table style="display:none!important;">
            <tr>
                <td>
                    <div style="overflow:hidden;display:none;font-size:1px;color:#ffffff;line-height:1px;font-family:Arial;maxheight:0px;max-width:0px;opacity:0;">
                    Bienvenue sur AudreyCoiffure59 !
                    </div>
                </td>
            </tr>
        </table>
        <!-- pre-header end -->
        <!-- header -->
        <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff">
    
            <tr>
                <td align="center">
                    <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">
    
                        <tr>
                            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                        </tr>
    
                        <tr>
                            <td align="center">
    
                                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">
    
                                    <tr>
                                        <td align="center" height="70" style="height:70px;">
                                            <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img width="100" border="0" style="display: block; width: 100px;" src="https://audreycoiffure59.fr/images/logo_2.png" alt="" /></a>
                                        </td>
                                    </tr>
    
                                    <tr>
                                        <td align="center">
                                            <table width="360 " border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                                class="container590 hide">
                                                <tr>
                                                <td width="120" align="center" style="font-size: 14px; font-family: Work Sans, Calibri, sans-serif; line-height: 24px;">
                                                    <a href="https://www.audreycoiffure59.fr" style="color: #312c32; text-decoration: none;">LE SALON</a>
                                                </td>
                                                <td width="120" align="center" style="font-size: 14px; font-family: Work Sans, Calibri, sans-serif; line-height: 24px;">
                                                    <a href="https://www.audreycoiffure59.fr" style="color: #312c32; text-decoration: none;">L\'EQUIPE</a>
                                                </td>
                                                <td width="120" align="center" style="font-size: 14px; font-family: Work Sans, Calibri, sans-serif; line-height: 24px;">
                                                    <a href="https://www.audreycoiffure59.fr" style="color: #312c32; text-decoration: none;">PRESTATIONS</a>
                                                </td>
                                                    <td width="120" align="center" style="font-size: 14px; font-family: Work Sans, Calibri, sans-serif; line-height: 24px;">
                                                        <a href="" style="color: #312c32; text-decoration: none;">RENDEZ-VOUS</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
    
                        <tr>
                            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                        </tr>
    
                    </table>
                </td>
            </tr>
        </table>
        <!-- end header -->
    
        <!-- big image section -->
    
        <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">
    
            <tr>
                <td align="center">
                    <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">
    
                        <tr>
                            <td align="center" style="color: #343434; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;"
                                class="main-header">
                                <!-- section text ======-->
    
                                <div style="line-height: 35px">
    
                                    Bienvenue sur <span style="color: #55a53e;">AudreyCoiffure</span>
    
                                </div>
                            </td>
                        </tr>
    
                        <tr>
                            <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                        </tr>
    
                        <tr>
                            <td align="center">
                                <table border="0" width="40" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                    <tr>
                                        <td height="2" style="font-size: 2px; line-height: 2px;">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
    
                        <tr>
                            <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                        </tr>
    
                        <tr>
                            <td align="left">
                                <table border="0" width="590" align="center" cellpadding="0" cellspacing="0" class="container590">
                                    <tr>
                                        <td align="left" style="color: #888888; font-size: 16px; font-family: Work Sans, Calibri, sans-serif; line-height: 24px;">
                                            <!-- section text ======-->
    
                                            <p style="line-height: 24px; margin-bottom:15px;">
    
                                                '.$prenom.',
    
                                            </p>
                                            <p style="line-height: 24px;margin-bottom:15px;">
                                            Vous venez de vous inscrire sur Audreycoiffure59.fr et nous vous en remercions.
                                            Cependant, veuillez confirmer votre adresse e-mail pour prendre un rendez-vous.
                                            </p>
                                            <p style="line-height: 24px; margin-bottom:20px;">
                                            Votre email de connexion : '.$mail.'                                                           </p>
                                            <table border="0" align="center" width="180" cellpadding="0" cellspacing="0" bgcolor="55a53e" style="margin-bottom:20px;">
    
                                                <tr>
                                                    <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                                </tr>
    
                                                <tr>
                                                    <td align="center" style="color: #ffffff; font-size: 14px; font-family: Work Sans, Calibri, sans-serif; line-height: 22px;">
                                                        <!-- main section button -->
    
                                                        <div style="line-height: 22px;">
                                                            <a href="https://www.audreycoiffure59.fr/confirmation.php?verification='.$verif.'" style="color: #ffffff; text-decoration: none;">Confirmez votre compte</a>
                                                        </div>
                                                    </td>
                                                </tr>
    
                                                <tr>
                                                    <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                                </tr>
    
                                            </table>
                                            <p style="line-height: 24px">
                                            L\'équipe d\'AudreyCoiffure.
                                            </p>
    
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
    
    
    
    
    
                    </table>
    
                </td>
            </tr>
    
            <tr>
                <td height="40" style="font-size: 40px; line-height: 40px;">&nbsp;</td>
            </tr>
    
        </table>
    
        <!-- end section -->
    
    
        <!-- contact section -->
        <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">
    
            <tr>
                <td height="60" style="font-size: 60px; line-height: 60px;">&nbsp;</td>
            </tr>
    
            <tr>
                <td align="center">
                    <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590 bg_color">
    
                        <tr>
                            <td align="center">
                                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590 bg_color">
    
                                    <tr>
                                        <td>
                                            <table border="0" width="300" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                                class="container590">
    
                                                <tr>
                                                    <!-- logo -->
                                                    <td align="left">
                                                        <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img width="80" border="0" style="display: block; width: 80px;" src="https://audreycoiffure59.fr/images/logo_2.png" alt="" /></a>
                                                    </td>
                                                </tr>
    
                                                <tr>
                                                    <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                                                </tr>
    
                                                <tr>
                                                    <td align="left" style="color: #888888; font-size: 14px; font-family: Work Sans, Calibri, sans-serif; line-height: 23px;"
                                                        class="text_color">
                                                        <div style="color: #333333; font-size: 14px; font-family: Work Sans, Calibri, sans-serif; font-weight: 600; mso-line-height-rule: exactly; line-height: 23px;">
    
                                                            Contactez-nous : <br/><span style="color: #888888; font-size: 14px; font-family: Hind Siliguri, Calibri, Sans-serif; font-weight: 400;">Téléphone : <a href="tel:0328402086">03 28 40 20 86</a></span> <a href="mailto:" style="color: #888888; font-size: 14px; font-family: Hind Siliguri, Calibri, Sans-serif; font-weight: 400;">contact@audreycoiffure59.fr</a>
    
                                                        </div>
                                                    </td>
                                                </tr>
    
                                            </table>
    
                                            <table border="0" width="2" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                                class="container590">
                                                <tr>
                                                    <td width="2" height="10" style="font-size: 10px; line-height: 10px;"></td>
                                                </tr>
                                            </table>
    
                                            <table border="0" width="200" align="right" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                                class="container590">
    
                                                <tr>
                                                    <td class="hide" height="45" style="font-size: 45px; line-height: 45px;">&nbsp;</td>
                                                </tr>
    
    
    
                                                <tr>
                                                    <td height="15" style="font-size: 15px; line-height: 15px;">&nbsp;</td>
                                                </tr>
    
                                                <tr>
                                                    <td>
                                                        <table border="0" align="right" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td>
                                                                    <a href="https://www.facebook.com/mdbootstrap" style="display: block; border-style: none !important; border: 0 !important;"><img width="24" border="0" style="display: block;" src="http://i.imgur.com/Qc3zTxn.png" alt=""></a>
                                                                </td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                <td>
                                                                    <a href="https://twitter.com/MDBootstrap" style="display: block; border-style: none !important; border: 0 !important;"><img width="24" border="0" style="display: block;" src="http://i.imgur.com/RBRORq1.png" alt=""></a>
                                                                </td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
    
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
    
            <tr>
                <td height="60" style="font-size: 60px; line-height: 60px;">&nbsp;</td>
            </tr>
    
        </table>
        <!-- end section -->
    

    </body>
  
  </html>

  
  ';

  mail($mail, "Confirmation de compte AudreyCoiffure59.fr", $message, $header);
  $msg_mail ="Un email de confirmation vient de vous être envoyé";
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Demande de rendez-vous</title>
<link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,300' rel='stylesheet' type='text/css'>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/master.css">


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

  <section id="appoinment" class="col-padtop wow fadeInUp">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="appoimentbg">
            <div class="col-sm-12 col-md-9 col-lg-8">
              <h2><?php echo $result_titre['contenu']; ?></h2>
              <p style="margin-bottom:20px;"><?php echo $result_description['contenu']; ?></p>
            </div>
         
            <div class="appfrm">	

                              <?php
                        if(isset($_SESSION['id_client'])){
                          if($req3['valide'] == 1){
                          if($req2['contenu'] == 1){

                      ?>
               
                                <div id="SuccessMessage"></div>
                              <div id="ErrorMessage"></div>
                              <form  action="" method="post">
                                <div class="col-sm-12 col-md-8 col-lg-7 appfrmleft">
                                  <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" name="nom" id="nom" class="form-control" required>
                                  </div>
                                  <div class="form-group mt-right0">
                                    <label>Prénom</label>
                                    <input type="text" class="form-control" name="prenom" id="prenom" required/>
                                  </div>

                                  <div class="form-group">
                                    <label>Prestations</label>
                                    <select name="" id="" class="form-control">
                                      <option value="">aa</option>
                                      <option value="">aa</option>
                                      <option value="">aa</option>
                                    </select>
                                  </div>
                                  <div class="form-group mt-right0">
                                    <label>Commentaire</label>
                                    <input type="text" class="form-control" name="prenom" id="prenom" required/>
                                  </div>
                                  <div style="float: right;">
                                          <button type="submit" class="btn btn-default" name="submit" value="Submit" >SUIVANT</button>
                                      </div>
                                
                                  </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-5 appfrmright">
                                      <div class="form-group">
                                        <label class="control-label">Choisir le rendez-vous</label>
                                        <select class="form-control" size="5">
                                        <option value="1">15:30 le 05/07/2021 avec Audrey</option>
                                          <option value="1">9:00 le 06/07/2021 avec Estelle</option>
                                          <option value="1">11:05 le 07/07/2021 avec Caroline</option>
                                          <option value="1">14:15 le 08/07/2021 avec Audrey</option>
                                          <option value="1">16:30 le 09/07/2021 avec Caroline</option>
                                          <option value="1">15:30 le 05/07/2021 avec Audrey</option>
                                          <option value="1">9:00 le 06/07/2021 avec Estelle</option>
                                          <option value="1">11:05 le 07/07/2021 avec Caroline</option>
                                          <option value="1">14:15 le 08/07/2021 avec Audrey</option>
                                          <option value="1">16:30 le 09/07/2021 avec Caroline</option>
                                          <option value="1">15:30 le 05/07/2021 avec Audrey</option>
                                          <option value="1">9:00 le 06/07/2021 avec Estelle</option>
                                          <option value="1">11:05 le 07/07/2021 avec Caroline</option>
                                          <option value="1">14:15 le 08/07/2021 avec Audrey</option>
                                          <option value="1">16:30 le 09/07/2021 avec Caroline</option>

                                        </select>
                                      </div>
                                      <div style="float: right;">
                                          <button type="submit" class="btn btn-default" name="submit" value="Submit" >VALIDER LE RENDEZ-VOUS</button>
                                      </div>	
                                </div> 
                              </form>
    <?php
      }
      else{
        ?>

      <div class="clearfix"></div>
          <div style="background-color: black; padding:30px;">
          <p style="text-align:center;">Le système de rendez-vous est actuellement désactivé.</p>
      <div style="text-align: center;margin-top:20px;">
      </div>
          </div>
        <?php
        
      }}else{
        ?>
<div class="clearfix"></div>
    <div style="background-color: black; padding:30px;">
    <p style="text-align:center;">Pour demandé un rendez-vous, vous devez confirmer votre adresse mail.</p>
                  <?php
                    if(!empty($msg)){
                  ?>
                    <div class="alert alert-success" role="alert" style="margin-top:20px;">
                    <?php echo $msg ?>
                    </div>
                    <?php
                    }
                    ?>
                  <div style="text-align: center;margin-top:20px;">
                  <?php
                    if(empty($msg_mail)){
                      ?>
                        <form action="" method="post">
                          <button class="btn btn-default" name="send_mail">Recevoir un mail de validation</button>
                        </form>
                      <?php
                    }else{
                      ?>
                        <div class="alert alert-success" role="alert" style="margin-top:20px;">
                          <?php echo $msg_mail ?>
                        </div> 
                      <?php
                    }

      }
      }else{
    ?>
    <div class="clearfix"></div>
    <div style="background-color: black; padding:30px;">
    <p style="text-align:center;">Veuillez vous connecter ou vous inscrire pour prendre demander un rendez-vous.</p>
<div style="text-align: center;margin-top:20px;">
  <a href="connexion.php"><button class="btn btn-default">Se connecter</button></a>
  <a href="inscription.php"><button class="btn btn-default">S'inscrire</button></a>
</div>
    </div>

    <?php
      }
    ?>
    


<?php


if(isset($_POST['submit'])){
  if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['coiffeuse']) && !empty($_POST['prestation']) && !empty($_POST['date']) && !empty($_POST['heure']) && !empty($_POST['commentaire'])){
	
  
  $pres = explode(',', $_POST['prestation'], 2);
	$infos = $_POST['nom']." ".$_POST['prenom']." | ".$pres[0]." | ".$_POST['commentaire'];
	$debut = $_POST['date']." ".$_POST['heure'];
	$fin = $_POST['date'];
	$couleur = "";
	$id_salaries = $_POST['coiffeuse'];
	$id_client = $_SESSION['id_client'];

	$date_fin = date('Y-m-d H:i:s',strtotime('+'.$pres[1].' seconds',strtotime($debut)));


	$sql = "INSERT INTO rdv(id, titre, couleur, debut, fin, id_salaries, valide, id_client) values (NULL, '$infos', '$couleur', '$debut', '$date_fin', '$id_salaries', '0', $id_client)";
	//$req = get_bdd()->prepare($sql);
	//$req->execute();
	
	$query = get_bdd()->prepare( $sql );
	if ($query == false) {
	 print_r($connect_bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

?>
      <script>
          swal({
              title: "Votre demande de rendez-vous a bien été envoyé au salon <?=$debut?> !",
              text: "Il est en attente de réponse par le salon. Vous recevrez un mail de confirmation",
              icon: "success",
              type: "success"
          }).then(function() {
              window.location = "mes-rendez-vous.php";
          });
      </script>
<?php
}
else{
  ?>
  <script>
      swal("Erreur de saisie détectée ", "Le rendez-vous n'a pas été créé. \n Veuillez verifier vos informations.", "error");
  </script>
  <?php
}

}
?> 
                 
                 <div class="clearfix"></div>
			</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </br></br></br></br>


  
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
