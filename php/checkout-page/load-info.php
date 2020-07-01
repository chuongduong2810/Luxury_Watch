<?php
	
	require_once("./php/connecttoDB.php");
	$username = $_SESSION['username'];
    $sql = "SELECT userID FROM user WHERE username='$username'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $usernameID = $row['userID'];


	$sql = "SELECT receiver_name,address,phonenumber FROM transaction AS a,shipment_info AS b WHERE a.userID = '$usernameID' AND a.shipment_infoID = b.shipment_infoID ORDER BY transactionID DESC LIMIT 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {    
			$receiver_name = $row['receiver_name'];
			$address = $row['address'];
            $phonenumber = $row['phonenumber'];?>
                <input type="text" class="form-control" name="receiver_name" id="receiver_name" placeholder="<?=$receiver_name?>" disabled>
                <br>
                <input type="text" class="form-control" name="address" id="address" placeholder="<?=$address?>" disabled>
                <br>
                <input type="number" class="form-control" name="phonenumber" id="phonenumber" placeholder="<?=$phonenumber?>" disabled>
			
            <?php
		}
	}else{
		echo "<script>window.location = 'http://localhost/luxury/address.php';</script>";
	}

	
?>