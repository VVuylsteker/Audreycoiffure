<?php

function get_bdd(){
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $bdd = new PDO("mysql:host=$servername;dbname=audreycoiffure", $username, $password);
    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $bdd;
}

?>