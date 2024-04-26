<?php

function connexion_bd(){
    return new PDO('mysql: host=localhost ; dbname=pfe','root','');
}

function id_form($id_formation)
{
    $pdo = connexion_bd();
    $id_form = $pdo->prepare("SELECT FORMATEUR FROM formation WHERE ID_FORMATION = ?");
    $id_form->execute([$id_formation]);

    $result = $id_form->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return $result['FORMATEUR'];
    } else {
        return false;
    }
}


function insert2($message)
{
    $pdo = connexion_bd();
    $sqlState = $pdo->prepare("INSERT INTO notifications VALUES (null, CURDATE(),?)");
    $success = $sqlState->execute([$message]);

    if ($success) {
        return true;
    } else {
        return false;
    }
}

function insert1($id_formateur, $message)
{
    $pdo = connexion_bd();
    $sqlState1 = $pdo->prepare("SELECT id_notif FROM notifications WHERE contenu = ?");
    $sqlState1->execute([$message]);
    $result = $sqlState1->fetch(PDO::FETCH_ASSOC);
    $id_notif = $result ? $result['id_notif'] : null;
        $sqlState2 = $pdo->prepare("INSERT INTO notif_adm_form VALUES (?, ?, ?)");
    $sqlState2->execute([1, $id_formateur, $id_notif]);

}
function destroyformation($id_formation){
    $pdo = connexion_bd();
    $sqlState = $pdo->prepare("DELETE FROM formation WHERE ID_FORMATION = ?");
    $sqlState->execute([$id_formation]);
    $rowCount = $sqlState->rowCount();
    return $rowCount;
}

function alerte($id_apprenti, $message) {
    $pdo = connexion_bd();

    $sqlState = $pdo->prepare("INSERT INTO notifications (Date_notif, contenu) VALUES (CURDATE(), ?)");
    $sqlState->execute([$message]);
    $notifId = $pdo->lastInsertId();

    $sqlState2 = $pdo->prepare("INSERT INTO notif_adm_apprenti  VALUES (? , ?, ?)");
    $sqlState2->execute([1,$id_apprenti,$notifId]);

    return ($sqlState->rowCount() > 0 && $sqlState2->rowCount() > 0);
}

function insert_notif($id_formateur, $message){
    $pdo = connexion_bd();

    $sqlState = $pdo->prepare("INSERT INTO notifications (Date_notif, contenu) VALUES (CURDATE(), ?)");
    $sqlState->execute([$message]);
    $notifId = $pdo->lastInsertId();

    $sqlState2 = $pdo->prepare("INSERT INTO notif_adm_form  VALUES (? , ?, ?)");
    $sqlState2->execute([1,$id_formateur,$notifId]);

    return ($sqlState->rowCount() > 0 && $sqlState2->rowCount() > 0);
}

/*function nbreNotifAdmin() {
    $pdo = connexion_bd();
    $sqlState = $pdo->prepare("SELECT count(*) FROM notifications n INNER JOIN notif_form_adm nf ON n.id_notif = nf.notif WHERE nf.adm = ?");
    $sqlState->execute([1]);
    $count = $sqlState->fetchColumn();
    return (int) $count;
}*/

function getcomment() {
    $pdo = connexion_bd();

    $comments = $pdo->query("SELECT * FROM comentaire ORDER BY date DESC")->fetchAll(PDO::FETCH_OBJ);
    return $comments;
}

function get_apprenti($idapprenti) {
    $pdo = connexion_bd();

    $query = 'SELECT * FROM apprenti WHERE ID_APPRENTI = :idapprenti';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':idapprenti', $idapprenti);
    $stmt->execute();
    $apprenti = $stmt->fetch(PDO::FETCH_OBJ);

    return $apprenti;
}













