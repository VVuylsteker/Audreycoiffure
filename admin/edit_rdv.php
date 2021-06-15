<?php

require_once('db_connect.php');

if(isset($_POST['annuler']) && isset($_POST['id'])){
	$id = $_POST['id_rdv'];
	$sql = "UPDATE rdv SET  valide = '3' WHERE id = $id ";

	$query = get_bdd()->prepare( $sql );
	if ($query == false) {
	 print_r(get_bdd()->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}elseif (isset($_POST['delete']) && isset($_POST['id'])){
	$id = $_POST['id_rdv'];
	$sql = "DELETE FROM rdv WHERE id = $id";

	$query = get_bdd()->prepare( $sql );
	if ($query == false) {
	 print_r(get_bdd()->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
	
}elseif(isset($_POST['nom_prenom']) && isset($_POST['prestation']) && isset($_POST['commentaire']) && isset($_POST['id_rdv']) && isset($_POST['couleur'])&& isset($_POST['debut'])&& isset($_POST['fin']) ) {
	$h_debut = $_POST['debut'];
	$h_fin = $_POST['fin'];
	
	$id = $_POST['id_rdv'];
	$pres = explode(',', $_POST['prestation'], 2);
	$infos = $_POST['nom_prenom']."|".$pres[0]."|".$_POST['commentaire'];
	$couleur = $_POST['couleur'];
	
	$debut_fin = get_bdd()->query("SELECT debut, fin FROM rdv WHERE id='$id'")->fetch();

	$debut=substr($debut_fin['debut'], 0, -8).$h_debut.":00";
	$fin=substr($debut_fin['fin'], 0, -8).$h_fin.":00";

	$sql = "UPDATE rdv SET titre='$infos', debut='$debut', fin='$fin', couleur='$couleur' WHERE id='$id'";
	
	$query = get_bdd()->prepare( $sql );
	if ($query == false) {
	 print_r(get_bdd()->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}


}


header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
