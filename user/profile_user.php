<?php
include '../models/classes.php';
include "../layout.php";

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
if (!isset($_SESSION['username'])) {
    $row['avatar'] = "";
}
$resultFullname = "";
$resultPass = "";
$resultCfPass = "";
$changeInfoSuccess = false;
$changeInfoFailure = false;
$changePassSuccess = false;
$changePassFailure = false;
$usernameProfile = $_SESSION['username'];
$user = $usernameProfile;

if (isset($_POST['submit'])) {
    $change = new  ChangeInfoHandler();
    $changeInfo = $change->changeInfo();
}

if (isset($_POST['submitChangePass'])) {
    $change = new  ChangeInfoHandler();
    $changePass = $change->changePass();
}



if (isset($_SESSION['username'])) {
    $userLogin = $_SESSION['username'];
    $sql = "SELECT * FROM customer WHERE username='$userLogin'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['roles'] == 'admin') {
            $adminMenuItem = '<li><a class="dropdown-item" href="../admin/dashboard.php">Quản trị</a></li>';
        } else {
            $adminMenuItem = '';
        }
    } else {
        echo "Không tìm thấy dữ liệu";
        exit;
    }
} 
if (!isset($_SESSION['totalProducts'])) {
    $_SESSION['totalProducts'] = 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản</title>
    <link rel="stylesheet" href="../css/post-new.css">
    <link rel="stylesheet" href="../css/search.css">
    <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="../index.php">
                    <img src="../img/logo.png" height="45" alt="MDB Logo" loading="lazy" />
                </a>
            </div>
            <form class="" role="search">
                <div style="position: relative">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search-input">
                    <div style="position: absolute; top: 40px; width: 100%; z-index: 999;">
                        <ul class="list-product me-2" id="product-list">
                            <?php 
                            $query = "SELECT * FROM products";
                            $resultShow = mysqli_query($conn, $query);
                            while ($rowProduct = mysqli_fetch_assoc($resultShow)) {
                                echo '
                                <li class="product">
                                <a class="m-0 p-0 d-flex text-decoration-none" style="color: unset" href="../product_detail.php?product_detail='.$rowProduct['id_product'].'">
                                <img src="../img/imgProducts'.$rowProduct['image'].'" alt="">
                                <p class="name-product m-0">'.$rowProduct['name_products'].'</p>
                                <p class="price-product m-0"><b>$'.$rowProduct['price'].'</b></p>
                                </a>
                                </li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </form>
            <!-- Collapsible wrapper -->
            <!-- Right elements -->
            <div class="group-login align-items-center" style="display: <?php echo $hiddenUser ?>">
                <!-- Icon -->
                <a class="text-reset me-3" href="../cart.php">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge rounded-pill badge-notification bg-danger"><?php echo $_SESSION['totalProducts'] ?></span>
                </a>
                <!-- Notifications -->
                <div class="dropdown">
                    <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
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
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <img src="../img/avatarUser<?php echo $row['avatar'] ?>" class="rounded-circle" height="35" alt="Black and White Portrait of a Man" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <?php echo $adminMenuItem ?>
                        <li>
                            <a class="dropdown-item" href="#">My profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../auth/log-out.php">Logout</a>
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
            <a class="nav-link " href="../index.php">Trang chủ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../all-products.php">Tất cả sản phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../category.php?id_category=13">Áo thun</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../category.php?id_category=14">Áo hoodie</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../category.php?id_category=15">Áo thun in hình</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../return.php">Chính sách hoàn trả</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../shipping.php">Chính sách vận chuyển</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../contact.php">Liên hệ chúng tôi</a>
        </li>
    </ul>'
    <section id="wrapper-admin" class="p-4 w-100">
        <!-- tab-pills -->
        <div class="container d-flex justify-content-center ">
            <div class="row d-block">
                <h2>Tài khoản </h2>
                <div class="col-12 ">
                    <ul class="nav nav-pills rounded-2">
                        <li class="nav-item "><a href="#tab2-1" class="nav-link active " data-toggle='tab'>Thông tin</a></li>
                        <li class="nav-item"><a href="#tab2-2" class="nav-link" data-toggle='tab'>Mật khẩu</a></li>
                        <li class="nav-item"><a href="#tab2-3" class="nav-link" data-toggle='tab'>Đang cập nhật</a></li>
                        <li class="nav-item"><a href="#tab2-4" class="nav-link" data-toggle='tab'>Đang cập nhật</a></li>
                        <li class="nav-item"><a href="#tab2-5" class="nav-link" data-toggle='tab'>Đang cập nhật</a></li>
                        <li class="nav-item"><a href="#tab2-6" class="nav-link" data-toggle='tab'>Đang cập nhật</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- tab 1 -->
                        <div class="tab-pane  mt-5 fade show active" id='tab2-1'>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
                                            <div class="form-group ">
                                                <div class="information d-flex align-items-center">
                                                    <div class="preview">
                                                        <label for="file-input"><img class="me-3 rounded-circle w-img" id="img-preview" src="../img/avatarUser<?php echo $row['avatar'] ?>" /></label>
                                                        <input accept="image/*" type="file" id="file-input" name="fileToUpload" />
                                                    </div>
                                                    <!-- <img class="me-3 rounded-circle w-img" src="../img/avatarUser<?php echo $row['avatar'] ?>" alt=""> -->
                                                    <div class="name">
                                                        <h5 class="m-0 "><?php echo $row['fullname'] ?></h5>
                                                        <span><?php echo $row['roles'] ?></span>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id_customer" value="<?php echo $row['id_customer'] ?>">
                                            </div>
                                            <div class="alert alert-success" style="background-color: #5cb85c; display: <?php echo $changeInfoSuccess ? 'block' : 'none'; ?>">
                                                <i class=" text-white fa-solid fa-circle-check"></i>&nbsp; <strong class="text-white">Cập nhật thành công!</strong>
                                            </div>
                                            <div class="alert alert-success bg-danger" style="display:<?php echo $changeInfoFailure ? 'block' : 'none'; ?>">
                                                <i class="  text-white fa-solid fa-triangle-exclamation"></i>&nbsp; <strong class="text-white">Cập nhật thất bại!</strong>
                                            </div>
                                            <div class="form-group">
                                                <label class="m-0" for="form3Example1">
                                                    <h4 class="m-0">Họ và tên</h4>
                                                </label>
                                                <input value="<?php echo $row['fullname']; ?>" name="fullname" type="text" id="form3Example1" placeholder="Full name" class="<?php echo $resultFullname ?> form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label class="m-0" for="form3Example2">
                                                    <h4 class="m-0">Username</h4>
                                                </label>
                                                <div class="d-flex justify-content-between"></div>
                                                <input value="<?php echo $row['username'] ?>" name="username" type="text" id="form3Example2" placeholder="Username" class="form-control" disabled />
                                            </div>
                                            <div class="form-group">
                                                <label class="m-0" for="form3Example3">
                                                    <h4 class="m-0">Email</h4>
                                                </label>
                                                <input value="<?php echo $row['email'] ?>" name="email" type="email" id="form3Example3" placeholder="Email address" class="<?php echo $resultEmail ?> form-control" />
                                            </div>
                                            <input name="submit" type="submit" class="btn btn-primary" value="Cập nhật">
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end tab 1 -->
                        <!-- tab 2 -->
                        <div class="tab-pane  mt-5 fade show " id='tab2-2'>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
                                            <div class="alert alert-success" style="background-color: #5cb85c; display: <?php echo $changePassSuccess ? 'block' : 'none'; ?>">
                                                <i class=" text-white fa-solid fa-circle-check"></i>&nbsp; <strong class="text-white">Cập nhật thành công!</strong>
                                            </div>
                                            <div class="alert alert-success bg-danger" style="display:<?php echo $changePassFailure ? 'block' : 'none'; ?>">
                                                <i class="  text-white fa-solid fa-triangle-exclamation"></i>&nbsp; <strong class="text-white">Cập nhật thất bại!</strong>
                                            </div>
                                            <div class="form-group">
                                                <label class="m-0" for="form3Example1">

                                                    <h4 class="m-0">Mật khẩu cũ</h4>

                                                </label>
                                                <input value="" name="pass" type="password" id="form3Example1" placeholder="Mật khẩu cũ" class="<?php echo $resultPass ?> form-control" />

                                            </div>
                                            <div class="form-group">
                                                <label class="m-0" for="form3Example2">
                                                    <h4 class="m-0">Mật khẩu mới</h4>
                                                </label>
                                                <div class="d-flex justify-content-between"></div>
                                                <input value="" name="passNew" type="password" id="form3Example2" placeholder="Mật khẩu mới" class="<?php echo $resultCfPass ?> form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label class="m-0" for="form3Example3">
                                                    <h4 class="m-0">Xác nhận mật khẩu mới</h4>
                                                </label>
                                                <input value="" name="cfpassNew" type="password" id="form3Example3" placeholder="Xác nhận mật khẩu mới" class="<?php echo $resultCfPass ?> form-control" />
                                            </div>
                                            <input name="submitChangePass" type="submit" class="btn btn-primary" value="Đặt lại mật khẩu">
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end tab 2 -->
                        <!-- tab 3  -->
                        <div class="tab-pane text-center mt-3 fade show" id='tab2-3'>
                            <span>Đang cập nhật</span>
                        </div>
                        <!-- end tab 3 -->
                        <div class="tab-pane text-center mt-3 fade show" id='tab2-3'><span>Đang cập nhật</span></div>
                        <div class="tab-pane text-center mt-3 fade show" id='tab2-4'><span>Đang cập nhật</span></div>
                        <div class="tab-pane text-center mt-3 fade show" id='tab2-5'><span>Đang cập nhật</span></div>
                        <div class="tab-pane text-center mt-3 fade show" id='tab2-6'><span>Đang cập nhật</span></div>
                    </div>

                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </section>





    <footer class="text-center text-lg-start text-muted">
        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3 ">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Company name
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
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
                            <a href="#!" class="text-reset">Angular</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">React</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Vue</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Laravel</a>
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
                        <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
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
    </footer>
    <script>
        const input = document.getElementById('file-input');
        const image = document.getElementById('img-preview');

        input.addEventListener('change', (e) => {
            if (e.target.files.length) {
                const src = URL.createObjectURL(e.target.files[0]);
                image.src = src;
            }
        });
    </script>
    <script src="../js/search.js"></script>
</body>

</html>