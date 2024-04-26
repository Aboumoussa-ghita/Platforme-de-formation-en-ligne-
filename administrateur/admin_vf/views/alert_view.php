<main style=" background-color: #fff; border-radius: 10px;">

    <?php
    $title="Gérer avertissement :  ";
    ob_start();
?>
    <br><br>
 <p style="margin-left: 300px; "><?php
  if ($result) {
    echo "Avertissement envoyé avec succès à l'apprenti.";
    } else {
    echo "Erreur lors de l'envoi de l'avertissement.";
    }
    ?>
  </p>
    <br><br>
    <a href="gerer_avert.php" class="btn btn-outline-primary" style="margin-left: 350px; text-align: right;">Retour à la liste des apprentis</a>
    <?php
    $content =ob_get_clean();
    ?>
</main>
<?= include_once 'views/layout.php';