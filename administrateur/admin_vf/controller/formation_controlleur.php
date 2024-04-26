<?php
require_once 'modele/formation_modele.php';

function list_formation_Action()
{
    $formations_en_att=latest_formation();
    require_once 'views/liste_formation_vu.php';
}

function valider_formation_Action()
{
    if (isset($_GET['id'])) {
        $id_formation = $_GET['id'];
       // $formation=viewFormation($id_formation_att);
        valider_formation($id_formation);
        header('location:supp_formation.php');
    } else
        echo "erreur ";
}

function form_suivisAction()
{
    if (isset($_GET['id'])) {
        $id_apprenti = $_GET['id'];

        $formations = formation_insc2($id_apprenti);

        $pourcentages = array();

        foreach ($formations as $formation) {
            $formationId = $formation->id_formation;
            //var_dump($formationId);
            $nombreChapitres = countChapitresByFormation($formationId);

            $formation->nombre_chapitres = $nombreChapitres;
            //var_dump($formation->nombre_chapitres);

            $chapitres = DetailChapitre($formationId);
            //var_dump($chapitres);
            $count = 0;

            if ($chapitres !== false) {
                foreach ($chapitres as $chapitre) {
                    if (isset($chapitre->id_chap)) {
                        $chapitreId = $chapitre->id_chap;

                        $quizScores = score_quiz($chapitreId,$id_apprenti);

                        foreach ($quizScores as $quizScore) {
                            if ($quizScore['score'] >= 10) {
                                var_dump($quizScore['score']);
                                $count++;
                                break;
                            }
                        }
                    }else echo "erreur " ;
                }
            }
           // var_dump($count);

            if ($nombreChapitres > 0) {
                $pourcentage = ($count / $nombreChapitres) * 100;
               // var_dump($pourcentage);
                $pourcentages[] = round($pourcentage, 2);
               // var_dump($pourcentages);
            } else {
                $pourcentages[]= 0;
            }
        }
            require_once 'views/form_suivis_view.php';
    } else {
        echo "Erreur : ID d'apprenti non spécifié.";
    }
}

function detailAction(){
    if(isset($_GET['id'])){
        $id_formation=$_GET['id'];
        $form=form_nom($id_formation);
        $chapitres=chapitre_form($id_formation);
        require_once 'views/detail_formation_view.php';

    }
}






