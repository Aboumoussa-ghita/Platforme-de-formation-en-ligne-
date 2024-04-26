<?php include('connexion.php')  ?>


    <body>

						
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form method="post" action="">

							
										<button name="submit" type="submit" class="btn btn-info"><i class="icon-save"></i>&nbsp;Add Student</button>
												<br>
												<br>
                           
							 <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                          
						 <thead>
		
                                <tr>
                               
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Course Year and Section</th>
                  
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
					
                                         <?php
							
							
										$a = 0 ;

                                        $query = mysqli_query($conn,"select * from formation ") or die(mysqli_error());
										while ($row = mysqli_fetch_array($query)) {
                                        
										$a++;
									
                                        ?>
								
										<tr>
										<input type="hidden" name="test" value="<?php echo $a; ?>"> 
                                       
                                        <td name="id_formation<?php echo $a; ?>"><?php echo $row['id_formation']; ?></td> 
										<td name="nom_for<?php echo $a; ?>"><?php echo $row['nom_for']; ?></td> 
								
										<td width="80">
										<select name="add_formation<?php echo $a; ?>" class="span12">
										<option></option>
										<option>Add</option>
										</select>
										
										
										</td>
									
                                   <?php } ?>    
										
                                </tr>
                         
                            </tbody>
                        </table>
					
						</form>
						
  										
	<?php

if (isset($_POST['submit'])){

	
	
	$id_formation = $row['id_formation'];
	$nom_for = $row['nom_for'];

	
 

	
	mysqli_query($conn,"INSERT INTO `mes_formation`(`id_student`, `id_formation`, `nom_for`) VALUES ('330','".$id_formation."','".$nom_for."')")or die(mysqli_error());
	
	
	
	}
	

	
?>

	
	<?php

	
	
	

	 
	
	?>
	
					
                      
								
                         
                            </tbody>
                        </table>
						
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
			
            </div>

        </div>
    </body>
</html>