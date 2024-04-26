<link rel="stylesheet" href="./styles/styleformation.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-... votre hachage de vérification ..." crossorigin="anonymous" />

<?php include('connexion.php');?>
<?php include('navbar_student.php'); ?>

    <body>

        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('mesfors_sidebar.php'); ?>
                <div class="span9" id="content" style="border-radius:10px">
                     <div class="row-fluid">
					
						 <div class="head-title">
				<div class="left">
					<h1 style="padding:10px; background-color:aliceblue ; border-radius:10px 40px 40px 10px ;width:95%; padding-left:40px ;">Mes formations </h1>
					
				</div>
</div>
		

		
		
		<div class="table-data">
				<div class="order">
					<div class="head">
                    <link rel="stylesheet" href="./styles/styleformation.css">
        <?php
$ID_APPRENTI = $session_id;
$query = "SELECT * FROM suivre_formation  m  join formation f on f.id_formation=m.formation WHERE APPRENTI=$ID_APPRENTI";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $formation_id = $row['formation'];
                    $formation_query = "SELECT * FROM formation WHERE id_formation = $formation_id";
                    $formation_result = mysqli_query($conn, $formation_query);
                    $formation_row = mysqli_fetch_array($formation_result);
        echo' 
        <div class="card">
        
        <img src="'.$formation_row["photo_for"].'" alt="Course Image">
          
          <h2 style="margin-bottom: 50px;">'.$formation_row["NOM_FOR"].'</h2>
       
          <div class="rating">
            <i class="fas fa-star" style="font-size: 19px;"></i>
            <span class="rating-number">'.$formation_row["rating"].'</span>
          </div>
          <span class="level">Nv:'.$formation_row["NIV_DIFF"].'</span>
          
          <p class="date"><i class="far fa-clock">'.$formation_row["created_at"].'</i></p>
          <a href="chapitre.php?id_formation='. $formation_row['ID_FORMATION'] .'"><button class="learn-more">suivre</button></a>
        </div>';
    }
} else {
    echo 'Veuillez vous inscrire à une formation.';
}
?>

    



</div>

			 
				   
					 
                       
                    </div>


                </div>
			
            </div>
            <?php
      
        ?>
        <!-- call rating -->
      
		
    </body>
</html>

<style>.card {
  background-color: white;
  position: relative;
  display: inline-block;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 318px;
  height: 420px;
  border: 1px solid #ccc;
  border-radius: 9px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
  padding: 20px;
  margin: 40px ;
}
</style>



