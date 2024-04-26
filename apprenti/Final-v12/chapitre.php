<?php include('connexion.php')  ?>
<?php include('navbar_student.php'); ?>
<?php include('sidebar.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-... votre hachage de vérification ..." crossorigin="anonymous" />



<link rel="stylesheet" href="./style.css">

    <body>
			
                <div class="span9" id="content">
                     <div class="row-fluid">
					 <main>
						 <div class="head-title">
				<div class="left"> <?php  
                $apprenti_id = $session_id; 
                $id_formation = $_GET['id_formation'];?>

          
  <?php
$query="SELECT * FROM formation WHERE id_formation=$id_formation";
$result=mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
?>

					
					<h1 style="color: darkblue;">Formation: <?php echo $row['NOM_FOR']; ?></h1>
				</div>
</div>
		
<!-- start-->

<div class="table-data">
				<div class="order">
					<div class="head">
						                    
 <div class="formation">
<br>

<h3 style="color: darkblue;">Description:</h3> <h4><?php echo $row['DESCRIPTIF']; ?></h4>
					</div></div>
					<table>
						<thead>
							<tr>
								<th style="color: darkblue; font-size: 18px;">chapitres</th>
								<th style="color: darkblue;font-size: 18px;">Description</th>
								<th style="color: darkblue;font-size: 18px;">Status</th>
							</tr>
						</thead>
                        <?php
        $idf = $_GET['id_formation'];
        
        $apprenti_id = $session_id;  ?>  
        
        
       
      <!-- //// deja ouverts ///
      

    -->
      <?php 
                            $query2 = 'SELECT c.*
                            FROM chapitre c
                            WHERE EXISTS (
                                SELECT 1
                                FROM passage_quiz s  INNER JOIN quizz q ON s.quizz = q.id_quizz
                                WHERE q.chapitre = c.id_chap and  s.apprenti="'.$apprenti_id.'"
                            ) AND id_formation = "'.$idf.'"';

                            $result2 = mysqli_query($conn, $query2);
        while($row1 = mysqli_fetch_array($result2)){
            
            $idc1 = $row1["id_chap"] ; 
      
                        echo"
				
							<tr>
								<td>
								
									<p>".$row1['CHAP_TITRE']."</p>
								</td>
								<td>".$row1['CHAP_descriptif']."</td>"; ?>
                                <?php
                               
                                echo"
                                <td ><a href='video.php?id_chap=".$row1['id_chap']."&id_formation=".$row1['id_formation']."' ><span class='status completed' >Terminer</span></a></td></tr>";
                              
						      
                                  }  
                                
                                  ?>

           


          <!-- //// END deja ouverts ///
         //// elements ouverts ///-->
        <?php
        $query = 'SELECT c.*
        FROM chapitre c
        WHERE c.id_chap > (
            SELECT COALESCE(MAX(q.chapitre), 0)
            FROM passage_quiz s INNER JOIN quizz q ON s.quizz = q.id_quizz where s.apprenti="'.$apprenti_id.'"
        ) and id_formation  = "'.$idf.' "
        ORDER BY c.id_chap
        LIMIT 1';


        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)){
          
            $idc1 = $row["id_chap"] ; 
      
                        echo"
						<tbody>
							<tr>
								<td>
								
									<p>'".$row['CHAP_TITRE']."'</p>
								</td>
								<td>'".$row['CHAP_descriptif']."'</td>"; ?>
                                <?php
                                
                                echo"
								<td><a href='video.php?id_chap=".$row['id_chap']."&id_formation=".$row['id_formation']."'><span class='status process'>Commencer</span></a></td></tr>";
						      	
                                  } 
                                
                                  ?>
            <!-- elements fermé -->
                            <?php 
                            $query2 = 'SELECT c.*
                            FROM chapitre c
                            WHERE c.id_chap > (
                                SELECT COALESCE(MAX(q.chapitre+1), 0)
                                FROM passage_quiz s INNER JOIN quizz q ON s.quizz = q.id_quizz where s.apprenti="'.$apprenti_id.'"
                            ) and id_formation = "'.$idf.'"
                            ORDER BY c.id_chap';

                            $result2 = mysqli_query($conn, $query2);
        while($row1 = mysqli_fetch_array($result2)){
        
            $idc1 = $row1["id_chap"] ; 
      
                        echo"
				
							<tr>
								<td>
								
									<p>'".$row1['CHAP_TITRE']."'</p>
								</td>
								<td>'".$row1['CHAP_descriptif']."'</td>"; ?>
                                <?php
                               
                                echo"
								<td><span class='status pending'>Fermé</span></td>
                                </tr>";
						   
                                  
                                  } 
                                 
                                  ?>
                                
<!-- end fermé -->
                                
						
						</tbody>
					</table>
				</div>
				
			</div>


<!-- end-->
        

  
       
    </div>

				
 

		</main>			 
	
					 
                       
                    </div>


                </div>
			
            </div>
            <?php
      
        ?>
		
    

    </body>
</html>
<style>#content main .table-data .order table tr td .status.completed {
    background: red;
}</style>