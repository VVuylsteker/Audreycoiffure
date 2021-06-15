<?php
require('db_connect.php');
$today = date("Y-n-j");

switch ($_GET["id"]) {
    case 0:

        break;
    case 1:
        $nombre_inscrit = get_bdd()->query("SELECT * FROM clients");
        $result_nb_inscrit = $nombre_inscrit->rowCount();
        echo $result_nb_inscrit;
        break;
    case 2:
        $req10 = "SELECT COUNT(valide) FROM rdv WHERE valide='0'";
        $result_req10 = get_bdd()->query($req10);
        $nombre_de_demande = $result_req10->fetchColumn();

        echo $nombre_de_demande;
        break;
    case 3:
        $rdv_valide = "SELECT COUNT(valide) FROM rdv WHERE valide='1' AND  fin >= '$today';";
        $result_rdv_valide = get_bdd()->query($rdv_valide);
        $nombre_de_rdv_valide = $result_rdv_valide->fetchColumn();
        echo $nombre_de_rdv_valide;
        break;
    case 4:
        $rdv_annuler = "SELECT COUNT(valide) FROM rdv WHERE valide='3';";
        $result_rdv_annuler = get_bdd()->query($rdv_annuler);
        $nombre_de_rdv_annuler = $result_rdv_annuler->fetchColumn();
        echo $nombre_de_rdv_annuler;
        break;

    case 5:
                                                        
        break;
    default:
       echo "0";
}
?>

