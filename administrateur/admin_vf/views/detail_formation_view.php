<?php
$title = "Contenu de la formation";
ob_start();
?>

<table class="table table-striped">
 <thead style="color: #00008B">
 <tr>
  <th>Titre du chapitre</th>
  <th>actions</th>

 </tr>

 </thead>
 <tbody>
 <?php foreach ($chapitres as $chap): ?>
  <tr>
   <td><?=$chap->CHAP_TITRE ?></td>

   <td>
    <a href="detail_chap.php?id=<?php echo $chap->id_chap ?>" class="btn btn-outline-success btn-sm">Consulter</a>

   </td>
  </tr>
 <?php endforeach; ?>
 </tbody>
</table>
<?php $content=ob_get_clean();?>

<?php include_once 'views/layout.php';?>
