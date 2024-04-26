addcslashes<?php include("connexion.php"); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $comment = $_POST['comment'];
  $formation_id = $_POST['id_formation'];
  $ID_APPRENTI = $_SESSION['ID_APPRENTI']; // Adjust this according to your session setup

  // Validate and sanitize the comment input

  // Insert the comment into the database
  $insert_query = "INSERT INTO comentaire (id_formation, ID_APPRENTI, commentaire) VALUES ($formation_id, $ID_APPRENTI, '$commentaire')";
  mysqli_query($conn, $insert_query);

  // Redirect back to the formation page
  header("Location: contenu_formation.php?id_formation=$formation_id");
  exit();
}
?>
