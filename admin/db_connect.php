<?php

function get_bdd(){
$servername = '185.98.131.149';
$username = 'audre1561921';
$password = 'tT1!C1jZ4WESZ6W';

return new PDO("mysql:host=$servername;dbname=audre1561921", $username, $password);

}
