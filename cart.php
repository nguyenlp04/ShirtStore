<?php
session_start();
include "./config/config.php";
include "layout.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);

$totalPrice = 0;
$tax = 8;
$discount = 0;
if(isset($_SESSION['cart'])){
  foreach ($_SESSION['cart'] as $product) {
    $productPrice = $product['price'] ;
    $totalPrice += $productPrice;
   
    if ($product['quantity'] == 2 ) {
      $discount = 0.10 * $totalPrice;

    } else if ($product['quantity'] >= 3)  {
      $discount = 0.15 * $totalPrice;
    } 
}
  if (count($_SESSION['cart']) == 0) {
    $totalPrice = 0; 
  }
  $discount = intval(number_format($discount,2));
  $_SESSION['totalPayment'] = number_format((($totalPrice + ($totalPrice * $tax / 100) ) - $discount),2);
  $_SESSION['totalPrice'] = $totalPrice;
  $_SESSION['discount'] = $discount;
  $_SESSION['tax'] = $tax;
}

// $test = is_string($discount);
// var_dump($discount);
// echo "<pre>";
// var_dump($_SESSION['cart']);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="shortcut icon" href="./img/favicon/favicon.ico" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/search.css">
        <link rel="stylesheet" href="./css/all_products.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
        <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
  
  <style>
    .titleProductCart {
      width: 70%;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      padding: 0 !important;
      margin-bottom: 10px;
    }


    input[type="text"]::placeholder {
      color: #cecece;
    }
    .w-40{
    width: 40% !important;
}
  </style>
</head>

<body>
<?php menu() ?>
   

  <section class="h-100 h-custom">

    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <h5 class="mb-3"><a href="javascript:history.back()" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Tiếp tục mua sắm</a></h5>
        <div class="col">
          <div class="card">
            <div class="card-body p-4">

              <div class="row">

                <div class="col-lg-7">


                  <div class=" mb-4">

                    <div class="card-header py-3">
                      <h5 class="mb-0">Giỏ hàng</h5>
                    </div>
                  
                  <div>

                  </div>



                  <?php
                  if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $product) {
                      echo '<div class="card mb-3">';
                      echo '<div class="card-body">';
                      echo '<div class="d-flex justify-content-between">';
                      echo '<div class="d-flex flex-row align-items-center">';
                      echo '<div>';
                      echo '<img src="./img/imgProducts' . $product['image'] . '" class="imageProductCart rounded-3" alt="Shopping item" style="width: 65px; height:65px">';

                      echo '</div>';
                      echo '<div class="ms-3">';
                      echo '<h5 class="titleProductCart">' . $product['name'] . '</h5>';
                      echo '<p class="small mb-0">' . $product['size'] . ', ' . $product['category'] . '</p>';
                      echo '</div>';
                      echo '</div>';
                      echo '<div class="d-flex flex-row align-items-center">';
                      echo '<div style="width: 50px;">';
                      echo '<h5 class="fw-normal mb-0">' . $product['quantity'] . '</h5>';
                      echo '</div>';
                      echo '<div style="width: 80px;">';
                      echo '<h5 class="mb-0">$' . $product['price'] . '</h5>';
                      echo '</div>';
                      echo '<a href="admin/delete_product_cart.php?index='.$product['index'].'" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>';
                      echo '</div>';
                      echo '</div>';
                      echo '</div>';
                      echo '</div>';
                    }
                  }
                  ?>
                  </div>
                </div>





                

                <div class="col-md-5">
                  <div class="card mb-4">
                    <div class="card-header py-3">
                      <h5 class="mb-0">Tổng giỏ hàng</h5>
                    </div>
                    <div class="card-body">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                        Tổng phụ
                          <span><strong>$<?php echo $totalPrice  ?></strong></span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                        Giảm giá 
                        <span><strong class="text-danger">-$<?php echo $discount ?></strong></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        Thuế
                          <span><strong><?php echo $tax ?>%</strong></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                          <div>
                            <strong>Tổng thanh toán</strong>
                            <strong>
                              <p class="mb-0 w-40">(bao gồm VAT, chưa bao gồm tiền vận chuyển)</p>
                            </strong>
                          </div>
                          <span><strong>$<?php echo  $_SESSION['totalPayment'] ?></strong></span>
                        </li>
                      </ul>

                      <button type="button" class="btn btn-primary btn-lg btn-block">
                        <a href="checkout.php" class="text-light text-decoration-none">Đi đến thanh toán</a>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


    
  <?php footer() ?>

  <script src="./js/all_products.js"></script>
  <script src="./js/search.js"></script>
</body>

</html>