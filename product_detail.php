<?php
session_start();
include '../config/config.php';
include "./models/function.php";
include "layout.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
if (isset($_SESSION['getAvatarUser'])) {
    $avatar = $_SESSION['getAvatarUser'];
} else {
    $avatar = '/user.png';
}
if(isset($_SESSION['id_customer'])){
    $id_customer = $_SESSION['id_customer'];
    }
$id_product = $_GET['product_detail'];
if (isset($_GET['product_detail'])) {
    $id_product = $_GET['product_detail'];
    $sql = "SELECT sp.id_product  , sp.name_products, sp.price, sp.discount, sp.image AS image, sp.entry_date, sp.id_category,sp.quantity, sp.special_product, sp.views, sp.description, c.title as category_title, c.description as category_description, c.img as category_img 
FROM products sp
JOIN category c ON sp.id_category = c.id_category
WHERE id_product='$id_product'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $rowProduct = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy dữ liệu";
        exit;
    }
}
$id_product = $_GET['product_detail'];
$type = "product";
$rowID = "id_product";
postComment($id_product, "news", "id_product");
$updateViewsQuery = "UPDATE products SET views = views + 1 WHERE id_product = $id_product";
$conn->query($updateViewsQuery);
$selectedSize = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['size'])) {
        $selectedSize = $_POST['size'];
    }
}
$nameProduct = $rowProduct['name_products'];
$imageProduct = $rowProduct['image'];
$categoryProduct = $rowProduct['category_title'];
$priceProduct = $rowProduct['price'];
$quantityProduct = $rowProduct['quantity'];
$discount = $rowProduct['discount'];
$disable = "";
$disableBtn = "";
if ($rowProduct['quantity'] == 0) {
    $disable = 'style="background: #ccc; border:none"';
    $disableBtn = 'disabled';
}
// Lấy thông tin từ form
if (isset($_POST['addToCart'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    // session_destroy();
    $subtotal = 0;
    // Lấy thông tin sản phẩm từ form
    $size = $_POST['size']; // Kích thước
    $quantity = intval($_POST['quantity']); // Số lượng
    // Kiểm tra xem sản phẩm có sẵn trong giỏ hàng không
    $productIndex = -1;
    foreach ($_SESSION['cart'] as $index => $product) {
        $subtotal += $product['price'];
        if ($product['id'] == $id_product && $product['size'] == $size) {
            $productIndex = $index;
            break;
        }
    }
    // Nếu sản phẩm đã tồn tại, cộng số lượng
    if ($productIndex >= 0) {
        $_SESSION['cart'][$productIndex]['quantity'] += $quantity;
        $_SESSION['cart'][$productIndex]['price'] = $_SESSION['cart'][$productIndex]['quantity'] * $priceProduct;
    } else {
        // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
        $index = count($_SESSION['cart']) + 1;
        addToCart($index, $id_product, $nameProduct, $imageProduct, $priceProduct, $categoryProduct, $size, $quantity);
    }
    header("Location: cart.php");
    exit();
}
if ($discount == 0) {
    $hiddenDiscount = 'd-none';
} else {
    $temp = $priceProduct;
    $priceProduct = $discount;
    $discount = $temp;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="./img/favicon/favicon.ico" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/product-detail.css">
    <link rel="stylesheet" href="./css/search.css">
    <link rel="stylesheet" href="./css/all_products.css">
    <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
    <?php menu() ?>
    <section class="py-5">
        <div class="container">
            <div class="row gx-5">
                <aside class="col-lg-6">
                    <div class="border rounded-4 mb-3 d-flex justify-content-center">
                        <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="./img/imgProducts<?php echo $imageProduct ?>">
                            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="./img/imgProducts<?php echo $imageProduct ?>" />
                        </a>
                    </div>
                </aside>
                <main class="col-lg-6">
                    <form action="product_detail.php?product_detail=<?php echo $id_product ?>" method="POST" enctype="multipart/form-data">
                        <div class="ps-lg-3">
                            <h4 class="title text-dark">
                                <?php echo $nameProduct ?>
                            </h4>
                            <div class="d-flex flex-row my-">
                                <div class="text-warning mb-1 me-2">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="ms-1">
                                        4.5
                                    </span>
                                </div>
                                <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i><?php echo $quantityProduct ?> sản
                                    phẩm</span>
                                <span class="text-success ms-1">trong kho</span>
                            </div>
                            <p class="text-muted mb-2"><?php echo $categoryProduct ?></p>
                            <div class="fs-5 mb-3">
                                <span class="text-decoration-line-throug <?php echo $hiddenDiscount ?>"><del>$<?php echo $discount ?></del></span>
                                <span class="text-danger fs-3 fw-bold price">$<?php echo $priceProduct ?></span>
                            </div>
                            <div class="eb-estimate-shipping-container" style="--x: 208px; display: block">
                                <div class="d-flex align-items-center">
                                    <img src="https://cdn.shopify.com/s/files/1/2418/2505/files/shipping-icon-2.png?v=1695214987" />
                                    <div class="eb-estimate-shipping-title">
                                        <span>Đặt hàng hôm nay và nhận hàng vào: </span><span class="showShipping"></span>
                                    </div>
                                </div>
                                <div class="eb-estimate-shipping-popup-wrapper" style="display:none">
                                    <div class="eb-estimate-shipping-stepper">
                                        <div class="eb-stepper-item">
                                            <div class="eb-stepper-item-label">
                                                <svg width="16" height="16" viewBox="0 0 24 24">
                                                    <path fill="#000" d="M23 17C23 20.31 20.31 23 17 23V21.5C19.5 21.5 21.5 19.5 21.5 17H23M1 7C1 3.69 3.69 1 7 1V2.5C4.5 2.5 2.5 4.5 2.5 7H1M8 4.32L3.41 8.92C.19 12.14 .19 17.37 3.41 20.59S11.86 23.81 15.08 20.59L22.15 13.5C22.64 13.03 22.64 12.24 22.15 11.75C21.66 11.26 20.87 11.26 20.38 11.75L15.96 16.17L15.25 15.46L21.79 8.92C22.28 8.43 22.28 7.64 21.79 7.15S20.5 6.66 20 7.15L14.19 13L13.5 12.27L20.37 5.38C20.86 4.89 20.86 4.1 20.37 3.61S19.09 3.12 18.6 3.61L11.71 10.5L11 9.8L16.5 4.32C17 3.83 17 3.04 16.5 2.55S15.22 2.06 14.73 2.55L7.11 10.17C8.33 11.74 8.22 14 6.78 15.45L6.07 14.74C7.24 13.57 7.24 11.67 6.07 10.5L5.72 10.15L9.79 6.08C10.28 5.59 10.28 4.8 9.79 4.31C9.29 3.83 8.5 3.83 8 4.32Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="eb-stepper-item-content">
                                                <div class="eb-stepper-item-content-day">Oct 26</div>
                                                <div class="eb-stepper-item-content-text">Đặt hàng</div>
                                            </div>
                                        </div>
                                        <div class="eb-stepper-item">
                                            <div class="eb-stepper-item-label">
                                                <svg width="16" height="16" viewBox="0 0 24 24">
                                                    <path fill="#000" d="M3,13.5L2.25,12H7.5L6.9,10.5H2L1.25,9H9.05L8.45,7.5H1.11L0.25,6H4A2,2 0 0,1 6,4H18V8H21L24,12V17H22A3,3 0 0,1 19,20A3,3 0 0,1 16,17H12A3,3 0 0,1 9,20A3,3 0 0,1 6,17H4V13.5H3M19,18.5A1.5,1.5 0 0,0 20.5,17A1.5,1.5 0 0,0 19,15.5A1.5,1.5 0 0,0 17.5,17A1.5,1.5 0 0,0 19,18.5M20.5,9.5H18V12H22.46L20.5,9.5M9,18.5A1.5,1.5 0 0,0 10.5,17A1.5,1.5 0 0,0 9,15.5A1.5,1.5 0 0,0 7.5,17A1.5,1.5 0 0,0 9,18.5Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="eb-stepper-item-content">
                                                <div class="eb-stepper-item-content-day">Oct 30 - 31</div>
                                                <div class="eb-stepper-item-content-text">Giao hàng</div>
                                            </div>
                                        </div>
                                        <div class="eb-stepper-item">
                                            <div class="eb-stepper-item-label">
                                                <svg width="16" height="16" viewBox="0 0 24 24">
                                                    <path fill="#000" d="M9.06,1.93C7.17,1.92 5.33,3.74 6.17,6H3A2,2 0 0,0 1,8V10A1,1 0 0,0 2,11H11V8H13V11H22A1,1 0 0,0 23,10V8A2,2 0 0,0 21,6H17.83C19,2.73 14.6,0.42 12.57,3.24L12,4L11.43,3.22C10.8,2.33 9.93,1.94 9.06,1.93M9,4C9.89,4 10.34,5.08 9.71,5.71C9.08,6.34 8,5.89 8,5A1,1 0 0,1 9,4M15,4C15.89,4 16.34,5.08 15.71,5.71C15.08,6.34 14,5.89 14,5A1,1 0 0,1 15,4M2,12V20A2,2 0 0,0 4,22H20A2,2 0 0,0 22,20V12H13V20H11V12H2Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="eb-stepper-item-content">
                                                <div class="eb-stepper-item-content-day">Nov 9 - 16</div>
                                                <div class="eb-stepper-item-content-text">Nhận hàng!</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="eb-estimate-shipping-description">
                                        <ul>
                                            <li>
                                                Đơn hàng có thể bị hủy hoặc sửa đổi trong vòng 2 giờ sau khi đặt.
                                            </li>
                                            <li>
                                                Khung thời gian trên được áp dụng với các phương thức vận chuyển tiêu chuẩn.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row select-size">
                                <dt class="col-12">Size:</dt>
                                <div class="col-xs-6 mb-2">

                                    <input type="radio" id="S" name="size" value="S" <?php echo ($selectedSize == '') ? 'checked' : ''; ?>>
                                    <label for="S" class="me-1 btn btn-outline-dark btn-sm">S</label>

                                    <input type="radio" id="M" name="size" value="M" <?php echo ($selectedSize == 'M') ? 'checked' : ''; ?>>
                                    <label for="M" class="me-1 btn btn-outline-dark btn-sm">M</label>

                                    <input type="radio" id="L" name="size" value="L" <?php echo ($selectedSize == 'L') ? 'checked' : ''; ?>>
                                    <label for="L" class="me-1 btn btn-outline-dark btn-sm">L</label>

                                    <input type="radio" id="XL" name="size" value="XL" <?php echo ($selectedSize == 'XL') ? 'checked' : ''; ?>>
                                    <label for="XL" class="me-1 btn btn-outline-dark btn-sm">XL</label>

                                    <input type="radio" id="2XL" name="size" value="2XL" <?php echo ($selectedSize == '2XL') ? 'checked' : ''; ?>>
                                    <label for="2XL" class="me-1 btn btn-outline-dark btn-sm">2XL</label>

                                    <input type="radio" id="3XL" name="size" value="3XL" <?php echo ($selectedSize == '3XL') ? 'checked' : ''; ?>>
                                    <label for="3XL" class="me-1 btn btn-outline-dark btn-sm">3XL</label>

                                </div>
                            </div>
                            <div class="row">
                                <dt class="col-12">Số lượng:</dt>
                                <div class="input-group" style="width: 200px">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quantity" style="height: 100%">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                    </span>
                                    <input type="text" name="quantity" class="text-center mx-2 m-0 px-2 form-control input-number" value="1" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quantity" style="height: 100%">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <!-- 12312312312321312 -->
                            <div <?php echo $disable ?> class="button-buy mt-4 mb-4 btn btn-primary shadow-0">
                                <i class="me-1 fa fa-shopping-basket"></i>
                                <input <?php echo $disableBtn ?> name="addToCart" style="background: unset; color: white; border: none;" type="submit" value="Thêm vào giỏ hàng">
                            </div>
                            <div class="row">
                                <p><strong>Mua Nhiều, Tiết Kiệm Nhiều!</strong></p>
                                <p>2 sản phẩm <span style="color: #ff0000;"><strong>giảm 10%<span style="color: #000000;">
                                            </span></strong></span>trên tổng sản phẩm.</p>
                                <p>3 sản phẩm <span style="color: #ff0000;"><strong>giảm 15%<span style="color: #000000;"> </span></strong></span>trên tổng sản phẩm.</p>
                                <p><span style="color: #ff0000;"><strong>MIỄN PHÍ VẬN CHUYỂN<span style="color: #000000;">
                                            </span></strong></span>cho đơn hàng trên $99.</p>
                            </div>
                        </div>
                </main>
                <div class="title-description-product">
                    <h3>Mô tả</h3>
                    <p>
                        <?php echo $rowProduct['description'] ?>
                    </p>
                </div>
                </form>
                <div class="title-comment-product">
                    <form action="product_detail.php?product_detail=<?php echo $id_product ?>" method="POST" enctype="multipart/form-data">
                        <h3>Bình luận</h3>
                        <div class=" p-2">
                            <div class="d-flex flex-row align-items-start">
                                <img class="rounded-circle me-2" src="./img/avatarUser<?php echo $avatar ?>" height="40" width="40">
                                <textarea name="comment" class="form-control ml-1 shadow-none textarea" rows="4"></textarea>
                            </div>
                            <div class="mt-2 text-right">
                                <button class="mb-3 btn btn-primary btn-sm shadow-none p-2" type="button"><input name="postComment" style="background: unset; color: white; border: none;" type="submit" value="Bình luận"></button>
                            </div>
                        </div>
                    </form>
                    <?php
                    deleteComment($id_product, "id_product");
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php footer() ?>
    <script src="./js/product_detail.js"></script>
    <script src="./js/search.js"></script>
    <script src="./js/select_size.js"></script>
</body>
</html>