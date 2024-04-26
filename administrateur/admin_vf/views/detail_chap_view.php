<?php
$title = "";
ob_start();
?>

<h1 style="color: #00008B">Le contenu du chapitre :</h1>
<br>
<div class="card-single" style="background-color: #8bc3ebdd; padding: 2rem; border-radius: 10px; box-shadow: 2px 5px 10px 4px rgb(0 0 0 / 10%); margin-left: 20px;">
    <h2 style="font-size: 24px; color: #00008B">Introduction :</h2>
    <div>
       <h6> <?php echo $chap['CHAP_descriptif'];?></h6>
    </div>
</div>


<div class="card-single" style="background-color: #8bc3ebdd; padding: 2rem; border-radius: 10px; box-shadow: 2px 5px 10px 4px rgb(0 0 0 / 10%); margin-left: 20px;">
    <div style="justify-content: center;">
        <h2 style="font-size: 24px;color: #00008B ; "> la vidéo explicative:</h2>

        <div>  <!--<?php echo $video['Contenu']; ?>-->
            <video src="v1.mp4" controls autoplay style="width: 90%; height: auto; margin-left: 5%"></video>
        </div>
    </div>
</div>
<br>

<div class="card-single" style="background-color: #8bc3ebdd; padding: 2rem; border-radius: 10px; box-shadow: 2px 5px 10px 4px rgb(0 0 0 / 10%); margin-left: 20px;">
    <h2 style="font-size: 24px;color: #00008B ; ">Les questions du quiz :</h2>

    <ol>
        <?php foreach ($questions as $question) : ?>
            <li><?php echo $question['question']; ?></li>
        <?php endforeach; ?>
    </ol>
</div>
<br>

<div class="card-single" style="background-color: #8bc3ebdd; padding: 2rem; border-radius: 10px; box-shadow: 2px 5px 10px 4px rgb(0 0 0 / 10%); margin-left: 20px;">
    <h2 style="font-size: 24px; color: #00008B;">Les exercices :</h2>

    <div style="display: flex; justify-content: center;">
        <a href="data:application/pdf;base64,<?php echo base64_encode($exercices); ?>" class="btn-download" download="exercices.pdf">Voir exo (PDF)</a>
    </div>
</div>
<br><br>
<?php
$content = ob_get_clean();
include_once 'views/layout.php';
?>

<style>
    .btn-download {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
    }

    .btn-download:hover {
        background-color: #0056b3;
    }

    .card-single {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        margin-bottom: 2rem;
    }
</style>