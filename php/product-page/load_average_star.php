<?php

	// require_once("./php/connecttoDB.php");
	$productID=$id;
	$quantity_rate = array(0,0,0,0,0,0);
	$total=0; //to calculet
	$total2=0; //to show


	$sql = "SELECT COUNT(*) as quantity,value_rating FROM comment WHERE productID = '$productID' GROUP BY value_rating;";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {  
			$total+=$row['quantity'];
			$quantity_rate[$row['value_rating']]=$row['quantity'];;
			$total2 = $total;
		}
	}else{
		
		$total=1;
	}

	$average_rate = round(($quantity_rate[1]*1+$quantity_rate[2]*2+$quantity_rate[3]*3+$quantity_rate[4]*4+$quantity_rate[5]*5)/($total),1);
	// echo 'tong'.$total.'<pre>';
	// echo 'star 1:  '.$quantity_rate[1].'<pre>';
	// echo 'star 2:  '.$quantity_rate[2].'<pre>';
	// echo 'star 3:  '.$quantity_rate[3].'<pre>';
	// echo 'star 4:  '.$quantity_rate[4].'<pre>';
	// echo 'star 5:  '.$quantity_rate[5].'<pre>';

	// echo (int)(100*$quantity_rate[0]/$total);
	// echo (int)(100*$quantity_rate[1]/$total);
	// echo (int)(100*$quantity_rate[2]/$total);
	// echo (int)(100*$quantity_rate[3]/$total);
	// echo (int)(100*$quantity_rate[4]/$total);


?>