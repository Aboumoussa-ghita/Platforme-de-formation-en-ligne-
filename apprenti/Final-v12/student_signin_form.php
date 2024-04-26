<link rel="stylesheet" href="./styles/signup.css">

<div class="wrapper">
      <div class="title"><i class="icon-lock"></i> Sign up as Student</div>
      <form id="signin_student" method="post">
	    <div class="field">
		  <input type="text"  id="username" name="username" required>
		  <label>ID Number</label>
		</div>
		<div class="field">
		  <input type="text" id="prenom" name="prenom" required>
		  <label>prenom</label>
		</div>
		<div class="field">
		  <input type="text" id="nom" name="nom" required>
		  <label>nom</label>
		</div>
		        
        <div class="field">
		  <input type="mot_de_passe"  id="mot_de_passe" name="mot_de_passe" required>
          <label>mot_de_passe</label>
        </div>

		<div class="field">
		  <input type="mot_de_passe" id="cmot_de_passe" name="cmot_de_passe" required>
          <label>Re-type mot_de_passe</label>
        </div>
		<br>       
        <div class="field">
        <input id="signin" name="login" type="submit" value="Sing Up">
        </div>
      
      </form>  

	  	
      	
	  <script>
			jQuery(document).ready(function(){
			jQuery("#signin_student").submit(function(e){
					e.preventDefault();
						
						var mot_de_passe = jQuery('#mot_de_passe').val();
						var cmot_de_passe = jQuery('#cmot_de_passe').val();
					
					
					if (mot_de_passe == cmot_de_passe){
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "student_signup.php",
						data: formData,
						success: function(html){
						if(html=='true')
						$.jGrowl("Welcome to FSAC Learning Management System", { header: 'Sign up Success' });
						var delay = 1000;
							setTimeout(function(){ window.location = 'index.php'  }, delay);  
						}
						
						
					});
			
					}else
						{
						$.jGrowl("student already exist or something went wrong", { header: 'Sign Up Failed' });
						}
				});
			});
			</script>
    </div>

<!--END -->


            <div class="signup-link"> <a onclick="window.location='index.php'" id="btn_login" name="login" type="submit" style="color:white;">Click here to Login</a></div>		
		
			
			
			
				
		
					