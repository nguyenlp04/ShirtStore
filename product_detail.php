<?php
session_start();
include '../config/config.php';
include "layout.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
if (isset($_SESSION['getAvatarUser'])) {
    $avatar = $_SESSION['getAvatarUser'];
} else {
    $avatar = '/user.png';
}

if (isset($_SESSION['vai_tro']) && $_SESSION['vai_tro'] === "admin") {
    $btnDeleteCmt = "inline-block";
} else {
    $btnDeleteCmt = "none";
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

if (isset($_POST['postComment'])) {
    if (isset($_SESSION['id_customer'])) {
        $id_customer = $_SESSION['id_customer'];
    } else {
        $id_customer = 0;
    }
    $comment = $_POST["comment"];
    $type = "product";
    $dateCmt = date('Y-m-d');
    $sqlCmt = "INSERT INTO `comments` (`id_customer`,`comment`,`type`,`id_product`,`date_comment`) 
    VALUES('$id_customer','$comment','$type','$id_product','$dateCmt')";
    $old = mysqli_query($conn, $sqlCmt);
}

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

// Lấy thông tin từ form
// $indexArr = 0;
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
        $index = count($_SESSION['cart']) + 1; // Assign the index for the new product
        addToCart($index, $id_product, $nameProduct, $imageProduct, $priceProduct, $categoryProduct, $size, $quantity);
        
    }
    header("Location: cart.php");

    exit();
}

function addToCart($index, $id_product, $nameProduct, $imageProduct, $priceProduct, $categoryProduct, $size, $quantity) {

    // Kiểm tra xem giỏ hàng có tồn tại không, nếu không thì tạo mới
   
    // Tạo một mảng đại diện cho sản phẩm
    $productInfo = array(
        'index' => $index,  // Include the index in the product info
        'id' => $id_product, 
        'name' => $nameProduct, 
        'image' => $imageProduct,
        'price' => $priceProduct * $quantity, 
        'category' => $categoryProduct, 
        'size' => $size, 
        'quantity' => $quantity,
       
    );

    // Thêm sản phẩm vào giỏ hàng
    $_SESSION['cart'][] = $productInfo;
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm chi tiết</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/product-detail.css">
    <link rel="shortcut icon" href="./img/favicon/favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->

   
<meta charset="UTF-8">
<link rel="shortcut icon" href="./img/favicon/favicon.ico" type="image/x-icon">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/product-detail.css">
    <link rel="stylesheet" href="./css/search.css">
    <link rel="stylesheet" href="./css/all_products.css">
    <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    

    
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
                    <!-- START FORM -->

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
                                <span class="text-danger text-decoration-line-through">$<?php echo $rowProduct['discount'] ?></span>
                                <span class="fs-3 fw-bold">$<?php echo $priceProduct ?></span>
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

                            <div class="button-buy mt-4 mb-4 btn btn-primary shadow-0">
                                <i class="me-1 fa fa-shopping-basket"></i>
                                <input name="addToCart" style="background: unset; color: white; border: none;" type="submit" value="Thêm vào giỏ hàng">
                            </div>
                            <div class="row">
                                <p><strong>Buy More Save More!</strong></p>
                                <p>2 items get <span style="color: #ff0000;"><strong>10% OFF<span style="color: #000000;">
                                            </span></strong></span>on each product.</p>
                                <p>3 or more items get <span style="color: #ff0000;"><strong>15% OFF<span style="color: #000000;"> </span></strong></span>on each product .</p>
                                <p><span style="color: #ff0000;"><strong>FREE SHIPPING<span style="color: #000000;">
                                            </span></strong></span>for orders over $99.</p>
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


                <!-- END FORM -->

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
                    $query = "SELECT comments.id_customer, comments.id_comment, comments.comment, comments.date_comment, customer.fullname, customer.avatar 
                        FROM comments 
                        JOIN customer ON comments.id_customer = customer.id_customer
                        WHERE id_product = $id_product";
                    $resultShowCmt = mysqli_query($conn, $query);
                    if ($resultShowCmt) {
                        while ($row = mysqli_fetch_assoc($resultShowCmt)) {
                            echo '<div class="bg-white p-2">
                    <input type="hidden" value="' . $row['id_comment'] . '">
                    <div class="d-flex flex-row user-info">
                        <img class="rounded-circle me-2" src="./img/avatarUser/' . $row['avatar'] . '" height="40" width="40">
                        <div class="d-flex flex-column justify-content-start ml-2">
                            <span class="d-block font-weight-bold name"><h5>' . $row['fullname'] . '</h5></span>
                            <span class="date text-black-50">Được chia sẻ công khai - ' . $row['date_comment'] . '
                                <a style="display:' . $btnDeleteCmt . '" href="admin/delete_comment.php?id_comment=' . $row['id_comment'] . '"><i class="mx-2 fa-solid fa-trash"></i></a>
                            </span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="comment-text">' . $row['comment'] . '</p>
                    </div>
                </div>';
                        }
                    }
                    ?>




                </div>







            </div>
        </div>
    </section>


    <?php footer() ?>

    <script src="./js/all_products.js"></script>
    <script src="./js/search.js"></script>
    <script src="./js/select_size.js"></script>

</body>

</html>