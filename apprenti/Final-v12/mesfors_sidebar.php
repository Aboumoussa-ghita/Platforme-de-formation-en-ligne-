<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="./stylenav.css">
    <style>
        img{
            width:250px;
        }
    </style>

	
<!-- SIDEBAR -->
<section id="sidebar">
    <a href="formation.php" class="brand">
        <span class="text" style="margin-left: 33px; margin-bottom:-28px;font-size:40px; color: white;">EDUFLEX</span>
    </a>
    <ul class="side-menu top">
    <li class="active">
            <a href="mes_formation.php">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Mes Formation</span>
            </a>
        </li>
        <li>
            <a href="formation.php">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Formation</span>
            </a>
        </li>
        <li>
            <a href="suivre_progres.php">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">Progress</span>
            </a>
        </li>
        <li>
            <a href="student_notification.php">
                <i class='bx bxs-bell'></i>
                <span class="text">Notification</span>
            </a>
        </li>
        <li>
            <a href="student_message.php">
                <i class='bx bxs-message-dots'></i>
                <span class="text">Message</span>
            </a>
        </li>
        <li>
          
    </ul>
    <ul class="side-menu" style="margin-top: 100px;">
        <li>
            <a href="changepsw.php">
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
