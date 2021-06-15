<?php

function add_visit(){
    $today = date("Y-m-d"); 

    $sql = get_bdd()->prepare("SELECT * FROM visiteurs WHERE date ='$today'");
    $sql->execute();
    $count = $sql->rowCount();
    $visiteurs = $sql->fetch();
    
    if($count == 0){
        $sql = "INSERT INTO visiteurs(date,n) values ('$today',1)";
        $req = get_bdd()->prepare($sql);
        $req->execute();
    }
    else{
        $newn = $visiteurs['n']+1;
        $sql = "UPDATE visiteurs SET n ='$newn' WHERE date ='$today'";
        $req = get_bdd()->prepare($sql);
        $req->execute();
    }
}

function get_n_visits_today(){
    $today = date("Y-m-d"); 
    $sql = get_bdd()->prepare("SELECT * FROM visiteurs WHERE date ='$today'");
    $sql->execute();
    
    $visiteurs = $sql->fetch();
    $count = $sql->rowCount();
    if($count!=0){
        return $visiteurs['n'];
    }else{
        return 0;
    }
}

function get_n_visits_agoday($nday){

    $date = date('Y-m-d', ( time() - 86400 * $nday) );
    $sql = get_bdd()->prepare("SELECT * FROM visiteurs WHERE date ='$date'");
    $sql->execute();
    
    $visiteurs = $sql->fetch();
    $count = $sql->rowCount();
    if($count!=0){
        return $visiteurs['n'];
    }else{
        return 0;
    }
}

function n_visits_agomonth($nmonth){

    $date = date('Y-m', ( time() - 86400 * 26 * $nmonth) );
    $sql = get_bdd()->prepare("SELECT * FROM visiteurs WHERE date LIKE '$date%'");
    $sql->execute();
    $count = $sql->rowCount();
    
    if($count!=0){
        $tot = 0;
        while ($data = $sql->fetch()){
            $tot+=$data['n'];
        }
        return $tot;
    }else{
        return 0;
    }
}

function get_n_visits_7dayago(){
    $n = 0; 
    for ($i = 0; $i <= 6; $i++) {
        $n += get_n_visits_agoday($i);
    }
    return $n;
}

function print_data_14dayago(){
    // [10000, 30162, 26263, 18394, 18287, 28682, 31274, 33259, 25849, 24159, 32651, 31984, 38451]
    $n = "[";
    for ($i = 13; $i >= 0; $i--) {
        $n .=strval(get_n_visits_agoday($i));
        $n.=",";
    }
    $n = substr($n, 0, -1);
    $n.="]";
    return $n;
}

function print_data_14dayago_s(){
    // [13/01 , 14/01 , 15/01 , 16/01 ,1417/01 , 18/01 , 19/01 , 20/01 , 21/01 , 22/01 , 23/01 , 24/01 , 25/01 , 26/01]
    $n = "[";
    for ($i = 13; $i >= 0 ;$i--) {
        $date = date('d/m', ( time() - 86400 * $i) );
        $n.='"';
        $n.= $date;
        $n.='"';
        $n.=" , ";
    }
    $n = substr($n, 0, -3);
    $n.="]";
    return $n;
}

function print_data_max_14dayago(){
    $datas = print_data_14dayago();
    $datas = substr($datas, 1, -1);
    $datas_ar = explode(',', $datas);
    return max($datas_ar);
}

function print_data_6monthsago_s(){
    $n = "[";
    for ($i = 5; $i >= 0 ;$i--) {
        $date = date('m/Y', ( time() - 86400 *26*$i) );
        $n.='"';
        $n.= $date;
        $n.='"';
        $n.=" , ";
    }
    $n = substr($n, 0, -3);
    $n.="]";
    return $n;
}

function print_data_6monthsago(){
    // [10000, 30162, 26263, 18394, 18287, 28682, 31274, 33259, 25849, 24159, 32651, 31984, 38451]
    $n = "[";
    for ($i = 5; $i >= 0; $i--) {
        $n .=strval(n_visits_agomonth($i));
        $n.=",";
    }
    $n = substr($n, 0, -1);
    $n.="]";
    return $n;
}

function print_data_max_6monthsago(){
    $datas = print_data_6monthsago();
    $datas = substr($datas, 1, -1);
    $datas_ar = explode(',', $datas);
    return max($datas_ar);
}

function print_n_inscrits(){
    $sql = get_bdd()->query("SELECT * FROM clients");
    $count = $sql->rowCount();
    return $count;
}

function print_n_inscrits_7daygo(){
    $date = date('Y-m-d', ( time() - 86400 * 7 ) );
    $sql = get_bdd()->query("SELECT * FROM clients WHERE date_inscription >= '$date'");
    $count = $sql->rowCount();
    return $count;
}

?>