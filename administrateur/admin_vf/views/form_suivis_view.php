<?php
$title = "Liste des formations:";
ob_start();
?>

<table class="table table-striped">
    <?php if (!empty($formations)) : ?>
        <thead>
        <tr>
            <th>Nom de la formation</th>
            <th>Niveau d'avancement</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($formations as $index => $formation) : ?>
            <tr>
                <td><?= $formation->nom_for ?></td>
                <td>
                    <?php $pourcentage = $pourcentages[$index]; ?>
                    <div class='progress'>
                        <div class='progress-bar bg-primary' style='width: <?= $pourcentage ?>%;'></div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    <?php else : ?>
        <tbody>
        <tr>
            <td colspan="2">Cet apprenti ne suit aucune formation</td>
        </tr>
        </tbody>
    <?php endif; ?>
</table>

<?php $content = ob_get_clean(); ?>
<?php include_once 'views/layout.php'; ?>
