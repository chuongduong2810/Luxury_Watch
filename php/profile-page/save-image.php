<?php
	
	$username = $_SESSION['username'];

	$check = $_FILES['image']['name'];
	
	$sql = "SELECT ImageURL FROM user WHERE username ='$username'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	if ($check!=""){

		$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_tmp = $_FILES['image']['tmp_name'];
			$file_type = $_FILES['image']['type'];
			$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
			$expensions= array("jpeg","jpg","png");
		
		$image = $_FILES['image']['name'];

		$target = "img/avatar_profile/".basename($image);

		$sql = "UPDATE user SET ImageURL = '$image' WHERE username ='$username'";
		mysqli_query($conn, $sql);

		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
				 echo "<script>swal('Cập nhật thông tin User thành công!', 'Thông tin đã được thay đổi', 'info').then((click) => {
				  if (click) {
				   			window.location = 'profile.php';
				  }});;</script>";
		}
		else{
			echo '<script language="javascript">alert("Đã upload thất bại!");</script>';
		}
	}

		 


		


	

	
?>