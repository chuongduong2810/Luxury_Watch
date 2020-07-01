<?php
  require_once("./php/connecttoDB.php");
  $username = $_SESSION['username'];
  $sql="DELETE FROM cart WHERE username in (SELECT userID FROM user WHERE username='$username')";
  mysqli_query($conn, $sql);

  $sql = "SELECT transactionID from transaction WHERE userID IN (SELECT userID FROM user WHERE username='$username') ORDER BY transactionID DESC LIMIT 1;";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $transactionID = $row['transactionID'];

  $sql="UPDATE transaction SET approval_status='1' WHERE transactionID='$transactionID';";
  mysqli_query($conn, $sql);

  $sql="DELETE FROM transaction WHERE userID in (SELECT userID FROM user WHERE username='$username') AND approval_status IS NULL";
  mysqli_query($conn, $sql);
  $conn->close();
  
  unset($_SESSION['transaction']);
  echo "<script>alert('Đã xác nhận đơn hàng!!');</script>";
  echo "<script>window.location = 'http://localhost/luxury/cart.php';</script>";

?>