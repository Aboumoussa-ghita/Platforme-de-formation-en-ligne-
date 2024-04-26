<?php include('connexion.php')  ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-... votre hachage de vérification ..." crossorigin="anonymous" />


<?php include('navbar_student.php'); ?>
    <body>

        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('pswsidebar.php'); ?>
                <div class="span9" id="content" style="border-radius:10px">
                     <div class="row-fluid">
					
						 <div class="head-title">
				<div class="left">
					<h1 style="padding:10px; background-color:aliceblue ; border-radius:10px 40px 40px 10px ;width:95%; padding-left:40px ;">Changer le mot de pass</h1>
					
				</div>
</div>



		
		
		<div class="table-data">
				<div class="order">
					<div class="head">
                    <link rel="stylesheet" href="./styles/styleformation.css">

                    <!DOCTYPE html>
<html>
<head>
<title>mot_de_passe Change</title>



</head>
<body>
<h3 align="center">CHANGE mot_de_passe</h3>
<div><?php if(isset($message)) { echo $message; } ?></div>
<form method="post" action="" align="center">
Current mot_de_passe:<br>
<input type="mot_de_passe" name="currentmot_de_passe"><span id="currentmot_de_passe" class="required"></span>
<br>
New mot_de_passe:<br>
<input type="mot_de_passe" name="newmot_de_passe"><span id="newmot_de_passe" class="required"></span>
<br>
Confirm mot_de_passe:<br>
<input type="mot_de_passe" name="confirmmot_de_passe"><span id="confirmmot_de_passe" class="required"></span>
<br><br>
<input type="submit">
</form>
<?php

$ID_APPRENTI = $session_id;

if(count($_POST)>0) {
$result = mysqli_query($conn,"SELECT * FROM apprenti WHERE ID_APPRENTI='" . $ID_APPRENTI . "'");
$row=mysqli_fetch_array($result);
if($_POST["currentmot_de_passe"] == $row["mot_de_passe"]  ) {
mysqli_query($conn,"UPDATE apprenti set mot_de_passe='" . $_POST["newmot_de_passe"] . "' WHERE ID_APPRENTI='" . $ID_APPRENTI . "'");
$message = "mot_de_passe Changed Sucessfully";
} else{
 $message = "mot_de_passe is not correct";
}
}
?>
<br>
<br>
</body>
</html>
            
   
                    
					

			 
				   
					 
                       
                    </div>


                </div>
			
            </div>
            <?php
      
        ?>
		
    </body>
</html>