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
        border: 3px solid gold;
        top: -14px;
        left: 4.9px;
        width: 15px;
        height: 27px;
        border-radius: 35px 35px 0 0;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-... votre hachage de vérification ..." crossorigin="anonymous" />
<?php include('connexion.php') ?>
<?php include('navbar_student.php'); ?>
<?php $id_formation=$_GET['id_formation'];?>

<body>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('sidebar.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">
                   <div class="main" style="background-color:#F0F8FF; margin-top: 40px; padding-top:20px; padding-right:90px; border-radius: 20px;">
                       

                        <div class="table-data">
                            <div class="order">
                                <div class="head">
                                    <link rel="stylesheet" href="./ch-style.css">

                                    <div class="container">
                                        <div class="main-video">
                                            <div class="video">
                                                <?php
                                                $idc = $_GET['id_chap'];
                                                $query = 'SELECT * FROM videos WHERE chapitre = "' . $idc . '"';
                                                $result = mysqli_query($conn, $query);
                                                if ($row = mysqli_fetch_array($result)) {
                                                    $video = $row['Contenu'];
                                                    $title = $row['title'];
                                                    echo '<video src="' . $video . '" controls autoplay></video>';
                                                    echo '<h3 class="title" style="font-size: 15px;">Chapitre: ' . $title . '</h3>';
                                                   echo '<a href="quiz.php?id_chap=' . $row['Chapitre'] . '&id_formation=' . $id_formation . '"><button class="status completed">Passer le Quiz</button></a>';
                                                }
                                              else{ echo "pas  de contenu";}
                                                ?>
                                            </div>
                                            <?php
                                                $idc = $_GET['id_chap'];
                                                $idf = $_GET['id_formation'];
                                                $query = 'SELECT * FROM Exercices WHERE id_chap = "' . $idc . '" AND id_formation = "' . $idf . '" ';
                                                $result = mysqli_query($conn, $query);
                                                if ($row = mysqli_fetch_array($result)) {
                                                   
                                                    echo" </div><p >  <a href='".$row['contenu']."' >Exercice</a> </p>";
                                                   
                                                }
                                              else{ echo "pas  de contenu";}
                                                ?>
                                        </div> 
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
