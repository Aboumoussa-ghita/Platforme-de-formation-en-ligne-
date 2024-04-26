<?php

function connexion_bd(){
    return new PDO('mysql: host=localhost ; dbname=pfe','root','');
}

function view()
{
    $pdo = connexion_bd();
    $sql = "SELECT * FROM admin WHERE ID_ADMINISTRATEUR = 1";
    $stmt = $pdo->query($sql);
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function edit($nom, $prenom, $email, $tel, $mot_de_passe, $date_naissance)
{
    $pdo = connexion_bd();
    $sqlState = $pdo->prepare("UPDATE admin 
                              SET A_NOM=?, 
                                  A_PRENOM=?,
                                  A_EMAIL=?,
                                  A_TEL=?,
                                  A_MOT_DE_PASSE=?,
                                  A_DATE_NAISSANCE=?
                              WHERE ID_ADMINISTRATEUR=?");
    return $sqlState->execute([$nom, $prenom, $email, $tel, $mot_de_passe, $date_naissance, 1]);
}
