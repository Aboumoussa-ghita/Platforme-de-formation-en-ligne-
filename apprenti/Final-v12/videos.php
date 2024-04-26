<?php include('connexion.php')  ?>
<?php include('session.php'); ?>
<link rel="stylesheet" href="./styles/style.css">

<section id="content">
<!-- SEARCH -->
<nav>
			<i class='bx bx-menu' ></i>

			<form action="search_formation.php" method="post"  style="margin-right: 20%;" >

            <select  name="search" id= "search" style="flex-grow: 1;
    height: 60%;
    border: none;
    background: var(--grey);
    border-radius: 36px 0px 0px 36px ;
    outline: none;
    width: 40%;
    color: var(--dark);
    margin-right: -1%;">
			<option value="" disabled="" selected= "">Select Filter</option>
			<option value="1">info</option>
			<option value="2">pc</option>
</select>
<button name="submit" type="submit" class="search-btn" style="margin-top:10px;"><i class=' bx bx-filter-alt' ></i></button>

</form>

<form action="search_formation.php"  method="post" style="margin-right :300px;">
	<div class="form-input">
		<input name="search" placeholder="Search...">
		<button name="submit" type="submit" class="search-btn"><i class='bx bx-search'  ></i></button>
	</div>

</form>	

<ul class="nav navbar-nav navbar-right" style="margin-right: 80px;">

<li class="dropdown">

 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>

 <ul class="dropdown-menu"></ul>

</li>

</ul>

<?php $query= mysqli_query($conn,"select * from student where student_id = '$session_id'")or die(mysqli_error());
									while ($row = mysqli_fetch_array($query)) {
							?>
			 <a style="right: 20px; position:absolute;"> <?php echo $row['prenom']." ".$row['nom']; } ?></a> 
			<a href="#" class="profile" style="right: 180px; position:absolute;">
				<img id="avatar" src="./Img/avatar.jpg">
			</a>
		
									
</nav>


<!-- Script Notification-->
<script>
$(document).ready(function(){
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{
 $.ajax({
  url:"fetch.php",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)
  {
   $('.dropdown-menu').html(data.notification);
   if(data.unseen_notification > 0)
   {
    $('.count').html(data.unseen_notification);
   }
  }
 });
}
load_unseen_notification();
// submit form and get new records
$('#comment_form').on('submit', function(event){
 event.preventDefault();
 if($('#subject').val() != '' && $('#comment').val() != '')
 {
  var form_data = $(this).serialize();
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#comment_form')[0].reset();
    load_unseen_notification();
   }
  });
 }
 else
 {
  alert("Both Fields are Required");
 }
});
// load new notifications
$(document).on('click', '.dropdown-toggle', function(){
 $('.count').html('');
 load_unseen_notification('yes');
});
setInterval(function(){
 load_unseen_notification();;
}, 5000);
});
</script>

</section>
<!-- --->

    <body>

        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					 <main>
						 <div class="head-title">
				<div class="left">
					<h1>Partie</h1>
					
				</div>
</div>
		


		<div class="table-data">
				<div class="order">
					<div class="head">
                    <link rel="stylesheet" href="./styles/ch-style.css">

               
    <div class="container">
        <div class="main-video">
            <div class="video">
                <video src="../test_upload/Untitled ‑ Made with FlexClip.mp4" controls autoplay></video>
                <h3 class="title" style="font-size: 15px;"> chapitre : 00</h3>
            </div>
        </div>

        
        <div class="video-list">
        <?php
        $idf = $_GET['id_formation'];
        $query = 'SELECT * FROM chapitre WHERE id_formation = "'.$idf.'"';
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)){
          $video = $row['video'];
          $name = $row['name'];
            echo"<div class='vid'>
                <video src='".$video."'></video>
                <h3 class='title' style='font-size: 15px;'> '".$name."'</h3>
            </div>
        
             
        </div>";
    }
        ?>
    </div>

				
 

		</main>			 
	
					 
                       
                    </div>


                </div>
			
            </div>
            <?php
      
        ?>
		
    


    
        <script>
        let listVideo = document.querySelectorAll('.video-list .vid');
        let mainVideo = document.querySelector('.main-video video');
        let title = document.querySelector('.main-video .title');

        listVideo.forEach(video => {
            video.onclick = () =>{
                listVideo.forEach(vid => vid.classList.remove('active'));
                video.classList.add('active');
                if(video.classList.contains('active')){
                   let src = video.children[0].getAttribute('src');
                   mainVideo.src = src;
                   let text = video.children[1].innerHTML;
                   title.innerHTML = text;
                };
            };
            
        });
    </script>
    </body>
</html>