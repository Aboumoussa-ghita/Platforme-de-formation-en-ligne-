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
            <h1>Résultats</h1>
            
        </div>
</div>



<div class="table-data">
        <div class="order">
            <div class="head">
            <link rel="stylesheet" href="./styles/ch-style.css">


            <?php
               $idc = $_GET['id_chap'];
               $idf = $_GET['id_formation'];
               $ID_APPRENTI = $session_id;


               
               
               $qry3 = "SELECT `ans`, `userans` FROM `quiz`";
               $result3 = mysqli_query($conn,$qry3);
               while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
                   if($row3['ans']==$row3['userans']){
                    @$_SESSION['score'] += 1 ;
                }
               }
                
                ?> 
                <div class="col-md-offset-2 col-md-8">
               <h2>Result:</h2><br><br>
                <span><b>No. of Correct Answer:</b>&nbsp;<?php  echo $no = @$_SESSION['score']; 
                                                           //var_dump($_SESSION['ids']);
                //session_unset(); ?></span><br><br>
                <span><b>Your Score:</b>&nbsp<?php if(isset($no)) echo $no*2; ?></span>
               </div>
               

<?php 
$idc = $_GET['id_chap'];
$idf = $_GET['id_formation'];?>

<!-- INSERT SCORE -->
<?php
if (isset($_POST['save'])) {

    

    
    
            $sql="INSERT INTO `score`(`id_chap`, `id_formation`, `ID_APPRENTI`, `score`) VALUES ('$idc','$idf','$ID_APPRENTI','$no')"; 
            $result = mysqli_query($conn, $sql);
      
            if ($result) {
                echo "Vous avez terminé le chapitre";
            } else {
                echo "Erreur lors de l'ajout de l'enregistrement : " . mysqli_error($conn);
            }
            
            
}
?>
<!-- End INSERT SCORE -->




<form  method="POST">

<button type="submit" name="save" class="learn-more">Valider</button>
</form>


</main>			 

             
               
            </div>


        </div>
    
    </div>
    <?php

?>






</body>
</html>

