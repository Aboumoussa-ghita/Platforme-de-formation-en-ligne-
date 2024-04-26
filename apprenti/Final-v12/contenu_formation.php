<?php include("connexion.php")?>
<?php include('navbar_student.php'); ?>

<div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
                <div class="span9" id="content" style="margin-left:20px">
                     <div class="row-fluid">
					
						 <div class="head-title">
				<div class="left">
					<h1 style="padding:10px; background-color:aliceblue ; border-radius:10px 40px 40px 10px ;width:95%; padding-left:40px ;">CONTENU FORMATION</h1>
					
				</div></div></div>
                
<?php
$id_formation=$_GET['id_formation'];
echo $id_formation;
?>





<!-- Formulaire pour ajouter un commentaire -->
<form method="POST" id="commentaireForm">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" required><br>
    <label for="commentaire">Commentaire :</label>
    <textarea name="commentaire" required></textarea><br>
    <input type="submit" value="Ajouter un commentaire">
</form>

<!-- Section pour afficher les commentaires -->
<div id="commentaires">
    <?php
    // Récupération des commentaires depuis la base de données
    $result = mysqli_query($conn, "SELECT * FROM comentaire ORDER BY date DESC");
    // Affichage des commentaires
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='commentaire'>";
        echo "<p>" . $row['commentaire'] . "</p>";
        echo "<span class='date'>" . $row['date'] . "</span>";
        echo "</div>";
    }
    ?>
</div>

<!-- Section pour afficher les commentaires -->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des valeurs du formulaire
    
    $commentaire = $_POST["commentaire"];

    // Requête d'insertion du commentaire
    $requete = " INSERT INTO `comentaire`(`id_commentaire`, `id_formation`, `ID_APPRENTI`, `commentaire`, `date`) VALUES ('1','1','1','papp','5/5/55')";
    
    // Exécution de la requête
    if (mysqli_query($conn, $requete)) {
        // Récupération du dernier commentaire inséré
        $lastComment = mysqli_insert_id($conn);

        // Récupération du commentaire inséré depuis la base de données
        $result = mysqli_query($conn, "SELECT * FROM comentaire WHERE id_commentaire = $lastComment");
        $row = mysqli_fetch_assoc($result);

        // Affichage du nouveau commentaire
        echo "<div class='commentaire'>";
        echo "<p>" . $row['commentaire'] . "</p>";
        echo "<span class='date'>" . $row['date'] . "</span>";
        echo "</div>";
    } else {
        echo "Erreur lors de l'ajout du commentaire : " . mysqli_error($conn);
    }

    // Fermeture de la connexion à la base de données
    mysqli_close($conn);

    // Arrêt de l'exécution du script après la réponse AJAX
    exit();
}
?>
<!-- Styles CSS pour le rendu des commentaires -->
<style>
    .commentaire {
        margin-bottom: 20px;
        border: 1px solid #ccc;
        padding: 10px;
    }

    .commentaire h4 {
        margin: 0;
    }

    .commentaire p {
        margin: 0;
    }

    .commentaire .date {
        color: #888;
        font-size: 12px;
    }
</style>

<!-- Script JavaScript pour envoyer le formulaire via AJAX -->
<script>
    // Écouteur d'événement pour la soumission du formulaire
    document.getElementById("commentaireForm").addEventListener("submit", function (event) {
        event.preventDefault();         // Empêche le rechargement de la page

// Récupération des données du formulaire
var nom = document.getElementsByName("nom")[0].value;
var commentaire = document.getElementsByName("commentaire")[0].value;

// Création de l'objet XMLHttpRequest
var xhr = new XMLHttpRequest();

// Configuration de la requête AJAX
xhr.open("POST", "ajouter_commentaire.php", true);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

// Callback de la requête AJAX
xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        // Mise à jour de la section des commentaires avec la réponse AJAX
        document.getElementById("commentaires").innerHTML += xhr.responseText;
        // Réinitialisation du formulaire
        document.getElementById("commentaireForm").reset();
    }
};

// Envoi des données du formulaire via la requête AJAX
xhr.send("nom=" + encodeURIComponent(nom) + "&commentaire=" + encodeURIComponent(commentaire));
});
</script>


?>



