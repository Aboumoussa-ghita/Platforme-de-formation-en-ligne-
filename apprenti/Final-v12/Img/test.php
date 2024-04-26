<html>
<body bgcolor="87ceeb">
<center><h2> Last visited time on the web page</h2></center>
<br>
<?php
if(isset($_COOKIE["dates_visites"])){
	//On ne peut stocker que les chaines de caractères dans un cookie
	$liste_visites =$_COOKIE["dates_visites"];
	//Décoder la chaine liste_visites pour obtenir le tableau des dates
	$dates=unserialize($_COOKIE["dates_visites"]);
	//Ajouter la date actuelle
	$dates[]=time();
	//renvoyer le cookie avec sa nouvelle valeur , pour cela on sérialise le tableau
	setcookie("dates_visites",serialize($dates));
	//Afficher Les dates de visites stockées dans le tableau $dates
	echo " Vous avez consulté cette page ".count($dates)." fois , voici les détails:";
	echo "<ul>";
	foreach ($dates as $key => $value) {
		echo "<li>".date("d-m-Y H:i:s",$value)."</li>";
	}
	echo "</ul>";
}

?>
</body>
</html>