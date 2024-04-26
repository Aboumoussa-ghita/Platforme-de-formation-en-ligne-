<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   <!----<title>Login Form Design | CodeLab</title>---->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html,body{
  display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
  background: #f2f2f2;
  /* background: linear-gradient(-135deg, #c850c0, #4158d0); */
}
::selection{
  background: #4158d0;
  color: #fff;
}
.wrapper{
  width: 380px;
  background: #fff;
  border-radius: 15px;
  box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
}
.wrapper .title{
  font-size: 32px;
  font-weight: 600;
  text-align: center;
  line-height: 55px;
  color: #fff;
  user-select: none;
  border-radius: 15px 15px 0 0;
  background: linear-gradient(-135deg, #42c2c4, #4158d0);
}
.wrapper form{
  padding: 10px 30px 50px 30px;
}
.wrapper form .field{
  height: 50px;
  width: 100%;
  margin-top: 20px;
  position: relative;
}
.wrapper form .field input{
  height: 100%;
  width: 100%;
  outline: none;
  font-size: 17px;
  padding-left: 20px;
  border: 1px solid lightgrey;
  border-radius: 25px;
  transition: all 0.3s ease;
}
.wrapper form .field input:focus,
form .field input:valid{
  border-color: #4158d0;
}
.wrapper form .field label{
  position: absolute;
  top: 50%;
  left: 20px;
  color: #999999;
  font-weight: 400;
  font-size: 17px;
  pointer-events: none;
  transform: translateY(-50%);
  transition: all 0.3s ease;
}
form .field input:focus ~ label,
form .field input:valid ~ label{
  top: 0%;
  font-size: 16px;
  color: #4158d0;
  background: #fff;
  transform: translateY(-50%);
}
form .content{
  display: flex;
  width: 100%;
  height: 50px;
  font-size: 16px;
  align-items: center;
  justify-content: space-around;
}
form .content .checkbox{
  display: flex;
  align-items: center;
  justify-content: center;
}
form .content input{
  width: 15px;
  height: 15px;
  background: red;
}
form .content label{
  color: #262626;
  user-select: none;
  padding-left: 5px;
}
form .content .pass-link{
  color: "";
}
form .field input[type="submit"]{
  color: #fff;
  border: none;
  padding-left: 0;
  margin-top: -10px;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
  background: linear-gradient(-135deg, #42c2c4, #4158d0);
  transition: all 0.3s ease;
}
form .field input[type="submit"]:active{
  transform: scale(0.95);
}
form .signup-link{
  color: #262626;
  margin-top: 20px;
  text-align: center;
}
form .pass-link a,
form .signup-link a{
  color: #4158d0;
  text-decoration: none;
}
form .pass-link a:hover,
form .signup-link a:hover{
  text-decoration: underline;
}
.button-63 {
  align-items: center;
  background-image: linear-gradient(-135deg, #42c2c4, #4158d0);
 
  border: 0;
  border-radius: 8px;
  box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
  box-sizing: border-box;
  color: #FFFFFF;
  display: flex;
  font-family: Phantomsans, sans-serif;
  font-size: 20px;
  justify-content: center;
  line-height: 0.5em;
  max-width: 100%;
  min-width: 140px;
  padding: 19px 24px;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
  cursor: pointer;
}

.button-63:active,
.button-63:hover {
  outline: 0;
}

@media (min-width: 500px) {
  .button-63 {
    font-size: 15px;
    min-width: 100px;
  }
}

</style>
  </head>
  <body>
	
    <div class="wrapper" >
      <div class="title">Login Form</div>
      <form id="login_form1" method="post">
        <div class="field">
          <input type="text" id="email" name="email" required>
          <label>Email</label>
        </div>
        <div class="field">
          <input type="password" id="mot_de_passe" name="mot_de_passe"  required>
          <label>mot_de_passe</label>
        </div>
        <br>
        
        <div class="field">
          <input type="submit" value="Login"  id="signin" name="login">
        </div>
		

		<script type="text/javascript">
														$(document).ready(function(){
															$('#signin').tooltip('show');
															$('#signin').tooltip('hide');
														});
														</script>	
      
													</div>
                          <script>
						jQuery(document).ready(function(){
						jQuery("#login_form1").submit(function(e){
								e.preventDefault();
								var formData = jQuery(this).serialize();
								$.ajax({
									type: "POST",
									url: "login.php",
									data: formData,
									success: function(html){
									if(html=='true_formateur')
									{
									$.jGrowl("Loading File Please Wait......", { sticky: true });
									$.jGrowl("Welcome to EDXFLEX", { header: 'Access Granted' });
									var delay = 1000;
										setTimeout(function(){ window.location = 'formateur.php'  }, delay);  
									}else if (html == 'true_apprenti'){
										$.jGrowl("Welcome to EDXFLEX", { header: 'Access Granted' });
									var delay = 1000;
										setTimeout(function(){ window.location = 'formation.php'  }, delay);  
									}else if (html == 'true_admin'){
										$.jGrowl("Welcome to EDXFLEX", { header: 'Access Granted' });
									var delay = 1000;
										setTimeout(function(){ window.location = 'admin.php'  }, delay);  
									}else
									{
									$.jGrowl("Please Check your username and mot_de_passe", { header: 'Login Failed' });
									}
									}
								});
								return false;
							});
						});
						</script>
            
			<!-- START -->
			<div id="button_form" class="wrapper">
			  <div class="title">New to EDXFLEX</div>
			  <h3 class="form-signin-heading" ><i class="icon-edit"></i> Sign up</h3>
			  <button style="position:absolute; top:570px; right:235px;" data-placement="top" title="Sign In as Student" id="signin_student" onclick="window.location='signup_student.php'" id="btn_student" name="login" class="button-63" type="submit">
			    Apprenti
			  </button>
			  <div class="pull-right">
				<button style="position:absolute; top:570px; right:8px;" data-placement="top" title="Sign In as Teacher" id="signin_teacher" onclick="window.location='signup_teacher.php'" name="login" class="button-63" type="submit">Formateur</button>
			  </div>
			  <br>
			  <br>
				

				
				<br>
				<br>



			</div>
			<script type="text/javascript">
														$(document).ready(function(){
															$('#signin_student').tooltip('show'); $('#signin_student').tooltip('hide');
														});
														</script>	
														<script type="text/javascript">
														$(document).ready(function(){
															$('#signin_teacher').tooltip('show'); $('#signin_teacher').tooltip('hide');
														});
														</script>	

  </body>
</html>


             <!-- END -->


