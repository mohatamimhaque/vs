<?php
session_start();
include('../../admin/config/dbcon.php');
include('../includes/baseurl.php');



	if(isset($_POST["reply"])){

		$data = array(
			':reply'			=>	$_POST["reply"],
			':url'				=>	$_POST["url"],
			':user_id'			=>	$_POST["user_id"],
			':commentId'		=>	$_POST["commentId"],
			
		);
	
		$query = "
		INSERT INTO reply
		(commentId,url,user_id,reply) 
		VALUES (:commentId,:url,:user_id,:reply)
		";
	
		$statement = $connect->prepare($query);
	
		$statement->execute($data);
	

}



?>
