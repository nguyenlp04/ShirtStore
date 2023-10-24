<?php
include './classes/classes.php';
include "./config/config.php";
include "layout.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
if (isset($_SESSION['username'])) {
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
} else {
    $hiddenLogin = "flex";
    $hiddenUser = "none";
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="shortcut icon" href="./img/favicon/favicon.ico" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/search.css">
    <link rel="stylesheet" href="./css/all_products.css">
    <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php menu() ?>
    <section>
        <div id="carouselExampleAutoplaying" class="carousel slide w-100 m-auto" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./img/banner.png" class="d-block w-100" alt="./img/banner.png">
                </div>
                <div class="carousel-item">
                    <img src="./img/banner.png" class="d-block w-100" alt="./img/banner.png">
                </div>
                <div class="carousel-item">
                    <img src="./img/banner.png" class="d-block w-100" alt="./img/banner.png">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container text-center title-container">
            <h2 class="background"><span>Sản Phẩm Mới Nhất</span></h2>
        </div>
        <div id="carouselExampleControls" class="products-new carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $queryShowProducts = "SELECT sp.id_product  , sp.name_products, sp.price, sp.discount, sp.image, sp.entry_date, sp.id_category, sp.special_product, sp.views, sp.description, c.title as category_title, c.description as category_description, c.img as category_img 
                            FROM products sp
                            JOIN category c ON sp.id_category = c.id_category
                            ORDER BY sp.entry_date DESC
                            LIMIT 8";
                $resultShowProducts = mysqli_query($conn, $queryShowProducts);
                $products = array();
                while ($rowProducts = mysqli_fetch_assoc($resultShowProducts)) {
                    $products[] = $rowProducts;
                }
                $chunks = array_chunk($products, 4);
                foreach ($chunks as $key => $chunk) {
                    echo "<div class='carousel-item" . ($key === 0 ? " active" : "") . "'>";
                    echo "    <div class='card-wrapper container-sm d-flex justify-content-around'>";
                    foreach ($chunk as $product) {
                        echo "<div class='container-card-products'>";
                        echo "    <div class='card' style='width: 18rem;'>";
                        echo "        <img src='./img/imgProducts/" . $product['image'] . "' class='card-img-top' alt=''>";
                        echo "        <div class='card-body'>";
                        echo "          <a href='product_detail.php?product_detail=" . $product['id_product'] . "' class='text-decoration-none'>";
                        echo "            <p class='card-category'>" . $product['category_title'] . "</p>";
                        echo "            <p class='card-text name-products'>" . $product['name_products'] . "</p>";
                        echo "            <div class='price d-flex align-items-center'> <p class='discount text-decoration-line-through'>$" . $product['price'] . "</p>&nbsp;<span class='gia'>$" . $product['discount'] . "</span></div>";
                        echo "              </a>";
                        echo "            <a href='product_detail.php?product_detail=" . $product['id_product'] . "' class='btn btn-outline-primary'>Thêm vào giỏ hàng</a>";
                        echo "        </div>";
                        echo "    </div>";
                        echo "</div>";
                    }
                    echo "    </div>";
                    echo "</div>";
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Trước</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Tiếp theo</span>
            </button>
        </div>
        <button type="button" class="btn-all-products m-auto d-flex justify-content-center btn btn-primary btn-sm fw-bold p-2">
            <a class="text-white text-decoration-none" href="all-products.php">Xem tất cả sản phẩm</a>
        </button>
        <div class="about-us d-flex align-items-xl-center">
            <div class="content">
                <div class="title">
                    <h2>Về chúng tôi</h2>
                </div>
                <div class="description">
                    <p>Mặt tiền cửa hàng của chúng tôi mang đến một môi trường thân thiện và đầy cảm hứng để khách hàng khám phá bộ sưu tập áp phích phong phú của chúng tôi. 
                        Từ phong cảnh ngoạn mục và cảnh quan thành phố quyến rũ đến tác phẩm nghệ thuật độc đáo và thiết kế kích thích tư duy, 
                        chúng tôi cung cấp nhiều lựa chọn đa dạng để phù hợp với nhiều sở thích và phong cách khác nhau.
                        Đội ngũ nhân viên am hiểu và thân thiện của chúng tôi luôn sẵn sàng hỗ trợ khách hàng tìm kiếm sản phẩm hoàn hảo hoặc trả lời bất kỳ câu hỏi nào họ có thể có.
                    </p>
                </div>
                <button type="button" class="btn btn-outline-light border-2">ĐỌC THÊM</button>
            </div>
            <div class="img"><img src="./img/banner-about-us.jpeg" alt=""></div>
        </div>
        <div class="bestsellers">
            <div class="container text-center title-container">
                <h2 class="background"><span>KHÁM PHÁ DANH MỤC CỦA CHÚNG TÔI</span></h2>
            </div>
            <div class=" card-wrapper container-sm d-flex  justify-content-around">
                <?php
                $categoryCounter = 0;
                $render = new  RenderHandler();
                $renderComments = $render->renderTableData("category");
                foreach ($renderComments as $rowCategory) {
                    if ($categoryCounter >= 4) {
                        break;
                    }
                    echo "<div class='col-3 container-card-products'>";
                    echo "    <div class='card text-center' style='width: 18rem;'>";
                    echo "        <img src='./img/imgCategory" . $rowCategory['img'] . "' class='card-img-top' alt=''>";
                    echo "        <div class='card-body'>";
                    echo "            <h4 class='d-flex justify-content-center card-title'>" . $rowCategory['title'] . "</h4>";
                    echo "        </div>";
                    echo "    </div>";
                    echo "</div>";
                    $categoryCounter++;
                }
                ?>
            </div>
            <button type="button" class="m-auto d-flex justify-content-center btn btn-primary btn-sm fw-bold p-2">
                <a class="text-white text-decoration-none" href="">Xem tất cả sản phẩm</a>
            </button>
        </div>

        <div class="container text-center title-container">
            <h2 class="background"><span>Sản Phẩm Bán Chạy</span></h2>
        </div>
        <div id="carouselExampleControls1" class="products-new carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $queryShowProducts = "SELECT sp.id_product  , sp.name_products, sp.price, sp.discount, sp.image, sp.entry_date, sp.id_category, sp.special_product, sp.views, sp.description, c.title as category_title, c.description as category_description, c.img as category_img 
                            FROM products sp
                            JOIN category c ON sp.id_category = c.id_category
                            ORDER BY sp.views DESC
                            LIMIT 8";
                $resultShowProducts = mysqli_query($conn, $queryShowProducts);
                $products = array();
                while ($rowProducts = mysqli_fetch_assoc($resultShowProducts)) {
                    $products[] = $rowProducts;
                }
                $chunks = array_chunk($products, 4);
                foreach ($chunks as $key => $chunk) {
                    echo "<div class='carousel-item" . ($key === 0 ? " active" : "") . "'>";
                    echo "    <div class='card-wrapper container-sm d-flex justify-content-around'>";
                    foreach ($chunk as $product) {
                        echo "<div class='container-card-products'>";
                        echo "    <div class='card' style='width: 18rem;'>";
                        echo "        <img src='./img/imgProducts/" . $product['image'] . "' class='card-img-top' alt=''>";
                        echo "        <div class='card-body'>";
                        echo "          <a href='product_detail.php?product_detail=" . $product['id_product'] . "' class='text-decoration-none'>";
                        echo "            <p class='card-category'>" . $product['category_title'] . "</p>";
                        echo "            <p class='card-text name-products'>" . $product['name_products'] . "</p>";
                        echo "            <div class='price d-flex align-items-center'> <p class='discount text-decoration-line-through'>$" . $product['price'] . "</p>&nbsp;<span class='gia'>$" . $product['discount'] . "</span></div>";
                        echo "              </a>";
                        echo "            <a href='product_detail.php?product_detail=" . $product['id_product'] . "' class='btn btn-outline-primary'>Thêm vào giỏ hàng</a>";
                        echo "        </div>";
                        echo "    </div>";
                        echo "</div>";
                    }
                    echo "    </div>";
                    echo "</div>";
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Trước</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Tiếp theo</span>
            </button>
        </div>
        <button type="button" class="btn-all-products m-auto d-flex justify-content-center btn btn-primary btn-sm fw-bold p-2">
            <a class="text-white text-decoration-none" href="all-products.php">Xem tất cả sản phẩm</a>
        </button>





        <!-- <div class="policy">
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <div class="container-card-policy">
                            <img src="./img/ship.png" style="width: 150px;" class="card-img-top" alt="./img/ship.png">
                            <h4 class="title-policy">FREESHIPPING FOR ALL ORDERS OVER $100</h4>
                            <p class="text-policy">When you place an order over $100, we’ll give you a 10% discount
                                and freeshipping!</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="container-card-policy">
                            <img src="./img/order.png" style="width: 150px;" class="card-img-top" alt="./img/order.png">
                            <h4 class="title-policy">SECURE AND EASY CHECKOUT</h4>
                            <p class="text-policy">Your payment information is secured by trusted payment gateways!
                                You can use your credit card to pay without payment gateways accounts!
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="container-card-policy">
                            <img src="./img/return.png" style="width: 150px;" class="card-img-top" alt="./img/return.png">
                            <h4 class="title-policy">RETURN AND REFUND</h4>
                            <p class="text-policy">Free return and refund within 30 days!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <section class="news">
            <div class="wrapper m-0">
                <div class="container text-center title-container">
                    <h2 class="background"><span>Tin Tức</>
                    </h2>
                </div>
                <div class="row ">
                    <?php
                    $categoryCounter = 0;
                    $render = new  RenderHandler();
                    $renderNews = $render->renderJoinedData("customer", "news", "id_customer");
                    foreach ($renderNews as $row) {
                        if ($categoryCounter >= 4) {
                            break;
                        }
                        echo "<div class='col-md-3'>";
                        echo "    <div class='card shadow-sm'>";
                        echo "        <img src='./img/imgPost/" . $row['img'] . "' />";
                        echo "        <div class='card-body'>";
                        echo "    <a href='./news_detail.php?news_detail=" . $row['id_news'] . "' class='text-decoration-none' style='color: unset'>";

                        echo "            <h5 class='title-post'>" . $row['title'] . "</h5>";
                        echo "            <div class='description-post text-justify'>" . $row['description'] . "</div>";
                        echo "    </a>";

                        echo "        </div>";
                        echo "        <div class='card-footer '>";
                        echo "            <div class='userPost'>";
                        echo "                <div class='information d-flex align-items-center'>";
                        echo "                    <img class='me-3 rounded-circle img-user-post' src='./img/avatarUser" . $row['avatar'] . "' alt=''>";
                        echo '                    <div class="name-date-post">';
                        echo "                        <h5 class='m-0 '>" . $row['author'] . "</h5>";
                        echo "                        <span>" . $row['date'] . "</span>";
                        echo "                    </div>";
                        echo "                </div>";
                        echo "            </div>";
                        echo "        </div>";
                        echo "    </div>";
                        echo "</div>";
                        $categoryCounter++;
                    }
                    ?>
                </div>
            </div>
            <button type="button" class="btn-all-products m-auto d-flex justify-content-center btn btn-primary btn-sm fw-bold p-2">
                <a class="text-white text-decoration-none" href="">Xem tất cả </a>
            </button>
        </section>
        <!-- review  -->
        <div class="review">
            <div class="container text-center title-container">
                <h2 class="background"><span>Đánh giá của khách hàng</span></h2>
            </div>

            <div class="text-center d-flex justify-content-center align-items-center">
                <div class="ratings">
                    <i class="fa fa-star rating-color"></i>
                    <i class="fa fa-star rating-color"></i>
                    <i class="fa fa-star rating-color"></i>
                    <i class="fa fa-star rating-color"></i>
                    <i class="fa fa-star rating-color"></i>
                    <h5 class="review-count">Từ 12 đánh giá</h5>
                </div>
            </div>
            <div id="carouselExampleControls2" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card-wrapper container-sm d-flex  justify-content-evenly">
                            <div class="card text-center" style="width: 18rem;">
                                <div class="ratings">
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Shannon J.</h5>
                                    <p class="description">My husband loves his camo three d shirt with his name down
                                        the sleeve. Great Christmas gift.</p>
                                    <p>Heather H.</p>
                                    <p>01/01/2023</p>
                                </div>
                            </div>
                            <div class="card text-center" style="width: 18rem;">
                                <div class="ratings">
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>

                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Shannon J.</h5>
                                    <p class="description">My husband loves his camo three d shirt with his name down
                                        the sleeve. Great Christmas gift.</p>
                                    <p>Heather H.</p>
                                    <p>01/01/2023</p>
                                </div>
                            </div>
                            <div class="card text-center" style="width: 18rem;">
                                <div class="ratings">
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Shannon J.</h5>
                                    <p class="description">My husband loves his camo three d shirt with his name down
                                        the sleeve. Great Christmas gift.</p>
                                    <p>Heather H.</p>
                                    <p>01/01/2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card-wrapper container-sm d-flex  justify-content-evenly">
                            <div class="card   text-center" style="width: 18rem;">
                                <div class="ratings">
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Shannon J.</h5>
                                    <p class="description">My husband loves his camo three d shirt with his name down
                                        the sleeve. Great Christmas gift.</p>
                                    <p>Heather H.</p>
                                    <p>01/01/2023</p>
                                </div>
                            </div>
                            <div class="card text-center" style="width: 18rem;">
                                <div class="ratings">
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Shannon J.</h5>
                                    <p class="description">My husband loves his camo three d shirt with his name down
                                        the sleeve. Great Christmas gift.</p>
                                    <p>Heather H.</p>
                                    <p>01/01/2023</p>
                                </div>
                            </div>
                            <div class="card text-center" style="width: 18rem;">
                                <div class="ratings">
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Shannon J.</h5>
                                    <p class="description">My husband loves his camo three d shirt with his name down
                                        the sleeve. Great Christmas gift.</p>
                                    <p>Heather H.</p>
                                    <p>01/01/2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card-wrapper container-sm d-flex  justify-content-evenly">
                            <div class="card  text-center" style="width: 18rem;">
                                <div class="ratings">
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Shannon J.</h5>
                                    <p class="description">My husband loves his camo three d shirt with his name down
                                        the sleeve. Great Christmas gift.</p>
                                    <p>Heather H.</p>
                                    <p>01/01/2023</p>
                                </div>
                            </div>
                            <div class="card text-center" style="width: 18rem;">
                                <div class="ratings">
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Shannon J.</h5>
                                    <p class="description">My husband loves his camo three d shirt with his name down
                                        the sleeve. Great Christmas gift.</p>
                                    <p>Heather H.</p>
                                    <p>01/01/2023</p>
                                </div>
                            </div>
                            <div class="card text-center" style="width: 18rem;">
                                <div class="ratings">
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Shannon J.</h5>
                                    <p class="description">My husband loves his camo three d shirt with his name down
                                        the sleeve. Great Christmas gift.</p>
                                    <p>Heather H.</p>
                                    <p>01/01/2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- end review  -->
            <!-- Footer -->
            <?php footer() ?>
            <!-- Footer -->
    </section>

    <script src="./js/search.js"></script>
    <script src="./js/main.js"></script>
</body>

</html>