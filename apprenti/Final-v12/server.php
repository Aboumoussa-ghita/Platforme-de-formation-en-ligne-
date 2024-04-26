<?php include('session.php');
include('connexion.php')?>
<?php 
						$ID_APPRENTI = $session_id;
                        $ID_F = $_GET['ID_FORMATEUR'];
                       

						$query2 ="SELECT msg, Date FROM msg_for_app 
                        WHERE apprenti = '".$ID_APPRENTI."' AND formateur = '".$ID_F."'
                        UNION
                        SELECT msg, Date FROM msg_app_for
                        WHERE apprenti = '".$ID_APPRENTI."' AND formateur = '".$ID_F."'
                        ORDER BY Date";
						//$query = "SELECT * FROM formation";//
						$result2 = mysqli_query($conn, $query2);
						
						while($row2 = mysqli_fetch_array($result2)){
                            $msg = $row2['msg'];
							  ?> 
					
                         
						<?php $query3 ="SELECT msg FROM msg_app_for where msg = '". $msg."'" ;
                        	$result3 = mysqli_query($conn, $query3);

                            if($result3 ->num_rows > 0){
                                                ?>	
					       <div  class="message my_message" id="itemList" style='text-align: left;'>
							
						   <p> <?php echo $row2['msg'] ?><br><span><?php echo date('H:i', strtotime($row2['Date'])) ?></span></p>
                            </div></div>
						
						
                       
						<?php }else{
                            ?>
                           <div class="message frnd_message" id="itemList" style='text-align: right;'>
							
						   <p> <?php echo $row2['msg'] ?><br><span><?php echo date('H:i', strtotime($row2['Date'])) ?></span></p>
                           </div>
                        <?php }} ?>
                        <style>
.message{
	position: relative;
	display: flex;
	width:100%;
	margin: 5px;
}
.message p{
	position:relative;
	right: 0;
	text-align: right;
	max-width: 100%;
	padding: 12px;
	background:#dcf8c6;
	border-radius:10px ;
	font-size: 0.9em;
}
.message p::before{
	content:'';
	position: absolute;
	top: 0;
	right: -12px;
	width: 20px;
	height: 20px;
	background: linear-gradient(135deg,#dcf8c6 0%,#dcf8c6 50%,transparent 50%,transparent);
}
.message p span{
	display: block;
	margin-top: 5px;
	font-size: 0.85em;
	opacity: 0.5;
}
.my_message{
	justify-content: flex-end;
}
.frnd_message{
	justify-content: flex-start;
}
.frnd_message p{
	background-color: #fff;
	text-align: left;
}
.message.frnd_message p::before{
	content:'';
	position: absolute;
	top: 0;
	left: -12px;
	width: 20px;
	height: 20px;
	background: linear-gradient(255deg,#fff 0%,#fff 50%,transparent 50%,transparent);
}


</style>