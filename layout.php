<?php 
session_start();
include "config/config.php";
ini_set('display_errors', 1); error_reporting(E_ALL);
if(!isset($_SESSION['username'])){
    $rowGet['avatar'] = "";
} 
if(isset($_SESSION['username'])){
    $userLogin = $_SESSION['username'];
    $sql = "SELECT * FROM customer WHERE username='$userLogin'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $rowGet = $result->fetch_assoc();
        if ($rowGet['roles'] == 'admin') {
            $adminMenuItem = '<li><a class="dropdown-item" href="./admin/dashboard.php">Quản trị</a></li>';
        } else {
            $adminMenuItem = '';
        }
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
$totalProducts = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        $totalProducts += $product['quantity'];
    }
    $_SESSION['totalProducts'] =  $totalProducts;
}
function navDashboard(){
    global $rowGet;
    echo '<nav class="navbar navbar-expand-md">
    <div class="container-fluid mx-2">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#toggle-navbar" aria-controls="toggle-navbar" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="uil-bars text-white"></i>
            </button>
            <a class="navbar-brand" href="#"><img
                    src="" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="toggle-navbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-bell"></i><span>23</span></a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <div class="dropdown">
                        <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                            id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown"
                            aria-expanded="false">
                            <img src="../img/avatarUser'. $rowGet['avatar'].'" class="rounded-circle"
                                height="35" alt="Black and White Portrait of a Man" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end l"
                            aria-labelledby="navbarDropdownMenuAvatar">
                            <li>
                                <a class="dropdown-item" href="admin_account.php">Thông tin của tôi</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="admin_account.php">Cài đặt</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="../auth/log-out.php">Đăng xuất</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i data-show="show-side-navigation1" class="uil-bars show-side-btn"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>';
}
function sidebarDashboar(){
    global $rowGet;
    echo '<aside class="sidebar position-fixed top-0 left-0 overflow-auto h-100 float-left" id="show-side-navigation1">
    <i class="uil-bars close-aside d-md-none d-lg-none" data-close="show-side-navigation1"></i>
    <div class="sidebar-header d-flex justify-content-center align-items-center px-3 py-4">
        <a href="../index.php">
            <img class="rounded-pill img-fluid" width="65"
                src="../img/logo.png" alt="">
        </a>
    </div>
    <div class="text-light d-flex" style="padding: 0.7rem 1.75rem;">
        <div class="avatar" style="padding-right: 0.7rem">
            <img class="rounded-pill img-fluid" width="45"
            src="../img/avatarUser' . $rowGet['avatar'] . '" alt="">
        </div>
        <div class="info">
            <p class="m-0">' . $rowGet['fullname'] . '</p>
            <span class="text-white-50">' . $rowGet['roles'] . '</span>
        </div>
    </div>
    <ul class="categories list-unstyled">
        <li class="">
            <i class="uil-estate fa-fw "></i><a href="dashboard.php">Dashboard</a>
        </li>
        <li class="has-dropdown">
            <i class="uil uil-edit"></i><a href="#">Bài đăng</a>
            <ul class="sidebar-dropdown list-unstyled">
                <li><a href="list_news.php">Tất cả bài đăng</a></li>
                <li><a href="add_news.php">Thêm mới</a></li>
              </ul>
        </li>
        <li class="">
            <i class="uil uil-comment-alt"></i><a href="list_comments.php">Bình luận</a>
        </li>
        <li class="has-dropdown">
            <i class="uil uil-archive"></i></i><a href="#">Sản phẩm</a>
            <ul class="sidebar-dropdown list-unstyled">
                <li><a href="list_product.php">Tất cả sản phẩm</a></li>
                <li><a href="add_product.php">Thêm mới</a></li>
                <li><a href="add_categorys.php">Danh mục</a></li>
              </ul>
            </li>
        <li class="has-dropdown">
            <i class="uil uil-user"></i><a href="#">Người dùng</a>
            <ul class="sidebar-dropdown list-unstyled">
                <li><a href="list_user.php">Tất cả người dùng</a></li>
                <li><a href="add_user.php">Thêm người dùng</a></li>
              </ul>
        </li>
        <li class="has-dropdown">
        <i class="uil uil-pricetag-alt"></i><a href="#">Mã giảm giá</a>
            <ul class="sidebar-dropdown list-unstyled">
                <li><a href="list_coupons.php">Tất cả mã giảm giá</a></li>
                <li><a href="add_coupons.php">Thêm mã giảm giá</a></li>
              </ul>
        </li>
        <li class="">
        <i class="uil uil-box"></i><a href="order.php">Đơn hàng</a>
        </li>
        <li class="">
            <i class="uil-setting"></i><a href="admin_account.php">Cài đặt</a>
        </li>
    </ul>
    </aside>';
}
function menu() {
    global $hiddenLogin, $hiddenUser, $rowGet, $adminMenuItem, $totalProducts, $conn;
    echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="index.php">
                    <img src="./img/logo.png" height="45" alt="MDB Logo" loading="lazy" />
                </a>
            </div>
            <form class="" role="search">
                <div style="position: relative">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search-input">
                    <div style="position: absolute; top: 40px; width: 100%; z-index: 999;">
                        <ul class="list-product me-2" id="product-list"> ';
                           
                            $query = "SELECT * FROM products";
                            $resultShow = mysqli_query($conn, $query);
                            while ($rowProduct = mysqli_fetch_assoc($resultShow)) {
                                echo '
                                <li class="product">
                                <a class="m-0 p-0 d-flex text-decoration-none" style="color: unset" href="./product_detail.php?product_detail='.$rowProduct['id_product'].'">
                                <img src="./img/imgProducts'.$rowProduct['image'].'" alt="">
                                <p class="name-product m-0">'.$rowProduct['name_products'].'</p>
                                <p class="price-product m-0"><b>$'.$rowProduct['price'].'</b></p>
                                </a>
                                </li>';
                            }
                       echo ' </ul>
                    </div>
                </div>
            </form>
            <!-- Collapsible wrapper -->
            <div class="group-login align-items-center" style="display: ' . $hiddenLogin . '">
            <a class="btn btn-primary me-2" href="auth/login.php" role="button">Đăng Nhập</a>
            <a class="btn btn-primary" href="auth/sign-up.php" role="button">Đăng Ký</a>
            </div>
            <!-- Right elements -->
            <div class="group-login align-items-center" style="display: ' . $hiddenUser . '">
                <!-- Icon -->
                <a class="text-reset me-3" href="cart.php">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">'.$totalProducts.'</span>
                </a>
                <!-- Notifications -->
                <div class="dropdown">
                    <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="" id="navbarDropdownMenuLink"
                        role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">3</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="#">Đang cập nhật</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Đang cập nhật</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Đang cập nhật</a>
                        </li>
                    </ul>
                </div>
                <!-- Avatar -->
                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                        id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <img src="./img/avatarUser' . $rowGet['avatar'] . '" class="rounded-circle" height="35"
                            alt="Black and White Portrait of a Man" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                    '.  $adminMenuItem.'
                        <li>
                            <a class="dropdown-item" href="user/profile_user.php">Thông tin của tôi</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Cài đặt</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="./auth/log-out.php">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <hr>
    <ul class="d-flex justify-content-xxl-center nav nav-item-menu">
        <li class="nav-item">
            <a class="nav-link " href="index.php">Trang chủ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="all-products.php">Tất cả sản phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="category.php?id_category=13">Áo thun</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="category.php?id_category=14">Áo hoodie</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="category.php?id_category=15">Áo thun in hình</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="return.php">Chính sách hoàn trả</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="shipping.php">Chính sách vận chuyển</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contact.php">Liên hệ chúng tôi</a>
        </li>
    </ul>';
} 
function footer(){
    echo '<footer class="text-center text-lg-start text-muted">
    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3 ">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>NguyenLP
                    </h6>
                    <p>
                    Mặt tiền cửa hàng của chúng tôi mang đến một môi trường thân thiện và đầy cảm hứng để khách hàng khám phá bộ sưu tập áp phích phong phú của chúng tôi.
                    </p>
                </div>
                <!-- Grid column -->
                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Products
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">T-Shirt</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Áo hoodie</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Graphic</a>
                    </p>
                </div>
                <!-- Grid column -->
                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Useful links
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Pricing</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Settings</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Orders</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Help</a>
                    </p>
                </div>
                <!-- Grid column -->
                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="fas fa-home me-3"></i> Gio Linh, Quảng Trị</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        admin@nguyenlp.id.vn
                    </p>
                    <p><i class="fas fa-phone me-3"></i> +8439 953 3018</p>
                    <p><i class="fas fa-print me-3"></i> +8476 363 6353</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->
    <!-- Copyright -->
    <div class="text-center p-4">
        © 2023 Copyright:
        <a class="text-reset fw-bold" href="https://nguyenlp.id.vn">NguyenLP Store</a>
        - All rights reserved
    </div>
    <!-- Copyright -->
    </footer>';
}
?>
