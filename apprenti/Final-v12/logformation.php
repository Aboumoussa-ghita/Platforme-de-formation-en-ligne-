<style>
    .learn{
   background-color: #5698c8fa;
   color: #fff;
   border: none;
   border-radius: 5px;
   padding: 10px 10px;
   font-size: 15px;
   cursor: pointer;
   margin-left: 170px;
   width: 120px;
   height: 50px;
   margin-top: -50px;
  

    }
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
   <?php $id_formation = $_GET['id_formation'];
$query = "SELECT * FROM formation WHERE ID_FORMATION = $id_formation";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					
						
</div>
<div class="head-title">
				<div class="left">
					<h1 style="padding:10px; background-color:aliceblue ; border-radius:10px 40px 40px 10px ;width:95%; padding-left:40px ;">Formation en <?php echo $row['NOM_FOR']; ?>:</h1>
					
				</div>
</div>

		
		
		<div class="table-data">
				<div class="order">
					<div class="head">
                    <link rel="stylesheet" href="./styles/styleformation.css">
					<?php
//$query = "SELECT F.* FROM formation F JOIN choix_categorie C ON F.c_nom=C.c_nom WHERE id_apprenti=2";
$id_formation = $_GET['id_formation'];
$query = "SELECT * FROM formation WHERE ID_FORMATION = $id_formation";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_array($result);
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
        <form method="post">';
?>

<?php
$ID_APPRENTI = $session_id;       
$niv = $row["NIV_DIFF"]; 
$idf = $row["ID_FORMATION"]; 
?>

<?php
$query = "SELECT * FROM suivre_formation WHERE APPRENTI = $ID_APPRENTI AND formation = $idf";
$sql1 = mysqli_query($conn, $query);
$row1 = mysqli_fetch_array($sql1);
$idf1 = isset($row1["formation"]) ? $row1["formation"] : null;

$sql=mysqli_query($conn,'SELECT * FROM apprenti WHERE NIV_EXPERTISE >= "'.$niv.'" AND ID_APPRENTI="'.$ID_APPRENTI.'"');

if(mysqli_num_rows($sql) > 0) {
    if(mysqli_num_rows($sql1) > 0) {  
        echo '<div class="learn"><a href="chapitre.php?id_formation='.$idf1.'"   name="create" style="color:white; " >continuer</a></div>'; 
    } else {
        echo '<button name="create" class="learn-more">s inscrire</button>'; 
    }
} else {
    echo '<div class="lock"></div>'; 
}
?>
                
</div>

<?php
if(isset($_POST['create'])) {
    $ID_APPRENTI = $session_id;
    $id_formation = $row['ID_FORMATION'];
    $nom_for = $row['NOM_FOR'];
    
    $sql="select * from suivre_formation where (APPRENTI='$ID_APPRENTI' and formation='$id_formation');";
    $res=mysqli_query($conn,$sql);

    if (mysqli_num_rows($res) > 0) {
        $res = mysqli_fetch_assoc($res);
        if($ID_APPRENTI==isset($res['email']) && $id_formation==isset($res['formation'])) {
            echo "formation already exists";
        }
    } else {
        $sql = "INSERT INTO suivre_formation (APPRENTI, formation) VALUES ('$ID_APPRENTI', '$id_formation')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<div id="autoDismiss" class="auto-dismiss" style="background:#5698c8fa;; color:white;">Le nouvel enregistrement a été ajouté avec succès .</div>';
        } else {
            echo "Erreur lors de l'ajout de l'enregistrement : " . mysqli_error($conn);
        }
    }
}
?>

</div>

<?php
if ($result) {
    echo '
    <script>
        setTimeout(function() {
            var autoDismissElement = document.getElementById("autoDismiss");
            if (autoDismissElement) {
                autoDismissElement.style.display = "none";
            }
        }, 3000);
    </script>';
}
?>

</div>
</div>
<?php
?>
</body>
</html>

<style>
    .auto-dismiss {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #f1f1f1;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        animation: fadeOut 3s ease-in-out;
    }

