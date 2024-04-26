<?php
$title = "Liste des commentaires:";
ob_start();
?>
<div class="row d-flex justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-0 border" style="background-color: #8bc3ebdd;">
            <div class="card-body p-4">

                <?php foreach ($comments as $index => $comment) : ?>
                    <?php $id_commentaire = $comment->id_commentaire; ?>
                    <?php $apprenti = isset($apprentis[$index]) ? $apprentis[$index] : null; ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <p><?php echo $comment->commentaire; ?></p>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <?php if ($apprenti !== null) : ?>
                                        <div class="d-flex flex-row align-items-center">
                                            <?php $photoBinary = $apprenti->photo; ?>
                                            <?php if ($photoBinary !== null && !empty($photoBinary)) : ?>
                                                <?php $photoBase64 = base64_encode($photoBinary); ?>
                                                <img src="data:image/jpeg;base64,<?php echo $photoBase64; ?>" alt="avatar" width="25" height="25">
                                            <?php else : ?>
                                                <p class="small mb-0 ms-2">Image non disponible</p>
                                            <?php endif; ?>
                                            <p class="small mb-0 ms-2"><?php echo $apprenti->NOM.' '.$apprenti->PRENOM; ?></p>
                                        </div>
                                    <?php else : ?>
                                        <p class="small mb-0 ms-2">Apprenti non trouvé</p>
                                    <?php endif; ?>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="ms-auto">
                                        <button class="btn btn-outline-primary btn-sm" onclick="afficher_alerte()">Envoyer avertissement</button>
                                        <i class="far fa-thumbs-up mx-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>
<script>
    function afficher_alerte() {
        window.alert("Avertissement envoyé avec succès");
    }
</script>
<?php $content = ob_get_clean(); ?>
<?php include_once 'views/layout.php'; ?>
