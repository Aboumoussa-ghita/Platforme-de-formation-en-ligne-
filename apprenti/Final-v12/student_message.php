<?php include('connexion.php') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-... votre hachage de vérification ..." crossorigin="anonymous" />

<style>
	#content main .table-data .order table tr td .status {
		font-size: 10px;
    padding: 6px 16px;
    color: white;
    border-radius: 20px;
    font-weight: 700;
	background: #1877f2;
}
	.custom-search {
	  position: relative;
	  display: inline-block;
	}
	.custom-search-input {
	  width: 40px;
	  height: 40px;
	  padding: 10px;
	  margin-right: 40px; /* Ajouter une marge à droite pour éviter de chevaucher l'icône */
	  border: none;
	  border-radius: 20px;
	  background-color: transparent;
	  transition: width 0.3s ease;
	}
	.custom-search-input:focus {
	  width: 200px;
	  background-color: #ffffff;
	  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
	}
	.custom-search-icon {
	  position: absolute;
	  top: 50%;
	  right: 10px; /* Positionner l'icône à droite */
	  transform: translateY(-50%);
	  color:black;
	}
	.custom-search-input:focus + .custom-search-icon {
	  color: #1877f2;
	}
</style>

<?php include('navbar_student.php'); ?>
<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('message_sidebar.php'); ?>
			<div class="span9" id="content" style="border-radius:10px">
				<div class="row-fluid">
					
					<main>
						<div class="head-title">
							<div class="left">
								
							</div>
						</div>
						<div class="table-data">
							<div class="order">
								<div class="head">
									<h3 style="font-size:36px;">Messagerie</h3>
									<form id="search-form" method="POST" action="">
										<div class="form-input custom-search">
											<input name="search" id="search-input" class="custom-search-input" type="text"  style="font-size: 14px; " >
											<button name="submit" type="submit" class="search-btn"  form="search-form"><i class="fas fa-search custom-search-icon" "></i></button>
										</div>
									</form>
								</div>
								<table>
									<thead>
										<tr>
											<th style="font-size:18px;">Formateur</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php
										if (isset($_POST['search'])) {
											$search = $_POST['search'];
											$sql = "SELECT * FROM formateur WHERE F_NOM='$search'";
											$result = mysqli_query($conn, $sql);
											if ($result) {
												if (mysqli_num_rows($result) > 0) {
													while ($row = mysqli_fetch_array($result)) {
														?>
														<tr>
															<td>
																<img src="./Img/photo.png">
																<p><?php echo $row['F_NOM'] . " " . $row['F_PRENOM']; ?></p>
															</td>
															<td >
																<a href="student_message_send.php?ID_FORMATEUR=<?php echo $row['ID_FORMATEUR'] ?> ">
																	<span class="status completed" >Contacter</span>
																</a>
															</td>
														</tr>
														<?php
													}
												}
											}
										} else {
											$query = "SELECT * FROM formateur";
											$result = mysqli_query($conn, $query);
											while ($row = mysqli_fetch_array($result)) {
												?>
												<tr>
													<td>
														<img src="<?php echo $row['photo']; ?>">
														<p><?php echo $row['F_NOM'] . " " . $row['F_PRENOM']; ?></p>
													</td>
													<td>
														<a href="student_message_send.php?ID_FORMATEUR=<?php echo $row['ID_FORMATEUR'] ?>">
															<span class="status" style="background: #3C91E6;;">Contacter</span>
														</a>
													</td>
												</tr>
												<?php
											}
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</main>
				</div>
			</div>
		</div>
	</div>
</body>

<script>
	document.querySelector(".custom-search-icon").addEventListener("click", function(event) {
		event.preventDefault();
		var searchInput = document.getElementById("search-input");
		searchInput.classList.toggle("show-search");
		if (searchInput.classList.contains("show-search")) {
			searchInput.focus();
		}
	});
</script>
</html>
