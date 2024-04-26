<style>
    .lock {
  background: gold;
  border-radius: 3px;
  width: 25px;
  height: 20px;
  margin-top: -33px;
  margin-left: 220px;
  position: relative;
}

.lock:before {
  content: "";
  display: block;
  position: absolute;
  border:3px solid gold;
  top: -14px;
  left: 4.9px;
  width: 15px;
  height: 27px;
  border-radius: 35px 35px 0 0;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-... votre hachage de vérification ..." crossorigin="anonymous" />


<?php include('connexion.php')  ?>
<link rel="stylesheet" href="./style.css">

<?php include('navbar_student.php'); ?>


<body>

<div class="container-fluid">
    <div class="row-fluid">
        <?php include('vd_sidebar.php'); ?>
        <div class="span9" id="content">
             <div class="row-fluid">
             <main>
                 <div class="head-title">
        <div class="left">
            <h1>chapitre</h1>
            
        </div>
</div>



<div class="table-data">
        <div class="order">
            <div class="head">
            <link rel="stylesheet" href="./styles/ch-style.css">

          
            <?php
  $idc= $_GET['id_chap'];
  $ID_APPRENTI = $session_id;     
  $idf = $_GET['id_formation'];
  $query = 'SELECT * FROM chapitre WHERE id_chap = "'.$idc.'" and  id_formation = "'.$idf.'"';
   
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);

  $niv = $row["score"]; 

?>
</div>

<?php
$sql=mysqli_query($conn,'SELECT * FROM apprenti WHERE score >= "'.$niv.'"  AND ID_APPRENTI="'.$ID_APPRENTI.'"');
        
        if(mysqli_num_rows($sql) > 0)
        {  
            echo"<td><a href='video.php?id_chap=".$row['id_chap']."&id_formation=".$row['id_formation']."'><span class='status completed'>commencer</span></a></td>";
        }
        else 
        {
            echo"fermé";
        }
?>
           
</div>





</main>			 

             
               
            </div>


        </div>
    
    </div>
    <?php

?>






</body>
</html>