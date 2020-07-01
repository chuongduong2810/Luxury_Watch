<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Sweet alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

</body>
</html>


<?php
session_start();
$_SESSION = array();
session_destroy();


		 echo "<script>swal('Thoát khỏi tài khoản!', 'Đi vào trang login', 'warning').then((click) => {
  if (click) {
   			window.location = 'login-page.php';
  }});;</script>";
//redirect page to index.php

?>

