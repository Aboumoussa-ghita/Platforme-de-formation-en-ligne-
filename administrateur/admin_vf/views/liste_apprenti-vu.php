
<?php
        $title="Liste des apprentis:";
        ob_start();
        ?>
<table class="table table-striped" style="margin-left: 10;">
    <thead style="color: #00008B">
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Tel</th>
        <th>Mot de passe</th>
        <th>Date de naissance</th>
        <th>Niveau d'étude</th>
        <th>Actions</th>
    </tr>

    </thead>
    <tbody>
    <?php foreach ($apprentis as $apprenti): ?>
        <tr>
            <td><?= $apprenti->NOM ?></td>
            <td><?= $apprenti->PRENOM ?></td>
            <td><?= $apprenti->EMAIL ?></td>
            <td><?= $apprenti->TEL ?></td>
            <td><?= $apprenti->MOT_DE_PASSE ?></td>
            <td><?= $apprenti->DATE_NAISSANCE ?></td>
            <td><?= $apprenti->NIV_EXPERTISE ?></td>
            <td>
                <a href="edit.php?id=<?php echo $apprenti->ID_APPRENTI ?>" class="btn btn-outline-success btn-sm">Modifier</a>
                <a href="delete.php?id=<?php echo $apprenti->ID_APPRENTI ?>" class="btn btn-outline-danger btn-sm">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<a href="create.php" class="btn btn-outline-primary">Ajouter</a>
<?php $content=ob_get_clean();?>
    </main>
   <?php include_once 'views/layout.php';?>