<main style=" background-color: #fff; border-radius: 10px;">
<?php
$title="Modifier formateur : ";

ob_start();
?>
<form action="updatef.php" method="post">

    <div class="form-group">
        <input type="hidden" class="form-control" name="id" value="<?=$formateur->ID_FORMATEUR ?>">
    </div>

    <div class="form-group">
        <label>Nom</label>
        <input type="text" class="form-control" name="f_nom" value="<?=$formateur->F_NOM ?>">
    </div>

    <div class="form-group">
        <label>Prenom</label>
        <input type="text" class="form-control" name="f_prenom" value="<?=$formateur->F_PRENOM ?>">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="f_email" placeholder="pierre.giraud@gmail.com" value="<?=$formateur->F_EMAIL?>">
    </div>

    <div class="form-group">
        <label>Telephone</label>
        <input type="tel" class="form-control" name="f_tel" value="<?=$formateur->F_TEL ?>">
    </div>

    <div class="form-group">
        <label>Mot de passe</label>
        <input type="password" class="form-control" name="f_mot_de_passe" value="<?=$formateur->F_MOT_DE_PASSE ?>">
    </div>

    <div class="form-group">
        <label>Date de naissance</label>
        <input type="date" class="form-control" name="f_date_naissance" value="<?=$formateur->DATE_NAISSANCE?>">
    </div>

    <div class="form-group">
        <label>Niveau d'étude</label>
        <input type="text" class="form-control" name="f_niv_etude" value="<?=$formateur-> NIV_ETUDE ?>">
    </div>

    <div class="form-group">
        <label>Photo</label>
        <input type="file" class="form-control" name="f_photo" value="<?=$formateur->photo ?>">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success my-2" value="Modifier" name="Modifier">
    </div>
</form>
<?php $content=ob_get_clean();?>
<?php include_once 'views/layout.php';?>