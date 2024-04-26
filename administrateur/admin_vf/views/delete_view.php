<main style=" background-color: #fff; border-radius: 10px;">

<?php
$title="Supprimer apprenti";
ob_start();
?>
<p>Voulez vous vraiment supprimer l'apprenti ?</p>
<a href="destroy.php?ID_APPRENTI=<?php echo $ID_APPRENTI?>" class="btn btn-danger">Valider la suppression</a>
<a href="index.php" class="btn btn-success">Annuler la suppression</a>
<?php
 $content =ob_get_clean();
 ?>
</main>
 <?= include_once 'views/layout.php';