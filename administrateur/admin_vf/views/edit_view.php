<main style=" background-color: #fff; border-radius: 10px;">

<?php
$title="Modifier apprenti : ";

ob_start();
?>
<form action="update.php" method="post">

    <div class="form-group">
        <input type="hidden" class="form-control" name="id" value="<?=$apprenti->ID_APPRENTI ?>">
    </div>

    <div class="form-group">
        <label>Nom</label>
        <input type="text" class="form-control" name="nom" value="<?=$apprenti->NOM ?>">
    </div>

    <div class="form-group">
        <label>Prenom</label>
        <input type="text" class="form-control" name="prenom" value="<?=$apprenti->PRENOM ?>">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" placeholder="pierre.giraud@gmail.com" value="<?=$apprenti->EMAIL?>">
    </div>

    <div class="form-group">
        <label>Telephone</label>
        <input type="tel" class="form-control" name="tel" value="<?=$apprenti->TEL ?>">
    </div>

    <div class="form-group">
        <label>Mot de passe</label>
        <input type="password" class="form-control" name="mot_de_passe" value="<?=$apprenti->MOT_DE_PASSE ?>">
    </div>

    <div class="form-group">
        <label>Date de naissance</label>
        <input type="date" class="form-control" name="date_naissance" value="<?=$apprenti->DATE_NAISSANCE?>">
    </div>

    <div class="form-group">
        <label>Niveau d'expertise</label>
        <input type="text" class="form-control" name="niv_expertise" value="<?=$apprenti->NIV_EXPERTISE ?>">
    </div>

    <div class="form-group">
        <label>Photo</label>
        <input type="file" class="form-control" name="photo" value="<?=$apprenti->PHOTO ?>">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success my-2" value="Modifier" name="Modifier">
    </div>
</form>
<?php $content=ob_get_clean();?>
</main>
<?php include_once 'views/layout.php';?>