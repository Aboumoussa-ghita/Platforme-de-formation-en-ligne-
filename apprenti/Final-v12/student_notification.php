<style>
.alert {
  padding: 20px;
background-color: #87CEEB;
  color: white;
}

</style>


<?php include('connexion.php')  ?>

<?php include('navbar_student.php'); ?>
    <body>

        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('student_notification_sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					 <main>
						 <div class="head-title">
				<div class="left">
					<h1>Notifications</h1>
					
				</div>
</div>
		

		
		
        
<div class="table-data">
				<div class="order">
					<div class="head">
                    
<!--  Listed notifications-->
<?php
$id_apprenti = $session_id;

$query = "SELECT * FROM notifications n INNER JOIN notif_form_apprenti p WHERE p.apprenti=$id_apprenti AND n.id_notif = p.notif ORDER BY n.id_notif DESC LIMIT 5";
$result = mysqli_query($conn, $query);
$output = '';

if (mysqli_num_rows($result) > 0) {
  echo '<div class="notification-container">';
  
  while ($row = mysqli_fetch_array($result)) {
  
    echo ' <p>notif:</p>
    <div class="alert" style="background-color: #5698c8fa; border-radius:20px;">
      <p>' . $row["contenu"] . '</p>
    </div>';
   
  }
   
  echo '</div>';
} else {
  echo '
  <div class="alert">
    <strong>Pas de notifications.</strong>
  </div>';
}

 
?>
<!--  Listed notifications-->

</div>

		</main>			 
				  
                       
                    </div>


                </div>
			
            </div>
            <?php
      
        ?>
		
    </body>
</html>
