<?php

// Connexion à la base de données
require_once('db_connect.php');

if (isset($_POST['nom_prenom']) && isset($_POST['prestation']) && isset($_POST['debut']) && isset($_POST['fin']) && isset($_POST['couleur']) && isset($_POST['id']) && isset($_POST['commentaire'])){
	
	$infos = $_POST['nom_prenom']." | ".$_POST['prestation']." | ".$_POST['commentaire'];
	$debut = $_POST['debut'];
	$fin = $_POST['fin'];
	$couleur = $_POST['couleur'];
	$id_salaries = $_POST['id'];

	$date_debut = str_replace("T", " ", $debut).":00";
	$date_fin = str_replace("T", " ", $fin).":00";


	$sql = "INSERT INTO rdv(id, titre, couleur, debut, fin, id_salaries, valide, id_client) values (NULL, '$infos', '$couleur', '$date_debut', '$date_fin', '$id_salaries', '1', NULL)";
	$req = get_bdd()->prepare($sql);
	$req->execute();

}

if(isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])){
	
	
	$id = $_POST['Event'][0];
	$start = $_POST['Event'][1];
	$end = $_POST['Event'][2];

	$date_debut = date('Y-m-d', strtotime(substr($start,0,10))) . " " . substr($start, 11, -6);
	$date_fin = date('Y-m-d', strtotime(substr($end,0,10))) . " " . substr($end, 11, -6);


	$sql = "UPDATE rdv SET  debut = '$date_debut', fin = '$date_fin' WHERE id = $id ";
	$req = get_bdd()->prepare($sql);
	$req->execute();
	

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
