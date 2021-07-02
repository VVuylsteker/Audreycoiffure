<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Inscription - Audrey Coiffure</title>
        <link href="css/styles_connexion.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                    <a href="index.php"><img src="images/logo_2.png" class="img-fluid"></a>
                                    <h3 class="text-center font-weight-light my-4">S'inscrire</h3>
                                    </div>
                                    <div class="card-body">
                                    <form action="inscription.php" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label for="inputNom">Nom</label>
                                        <input type="text" class="form-control" required id="inputNom" name="inputNom" placeholder="" minlength="2" maxlength="50">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="inputPrenom">Prénom</label>
                                        <input type="text" class="form-control" required id="inputPrenom" name="inputPrenom" placeholder="" minlength="2" maxlength="50">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail">Email</label>
                                        <input type="email" class="form-control" required id ="inputEmail" name="inputEmail" placeholder="" minlength="2" maxlength="100">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputPhone">Numéro de téléphone</label>
                                        <input type="text" class="form-control" required id ="inputPhone" name="inputPhone" placeholder="" minlength="5" maxlength="20">
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNaissance">Date de naissance</label>
                                        <input type="date" class="form-control" required id ="inputNaissance" name="inputNaissance">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label for="inputPassword">Mot de passe</label>
                                        <input type="password" class="form-control" required id ="inputPassword" name="inputPassword" minlength="5" maxlength="255">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="inputPassword2">Répéter le mot de passe</label>
                                        <input type="password" class="form-control" required id="inputPassword2" name="inputPassword2" minlength="5" maxlength="255">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-7">
                                        <label for="inputVille">Ville</label>
                                        <input type="text" class="form-control" required id="inputVille" name="inputVille" placeholder="" minlength="3" maxlength="50">
                                        </div>
                                        <div class="form-group col-md-5">
                                        <label for="inputPostal">Code Postal</label>
                                        <input type="text" class="form-control" required id="inputPostal" name="inputPostal" placeholder="" minlength="0" maxlength="10">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                            J’ai lu et j’accepte les conditions
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                            J'accepte la newsletter
                                            </label>
                                        </div>
                                    </div>
                                           
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small dark" href="connexion.php">Déjà inscrit ?</a>
                                                <input type="submit" name ="inscription" value="S'inscrire" class="btn btn-dark">
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>


<?php
require_once("admin/db_connect.php");

if(isset($_POST['inscription'])){
    if(
        !empty($_POST['inputNom']) 
        && !empty($_POST['inputPrenom']) 
        && !empty($_POST['inputEmail'])
        && !empty($_POST['inputNaissance'])
        && !empty($_POST['inputPassword'])
        && !empty($_POST['inputPassword2'])
        && !empty($_POST['inputVille'])
        && !empty($_POST['inputPostal'])
        && !empty($_POST['inputPhone'])

    ){
        $nom = htmlspecialchars($_POST['inputNom'], ENT_QUOTES);
        $prenom = htmlspecialchars($_POST['inputPrenom'], ENT_QUOTES);
        $email = htmlspecialchars(strtolower($_POST['inputEmail']), ENT_QUOTES);
        $naissance = htmlspecialchars($_POST['inputNaissance'], ENT_QUOTES);
        $pwd = htmlspecialchars($_POST['inputPassword'], ENT_QUOTES);
        $pwd2 = htmlspecialchars($_POST['inputPassword2'], ENT_QUOTES);
        $ville = htmlspecialchars($_POST['inputVille'], ENT_QUOTES);
        $postal = htmlspecialchars($_POST['inputPostal'], ENT_QUOTES);
        $phone =  htmlspecialchars($_POST['inputPhone'], ENT_QUOTES);
        
        $nom = ucwords(strtolower($nom));
        $prenom = ucwords(strtolower($prenom));
        $ville = ucwords(strtolower($ville));



        $today = date("Y-m-d H:i:s"); 

        function random_1($car) {
            $string = "";
            $chaine = "abcdefghijklmnpqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            srand((double)microtime()*1000000);
            for($i=0; $i<$car; $i++) {
            $string .= $chaine[rand()%strlen($chaine)];
            }
            return $string;
            }
        $a = random_1(50);
        
        $sql = get_bdd()->prepare("SELECT * FROM clients WHERE mail ='$email'");
        $sql->execute();
        $n_email = $sql->rowCount();

        if($n_email == 0){
            if($pwd == $pwd2){
                $pwd_hash = password_hash($pwd, PASSWORD_BCRYPT);

                try{
                    $sql = "INSERT INTO clients(
                        nom, 
                        prenom,
                        date_de_naissance,
                        mail,
                        mot_de_passe,
                        ville,
                        code_postal,
                        date_inscription,
                        phone,
                        cle_validation,
                        valide
                        ) 
                        values (
                        '$nom',
                        '$prenom',
                        '$naissance',
                        '$email',
                        '$pwd_hash',
                        '$ville',
                        '$postal',
                        '$today',
                        '$phone',
                        '$a',
                        '0'
                        )";

                    $req = get_bdd()->prepare($sql);
                    $req->execute();

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
                                                            Votre email de connexion : '.$email.'
                                                            Votre mot de passe : '.$pwd.'                                                            </p>
                                                            <table border="0" align="center" width="180" cellpadding="0" cellspacing="0" bgcolor="55a53e" style="margin-bottom:20px;">
                    
                                                                <tr>
                                                                    <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                                                </tr>
                    
                                                                <tr>
                                                                    <td align="center" style="color: #ffffff; font-size: 14px; font-family: Work Sans, Calibri, sans-serif; line-height: 22px;">
                                                                        <!-- main section button -->
                    
                                                                        <div style="line-height: 22px;">
                                                                            <a href="https://www.audreycoiffure59.fr/confirmation.php?verification='.$a.'" style="color: #ffffff; text-decoration: none;">Confirmez votre compte</a>
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

                    mail($email, "Confirmation de compte AudreyCoiffure59.fr", $message, $header);
                    
                }
                catch (Exception $e) {
                    echo 'Exception reçue : ',  $e->getMessage(), "\n";
                }

                // création du compte réussie
                ?>
                <script>
                    swal({
                        title: "Votre compte a été créé <?=$prenom?> !",
                        text: "Un email de confirmation vous a été envoyé",
                        icon: "success",
                        type: "success"
                    }).then(function() {
                        window.location = "connexion.php";
                    });
                </script>
                <?php
            }
            else{
                ?>
                <script>
                    swal("Erreur de saisie détectée ", "Vos mots de passes saisis sont différents", "error");
                </script>
                <?php
            }
        }
        else{
            ?>
            <script>
                swal("Oops! Email invalide", "Un compte existe déjà sur cette adresse email", "error");
            </script>
            <?php
        }
    }
    else{
        ?>
        <script>
            swal("Champs libres détectés ! ", "Vous avez oublier de remplir un ou plusieurs champs", "error");
        </script>
        <?php
    }

}
?>