<?php
if (isset($_GET['id_formation'])) {
    $id_formation = $_GET['id_formation'];
} else {
    $id_formation = 0;
}
if (isset($_GET['score'])) {
    $score = $_GET['score'];
} else {
    $score = 0;
}


if (isset($_GET['id_chap'])) {
    $idChapitre = $_GET['id_chap'];
} else {
    $idChapitre = 0;
}




?>
<?php include('connexion.php'); ?>
<link rel="stylesheet" href="./style.css">
<?php include('navbar_student.php'); ?>
<body>
    <?php include('sidebar.php'); ?>
    <div class="span9" id="content">
        <div class="row-fluid">
            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>Résultats du quizz</h1>
                    </div>
                </div>
                <div class="table-data">
                    <div class="order">
                        <div class="head">
<body>
<link href='https://fonts.googleapis.com/css?family=Great Vibes' rel='stylesheet'>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rasa:wght@300&display=swap" rel="stylesheet">
    <style>
        .n1{
            position: relative;
            top: 530px;
            font-family: 'Great Vibes';
            font-size: 65px;
            color: #03989E;
           
        }
        .n2{
            position: relative;
            top: 550px;
            font-family: 'Rasa medium';
            font-size: 17px;
            color: #334166;
           
        }
    </style>
    <center>

   <div class="container">
      <button id="button">Generate PDF</button>

      <br>
      <br>
      <div class="card" id="makepdf">
      <?php 
      $query= mysqli_query($conn,"select * from apprenti where ID_APPRENTI = '$session_id'")or die(mysqli_error());
	  $row = mysqli_fetch_array($query);
      $query1= mysqli_query($conn,"select * from formation where id_formation = '$id_formation'")or die(mysqli_error());
      $row1 = mysqli_fetch_array($query1);
      echo "<p class='n1'>"; 
     echo $row['PRENOM']." ".$row['NOM']; 
     echo"</p>";

     echo"<p class='n2'> <b>";
     echo "This certificate is given to ";
     echo $row['PRENOM']." ".$row['NOM']; 
     echo" <br> ";
     echo "for the achievement in the field of education and proves the competent in ";
     echo $row1['NOM_FOR'];
     echo"</b></p>";?>
        <img style="width: 95%;" src="./img/certif.png" alt="">
    </div>
      </div>
   </div>
    </center>
    <script>
    var button = document.getElementById("button");
    var makepdf = document.getElementById("makepdf");
 
    button.addEventListener("click", function () {
        var mywindow = window.open("", "PRINT",
                "height=400,width=600");
 
        mywindow.document.write(makepdf.innerHTML);
 
        mywindow.document.close();
        mywindow.focus();
 
        mywindow.print();
        mywindow.close();
 
        return true;
    });
</script>
</body>
</html>