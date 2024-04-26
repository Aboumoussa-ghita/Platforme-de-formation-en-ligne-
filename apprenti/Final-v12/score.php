<?php


if (isset($_GET['id_formation'])) {
    $id_formation = $_GET['id_formation'];
} else {
    $id_formation = 0;
}
if (isset($_GET['score'])) {
    $score = $_GET['score'];
} else {
    $score = 0;
}


if (isset($_GET['id_chap'])) {
    $idChapitre = $_GET['id_chap'];
} else {
    $idChapitre = 0;
}




?>
<?php include('connexion.php'); ?>
<link rel="stylesheet" href="./style.css">
<?php include('navbar_student.php'); ?>
<body>
    <?php include('sidebar.php'); ?>
    <div class="span9" id="content">
        <div class="row-fluid">
            <main>
                <div class="head-title">
                    <div class="left">
                        <h1 style="color: darkblue;">Résultats du quizz</h1>
                    </div>
                </div>
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <?php 
                            $apprenti_id = $session_id;
                             $query = "SELECT p.* FROM passage_quiz p , quizz q WHERE p.quizz=q.id_quizz  and q.chapitre=$idChapitre and apprenti=$apprenti_id  ";
                             $result = mysqli_query($conn, $query);
                             $result = mysqli_query($conn, $query);
                  if ($result) {
    $row = mysqli_fetch_assoc($result);
     $score=$row['score'];
     
                           
     echo "<h3 >Votre score : " . $score . "/10</h3>";
           } else {
           echo "Erreur de requête : " . mysqli_error($conn);
               }
?>
                            
                          
                        </div>
                    </div>
                </div>
                <div class="buttons">
                            <?php
                            $apprenti_id = $session_id;  

                            // Obtenir l'ID du chapitre suivant
                            $query = "SELECT MIN(chapitre) AS next_chapitre FROM quizz WHERE chapitre > $idChapitre";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            $nextChapitre = $row['next_chapitre'];
                            $idc=$_GET['id_chap'];

                            if ($nextChapitre) {
                                // Afficher le bouton "Suivant" avec le lien vers le chapitre suivant
                                echo '<a style="background:#5698c8fa; ;"class="btn btn-primary" href="video.php?id_chap=' . $nextChapitre . '&id_formation=' . $id_formation . '">Suivant</a>';

                            } else {
                                // Afficher un message si aucun chapitre suivant n'est disponible
                                echo '<a  style="background:#5698c8fa; ; margin-top:40px;margin-left:1200px;"class="btn btn-primary" href="valider_for.php?id_chap=' . $idc . '&id_formation=' . $id_formation . '">Suivant</a>';

                            }
                            ?>  
                        </div>
            </main>
          
        </div>
    </div>
</body>
