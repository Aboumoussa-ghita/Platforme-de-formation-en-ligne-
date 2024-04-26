<?php

require_once 'modele/detail_chap_modele.php';

function detailChapAction(){
    if(isset($_GET['id'])){
        $id_chap=$_GET['id'];
        $video=video($id_chap);
        $questions=quiz($id_chap);
        $exercices=exercices($id_chap);
        $chap=chapitre_contenu($id_chap);
        require_once 'views/detail_chap_view.php';
    }
}