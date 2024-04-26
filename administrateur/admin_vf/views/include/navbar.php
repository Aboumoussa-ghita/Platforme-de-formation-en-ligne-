<?php
function connexion_bdd(){
	return new PDO('mysql:host=localhost;dbname=pfe','root','');
}

function nbreNotifAdmin() {
	$pdo = connexion_bdd();
	$sqlState = $pdo->prepare("SELECT COUNT(*) FROM notifications n INNER JOIN notif_form_adm nf ON n.id_notif = nf.notif WHERE nf.adm = ?");
	$sqlState->execute([1]);
	$count = $sqlState->fetchColumn();
	return (int) $count;
}
function allNotif() {
	$pdo = connexion_bdd();
	$notifs = $pdo->query('SELECT * FROM notifications n INNER JOIN notif_form_adm nf ON n.id_notif = nf.notif ORDER BY id_notif DESC ')->fetchAll(PDO::FETCH_OBJ);
	return $notifs;
}

$notifs = allNotif();

function Nom_form() {
	$pdo = connexion_bdd();
	$nom_form = $pdo->query('SELECT f.F_NOM, f.F_PRENOM
                             FROM formateur f
                             INNER JOIN notif_form_adm nf ON f.ID_FORMATEUR = nf.form
                             INNER JOIN notifications n ON nf.notif = n.id_notif
                             ORDER BY nf.notif')->fetchAll(PDO::FETCH_OBJ);
	return $nom_form;
}

$nom_form=Nom_form();

function formatDate($date) {
	$now = new DateTime();
	$notificationDate = new DateTime($date);
	$diff = $now->diff($notificationDate);

	if ($diff->y > 0) {
		return "Il y a " . $diff->y . " an(s)";
	} elseif ($diff->m > 0) {
		return "Il y a " . $diff->m . " mois";
	} elseif ($diff->d > 0) {
		return "Il y a " . $diff->d . " jour(s)";
	} elseif ($diff->h > 0) {
		return "Il y a " . $diff->h . " heure(s)";
	} elseif ($diff->i > 0) {
		return "Il y a " . $diff->i . " minute(s)";
	} else {
		return "Il y a quelques secondes";
	}
}


$nbre = nbreNotifAdmin();
?>


<section id="content" style="margin-top: -20px;">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="./styles/style.css">

	<!-- NAVBAR -->
	<nav>
		<a href="#" class="notification-icon" onclick="toggleNotifications(event)">
			<i class='bi bi-bell'>
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" style="color: white" class="bi bi-bell" viewBox="0 0 16 16">
					<path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
				</svg>
			</i>
			<span class="badge"><?php echo $nbre ?></span>
			<div class="notification-dropdown">
				<?php foreach ($notifs as $index => $notif): ?>
					<div class="notification-item">
						<?php $nom = $nom_form[$index]; ?>
						<span class="notification-text"><?php echo $nom->F_NOM . ' ' . $nom->F_PRENOM.":"; ?></span>
						<span class="notification-item"><?php echo $notif->contenu; ?></span>
						<span class="notification-time"><?php echo formatDate($notif->Date_notif); ?></span>
					</div>
				<?php endforeach; ?>
			</div>


		</a>
		<div class="admin-dropdown">
			<a href="#" class="admin-dropdown-toggle" onclick="toggleOptions(event)">
				<span class="admin-text">Ghita Aboumoussa</span>
				<img src="téléchargement.jpg" class="user-img">
			</a>
			<div class="admin-dropdown-menu">
				<a href="modifier_infos_perso.php">Gérer profil</a>
				<a href="deconnexion.php">Se déconnecter</a>
			</div>
		</div>
	</nav>
</section>

<style>
	.admin-dropdown-toggle {
		display: flex;
		align-items: center;
		cursor: pointer;
	}

	.admin-dropdown-menu {
		display: none;
		position: absolute;
		top: 100%;
		right: 0;
		background-color: #fff;
		padding: 10px;
		border-radius: 4px;
		box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
	}

	.admin-dropdown-menu a {
		display: block;
		text-decoration: none;
		color: #000;
		padding: 5px 10px;
	}

	.notification-dropdown {
		display: none;
		position: absolute;
		top: 100%;
		right: 0;
		background-color: #fff;
		padding: 10px;
		border-radius: 4px;
		box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
	}

	.notification-dropdown .notification-item {
		margin-bottom: 10px;
	}

	.notification-dropdown .notification-item:last-child {
		margin-bottom: 0;
	}

	.notification-dropdown .notification-text {
		font-weight: bold;
	}

	.notification-dropdown .notification-time {
		color: gray;
		font-size: 12px;
	}
</style>

<script>
	function toggleOptions(event) {
		event.preventDefault();
		var dropdownMenu = document.querySelector(".admin-dropdown-menu");
		dropdownMenu.style.display = dropdownMenu.style.display === "none" ? "block" : "none";
	}

	function toggleNotifications(event) {
		event.preventDefault();
		var dropdownMenu = document.querySelector(".notification-dropdown");
		dropdownMenu.style.display = dropdownMenu.style.display === "none" ? "block" : "none";
	}

	document.addEventListener("click", function(event) {
		var dropdownToggle = document.querySelector(".admin-dropdown-toggle");
		var dropdownMenu = document.querySelector(".admin-dropdown-menu");
		if (!dropdownToggle.contains(event.target)) {
			dropdownMenu.style.display = "none";
		}

		var notificationToggle = document.querySelector(".notification-icon");
		var notificationDropdown = document.querySelector(".notification-dropdown");
		if (!notificationToggle.contains(event.target)) {
			notificationDropdown.style.display = "none";
		}
	});
</script>
