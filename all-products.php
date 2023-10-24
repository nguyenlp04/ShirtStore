<?php
include "layout.php";
include "./classes/function.php";
include "./config/config.php";

ini_set('display_errors', 1); error_reporting(E_ALL);
if(isset($_SESSION['username'])){
    $userLogin = $_SESSION['username'];
    $sql = "SELECT * FROM customer WHERE username='$userLogin'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy dữ liệu";
        exit;
    }
    $hiddenLogin = "none";
    $hiddenUser = "flex";
} else{
    $hiddenLogin = "flex";
    $hiddenUser = "none";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tất cả sản phẩm</title>
    <link rel="shortcut icon" href="./img/favicon/favicon.ico" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/search.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/all_products.css">
    <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
 
<?php menu() ?>

    <div class="container mt-4 mb-0 pathPage">
        <a class="text-decoration-none text-body-tertiary fs-4 fw-normal" href="index.php">Trang Chủ</a>
        <span class="text-body-tertiary fs-3 fw-normal f-flex align-items-center fw-normal"
            style="padding: 0 10px;">/</span>
        <span class="text-decoration-none text-body-emphasis fs-4 fw-normal" href="index.php">Tất Cả Sản Phẩm</span>
    </div>
    <div class="row container ">
        <div class="col-3 select-category">
            <span class="title-list-category">DANH MỤC SẢN PHẨM</span>
            <div class="is-divider small"></div>

            <ul class="product-categories">
        <?php
        $queryShowCategory = "SELECT c.slug AS slug, c.title AS category_title, COUNT(p.id_product) AS product_count
        FROM category c
        LEFT JOIN products p ON c.id_category = p.id_category
        GROUP BY c.id_category, c.title";
        $resultShowCategory = mysqli_query($conn, $queryShowCategory);
        while ($rowCategory = mysqli_fetch_assoc($resultShowCategory)) {
            echo "<li class='cat-item'><a href='./".$rowCategory['slug'].".php'>".$rowCategory['category_title']."</a>
            <span class='count'>(".$rowCategory['product_count'].")</span></li><hr class='mt-2 mb-2'>";
        }
        ?>
            </ul>
        </div>
        <div class="col-9 products">
            <?php
            $queryShowProducts = "SELECT sp.id_product, sp.name_products, sp.price, sp.discount, sp.image, sp.entry_date, sp.id_category, sp.special_product, sp.views, sp.description, c.title as category_title, c.description as category_description, c.img as category_img 
            FROM products sp
            JOIN category c ON sp.id_category = c.id_category";
            $resultShow = mysqli_query($conn, $queryShowProducts);
            while ($row = mysqli_fetch_assoc($resultShow)) {
                echo "<div class='article-loop'>
            <div class='card'>
                <div class='container-card-products'>
                    <img src='./img/imgProducts" . $row['image'] . "' class='card-img-top' alt=''>
                    <div class='card-body'>
                    <a href='product_detail.php?product_detail=" . $row['id_product'] . "' class='text-decoration-none'>
                        <p class='card-category'>" . $row['category_title'] . "</p>
                        <p class='card-text name-products'>" . $row['name_products'] . "</p>
                        <div class='price d-flex align-items-center'>
                            <p class='discount text-decoration-line-through'>$" . $row['discount'] . "</p>&nbsp;
                            <span class='gia'>$" . $row['price'] . "</span>
                        </div>
                        </a>
                        <a href='product_detail.php?product_detail=" . $row['id_product'] . "' class='btn btn-outline-primary'>Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>";
            }
        ?>
        </div>
    </div>


    <?php footer() ?>

      

    <script src="./js/search.js"></script>
    <script src="./js/all_products.js"></script>
</body>

</html>