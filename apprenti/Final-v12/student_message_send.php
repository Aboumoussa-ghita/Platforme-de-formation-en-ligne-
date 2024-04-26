<?php include('connexion.php')  ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-... votre hachage de vérification ..." crossorigin="anonymous" />

<style>
	.circle {
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
.profile-pic {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 50%;
}

	.custom-search {
  position: relative;
  width: 300px;
}
.custom-search-input {
height: 60px;
  width: 380%;
  border: 1px solid #ccc;
  border-radius: 100px;
  padding: 10px 100px 10px 20px; 
  line-height: 1;
  box-sizing: border-box;
  outline: none;
}
.custom-search-botton {
  position: absolute;
  right: -835px; 
  top: 4px;
  bottom: 4px;
  border: 0;
  background: #5698c8fa;;
  color: #fff;
  outline: none;
  margin: 0;
  padding: 0 10px;
  border-radius: 100px;
  z-index: 2;
}
</style>




    <body>
<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('message_sidebar.php'); ?>
                <div class="span9" id="content" style="border-radius:10px">
                     <div class="row-fluid">
					
						 <div class="head-title">
				<div class="left">
					
				</div>
</div>
		

<?php  
$idfor = $_GET['ID_FORMATEUR'];

$sql = "SELECT * FROM formateur WHERE ID_FORMATEUR='$idfor'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$nom_for=$row['F_NOM'];
$prenom_for=$row['F_PRENOM'];
$photo_for=$row['photo'];
?>
		
		
<main>
			<div class="head-title">
				<div class="left">
					<h1>Discussion</h1>
					
				</div>
			
			</div>

			


			<div class="table-data">
				
			<div class="todo">
  <div class="head">
    <div class="circle" style="display: inline-block; vertical-align: middle;">
    <img class="profile-pic" src="<?php echo $photo_for; ?>" alt="Image de profil">
    </div>
    <div style="display: inline-block; vertical-align: middle; margin-left: 10px;">
      <p><?php echo $prenom_for . " " . $nom_for ?></p>
    </div>
  </div>


					<ul class="todo-list" style="width=400px;" id="link_wrapper">

						
					</ul>
					
				</div>
						</diV>
				

						<?php
						$ID_APPRENTI = $session_id;
                        $currentDateTime = date("Y-m-d H:i:s");
						$ID_F = $_GET['ID_FORMATEUR'];
						

						
						

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
							// Retrieve user input from the form
							$msg = $_POST["msg"];
							
						
							// Create the SQL statement
							$sql = "INSERT INTO msg_app_for (msg,apprenti,formateur,Date) VALUES ('$msg','$ID_APPRENTI','$ID_F','$currentDateTime')";
						
							// Execute the statement
							if ($conn->query($sql) === TRUE) {
								echo "";
							} else {
								echo "Error: " . $sql . "<br>" . $conn->error;
							}
							
						} 
						?>
                        <br>
						
						<form method="post">

				<div class="custom-search">
  <input type="text" class="custom-search-input" name="msg" id="msg" placeholder="envoyé un message">
 <button class="custom-search-botton"  type="submit"><i class="fas fa-paper-plane" style=" width: 30px; height: 70px; margin-top: 15px; border-radius: 100%;font-size: 18px; "></i></button>
 
</div>
						</form>
            <script>
function loadXMLDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("link_wrapper").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "server.php?ID_FORMATEUR=<?php echo $ID_F ?>", true);
  xhttp.send();
}
setInterval(function(){
	loadXMLDoc();
	// 1sec
},1000);

window.onload = loadXMLDoc;
</script>
				
            <!-- end Send message script-->

		</main>
		
    </body>
</html>