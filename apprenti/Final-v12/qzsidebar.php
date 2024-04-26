<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="./stylenav.css">

	
<!-- SIDEBAR -->
<section id="sidebar">
    <a href="formation.php" class="brand">
        <span class="text" style="margin-left: 23px; margin-bottom:-28px;font-size:40px; color: white;">EDUFLEX</span>
    </a>
    <ul class="side-menu top">
        <li >
            <a href="video.php">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Videos</span>
            </a>
        </li>
        <li class="active">
            <a href="quiz.php">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">Quiz</span>
            </a>
        </li>
       
       
          
    </ul>
    <ul class="side-menu" style="margin-top: 100px;">
        <li>
            <a href="change_mot_de_passe_student.php">
                <i class="bx bx-analyse"></i>
                <span class="text">Change mot_de_passe</span>
            </a>
        </li>
        <li>
            <a href="logout.php" class="logout">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>

<script>
    window.addEventListener("DOMContentLoaded", function() {
        var menuItems = document.querySelectorAll("#sidebar .side-menu.top li a");

        menuItems.forEach(function(item) {
            item.addEventListener("mouseenter", function() {
                if (!this.parentElement.classList.contains("active")) {
                    this.parentElement.classList.add("hover");
                }
            });

            item.addEventListener("mouseleave", function() {
                if (!this.parentElement.classList.contains("active")) {
                    this.parentElement.classList.remove("hover");
                }
            });

            item.addEventListener("click", function() {
                menuItems.forEach(function(item) {
                    item.parentElement.classList.remove("hover");
                });

                this.parentElement.classList.add("active");
            });
        });
    });
</script>
