<?php

function get_bdd(){
$servername = 'localhost';
$username = 'root';
$password = '';

return new PDO("mysql:host=$servername;dbname=audreycoiffure", $username, $password);

}
