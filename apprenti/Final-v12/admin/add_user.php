   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add User</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="prenom" id="focusedInput" type="text" placeholder = "prenom" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="nom" id="focusedInput" type="text" placeholder = "nom" required>
                                          </div>
                                        </div>
										
											<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="username" id="focusedInput" type="text" placeholder = "Username" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="mot_de_passe" id="focusedInput" type="text" placeholder = "mot_de_passe" required>
                                          </div>
                                        </div>
										
											<div class="control-group">
                                          <div class="controls">
												<button name="save" class="btn btn-info"><i class="icon-plus-sign icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
					<?php
if (isset($_POST['save'])){
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$username = $_POST['username'];
$mot_de_passe = $_POST['mot_de_passe'];


$query = mysqli_query($conn,"select * from users where username = '$username' and mot_de_passe = '$mot_de_passe' and prenom = '$prenom' and mot_de_passe = '$mot_de_passe' ")or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Data Already Exist');
</script>
<?php
}else{
mysqli_query($conn,"insert into users (username,mot_de_passe,prenom,nom) values('$username','$mot_de_passe','$prenom','$nom')")or die(mysqli_error());

mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add User $username')")or die(mysqli_error());
?>
<script>
window.location = "admin_user.php";
</script>
<?php
}
}
?>