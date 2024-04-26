<?php
require_once 'modele/suivre_progres_modele.php';

function suivreProgresAction() // aficher la liste complete
{
    $apprentis=latest(); // les derniers s'affichent en premier
    require_once 'views/suivre_progres_view.php';
}
