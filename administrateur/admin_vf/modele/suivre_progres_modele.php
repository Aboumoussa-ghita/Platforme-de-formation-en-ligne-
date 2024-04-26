<?php

function connexion_bd(){
    return new PDO('mysql: host=localhost ; dbname=pfe','root','');
}

function latest(){
    $pdo=connexion_bd();
    $apprentis= $pdo->query('SELECT * FROM apprenti ORDER BY ID_APPRENTI DESC ')->fetchAll(PDO::FETCH_OBJ);
    return $apprentis ;
}


