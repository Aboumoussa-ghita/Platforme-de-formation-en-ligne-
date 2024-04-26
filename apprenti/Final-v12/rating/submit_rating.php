<?php

//submit_rating.php

$connect = new PDO("mysql:host=localhost;dbname=pfes", "root", "");


if(isset($_POST["rating_data"]))
{

	$data = array(
		':ID_APPRENTI'		=>	$_GET['ID_APPRENTI'],
		':apprenti_rating'		=>	$_POST["rating_data"],
		':apprenti_review'		=>	$_POST["apprenti_review"],
		':datetime'			=>	time(),
		':id_formation'  => $_GET['id_formation']
	);

	$query = "
	INSERT INTO review_table 
	(ID_APPRENTI, apprenti_rating, apprenti_review, datetime,id_formation) 
	VALUES (:ID_APPRENTI, :apprenti_rating, :apprenti_review, :datetime, :id_formation)
	";

	$statement = $connect->prepare($query);

	$statement->execute($data);

	echo "Your Review & Rating Successfully Submitted";

}

if(isset($_POST["action"]))
{
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_apprenti_rating = 0;
	$review_content = array();

	$query = "
	SELECT * FROM review_table where id_formation= '".$_GET['id_formation']."'
	ORDER BY review_id DESC
	";

	$result = $connect->query($query, PDO::FETCH_ASSOC);

	foreach($result as $row)
	{
		$review_content[] = array(
			'ID_APPRENTI'		=>	$row["ID_APPRENTI"],
			'apprenti_review'	=>	$row["apprenti_review"],
			'rating'		=>	$row["apprenti_rating"],
			'datetime'		=>	date('l jS, F Y h:i:s A', $row["datetime"])
		);

		if($row["apprenti_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["apprenti_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["apprenti_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["apprenti_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["apprenti_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_apprenti_rating = $total_apprenti_rating + $row["apprenti_rating"];

	}

	$average_rating = $total_apprenti_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}

?>