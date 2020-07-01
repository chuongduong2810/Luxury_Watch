<?php

	// require_once("./php/connecttoDB.php");
	$username = $_SESSION['username'];
	$productID=$id;
	$check = "no";
	$sql = "SELECT userID FROM user WHERE username='$username'";
	$result = $conn->query($sql)->fetch_assoc();
	$userID = $result['userID'];
	$rate =$_POST['rate_value'];
	$sql = "SELECT transactionID from transaction WHERE userID ='$userID';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {  
			$sql2 = "SELECT transactiondetailID from transaction as A,transaction_detail AS b WHERE a.transactionID = b.transactionID AND productID=$productID";	
			$result2 = $conn->query($sql2);
			if($result2->num_rows>0){
				// thành công
				$check = "yes";
				break;
			}
		}
	} 


	// không có 
	$content = $_POST['message'];
	
	if($check=="yes"){
		//kiểm tra số lượng từ ở f-e, kiểm tra  nội dung
		if(strpos(' '.$content, 'ngu')||strpos(' '.$content, 'cc')||strpos(' '.$content, 'cl')||strpos(' '.$content, 'rách')||strpos(' '.$content, 'rach')||strpos(' '.$content, 'ngáo')||strpos(' '.$content, 'ngao')||strpos(' '.$content, 'xàm')||strpos(' '.$content, 'đểu')||strpos(' '.$content, 'cặ')||strpos(' '.$content, 'lol')||strpos(' '.$content, 'fake')||strpos(' '.$content, 'giả')||strpos(' '.$content, 'TQ')||strpos(' '.$content, 'trung quốc')||strpos(' '.$content, 'khựa')||strpos(' '.$content, 'việt cộng')||strpos(' '.$content, 'bắc kì')||strpos(' '.$content, 'backi')||strpos(' '.$content, 'chó')){
			echo '<script>swal("Không thể thêm bình luận !", " Comment CÓ TỪ KHÓA KHÔNG PHÙ HỢP", "error");</script>';	
			
		}else{
			$sql = "INSERT INTO comment (userID,productID,message,value_rating) VALUES ('$userID','$productID','$content','$rate');";
			mysqli_query($conn, $sql);
			echo '<script>swal("Thêm bình luận thành công !", "Cảm ơn bạn đã để lại bình luận!", "success");</script>';	
		}
	}else{
	
		echo '<script>swal("Không thể thêm bình luận !", "Bạn chưa mua sản phẩm này", "error");</script>';
	}
	
	// $conn->close();


?>