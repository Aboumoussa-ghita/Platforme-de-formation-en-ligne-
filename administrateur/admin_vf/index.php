<?php
//on peut creer un routeur pour ne plus avoir beaucoup de fichier php ; on doit tout mettre ds index.php en ajoutant des action
// exemple pour creer : index.php?action='create'
// et pour l'app on utilise switch cases
require_once 'controller/apprenti_controller.php';
liste_apprenti_action();
//liste_formateur_action();
/*       if(isset($_GET['action'])){
            $action=$_GET['action'];
            switch ($action){
                case 'list' :
                    require_once 'controller/apprenti_controller.php';
                    liste_apprenti_action();
                    break;
                case 'create' :
                    require_once 'controller/apprenti_controller.php';
                    createAction();
                    break;
                case 'delete' :
                    require_once 'controller/apprenti_controller.php';
                    deleteAction() ;
                    break;
                case 'distroy' :
                    require_once 'controller/apprenti_controller.php';
                    distroyAction();
                    break;
                case 'edit' :
                    require_once 'controller/apprenti_controller.php';
                    editAction();
                    break;
                case 'store' :
                    require_once 'controller/apprenti_controller.php';
                    storeAction();
                    break;
                case 'update' :
                    require_once 'controller/apprenti_controller.php';
                    updateAction();
                    break;
            }
        }*/
