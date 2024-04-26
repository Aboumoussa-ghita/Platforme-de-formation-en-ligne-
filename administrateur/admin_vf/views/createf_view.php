<main style=" background-color: #fff; border-radius: 10px;">
<?php
$title="Ajouter formateur : ";


ob_start();
?>
<form action="storeF.php" method="post">
    <div class="form-group">
        <label>Nom</label>
        <input type="text" class="form-control" name="f_nom" required>
    </div>

    <div class="form-group">
        <label>Prenom</label>
        <input type="text" class="form-control" name="f_prenom" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="f_email" required>
    </div>

    <div class="form-group">
        <label>Telephone</label>
        <input type="tel" class="form-control" name="f_tel" required>
    </div>

    <div class="form-group">
        <label>Mot de passe</label>
        <input type="password" class="form-control" name="f_mot_de_passe" required>
    </div>

    <div class="form-group">
        <label>Date de naissance</label>
        <input type="date" class="form-control" name="f_date_naissance" required>
    </div>

    <div class="form-group">
        <label>Niveau d'étude</label>
        <input type="text" class="form-control" name="f_niv_etude" required>
    </div>

    <div class="form-group">
        <label>Photo</label>
        <input type="file" class="form-control" name="f_photo" required>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success my-2" value="Ajouter" name="Ajouter">
    </div>
</form>
<?php $content=ob_get_clean();?>

<?php include_once 'views/layout.php';?>