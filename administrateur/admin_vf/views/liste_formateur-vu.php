<?php
$title="Liste des formateurs:";

ob_start();
?>

<table class="table table-striped">
    <thead style="color: #00008B">
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Tel</th>
        <th>Mot de passe</th>
        <th>Date de naissance</th>
        <th>Niveau d'etude</th>
        <th>Actions</th>
    </tr>

    </>
    <tbody>
    <?php foreach ($formateurs as $formateur): ?>
        <tr>
            <td><?=$formateur->F_NOM ?></td>
            <td><?=$formateur->F_PRENOM ?></td>
            <td><?=$formateur->F_EMAIL ?></td>
            <td><?=$formateur->F_TEL ?></td>
            <td><?=$formateur->F_MOT_DE_PASSE ?></td>
            <td><?=$formateur->DATE_NAISSANCE ?></td>
            <td><?=$formateur->NIV_ETUDE ?></td>
            <td>
                <a href="editf.php?id=<?php echo $formateur->ID_FORMATEUR ?>" class="btn btn-outline-success btn-sm">Modifier</a>

                <a href="deletef.php?id=<?php echo  $formateur->ID_FORMATEUR ?>" class="btn btn-outline-danger btn-sm">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="createF.php" class="btn btn-outline-primary">Ajouter</a>
<?php $content=ob_get_clean();?>

<?php include_once 'views/layout.php';?>
