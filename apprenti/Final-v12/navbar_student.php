<?php include('session.php'); ?>

<section id="content" style="margin-top: -20px;">
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
-->


	<!-- My CSS -->
    <link rel="stylesheet" href="./stylenav.css">


<!-- NAVBAR -->



<!-- SEARCH -->
<nav>
<i class='bx bx-menu' ></i>

			<form action="search_formation.php" method="post"  style="margin-right: 20%;" >
            <div class="form-input">
            <select  name="search" id= "search" style="flex-grow: 1;
    height: 101%;
    border: none;
    background: var(--grey);
    border-radius: 36px 0px 0px 36px ;
    outline: none;
    color: var(--dark);
    margin-right: -1%;
    margin-top:0px;
    font-size: 14px;
    padding:7px 14px;">
			<option value="" disabled="" selected= "">Select Filter</option>
			<option value="1">informatique</option>
			<option value="2">pc</option>
</select>
<button name="submit" type="submit" class="search-btn" ><i class=' bx bx-filter-alt'  style="color:white" ></i></button>
</div>
</form>

<form action="search_formation.php"  method="post" style="margin-right :300px;">
	<div class="form-input">
		<input name="search" placeholder="Search..." style="font-size: 14px;">
		<button name="submit" type="submit" class="search-btn"><i class='bx bx-search' style="color:white" ></i></button>
	</div>

</form>	
<div class="drop">
<ul class="nav navbar-nav navbar-right" style="margin-right: 80px;">

<li class="dropdown" >

 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
     <span class="label label-pill label-danger count" style="border-radius:10px;"></span> 
     <span class="glyphicon glyphicon-bell" style="font-size:18px;color :white;"></span>
</a>


 <ul class="dropdown-menu"></ul>

</li>

</ul></div>

<?php $query= mysqli_query($conn,"select * from apprenti where ID_APPRENTI = '$session_id'")or die(mysqli_error());
									while ($row = mysqli_fetch_array($query)) {
							?>
			 <a style="right: 20px;font-size: 14px; position:absolute; color: white;"> <?php echo $row['PRENOM']." ".$row['NOM']; } ?></a> 
             <a href="#" class="profile" style="right: 180px; position:absolute;">

    <div class="dropdown">
        <img  src="./Img/avatar.jpg" alt="Dropdown Image" onclick="toggleDropdown()" style="margin-top: -18px;">
        <div id="dropdownOptions" class="dropdown-content">
        <ul>
            <li><a href="#" style="margin-left:30px">Repasser Test</a></li>
            <li> <i class="bx bx-analyse"style="margin-left:20px ;"></i>
                <a href="#" style="margin-left:10px">Change mot_de_passe</a></li>
           
            <li> 


            <a href="logout.php"class="logout">
                <i class='bx bxs-log-out-circle' style="margin-left:20px ;"></i>
                <a href="logout.php" style="margin-left:10px" class="text">Logout</a>
            </a></li>
        </ul>
        </div>
    </div>
</a>


</div>

           
		
									
</nav>
</section>

<!-- Script Notification-->
<script>
$(document).ready(function(){
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{
 $.ajax({
  url:"fetch.php",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)
  {
   $('.dropdown-menu').html(data.notification);
   if(data.unseen_notification > 0)
   {
    $('.count').html(data.unseen_notification);
   }
  }
 });
}
load_unseen_notification();
// submit form and get new records
$('#comment_form').on('submit', function(event){
 event.preventDefault();
 if($('#subject').val() != '' && $('#comment').val() != '')
 {
  var form_data = $(this).serialize();
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#comment_form')[0].reset();
    load_unseen_notification();
   }
  });
 }
 else
 {
  alert("Both Fields are Required");
 }
});
// load new notifications
$(document).on('click', '.dropdown-toggle', function(){
 $('.count').html('');
 load_unseen_notification('yes');
});
setInterval(function(){
 load_unseen_notification();;
}, 5000);
});
</script>












<script>
       function toggleDropdown() {
            var dropdownOptions = document.getElementById("dropdownOptions");
            if (dropdownOptions.style.display === "block") {
                dropdownOptions.style.display = "none";
            } else {
                dropdownOptions.style.display = "block";
            }
        }
</script>
<style>
    .dropdown {
        position: relative;
        display: inline-block;
        
    }
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        width: 190px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        text-decoration: none;
        z-index: 1;
        margin-left: -299px;
        margin-top: 20px;
        border: 20px;
        border-color: color;
    }
    
    .drop .dropdown-toggle:hover{
  background-color: transparent;
}
    .dropdown-content ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        font-weight: bold;
        
    }
    .dropdown-content ul li {
          padding: 12px 16px;
          text-decoration: none;
          display: block;
          cursor: pointer;
      }
    .dropdown-content ul li {
        padding: 5px 0;
    }
    .dropdown-content ul li:hover {
          background-color: #b8dbfa;
          text-decoration: none;
          border: 20px;
        border-color: red;
 
      }
    
      .profile:hover + .dropdown-content {
          display: block;
        
      }
</style>

<script>
    function toggleDropdown() {
        var dropdownOptions = document.getElementById('dropdownOptions');
        dropdownOptions.style.display = dropdownOptions.style.display === 'block' ? 'none' : 'block';
    }
</script>