<?php
require_once 'modele/admin_modele.php';
function editAction()
{
        $admin=view();
        require_once 'views/modif_info_perso_view.php';
}
function updateAdAction(){
    extract($_POST);
    edit($nom,$prenom,$email,$tel,$mot_de_passe,$date_naissance);
    header('location:acceuil.php');
}
