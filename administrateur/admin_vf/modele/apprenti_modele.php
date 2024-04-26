<?php

function connexion_bd(){
    return new PDO('mysql: host=localhost ; dbname=pfe','root','');
}


function latest(){
    $pdo=connexion_bd();
    $apprentis= $pdo->query('SELECT * FROM apprenti ORDER BY ID_APPRENTI DESC ')->fetchAll(PDO::FETCH_OBJ);
    return $apprentis ;
}
function create()
{
    extract($_POST);
    $pdo=connexion_bd();
    $sqlState =$pdo->prepare("INSERT INTO apprenti VALUES (null,?,?,?,?,?,?,?,?)");
    return $sqlState->execute([$nom,$prenom,$email,$tel,$mot_de_passe,$date_naissance,$niv_expertise,$photo]);
}

function destroy($ID_APPRENTI)
{
    $pdo = connexion_bd();

    $sqlSuivreFormation = $pdo->prepare("DELETE FROM suivre_formation WHERE APPRENTI=?");
    $sqlSuivreFormation->execute([$ID_APPRENTI]);

    $sqlSuivreFormation = $pdo->prepare("DELETE FROM passage_quiz WHERE APPRENTI=?");
    $sqlSuivreFormation->execute([$ID_APPRENTI]);

    $sqlSuivreFormation = $pdo->prepare("DELETE FROM notif_adm_apprenti WHERE app=?");
    $sqlSuivreFormation->execute([$ID_APPRENTI]);

    $sqlSuivreFormation = $pdo->prepare("DELETE FROM passage_test WHERE APPRENTI=?");
    $sqlSuivreFormation->execute([$ID_APPRENTI]);

    $sqlApprenti = $pdo->prepare("DELETE FROM apprenti WHERE ID_APPRENTI=?");
    return $sqlApprenti->execute([$ID_APPRENTI]);
}

function view($ID_APPRENTI)
{
    $pdo=connexion_bd();
    $sqlState = $pdo->prepare("SELECT * FROM apprenti WHERE ID_APPRENTI=?");
    $sqlState->execute([$ID_APPRENTI]);
    return $sqlState->fetch(PDO::FETCH_OBJ);  // recupere des lignes en utilisant un curseur precedement ouvert
}

function edit($id,$nom,$prenom,$email,$tel,$mot_de_passe,$date_naissance,$niv_expertise,$photo)
{
    $pdo=connexion_bd();
    $sqlState =$pdo->prepare("UPDATE apprenti 
                             SET NOM=? , 
                                 PRENOM=?,
                                 EMAIL=?,
                                 TEL=?,
                                 MOT_DE_PASSE=?,
                                 DATE_NAISSANCE=?,
                                 NIV_EXPERTISE=?,	
                                 photo=?
                             WHERE ID_APPRENTI=?");
    return $sqlState->execute([$nom,$prenom,$email,$tel,$mot_de_passe,$date_naissance,$niv_expertise,$photo,$id]);
}