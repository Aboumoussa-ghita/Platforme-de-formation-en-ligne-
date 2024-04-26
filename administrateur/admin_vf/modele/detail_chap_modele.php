<?php

function connexion_bd(){
    return new PDO('mysql: host=localhost ; dbname=pfe','root','');
}

function video($id_chap)
{
    $pdo=connexion_bd();
    $sqlState = $pdo->prepare("SELECT * FROM videos WHERE Chapitre=?");
    $sqlState->execute([$id_chap]);
    return $sqlState->fetch(PDO::FETCH_ASSOC);
}

function quiz($id_chap){

    $pdo=connexion_bd();
    $stmt = $pdo->prepare("SELECT q.question   FROM qstns_quizz q INNER JOIN quizz z ON q.quizz = z.id_quizz WHERE z.chapitre = :id ");
    $stmt->bindParam(':id', $id_chap, PDO::PARAM_INT);
    $stmt->execute();
    $quiz = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $quiz ;
}

function exercices($id_chap)
{
    $pdo = connexion_bd();
    $stmt = $pdo->prepare("SELECT contenu FROM exercices WHERE chapitre = ?");
    $stmt->execute([$id_chap]);
    return $stmt->fetchColumn();
}

function chapitre_contenu($id_chap){
    $pdo = connexion_bd();
    $sqlState = $pdo->prepare("SELECT * FROM chapitre WHERE id_chap=?");
    $sqlState->execute([$id_chap]);
    return $sqlState->fetch(PDO::FETCH_ASSOC);
}
