<?php
require('admin/db_connect.php');
$cle = $_GET["verification"];
$sql = "UPDATE clients SET valide='1' WHERE cle_validation='$cle'";
$req = get_bdd()->prepare($sql);
$req->execute();
header('location:rendez-vous.php');
?>

