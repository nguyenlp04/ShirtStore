<?php
session_start();
include "./config/config.php";
include "layout.php";
include './process_send_mail.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['totalPrice'])) {
    $totalPrice = 0;
} else {
    $totalPrice = $_SESSION['totalPrice'];
}
if (!isset($_SESSION['discount'])) {
    $discount = 0;
} else {
    $discount = $_SESSION['discount'];
}
if (!isset($_SESSION['tax'])) {
    $tax = 0;
} else {
    $tax = $_SESSION['tax'];
}

if (!isset($_SESSION['fullname'])) {
    $fullname = "";
} else {
    $fullname = $_SESSION['fullname'];
}


if (isset($_SESSION['id_customer'])) {
    $hiddenAuth = "none";
} else {
    $hiddenAuth = "block";
}


// Các giá vận chuyển tương ứng với mỗi lựa chọn radio
$shippingPrices = array(
    'Chuyển phát nhanh' => 14.00,
    'Bưu điện' => 10.00,
    'Tự nhận' => 0.00
);

$totalPayment = $_SESSION['totalPayment'];
if (isset($_SESSION['cart'])) {
    $totalPayment = intval(number_format((($totalPayment + ($totalPayment * $tax / 100)) - $discount), 2));
} else {
    $totalPayment = 0;
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['inputHiddenShipping'])) {
    $inputHiddenShippingValue = $_POST['inputHiddenShipping'];

    $_SESSION['inputHiddenShippingValue'] = $inputHiddenShippingValue;
}
$paymentSuccess = false;
$paymentFailure = false;
if (isset($_POST['addToCart'])) {
    $subject = 'Xác Nhận Đặt Hàng';
    if (isset($_SESSION['id_customer'])) {
        $id_customer = $_SESSION['id_customer'];
    } else {
        $id_customer = "";
    }
    $customer_fullname = $_POST['customer_fullname'];
    $customer_phone = $_POST['customer_phone'];
    $customer_email = $_POST['customer_email'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $wards = $_POST['wards'];
    $detaileAddress = $_POST['detaileAddress'];
    $customer_address = $detaileAddress . ", " . $wards . ", " . $district . ", " . $city . ", " . $country;
    $shipping_method = $_POST['radidoShip'];
    $payment_amount = $_POST['inputHiddenPaymentAmount'];
    $payment_date = date('Y-m-d');
    $payment_status = "Thành công";
    $order_notes = $_POST['order_notes'];

    if ($shipping_method == 'Tự nhận') {
        $customer_address = "";
        $country = "";
        $city = "";
        $district = "";
        $wards = "";
        $detaileAddress = "";
    } else if (
        empty($_POST['customer_fullname']) || empty($_POST['customer_phone']) || empty($_POST['customer_email']) ||
        empty($_POST['country']) || empty($_POST['city']) || empty($_POST['district']) ||
        empty($_POST['wards']) || empty($_POST['detaileAddress']) || empty($_POST['radidoShip']) ||
        empty($_POST['inputHiddenPaymentAmount'])
    ) {
        $paymentFailure = true;
    } else {
    }
    if ($paymentFailure == false) {

        $sql = "INSERT INTO `order_payments` (`customer_id`,`customer_fullname`,`customer_phone`,`customer_email`,`customer_address`,`payment_amount`,`payment_date`,`shipping_method`,`payment_status`, `order_notes`) 
        VALUES('$id_customer', '$customer_fullname','$customer_phone','$customer_email', '$customer_address', '$payment_amount', '$payment_date', '$shipping_method', '$payment_status', '$order_notes')";
        $old = mysqli_query($conn, $sql);
        $paymentSuccess = true;

        $subject = 'Xác Nhận Đặt Hàng';
        $message_products = "";
        $tottalprice = 0;
        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
            $total_checkout = $_SESSION['cart'][$i]['price'];
            $message_products_temp = '
            <br> Tên sản phẩm: ' . $_SESSION['cart'][$i]['name'] . ' <br> 
            Giá: ' . ($_SESSION['cart'][$i]['price'] / $_SESSION['cart'][$i]['quantity']) . '$ <br> 
            Số lượng: ' . $_SESSION['cart'][$i]['quantity'] . ' <br>
            Thành tiền: ' . $_SESSION['cart'][$i]['price'] . '$ <br> 
            ';
            $message_products .= $message_products_temp;
            $tottalprice += $total_checkout;
        }
        $message = 'Họ và tên: ' . $customer_fullname . ' <br> Địa chỉ: ' . $customer_address . ' <br> Số điện thoại: ' . $customer_phone . ' <br> Email: ' . $customer_email . ' <br>
        Mô tả: ' . $order_notes . ' <br> Hình thức giao hàng: ' . $shipping_method . '   
        <br> SẢN PHẨM: <br>' . $message_products . '
        <br>Tổng thanh toán: ' . $tottalprice . '$';
        send_email($customer_email, $subject, $message, $customer_fullname);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="shortcut icon" href="./img/favicon/favicon.ico" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/search.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/all_products.css">
    <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
        .productCheckoutInCart {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            padding: 0 !important;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
     
<?php menu() ?>

    <section class="h-100 h-custom py-5 ">

        <div class="col">
            <div class="">
                <div class="card-body p-4">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">

                        <div class="row">

                            <div class="col-lg-8 ">

                                <div style="display: <?php echo $hiddenAuth ?>" class="card mb-4 border shadow-0">
                                    <div class="card p-4 d-flex justify-content-between">
                                        <div class="d-block">
                                            <h5>Bạn đã có tài khoản chưa?</h5>
                                            <p>Đăng nhập để thanh toán</p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center flex-column flex-md-row">
                                            <a href="./auth/sign-up.php" class="btn btn-outline-primary me-0 me-md-2 mb-2 mb-md-0 w-100">Đăng ký</a>
                                            <a href="./auth/login.php" class="btn btn-primary shadow-0 text-nowrap w-100">Đăng nhập</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Checkout -->
                                <div class="card  border">
                                    <div class="p-4">
                                        <div class="alert alert-success " style="background-color: #5cb85c; display:<?php echo $paymentSuccess ? 'block' : 'none'; ?>">
                                            <i class=" text-white fa-solid fa-circle-check"></i>&nbsp; <strong class="text-white">Đặt hàng thành công!</strong>
                                        </div>
                                        <div class="alert alert-success bg-danger" style="display:<?php echo $paymentFailure ? 'block' : 'none'; ?>">
                                            <i class="  text-white fa-solid fa-triangle-exclamation"></i>&nbsp; <strong class="text-white">Vui lòng điền đầy đủ thông tin!</strong>
                                        </div>
                                        <h5 class="card-title mb-3">Thông tin khách hàng </h5>
                                        <div class="row">

                                            <div class="col-6 mb-3">
                                                <p class="mb-0">Họ và tên</p>
                                                <div class="">
                                                    <input name="customer_fullname" type="text" id="typeText" placeholder="Họ và tên" class="form-control" value="<?php echo  $fullname ?>" />
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <p class="mb-0">Số điện thoại</p>
                                                <div class="">
                                                    <input name="customer_phone" type="tel" id="typePhone" value="+84 " class="form-control " />
                                                </div>
                                            </div>

                                            <div class="col-6 mb-3">
                                                <p class="mb-0">Email</p>
                                                <div class="">
                                                    <input name="customer_email" type="email" id="typeEmail" placeholder="example@gmail.com" class="form-control " />
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="my-4" />

                                        <h5 class="card-title mb-3">Thông tin vận chuyển</h5>

                                        <div class="row mb-3">
                                            <div class="col-lg-4 mb-3">
                                                <!-- Default checked radio -->
                                                <div class="form-check h-100 border rounded-3">
                                                    <div class="p-3">
                                                        <input class="form-check-input" type="radio" onclick="updateShippingPrice('Chuyển phát nhanh')" value="Chuyển phát nhanh" name="radidoShip" id="flexRadioDefault1" checked />
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Chuyển phát nhanh<br />
                                                            <small class="text-muted">3-4 ngày qua J&T Express</small>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <!-- Default radio -->
                                                <div class="form-check h-100 border rounded-3">
                                                    <div class="p-3">
                                                        <input class="form-check-input" type="radio" onclick="updateShippingPrice('Bưu điện')" value="Bưu điện" name="radidoShip" id="flexRadioDefault2" />
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Bưu điện <br />
                                                            <small class="text-muted">7-10 ngày qua đường bưu điện</small>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <!-- Default radio -->
                                                <div class="form-check h-100 border rounded-3">
                                                    <div class="p-3">
                                                        <input class="form-check-input noDelivery" type="radio" onclick="updateShippingPrice('Tự nhận')" value="Tự nhận" name="radidoShip" id="flexRadioDefault3" />
                                                        <label class="form-check-label" for="flexRadioDefault3">
                                                            Tự nhận <br />
                                                            <small class="text-muted">Hãy đến với cửa hàng của chúng tôi </small>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="hiddenAddress" class="row">
                                            <div class="col-sm-4 col-6 mb-3">
                                                <p class="mb-0">Quốc gia</p>
                                                <div class="">
                                                    <input name="country" type="text" id="typeText" placeholder="Quốc gia" class="form-control" value="Việt Nam" />
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <p class="mb-0">Thành phố</p>
                                                <!-- <select name="city" class="form-select">
                                                    <option value="1">New York</option>
                                                    <option value="2">Moscow</option>
                                                    <option value="3">Samarqand</option>
                                                </select> -->
                                                <select id="city" name="city" class="form-select">
                                                    <option value="" selected>Chọn tỉnh thành</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <p class="mb-0">Quận/Huyện</p>
                                                <!-- <div class="">
                                                    <input name="district" type="text" id="typeText" placeholder="Quận/Huyện" class="form-control " />
                                                </div> -->
                                                <select id="district" name="district" class="form-select">
                                                    <option value="" selected>Chọn quận huyện</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4 col-6 mb-3">
                                                <p class="mb-0">Phường/Xã</p>
                                                <!-- <div class="">
                                                    <input name="wards" type="text" id="typeText" placeholder="Phường/Xã" class="form-control " />
                                                </div> -->
                                                <select id="ward" name="wards" class="form-select">
                                                    <option value="" selected>Chọn phường xã</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-8 mb-3">
                                                <p class="mb-0">Địa chỉ chi tiết</p>
                                                <div class="">
                                                    <input name="detaileAddress" type="text" id="typeText" placeholder="Địa chỉ chi tiết" class="form-control " />
                                                </div>
                                            </div>


                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1" />
                                            <label class="form-check-label" for="flexCheckDefault1">Lưu địa chỉ này</label>
                                        </div>
                                        <div class="mb-3">
                                            <p class="mb-0">Ghi chú đơn hàng (không bắt buộc)</p>
                                            <div class="">
                                                <textarea name="order_notes" class="form-control " id="textAreaExample1" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="float-end">
                                            <button type="button" class="btn btn-success"><a href="cart.php" class="text-light text-decoration-none">Quay lại</a></button>
                                            <div class="button-buy mt-4 mb-4 btn btn-primary shadow-0">
                                                <input class="text-uppercase" name="addToCart" style="background: unset; color: white; border: none;" type="submit" value="Thanh toán">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-md-4">
                                <div class="ms-lg-4 pt-4 mt-4 mt-lg-0" style="max-width: 320px;">
                                    <h5 class="mb-3">Tổng giỏ hàng</h5>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Tổng phụ:</p>
                                        <strong>
                                            <p class="mb-2">$<?php echo $totalPrice ?></p>
                                            <input type="hidden" id="inputHiddenTotalPrice" name="inputHiddenTotalPrice" value="<?php echo $totalPrice ?>">

                                        </strong>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Giảm giá:</p>
                                        <strong>

                                            <p class="mb-2 text-danger">- $<span id="discountAmount"><?php echo $discount ?></span></p>
                                            <input type="hidden" id="inputHiddenDiscount" name="inputHiddenDiscount" value="<?php echo $discount ?>">

                                        </strong>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Phí vận chuyển:</p>
                                        <strong>
                                            <p id="shippingPrice" class="mb-2">$12</p>
                                        </strong>
                                        <input type="hidden" id="inputHiddenShipping" name="inputHiddenShipping" value="12">
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Thuế:</p>
                                        <strong>
                                            <p class="mb-2"> <?php echo $tax ?>%</p>
                                        </strong>
                                    </div>
                                    <hr />
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Tổng thanh toán:</p>
                                        <strong>
                                            <input type="hidden" id="inputHiddenPaymentAmount" name="inputHiddenPaymentAmount" value="">
                                            <p class="mb-2 fw-bold" id="totalPayment" name="totalPayment">$<?php echo  $totalPayment ?></p>
                                        </strong>
                                    </div>
                                    <div class="input-group mt-3 mb-4">
                                        <input type="text" id="inputCoupon" class="form-control border" name="" placeholder="Mã khuyến mại" />
                                        <button class="apply-coupon btn btn-light text-primary border">Áp dụng</button>
                                    </div>
                                    <hr />
                                    <h6 class="text-dark my-4">Các sản phẩm trong giỏ hàng</h6>

                                    <?php
                                    if (isset($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $product) {

                                            echo ' <div class="d-flex align-items-center mb-4">
                                    <div class="me-3 position-relative">
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-secondary">
                                        ' . $product['quantity'] . '
                                        </span>
                                        <img src="./img/imgProducts' . $product['image'] . '" style="height: 96px; width: 96px;" class="img-sm rounded border" />
                                    </div>
                                    <div class="">
                                        <a href="product_detail.php?product_detail=' . $product['id'] . '" class="nav-link">
                                        <div class="productCheckoutInCart"> ' . $product['name'] . '</div>
                                        ' . $product['size'] . '
                                        </a>
                                        <div class="price text-muted">Total: $' . $product['price'] . '</div>
                                    </div>
                                    </div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
  <?php footer() ?>
      
    <script>
        let couponApplied = false;

        document.querySelector(".apply-coupon").addEventListener('click', function(event) {
            event.preventDefault();
            const listCoupon = {
                <?php
                $query = "SELECT * FROM coupons";
                $resultShow = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($resultShow)) {
                    echo "'" . $row['name_coupon'] . "' : " . $row['discount_coupon'] . ",";
                }
                ?>
            };
            const inputCoupon = document.getElementById("inputCoupon").value;

            if (couponApplied) {
                alert('Bạn đã áp dụng mã giảm giá rồi.');
                return;
            }
            // Lưu trữ giá trị mã giảm giá vào biến couponDiscount
            let couponDiscount = 0;
            for (const coupon in listCoupon) {
                if (inputCoupon === coupon) {
                    couponDiscount = listCoupon[coupon];
                    break; // Dừng khi tìm thấy mã giảm giá
                }
            }

            let priceTotal = parseFloat(document.getElementById('inputHiddenTotalPrice').value);
            const inputHiddenDiscount = parseFloat(document.getElementById('inputHiddenDiscount').value);
            console.log(inputHiddenDiscount);

            // Tính toán giảm giá
            const discountAmount = priceTotal * (couponDiscount / 100);
            // const totalDiscount = discountAmount + inputHiddenDiscount;
            const totalDiscount = discountAmount;

            ship = document.getElementById('inputHiddenShipping').value;
            const finalPrice = priceTotal - totalDiscount
            const totalPayment = finalPrice + (finalPrice * <?php echo $tax / 100 ?>)  + parseInt(ship);

            // Cập nhật giảm giá và tổng thanh toán
            document.getElementById('discountAmount').innerHTML = `$${(discountAmount + inputHiddenDiscount).toFixed(2)}`;
            document.getElementById('discountAmount').textContent = (totalDiscount).toFixed(2);
            document.getElementById('inputHiddenDiscount').value = totalDiscount;
            document.getElementById('inputHiddenPaymentAmount').value = totalPayment.toFixed(2);
            document.getElementById('totalPayment').innerHTML = `$${totalPayment.toFixed(2)}`;

            couponApplied = true;
            // Vô hiệu hóa ô nhập mã giảm giá
            document.getElementById("inputCoupon").setAttribute("disabled", "true");

        });

        var shippingPrices = {
            'Chuyển phát nhanh': 12.00,
            'Bưu điện': 10.00,
            'Tự nhận': 0.00
        };

        function updateShippingPrice(value) {
            if (value == 'Tự nhận') {
                document.getElementById('hiddenAddress').style.display = 'none';
            } else {
                document.getElementById('hiddenAddress').style.display = 'flex';
            }

            const ship = shippingPrices[value] || 0;
            document.getElementById('shippingPrice').innerHTML = `$${ship}`;
            document.getElementById('inputHiddenShipping').value = ship;
            const totalPrice = parseFloat(document.getElementById('inputHiddenTotalPrice').value);
            const discount = parseFloat(document.getElementById('inputHiddenDiscount').value);
            const tax = parseFloat(<?php echo $tax; ?>);
            const totalPayment = ((totalPrice + (totalPrice * tax / 100) + ship) - discount).toFixed(2);
            document.getElementById('totalPayment').innerHTML = `$${totalPayment}`;
            document.getElementById('inputHiddenPaymentAmount').value = totalPayment;
        }
        window.addEventListener('load', (event) => {
            updateShippingPrice('Chuyển phát nhanh');
        });

        const radioButtons = document.getElementsByName('radidoShip');
        for (const radioButton of radioButtons) {
            radioButton.addEventListener('change', (event) => {
                updateShippingPrice(event.target.value);
            });
        }
    </script>
    <script src="./js/checkout.js"></script>
    <script src="./js/search.js"></script>
    <script src="./js/all_products.js"></script>
</body>

</html>