<?php

function connexion_bd(){
    return new PDO('mysql: host=localhost ; dbname=pfe','root','');
}
function latest_formateur(){
    $pdo=connexion_bd();
    $formateurs= $pdo->query('SELECT * FROM formateur ORDER BY ID_FORMATEUR DESC ')->fetchAll(PDO::FETCH_OBJ);
    return $formateurs ;
}
function createF()
{
    extract($_POST);
    $pdo=connexion_bd();
    $sqlState=$pdo->prepare("INSERT INTO formateur VALUES (null,?,?,?,?,?,?,?,?)");
    return $sqlState->execute([$f_nom,$f_prenom,$f_email,$f_tel,$f_mot_de_passe,$f_date_naissance,$f_niv_etude,$f_photo]);
}

function destroyF($ID_FORMATEUR)
{
    $pdo=connexion_bd();

    $sqlSuivreFormation = $pdo->prepare("DELETE FROM formation WHERE FORMATEUR=?");
    $sqlSuivreFormation->execute([$ID_FORMATEUR]);

    $sqlState = $pdo->prepare("DELETE FROM formateur WHERE ID_FORMATEUR=?");
    return  $sqlState->execute([$ID_FORMATEUR]);
}
function viewF($ID_FORMATEUR)
{
    $pdo=connexion_bd();
    $sqlState = $pdo->prepare("SELECT * FROM formateur WHERE ID_FORMATEUR=?");
    $sqlState->execute([$ID_FORMATEUR]);
    return $sqlState->fetch(PDO::FETCH_OBJ);  // recupere des lignes en utilisant un curseur precedement ouvert
}
function editF($id,$f_nom,$f_prenom,$f_email,$f_tel,$f_mot_de_passe,$f_date_naissance,$f_specialite,$f_niv_etude,$f_photo){
    $pdo=connexion_bd();
    $sqlState =$pdo->prepare("UPDATE formateur 
                             SET F_NOM=? , 
                                 F_PRENOM=?,
                                 F_EMAIL=?,
                                 F_TEL=?,
                                 F_MOT_DE_PASSE=?,
                                 DATE_NAISSANCE=?,
                                 NIV_ETUDE=?,	
                                 photo=?
                             WHERE ID_FORMATEUR=?  ");
    return $sqlState->execute([$f_nom,$f_prenom,$f_email,$f_tel,$f_mot_de_passe,$f_date_naissance,$f_niv_etude,$f_photo,$id]);
}