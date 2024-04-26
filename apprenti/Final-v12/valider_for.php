<?php  include('connexion.php');?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<?php include('connexion.php') ?>
<?php include('navbar_student.php'); ?>
<?php $idf=$_GET['id_formation'];?>
<?php $idc=$_GET['id_chap'];
$apprenti_id = $session_id;
?>


<body>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('sidebar.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">
                   <div class="main" style="background-color:#F0F8FF; margin-top: 40px; padding-top:20px; padding-right:90px; border-radius: 20px;">
                       

                        <div class="table-data">
                            <div class="order">
                                <div class="head">
                                    <div class="container" style="height:80% ;"> 
                                    <div class="valider" style="height: 55%; width: 57%; background-color:white ; margin-top: 90px; margin-left: 280px; padding-left: 10px;padding-top:60px; border-radius: 20px;">
                                      <div class="success-container">
                                        <i class="fas fa-award" style="color:#f3ba2b;font-size:150px;"></i>
                                              <h3 class="success-title"  style="font-size: 23.9px;  font-weight: bold;">Félicitations ! Vous avez terminé la formation.</h3>
                                              
                                       </div>
<?php
 $query= mysqli_query($conn,"select * from apprenti where ID_APPRENTI = '$session_id'")or die(mysqli_error());
 $row = mysqli_fetch_array($query);
 $query1= mysqli_query($conn,"select * from formation where id_formation = '$idf'")or die(mysqli_error());
 $row1 = mysqli_fetch_array($query1);

echo '<form method="post" action="generate.php?$id_chap='.$idc.'&id_formation='.$idf.'">';

echo'<input type="hidden" name="FN" id="FN" value="'.$row['PRENOM'].' '.$row['NOM'].'">';


echo'<input type="hidden" name="FR" id="FR" value="'.$row1['NOM_FOR'].'">';

echo '<button class="custom-button"> Télécharger certificat </button>' ;
echo '</form>'
?>

                                    </div></div></div></div></div></div>
                     
                                    <style>
    .custom-button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      cursor: pointer;
      border-radius: 4px;
      top: 20px;
      position: relative;
      left:400px;
      width: 200px;
      height: 50px;
    }

    .custom-button:hover {
      background-color: #45a049;
    }
  
                                
    .success-container {
      display: flex;
      align-items: center;
     
    }

    .success-title {
      margin-bottom: 80px;

    }</style>


<!-- Rating-->
<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
         
    	<div class="card" style="margin-left: auto;
    margin-right: auto;">
    	
    		<div class="card-body" style="width:100%;">
    			<div class="row">
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-4">
    						<b><span id="average_rating">0.0</span> / 5</b>
    					</h1>
    					<div class="mb-3">
    						<i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
	    				</div>
    					<h3><span id="total_review">0</span> Review</h3>
    				</div>
    				<div class="col-sm-4">
    					<p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
    					<p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>               
                        </p>
    				</div>
    				<div class="col-sm-4 text-center">
    					<h3 class="mt-4 mb-3">Write Review Here</h3>
    					<button type="button" name="add_review" id="add_review" class="btn btn-primary" style="width:80px;height:30px;font-size:13px;">Review</button>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"></div>
    </div>
</body>
</html>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit Review</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	
	        	<div class="form-group">
	        		<textarea hidden name="apprenti_review" id="apprenti_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
            <div class="form-group">
	        		<textarea hidden name="id_formation" id="id_formation" class="form-control" placeholder="Type Review Here" > <?php echo $idf;?></textarea>
	        	</div>
            <div class="form-group">
	        		<textarea hidden name="ID_APPRENTI" id="ID_APPRENTI" class="form-control" placeholder="Type Review Here" > <?php echo $apprenti_id;?></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>

<style>
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:#e9ecef;
}
</style>

<script>

$(document).ready(function(){

	var rating_data = 0;

    $('#add_review').click(function(){

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

        var ID_APPRENTI = $('#ID_APPRENTI').val();

        var apprenti_review = $('#apprenti_review').val();

        if(ID_APPRENTI == '' )
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"./rating/submit_rating.php?id_formation=<?php echo $idf ?>&ID_APPRENTI=<?php echo $apprenti_id ?>",
                method:"POST",
                data:{rating_data:rating_data, ID_APPRENTI:ID_APPRENTI, apprenti_review:apprenti_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    alert(data);
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data()
    {
        $.ajax({
            url:"./rating/submit_rating.php?id_formation=<?php echo $idf ?>&ID_APPRENTI=<?php echo $apprenti_id ?>",
            method:"POST",
            data:{action:'load_data'},
            dataType:"JSON",
            success:function(data)
            {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function(){
                    count_star++;
                    if(Math.ceil(data.average_rating) >= count_star)
                    {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');
                /*
                if(data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].ID_APPRENTI.charAt(0)+'</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';
                        
                        
                        html += '<div class="card-header"><b>'+data.review_data[count].ID_APPRENTI+'</b></div>';

                        html += '<div class="card-body">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(data.review_data[count].rating >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].apprenti_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }*/
            }
        })
    }

});

</script>
<!-- New comments-->


<!-- commentaire-->
<?php 
if (isset($_POST['create'])) {
// Récupération des valeurs du formulaire
$id_formation=$_GET['id_formation'];
$commentaire = $_POST["commentaire"];
$requete = " INSERT INTO `comentaire`(`id_formation`, `apprenti_id`, `commentaire`, `date`) VALUES ('$id_formation','$apprenti_id', '$commentaire',NOW())";
mysqli_query($conn, $requete);
}


$query="SELECT * FROM apprenti WHERE ID_APPRENTI=$apprenti_id";
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




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-... votre hachage de vérification ..." crossorigin="anonymous" />
<link rel="stylesheet" href="./styles/comment.css">

<!-- Section pour afficher les commentaires -->
<div id="commentaires">
<?php
$id_formation=$_GET['id_formation'];
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

  
       
    </div>

				
 

		</main>			 
	
					 
                       
                    </div>


                </div>
			
            </div>
            <?php
      
        ?>
		


</div></div></div></div>