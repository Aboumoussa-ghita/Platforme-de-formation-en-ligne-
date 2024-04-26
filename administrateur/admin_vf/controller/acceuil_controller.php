<?php
require_once 'modele/acceuil_modele.php';


function acceuilAction()
{
    $nb_formateurs = count_formateur();
    $nb_apprentis = count_apprenti();
    $nb_formations = count_formation();

    $formations = getFormations();
    $formationsAvecNbApprentis = array();

    foreach ($formations as $formation) {
        $formationId = $formation['ID_FORMATION'];
        $nbApprentis = getNbApprentisInscrits($formationId);
        $formation['nbApprentis'] = $nbApprentis; // Ajouter le nombre d'apprentis à la formation
        $formationsAvecNbApprentis[] = $formation;
       // var_dump($formationsAvecNbApprentis);
    }

    $formationsParMois = getNombreFormationsParMois();

    foreach ($formationsParMois as $formation) {
        $formation['mois'] = intval($formation['mois']);
        $nombreFormations = $formation['nombre_formations'];

    }
        require_once 'views/acceuil_view.php';
}









