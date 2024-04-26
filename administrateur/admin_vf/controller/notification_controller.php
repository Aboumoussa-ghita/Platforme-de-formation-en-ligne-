<?php
require_once 'modele/notification_modele.php';

function notificationAction(){
    require_once 'views/notification_view.php';
}

function ajouteurNotifAction()
{
    if (isset($_GET['id'])) {
        $id_formation = $_GET['id'];
        var_dump($id_formation);// id de la formation en attente
        $id_formateur = id_form($id_formation);
        var_dump($id_formateur); // id du formateur
        $message = $_POST['message'];

        $msg=insert_notif($id_formateur, $message);
        //var_dump($msg);
        destroyformation($id_formation);
        ob_clean();
        header('Location: supp_formation.php');
        exit();
    } else {
        http_response_code(400); // Erreur de requête incorrecte
        echo json_encode(array('error' => 'Paramètre "id" manquant.'));
    }
}
function alertAction(){
    if(isset($_GET['id'])){

        $id_formation = $_GET['id'];
        $message = "Avertissement : Veuillez respecter les règles de l'établissement.";
        $result = alerte($id_formation, $message);
        require_once 'views/alert_view.php';

    } else {
    http_response_code(400); // Erreur de requête incorrecte
    echo json_encode(array('error' => 'Paramètre "id" manquant.'));
    }
}

function nbreNotifAdminAction(){
    $nbre=nbreNotifAdmin();
    require_once 'views/notif_reçue_view.php';
}
function gererAvertAction() {
    $comments = getcomment();
    $apprentis = array();
    foreach ($comments as $comment) {
        $idapprenti = $comment->apprenti_id;
        //var_dump($idcomment);
        $apprenti = get_apprenti($idapprenti);
        //var_dump($apprenti);
        $apprentis[] = $apprenti;
    }
   // var_dump($apprentis);

      require_once 'views/gerer_avert_view.php';
}

