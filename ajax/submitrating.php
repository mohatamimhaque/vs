<?php

include("../admin/config/dbcon.php");
if(isset($_POST["rating_data"]))
{

	$data = array(
		':url'				=>	$_POST["url"],
		':user_id'			=>	$_POST["user_id"],
		':heading'			=>	$_POST["heading"],
		':summary'			=>	$_POST["summary"],
		':rating_star'		=>	$_POST["rating_data"],
		':category'			=>	$_POST["category"]
	);

	$query = "
	INSERT INTO reviews
	(url,user_id, heading,summary, rating_star,category) 
	VALUES (:url,:user_id,:heading,:summary,:rating_star,:category)
	";

	$statement = $connect->prepare($query);

	$statement->execute($data);

	echo "Your Review & Rating Successfully Submitted";

}

if(isset($_POST["action"])){
	$url=$_POST["url"];
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "
	SELECT * FROM reviews where url='$url'
	";

	$result = $connect->query($query, PDO::FETCH_ASSOC);
	foreach($result as $row)
	{
		$review_content[] = array(
			'user_name'		=>	$row["user_id"],
			'summary'		=>	$row["summary"],
			'rating'		=>	$row["rating_star"],
			'heading'		=>	$row["heading"],
		);

		if($row["rating_star"] == '5')
		{
			$five_star_review++;
		}

		if($row["rating_star"] == '4')
		{
			$four_star_review++;
		}

		if($row["rating_star"] == '3')
		{
			$three_star_review++;
		}

		if($row["rating_star"] == '2')
		{
			$two_star_review++;
		}

		if($row["rating_star"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["rating_star"];

	}

	$average_rating = $total_user_rating / $total_review;
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