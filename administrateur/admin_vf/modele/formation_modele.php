<?php
function connexion_bd(){
    return new PDO('mysql: host=localhost ; dbname=pfe','root','');
}

function latest_formation()
{
    $pdo=connexion_bd();
    $formations_en_att= $pdo->query('SELECT * FROM formation WHERE validation=0 ORDER BY 	ID_FORMATION ASC ')->fetchAll(PDO::FETCH_OBJ);
    return $formations_en_att ;
}

function valider_formation($id_formation)
{
    $pdo = connexion_bd();

    $stmt = $pdo->prepare("UPDATE formation SET validation = 1 WHERE ID_FORMATION = ?");
    $stmt->bindParam(1, $id_formation, PDO::PARAM_INT);
    $stmt->execute();
}



 //$sqlState->bindValue(':id', $id_formation_att);

   // $sqlState->execute([$nom_for,$date_depot,$niv_diff,$description,$categorie,$img_path,$nom_formateur,$nom_for_att,$date_depot_att,$niv_diff_att,$description,$categorie,$img_path,$nom_formateur,$id_formation_att]);
   // return $sqlState->execute();
/*function formation_insc1($id_apprenti){
    $pdo = connexion_bd();
    $stmt = $pdo->prepare("SELECT FORMATION FROM suivre_formation WHERE APPRENTI =?");
    $stmt->execute([$id_apprenti]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}*/
/*function formation_insc2($id_formation) {
    $pdo = connexion_bd();
    $stmt = $pdo->prepare("SELECT nom_for FROM formation WHERE 	id_formation = :id");
    $stmt->bindParam(':id', $id_formation, PDO::PARAM_INT); // pour indiquer que c'est un entier
    return $stmt->execute();
}*/

function formation_insc2($id_apprenti) {
    $pdo = connexion_bd();

    $stmt = $pdo->prepare("SELECT f.nom_for , f.id_formation  FROM formation f INNER JOIN suivre_formation sf ON f.id_formation = sf.FORMATION WHERE sf.APPRENTI = :id ");
    $stmt->bindParam(':id', $id_apprenti, PDO::PARAM_INT);
    $stmt->execute();
    $formations = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $formations;
}

function countChapitresByFormation($formationId)
{
    $pdo = connexion_bd();

    $sql = "SELECT count(*) FROM chapitre WHERE ID_FORMATION = :formationId";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':formationId', $formationId, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchColumn();
    return intval($result);
}

function DetailChapitre($formationId)
{
    $pdo = connexion_bd();
    $sqlState = $pdo->prepare("SELECT * FROM chapitre WHERE ID_FORMATION=?");
    $sqlState->execute([$formationId]);
    return $sqlState->fetchAll(PDO::FETCH_OBJ); // Modifier ici pour renvoyer un tableau associatif
}

function score_quiz($chapitreId, $id_apprenti)
{
    $pdo = connexion_bd();
    $sqlState = $pdo->prepare("SELECT q.id_quizz, p.score FROM quizz q INNER JOIN passage_quiz p ON q.id_quizz = p.QUIZZ WHERE chapitre = ? AND p.APPRENTI = ?");
    $sqlState->execute([$chapitreId, $id_apprenti]);

    return $sqlState->fetchAll(PDO::FETCH_ASSOC);
}

function form_nom($id_formation){
    $pdo = connexion_bd();
    $sqlState = $pdo->prepare("SELECT NOM_FOR FROM formation WHERE ID_FORMATION=?");
    $sqlState->execute([$id_formation]);
    return $sqlState->fetchAll(PDO::FETCH_OBJ);
}
function chapitre_form($id_formation){
    $pdo = connexion_bd();
    $sqlState = $pdo->prepare("SELECT * FROM chapitre WHERE ID_FORMATION=? order by id_chap");
    $sqlState->execute([$id_formation]);
    return $sqlState->fetchAll(PDO::FETCH_OBJ);
}



