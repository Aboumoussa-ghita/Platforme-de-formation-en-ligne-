<main style=" background-color: #fff; border-radius: 10px;">
    <?php
    $title="Ajouter apprenti : ";
    ob_start();
    ?>

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="acceui_css.css">

    <form action="store.php" method="post" >
        <div class="form-group">
            <label>Nom</label>
            <input type="text" class="form-control" name="nom" required>
        </div>

        <div class="form-group">
            <label>Prenom</label>
            <input type="text" class="form-control" name="prenom" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="form-group">
            <label>Telephone</label>
            <input type="tel" class="form-control" name="tel" required>
        </div>

        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" class="form-control" name="mot_de_passe" required>
        </div>

        <div class="form-group">
            <label>Date de naissance</label>
            <input type="date" class="form-control" name="date_naissance" required>
        </div>

        <div class="form-group">
            <label>Niveau d'expertise</label>
            <input type="text" class="form-control" name="niv_expertise" required>
        </div>

        <div class="form-group">
            <label>Photo</label>
            <input type="file" class="form-control" name="photo" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success my-2" value="Ajouter" name="Ajouter">
        </div>
    </form>
    <?php $content=ob_get_clean();?>

</main>

<?php include_once 'views/layout.php';?>