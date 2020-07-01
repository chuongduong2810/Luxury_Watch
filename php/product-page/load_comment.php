<?php

	require_once("./php/connecttoDB.php");
	$productID=$id;

	$sql = "SELECT userID,datetimes,value_rating,message FROM comment WHERE productID = '$productID' ORDER BY datetimes DESC;";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$userID = $row['userID'];
			$sql = "SELECT fullname FROM user WHERE userID = '$userID';";
			$row2 = $conn->query($sql)->fetch_assoc();

			$stars = str_repeat('<i class=\"fas fa-star star-active\"></i>',$row['value_rating']);
			$stars .= str_repeat('<i class=\"fas fa-star\"></i>',5-$row['value_rating']);


			echo '
			{
				"username": "'.$row2['fullname'].'",
				"rating": "'.$stars.'",
				"ratingtime": "'.$row['datetimes'].' GMT+0700 (Giờ Đông Dương)",
				"data": "'.$row['message'].'"
			},';

		}
	}

?>