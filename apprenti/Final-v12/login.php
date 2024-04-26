<?php
		include('connexion.php');
		session_start();
		$email = $_POST['email'];
		$mot_de_passe = $_POST['mot_de_passe'];
		/* student */
			$query = "SELECT * FROM apprenti WHERE email='$email' AND mot_de_passe='$mot_de_passe'";
			$result = mysqli_query($conn,$query)or die(mysqli_error());
			$row = mysqli_fetch_array($result);
			$num_row = mysqli_num_rows($result);
		/* teacher */
		$query_formateur = mysqli_query($conn,"SELECT * FROM formateur WHERE F_email='$email' AND F_mot_de_passe='$mot_de_passe'")or die(mysqli_error());
		$num_row_formateur = mysqli_num_rows($query_formateur);
		$row_formateur = mysqli_fetch_array($query_formateur);


		/*admin*/
		$query_admin = mysqli_query($conn,"SELECT * FROM admin WHERE A_email='$email' AND A_mot_de_passe='$mot_de_passe'")or die(mysqli_error());
		$num_row_admin = mysqli_num_rows($query_admin);
		$row_admin = mysqli_fetch_array($query_admin);

		if( $num_row > 0 ) { 
		$_SESSION['id']=$row['ID_APPRENTI'];
		echo 'true_apprenti';	
		}else if ($num_row_formateur > 0){
		$_SESSION['id']=$row_formateur['id_formateur'];
		echo 'true_formateur';
		
		 }
		 else if ($num_row_admin > 0){
			$_SESSION['id']=$row_admin['ID_ADMINISTRATEUR	'];
			echo 'true_admin';
			
			 }else{ 
				echo 'false';
		}	
				
		?>