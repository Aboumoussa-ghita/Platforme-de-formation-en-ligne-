<?php
// Inclure le fichier de connexion à la base de données
include('connexion.php');
include('navbar_student.php');

$idc = $_GET['id_chap'];
$id_formation = $_GET['id_formation'];
$apprenti_id = $session_id;

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Récupérer les réponses soumises
    $responses = $_POST['responses'];

    // Vérifier s'il y a des réponses
    if (!empty($responses)) {
        // Initialiser le score
        $score = 0;

        // Parcourir les réponses
        foreach ($responses as $questionId => $response) {
            // Échapper les valeurs pour éviter les injections SQL
            $questionId = mysqli_real_escape_string($conn, $questionId);
            $response = mysqli_real_escape_string($conn, $response);

            // Récupérer la réponse correcte de la table "qstns_quizz"
            $answerQuery = "SELECT ans, quizz FROM qstns_quizz WHERE id_qstn = '$questionId'";
            $result = mysqli_query($conn, $answerQuery);
            $row = mysqli_fetch_assoc($result);
            $correctAnswer = $row['ans'];
            $quiz = $row['quizz'];

            // Vérifier si la réponse soumise est correcte
            if ($response === $correctAnswer) {
                $score++;
            }

            // Insérer la réponse dans la table "reponse_quizz"
            $insertQuery = "INSERT INTO reponse_quizz (qstn, rep) VALUES ('$questionId', '$response')";
            if (!mysqli_query($conn, $insertQuery)) {
                // Erreur lors de l'insertion de la réponse
                echo "Erreur lors de l'insertion de la réponse : " . mysqli_error($conn);
            }
        }

        // Insérer le score dans la table "passage_quiz"
        $insertscore = "INSERT INTO passage_quiz (apprenti, quizz, score) VALUES ('$apprenti_id', '$quiz', '$score')";
        if (!mysqli_query($conn, $insertscore)) {
            // Erreur lors de l'insertion du score
            echo "Erreur lors de l'insertion du score : " . mysqli_error($conn);
        } else {
            // Rediriger vers la page score.php en passant le score dans l'URL
            echo "<script>
                    window.location.href = 'score.php?id_formation=$id_formation&id_chap=$idc&score=$score';
                </script>";
            exit();
        }
    }
}

// Récupérer les informations du quiz à partir de la table "quizz"
$query = "SELECT * FROM quizz WHERE chapitre = '$idc'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $quiz = mysqli_fetch_assoc($result);
    $idQuizz = $quiz['id_quizz'];

    // Récupérer les questions du quiz à partir de la table "qstns_quizz"
    $query = "SELECT * FROM qstns_quizz WHERE quizz = '$idQuizz'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        include('sidebar.php');
?>
        <link rel="stylesheet" href="./style.css">
        <body>
            <div class="span9" id="content">
                <div class="row-fluid">
                    <main>
                        <div class="head-title">
                            <div class="left">
                                <h1 style="color: darkblue;">Quizz</h1>
                            </div>
                        </div>
                        <div class="table-data">
                            <div class="order">
                                <div class="head">
                                    <form action="" method="post">
                                        <?php
                                        // Parcourir les questions
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $questionId = $row['id_qstn'];
                                            $question = $row['question'];
                                            $option1 = $row['option1'];
                                            $option2 = $row['option2'];
                                            $option3 = $row['option3'];
                                        ?>
                                            <h3 style="color: darkblue;"><?php echo $question; ?></h3>
                                            <label>
                                                <input type="radio" name="responses[<?php echo $questionId; ?>]" value="<?php echo $option1; ?>">
                                                <?php echo $option1; ?>
                                            </label>
                                            <label>
                                                <input type="radio" name="responses[<?php echo $questionId; ?>]" value="<?php echo $option2; ?>">
                                                <?php echo $option2; ?>
                                            </label>
                                            <label>
                                                <input type="radio" name="responses[<?php echo $questionId; ?>]" value="<?php echo $option3; ?>">
                                                <?php echo $option3; ?>
                                            </label>
                                            <br><br>
                                        <?php
                                        }
                                        ?>

                                        <button style="color: white; background:#5698c8fa;; border-color: #5698c8fa;
                                        ;" type="submit" name="submit" class="status completed">Soumettre</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </body>
<?php
    } else {
        echo "Aucune question trouvée pour ce quiz.";
    }
} else {
    echo "Aucun quiz trouvé pour ce chapitre.";
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
