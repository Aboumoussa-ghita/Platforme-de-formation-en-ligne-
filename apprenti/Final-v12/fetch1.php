<?php
include('connexion.php');


                            $ID_APPRENTI = $session_id;
                            $query = "SELECT * FROM msg_app_for ";

                            $result = mysqli_query($conn, $query); 
                            while($row = mysqli_fetch_array($result)){
                            echo'
                                <li class="completed">
                                <p>$row["msg"]</p>
                                
                                 </li>';
								
							echo'</tr>'?>
                            <?php } ?>