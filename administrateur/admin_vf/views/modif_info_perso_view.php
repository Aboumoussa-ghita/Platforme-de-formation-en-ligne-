<main style=" background-color: #fff; border-radius: 10px;">

    <?php
    $title="Modifier vos informations personnelles: ";

    ob_start();
    ?>
    <form action="updateA.php" method="post">

        <div class="form-group">
            <input type="hidden" class="form-control" name="id" value="<?=$admin->ID_ADMINISTRATEUR ?>">
        </div>

        <div class="form-group">
            <label>Nom</label>
            <input type="text" class="form-control" name="nom" value="<?=$admin->A_NOM ?>">
        </div>

        <div class="form-group">
            <label>Prenom</label>
            <input type="text" class="form-control" name="prenom" value="<?=$admin->A_PRENOM ?>">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="pierre.giraud@gmail.com" value="<?=$admin->A_EMAIL?>">
        </div>

        <div class="form-group">
            <label>Telephone</label>
            <input type="tel" class="form-control" name="tel" value="<?=$admin->A_TEL ?>">
        </div>

        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" class="form-control" name="mot_de_passe" value="<?=$admin->A_MOT_DE_PASSE ?>">
        </div>

        <div class="form-group">
            <label>Date de naissance</label>
            <input type="date" class="form-control" name="date_naissance" value="<?=$admin->A_DATE_NAISSANCE?>">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success my-2" value="Modifier" name="Modifier">
        </div>
    </form>
    <?php $content=ob_get_clean();?>
</main>
<?php include_once 'views/layout.php';?>