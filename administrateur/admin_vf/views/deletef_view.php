<main style=" background-color: #fff; border-radius: 10px;">
<?php
$title="Supprimer formateur";
ob_start();
?>
<p>Voulez vous vraiment supprimer l'apprenti ?</p>
<a href="destroyf.php?ID_FORMATEUR=<?php echo $ID_FORMATEUR ?>" class="btn btn-danger">Valider la suppression</a>
<a href="indexf.php" class="btn btn-success">Annuler la suppression</a>
<?php
 $content=ob_get_clean();
 include_once 'views/layout.php';
