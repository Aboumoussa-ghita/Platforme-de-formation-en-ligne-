<?php
function connexion_bd(){
    return new PDO('mysql: host=localhost ; dbname=pfe','root','');
}

function count_formateur(){
    $pdo=connexion_bd();
    $nb_formateurs= $pdo->query(' SELECT COUNT(*) AS nb_formateurs  FROM formateur ');
    $resultat = $nb_formateurs->fetch(PDO::FETCH_ASSOC);
    return $resultat['nb_formateurs'];
}

function count_apprenti(){
    $pdo=connexion_bd();
    $nb_apprentis= $pdo->query(' SELECT COUNT(*) AS nb_apprentis  FROM apprenti ');
    $resultat = $nb_apprentis->fetch(PDO::FETCH_ASSOC);
    return $resultat['nb_apprentis'];
}

function count_formation(){
    $pdo=connexion_bd();
    $nb_formations= $pdo->query(' SELECT COUNT(*) AS nb_formations  FROM formation ');
    $resultat = $nb_formations->fetch(PDO::FETCH_ASSOC);
    return $resultat['nb_formations'];
}

function getFormations()
{
    $pdo=connexion_bd();
    $formations= $pdo->query('SELECT * FROM formation ORDER BY ID_FORMATION  ')->fetchAll(PDO::FETCH_ASSOC);
    return $formations ;
}

function getNbApprentisInscrits($formationId)
{
    $pdo = connexion_bd();
    $sql = "SELECT COUNT(*) AS nbApprentis FROM apprenti a INNER JOIN suivre_formation sf ON a.ID_APPRENTI = sf.APPRENTI WHERE sf.formation = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $formationId, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return (int) $result['nbApprentis'];
    } else {
        return 0; // Return 0 if no result is found
    }
}
function getNombreFormationsParMois()
{
    $pdo = connexion_bd();

    $sql = "SELECT MONTHNAME(created_at) AS mois, COUNT(*) AS nombre_formations FROM formation GROUP BY mois ORDER BY MONTH(created_at)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}




