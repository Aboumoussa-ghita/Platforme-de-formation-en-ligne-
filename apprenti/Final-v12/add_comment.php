
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<?php
include('connexion.php');

?><?php include('navbar_student.php'); ?>
<div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
                <div class="span9" id="content" style="margin-left:20px">
                     <div class="row-fluid">
					
						 <div class="head-title">
				<div class="left">
					<h1 style="padding:10px; background-color:aliceblue ; border-radius:10px 40px 40px 10px ;width:95%; padding-left:40px ;">CONTENU FORMATION</h1>
					
				</div></div></div>
<?php
$id_formation=$_GET['id_formation'];
$ID_APPRENTI=$session_id;
?>

<?php
if (isset($_POST['create'])) {
    // Récupération des valeurs du formulaire
    
    $commentaire = $_POST["commentaire"];
 $requete = " INSERT INTO `comentaire`(`id_formation`, `apprenti_id`, `commentaire`, `date`) VALUES ('$id_formation','$ID_APPRENTI', '$commentaire',NOW())";
mysqli_query($conn, $requete);
 }
?>
<?php 
$query="SELECT * FROM apprenti WHERE ID_APPRENTI=$ID_APPRENTI";
$result=mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$nom_apprenti=$row['PRENOM'];
$prenom_apprenti=$row['NOM'];
$photo=$row['photo'];

?>
<!-- Formulaire pour ajouter un commentaire -->
<form method="POST" id="commentaireForm">
<div class="comment-bar">
    <span class="icon">+</span>
    <span class="comment-text">Ajouter un commentaire</span> </div>
    <div class="comment-input-container">
      <div class="img-text">
        <img class="avatar" src="<?php echo $photo; ?>" alt="Avatar">
        <textarea name="commentaire"  class="commentaire" required></textarea><br>
</div>
    
    <button name="create" class="create">Envoyer</button></div>
</form>






<!-- Section pour afficher les commentaires -->
<div id="commentaires">
    <?php
    // Récupération des commentaires depuis la base de données
    $result = mysqli_query($conn, "SELECT * FROM comentaire WHERE id_formation=$id_formation ORDER BY date DESC");
    // Affichage des commentaires
    while ($row = mysqli_fetch_assoc($result)) {
       echo'<div class="card">
       <img src="'.$photo.'" alt="User Image">
       <div class="card-content">
           <div  class="card-nd">
         <h3 class="name">'.$nom_apprenti.' '.$prenom_apprenti.'</h3>
         <p class="date">posted at:' . $row['date'] . '</p></div>
         <p class="comment">'. $row['commentaire'] . '</p>
        
         <div class="button-container">
  <button class="like-button"><i class="fas fa-thumbs-up"></i> </button>
  <button class="dislike-button"><i class="fas fa-thumbs-down"></i> </button>
</div>

         <button name="reply" class="reply">Reply</button>

       </div>
     </div>';
    }
    ?>
</div>

<!-- Section pour afficher les commentaires -->

<!-- Script JavaScript pour envoyer le formulaire via AJAX -->






<style>
    .button-container {
  display: flex;
  gap: 10px;
  margin-left: 600px;
  margin-top: -38px;
  background: blur(20px);
}

.like-button,
.dislike-button {
  padding: 10px 15px;

  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.like-button:hover,
.dislike-button:hover {
  background-color: #d5d5d5;
}

.like-button i,
.dislike-button i {
  margin-right: 5px;
}

.like-button {
  color: green;
}

.dislike-button {
  color: red;
}

    .reply{
        background-color: var(--blue);
        border: none;
        margin-left: 730px;
        margin-top: -38px;
        width: 90px;
        height: 40px;
        border-radius: 20px;
   
        font-size: 20px;
        color: white;
    }
  .card {
   
  background-color: aliceblue;
  display: flex;
  align-items: center;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 25px 25px 25px 25px;
  margin-bottom: 10px;
  width: 70%; /* Set your desired fixed width here */
  height: fit-content; /* Adjusts the height based on content */
  }
  
  .card img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    margin-right: 10px;
  }
  .card-nd{
    display: flex;
    justify-content: space-between;
  }
  .card-content {
    flex-grow: 1;
   
  }
  
  .name {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 5px;
  }
  
  .date {
    font-size: 14px;
    margin-right:-10px ;
    margin-top: -2px;
    padding-right: 20px;
  }
  
  .comment {
    font-size: 16px;
  }
  </style>


























<!--style textarea comment-->

<style>

.comment-bar, .card{
  margin: 30px;
}

.comment-bar {
    display: flex;
    align-items: center;
    background-color: #f0f0f0;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    height: 60px;
    width: 970px;
  }
  
  .icon {
    margin-right: 10px;
    font-weight: bold;
    font-size: 40px;
  }
  
  .comment-text {
    color: #888888;
    width: 900px;
  }
  
  .comment-input-container {
    display: none;
    flex-direction: column;
    align-items: flex-start;
    margin-top: 10px;
  }
  
  .commentaire{
    width: 700px;
    height: 80px;
    margin-bottom: 5px;
    padding: 5px;
    border: 1px solid #cccccc;
    border-radius: 5px;
    margin-left: 20px;

  }
  
  .create {
    background-color: #4CAF50;
    color: white;
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 700px;
  }

  .img-text{
display: flex;

}
.avatar {
  width: 70px;
  height: 70px;
  border-radius: 50%;
  margin-bottom: 5px;
}
  </style> 

<!--style textarea comment-->


<!--script textarea comment-->
<script>document.querySelector('.comment-bar').addEventListener('click', function() {
    var commentInputContainer = document.querySelector('.comment-input-container');
    if (commentInputContainer.style.display === 'none') {
      commentInputContainer.style.display = 'flex';
    } else {
      commentInputContainer.style.display = 'none';
    }
  });
  </script>
<!--script textarea comment-->
