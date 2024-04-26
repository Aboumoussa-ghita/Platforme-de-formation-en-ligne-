

<?php
$title="Liste des formations:";

ob_start();
?>

<table class="table table-striped">
    <?php if (!empty($formations_en_att)) : ?>

        <thead style="color: #00008B">
        <tr>
        <th>Nom de la formation</th>
        <th>Descriptif</th>

            <!--<th>Nom du formateur</th>-->
        <th>Actions</th>
    </tr>

    </thead>
    <tbody>

    <?php foreach ($formations_en_att as $formation_en_attente): ?>
        <tr>
            <td><?=$formation_en_attente->NOM_FOR?></td>
            <td style="width: 30%"><?=$formation_en_attente->DESCRIPTIF?></td>

            <!-- <td><?=$formation_en_attente->FORMATEUR  ?></td> -->

            <td>
                <a href="detail_formation.php?id=<?php echo $formation_en_attente->ID_FORMATION ?>" class="btn btn-outline-info">voir detail</a>
                &nbsp;
                &nbsp;
                <a href="valider_formation.php?id=<?php echo  $formation_en_attente->ID_FORMATION?>" class="btn btn-outline-primary">valider</a>
                &nbsp;
                &nbsp;
                <a href="notification.php?id=<?php echo  $formation_en_attente->ID_FORMATION?>" class="btn btn-outline-success">envoyer les modiffications</a>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <?php else : ?>
        <tbody>
        <tr>
                <td colspan="2">Aucune formation à supperviser</td>
        </tr>
        </tbody>
    <?php endif; ?>
</table>

<?php $content=ob_get_clean();?>
<?php include_once 'views/layout.php';?>
