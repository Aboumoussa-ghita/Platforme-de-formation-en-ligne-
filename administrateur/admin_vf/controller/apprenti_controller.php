<?php
require_once 'modele/apprenti_modele.php';

function liste_apprenti_action() // aficher la liste complete
{
    $apprentis=latest(); // les derniers s'affichent en premier
    require_once 'views/liste_apprenti-vu.php';

}

function createAction()
{
    require_once 'views/create_view.php';
}

/*function gererAvertAction(){
    $apprentis=latest(); // les derniers s'affichent en premier
    require_once 'views/gerer_avert_view.php';
}*/


function storeAction() // insere les donnees ajoutées a la base de donnee
{
    $isCreated= create();
    var_dump($isCreated);
    header('location:index.php');
}

function deleteAction()
{
    if (isset($_GET['id'])) {
        $ID_APPRENTI = $_GET['id'];
        require_once 'views/delete_view.php';
    } else {
        echo "erreur ";
    }
}
function destroyAction()
{
    destroy ($_GET['ID_APPRENTI']);
    header('location:index.php');
}
function editAction()
{
    if (isset($_GET['id'])) {
        $ID_APPRENTI = $_GET['id'];
        $apprenti=view($ID_APPRENTI);
        require_once 'views/edit_view.php';
    } else
       echo "erreur ";
    }
function updateAction(){
       extract($_POST);
       edit($id,$nom,$prenom,$email,$tel,$mot_de_passe,$date_naissance,$niv_expertise,$photo);
    header('location:index.php');
    }
