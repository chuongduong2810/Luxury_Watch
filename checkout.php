<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['token'])&&!isset($_SESSION['fb_access_token'])&&!isset($_SESSION['gmail_access_token'])) {
   header('Location: login-page.php');
}

if (!isset($_SESSION['transaction'])){
  echo "<script>window.location = 'http://localhost/luxury/cart.php';</script>";
}else{
  // kiem tra thongtin
  require_once("./php/connecttoDB.php");
  $username = $_SESSION['username'];
  $sql="SELECT shipment_infoID FROM transaction WHERE userID in (SELECT userID FROM user WHERE username='$username') ORDER BY transactionID DESC LIMIT 1";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if ($row['shipment_infoID'] == NULL){
    $conn->close();
    echo "<script>window.location = 'http://localhost/luxury/address.php';</script>";
  } 

}


if(isset($_POST['checkout'])){
  include 'php/checkout-page/after-checkout.php';
}


?>

<!doctype html>
<html lang="en">
  <head>
    <title>Checkout</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/255938e5d5.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/checkout.css">
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=342432456383702&autoLogAppEvents=1" nonce="TncFQsy9"></script>
  </head>
  <body>
      <div class="container mb-5">
          <div class="row">
              <div class="main col-lg-7 col-md-7 mt-5">
                  <div class="container">
                      <a href="#" class="brand">
                          LuxuryWatch.tech
                      </a>
                      <br>
                      <br>
                      <div class="row path">
                          <a class="path__link ml-3" href="./cart.php">Giỏ hàng</a>
                          &nbsp;
                          <i class="fas fa-chevron-right icon-chevron"></i>
                          &nbsp;
                          <a class="path__link ml-0" href="./address.php">Thông tin người nhận</a>
                          &nbsp;
                          <i class="fas fa-chevron-right icon-chevron"></i>
                          &nbsp;
                          <span>Check out</span>
    
                      </div>
                  </div>
                  <br>

                  <form id="form_Checkout" method="post" >
                      <div class="container">
                          <h3 class="mb-3">Thông tin giao hàng</h3>
                          <div class="form-group">
                            <?php include 'php/checkout-page/load-info.php'?>
                            
                          </div>
                      </div>
                      <br>
    
                      <div class="container">
                            <h3>Phương thức vận chuyển</h3>
                            <div class="form-check form-check-ship">
                                <label class="form-check-label ml-4">
                                <input type="radio" class="form-check-input" name="" id="" value="checkedValue" checked>
                                <!-- Giao hàng tận nơi
                                <span>0đ</span> -->
                                <div class="form-check-ship-content">
                                    <div>Giao hàng tận nơi</div>
                                    <div class="price-ship">$5</div>
                                </div>
                            </label>
                            </div>
                        </div>
                        <br>
                      <div class="container">
                          <h3>Phương thức thanh toán</h3>
                          <div class="form-check form-check-payment">
                              <label class="form-check-label ml-4">
                              <input type="radio" class="form-check-input" name="payment" id="form-check-input-COD" value="checkedValue">
                                    Thanh toán khi nhận hàng (COD)
                                </label>
                                <div class="form-check-info mt-2" id="form-check-info-COD" style="display: none;">
                                    <span>Khách hàng sẽ nhận và kiểm tra hàng trước khi thanh toán !</span>
                                </div>
                                <hr>
                                <label class="form-check-label ml-4">
                                <input type="radio" class="form-check-input" name="payment" value="checkedValue" id="form-check-input-paypal">
                                    Trả bằng <i class="fa fa-cc-paypal" aria-hidden="true"></i>
                              </label>
                              <div class="form-check-info mt-2" id="form-check-info-paypal" style="display: none;">
                                <span>Thanh toán thông qua Paypal</span>
                            </div>
                          </div>
                      </div>
                      <input type="hidden" name="checkout" value='1'>
                      <button type="submit" onclick="document.getElementById('form_Checkout').submit()" class="btn btn-success btn-confirm float-right mr-4">Xác nhận</button>
                  </form>
              </div>
    
              <div class="right-part col-lg-5 col-md-5">
                <div class="container mt-5 container-product">
                    <?php include 'php/checkout-page/load-cart-detail.php'?>

                </div>
            </div>
          </div>
      </div>
    <!-- Optional JavaScript -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#form-check-input-COD').click(function () {
                $('#form-check-info-COD').show();
                $('#form-check-info-paypal').hide();
            })

            $('#form-check-input-paypal').click(function () {
                $('#form-check-info-paypal').show();
                $('#form-check-info-COD').hide();
            })
            
        });
    </script>
    </body>
</html>