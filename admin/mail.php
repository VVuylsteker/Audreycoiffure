<?php
session_start();
include('db_connect.php');
include('compteur.php');

// Restriction, permets de voir la page uniquement aux utilisateurs connectés
if(!empty($_SESSION['identifiant'])){

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tableau de bord - Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <?php require_once('includes/header.php');   

?>
    </head>
    <body class="sb-nav-fixed">

        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Envoi de mail</h1>
                        
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                      <i class="fas fa-pen"></i>
                                        Rédaction
                                    </div>
                                    <div class="card-body">
                                    <form>
                                    <div class="form-group">
                                            <label for="inputAddress">Objet du mail</label>
                                            <input type="text" class="form-control" id="inputAddress" placeholder="AudreyCoiffure : Message d'informations">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <label for="inputEmail4">Titre (Noir)</label>
                                            <input type="text" class="form-control" id="inputEmail4" placeholder="Message d'informations du ">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="inputPassword4">Titre (Vert)</label>
                                            <input type="text" class="form-control" id="inputPassword4" placeholder="Salon">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label for="inputAddress">Message</label>
                                        <textarea name="" id="" class="form-control" cols="30" rows="10"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-secondary" style="float: right;">Envoyer</button>
                                    </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-eye"></i>
                                        Visualisation
                                    </div>
                                    <div class="card-body">
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
                                                            <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img width="100" border="0" style="display: block; width: 100px;" src="../images/logo_2.png" alt="" /></a>
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
                                                                    <a href="https://www.audreycoiffure59.fr" style="color: #312c32; text-decoration: none;">L'EQUIPE</a>
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

                                                            <p style="line-height: 24px">
                                                            L'équipe d'AudreyCoiffure.
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                    
                        </table>
                    
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
                                                                        <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img width="80" border="0" style="display: block; width: 80px;" src="../images/logo_2.png" alt="" /></a>
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
                    
                        </table>
                        <!-- se deseincrire -->

                    </body>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <?php ?>
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
<?php
}
else{
    header('Location: connexion.php');  
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

