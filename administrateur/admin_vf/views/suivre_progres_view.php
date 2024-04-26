
<?php
$title="Liste des apprentis:";
ob_start();
?>
<table class="table table-striped" style="margin-left: 10;">
    <thead style="color: #00008B">
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>formations suivies</th>
    </tr>

    </thead>
    <tbody>
    <?php foreach ($apprentis as $apprenti): ?>
        <tr>
            <td><?= $apprenti->NOM ?></td>
            <td><?= $apprenti->PRENOM ?></td>
            <td>
                <a href="form_suivis.php?id=<?php echo $apprenti->ID_APPRENTI ?>" class="btn btn-outline-primary btn-sm">voir les formations suivies par <?= $apprenti->PRENOM ?> <?= $apprenti->NOM ?> </a>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<?php $content=ob_get_clean();?>
</main>
<?php include_once 'views/layout.php';?>