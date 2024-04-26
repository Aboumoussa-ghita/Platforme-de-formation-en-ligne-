<?php
require_once 'modele/formateur_modele.php';
function liste_formateur_action() // aficher la liste complete
{
    // les derniers s'affichent en premier
    $formateurs=latest_formateur();
    require_once 'views/liste_formateur-vu.php';
}
function createFAction()
{
        require_once 'views/createf_view.php';
}
    function storeFAction() // insere les donnees ajoutées a la base de donnee
    {
        if(!empty($_POST)){
            $isCreated= createF();
            var_dump($isCreated);
            header('location:indexf.php');
        }else echo "Veuillez saisir tous les champs ! ";
    }

function deleteAction()
{
    if (isset($_GET['id'])) {
        $ID_FORMATEUR = $_GET['id'];
        require_once 'views/deletef_view.php';
    } else {
        echo "erreur ";
    }
}
function destroyAction()
{
    destroyF ($_GET['ID_FORMATEUR']);
    header('location:indexf.php');
}
function editAction()
{
    if (isset($_GET['id'])) {
        $ID_FORMATEUR = $_GET['id'];
        $formateur=viewF($ID_FORMATEUR);
        require_once 'views/editf_view.php';
    } else
        echo "erreur ";
}
function updateAction(){
    extract($_POST);
    editF($id,$f_nom,$f_prenom,$f_email,$f_tel,$f_mot_de_passe,$f_date_naissance,$f_specialite,$f_niv_etude,$f_photo);
    header('location:indexf.php');
}