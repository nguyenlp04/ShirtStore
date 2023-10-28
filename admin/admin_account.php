<?php
include '../models/classes.php';
include "../layout.php";
if (!isset($_SESSION['admin']) || $_SESSION['vai_tro'] === "user") {
    header("Location: ../index.php");
}
ini_set('display_errors', 1);
error_reporting(E_ALL);
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
    // $fullname = $_POST["fullname"];
    // $email = $_POST["email"];
}


if (isset($_POST['submitChangePass'])) {
    $change = new  ChangeInfoHandler();
    $changePass = $change->changePass();
}

if (isset($_GET['id_customer'])) {
    $ma_kh = $_GET['id_customer'];
    $sql = "SELECT * FROM customer WHERE id_customer='$ma_kh'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy dữ liệu";
        exit;
    }
}


$sqlGetProfile = "SELECT * FROM customer WHERE username='$usernameProfile'";
$resultProfile = $conn->query($sqlGetProfile);
if ($resultProfile->num_rows > 0) {
    $row = $resultProfile->fetch_assoc();
} else {
    echo "Không tìm thấy dữ liệu";
    exit;
}








?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/post-new.css">
    <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
    <title>Tài khoản</title>

    <style>
        .nav-link.active {
            color: blue !important;
            background-color: white !important;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        .nav-link {
            padding: 10px !important;
        }

        #wrapper-admin {
            display: inline-block !important;
        }

        .nav-pills {
            background-color: #f7f7f7 !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            display: flex;
            justify-content: center;
        }

        .w-img {
            width: 60px !important;
        }

        #file-input {
            display: none;
        }


        .preview img {
            object-fit: cover;
        }

        .preview label {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php echo sidebarDashboar() ?>

    <section id="wrapper">
        <?php echo navDashboard() ?>
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


    </section>
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
    <script src="../js/main.js"></script>
</body>

</html>