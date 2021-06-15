<?php

function get_infos_client($line, $id){
    // exemple : get_infos_client('nom',$_SESSION['id_client']) 
    
    $sql = get_bdd()->prepare("SELECT * FROM clients WHERE id ='$id'");
    $sql->execute();
    $count = $sql->rowCount();
    if($count == 1){
        $data = $sql->fetch();
        return $data[$line];
    }
    else{
        return "?";
    }
}



?>