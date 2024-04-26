<?php
include('connexion.php');

        
               $username = $_POST['username'];
               $prenom = $_POST['prenom'];
               $nom = $_POST['nom'];
               $mot_de_passe = $_POST['mot_de_passe'];

               $sql=mysqli_query($conn,"SELECT * FROM student where username='$username'");
               if(mysqli_num_rows($sql)>0)
               {
                   echo "username Id Already Exists"; 
                   exit;
               }
               
               else{
               mysqli_query($conn,"insert into student (username,prenom,nom,mot_de_passe,location,status)
		values ('$username','$prenom','$nom','$mot_de_passe','uploads/NO-IMAGE-AVAILABLE.jpg','Registered')                                    
		") or die(mysqli_error()); }
        ?>

