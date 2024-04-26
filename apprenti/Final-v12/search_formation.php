
<?php include('connexion.php')  ?>
<link rel="stylesheet" href="./style.css">
<?php include('navbar_student.php'); ?>
    <body>

        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					
						 <div class="head-title">
				<div class="left">
					<h1 style="padding:10px; background-color:aliceblue ; border-radius:10px 40px 40px 10px ;width:95%; padding-left:40px ;">formation</h1>
					
				</div>
</div>
		
					    <!-- breadcrumb -->
				 					
					 

						<!-- Filter --->

						<!-- Filter --->

						 <!-- end breadcrumb -->
                         <div class="table-data">
				         <div class="order">
					     <div class="head">
                                <link rel="stylesheet" href="./styles/styleformation.css">
		<?php
			if(isset($_POST['search'])){
				$search = $_POST['search'];

                $sql = "SELECT * FROM formation  WHERE NOM_FOR='$search'";
                $result = mysqli_query($conn, $sql);
                
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo '
                            <div class="card">
                                <img src="'.$row["photo_for"].'" alt="Course Image">
                                <h2 style="margin-bottom: 50px;">'.$row["NOM_FOR"].'</h2>
                                <div class="rating">
                                    <i class="fas fa-star" style="font-size: 19px;"></i>
                                    <span class="rating-number">'.$row["rating"].'</span>
                                </div>
                                <span class="level">Nv:'.$row["NIV_DIFF"].'</span>
                                <p class="date"><i class="far fa-clock">'.$row["created_at"].'</i></p>
                                <a href="logformation.php?id_formation='.$row['ID_FORMATION'].'"><button class="learn-more">Learn More</button></a>
                            </div>';
                        }
                    } else {
                        echo "No formation found";
                    }
                } else {
                    echo "Error in query: " . mysqli_error($conn);
                }}
?>                
							
						
     <!--CATEGORIE-->
                              
       <?php                       
                          
     if(isset($_POST['searchh'])){
         $search = $_POST['searchh'];
     
         $sql = "SELECT * FROM categorie c JOIN formation f ON c.C_NOM = f.CATEGORIE WHERE c.C_NOM = '$search'";
         $result = mysqli_query($conn, $sql);
         $row = mysqli_fetch_array($result);
         echo $row['C_NOM'];
         if ($result) {
             if (mysqli_num_rows($result) > 0) {
                 while ($row = mysqli_fetch_array($result)) {
                     echo '
                     <div class="card">
                         <img src="'.$row["photo_for"].'" alt="Course Image">
                         <h2 style="margin-bottom: 50px;">'.$row["NOM_FOR"].'</h2>
                         <div class="rating">
                             <i class="fas fa-star" style="font-size: 19px;"></i>
                             <span class="rating-number">'.$row["rating"].'</span>
                         </div>
                         <span class="level">Nv:'.$row["NIV_DIFF"].'</span>
                         <p class="date"><i class="far fa-clock">'.$row["created_at"].'</i></p>
                         <a href="logformation.php?id_formation='.$row['ID_FORMATION'].'"><button class="learn-more">Learn More</button></a>
                     </div>';
                 }
             } else {
                 echo "No formation found";
             }
         } else {
             echo "Error in query: " . mysqli_error($conn);
         }
     }
     
     
				
   ?>

					 
    </body>
</html>


