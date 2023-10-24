<?php
include '../classes/classes.php';
 include "../layout.php";
if(!isset($_SESSION['admin']) || $_SESSION['vai_tro'] === "user"){
    header("Location: ../index.php");
} 
// ini_set('display_errors', 1); error_reporting(E_ALL);

$resultUser = "";
$resultPass = "";
$resultCfPass = "";
$userAvailable = "";
$emailAvailable = "";
$warningEmail = "";
$addSuccess = false;
$addFailure = false;
if (isset($_POST['submit'])) {
    $change = new  UpdateHandler(); 
    $updateUser = $change->updateUser();  
}


if (isset($_GET['id_customer'])) {
    $name_table = "customer";
    $col_name = "id_customer";
    $id_item = $_GET['id_customer'];
    $render = new  RenderHandler(); 
    $row = $render->renderInputValues($name_table, $col_name, $id_item);  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../css/post-new.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
    <title>Cập nhật người dùng</title>
</head>

<body>
<?php echo sidebarDashboar() ?>

    <section id="wrapper">
    <?php echo navDashboard() ?>
        <section class="p-4">
            <h2>Cập nhật </h2>
            <div class="alert alert-success bg-danger" style="display:<?php echo $addFailure ? 'block' : 'none';?>">
                            <i class="  text-white fa-solid fa-triangle-exclamation"></i>&nbsp; <strong class="text-white">Cập nhật thất bại!</strong>
                        </div>
            <div class="alert alert-success" style="background-color: #5cb85c; display: <?php echo $addSuccess ? 'block' : 'none'; ?>">
                <i class=" text-white fa-solid fa-circle-check"></i>&nbsp; <strong class="text-white">Cập nhật thành
                    công!</strong>
            </div>
            <form  action="update_user.php?id_customer=<?php echo $row['id_customer']?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="form3Example1">
                        <h4>Họ và tên</h4>
                    </label>
                    <input type="hidden" name="id_customer" value="<?php echo $row['id_customer'] ?>">

                    <input value="<?php echo $row['fullname']?>" name="fullname" type="text" id="form3Example1"
                        placeholder="Full name" class="form-control" />
                </div>
                <div class="form-group">

                    <label for="form3Example2">
                        <h4>Username</h4>
                    </label>
                    <div class="d-flex justify-content-between"><?php echo $userAvailable ?></div>
                    <input value="<?php echo $row['username']?>" name="" type="text" id="form3Example2"
                        placeholder="Username" class="<?php echo $resultUser ?> form-control" disabled />
                        <input value="<?php echo $row['username']?>" name="username" type="hidden" id="form3Example2"
                        placeholder="Username" class="<?php echo $resultUser ?> form-control" />
                </div>

                <div class="form-group">
                    <label for="form3Example4">
                        <h4>Mật khẩu</h4>
                    </label>
                    <input value="<?php echo $row['password']?>" name="password" type="password" id="form3Example4"
                        placeholder="Password" class="<?php echo $resultPass ?> form-control" />
                </div>


                <div class="form-group">

                <div class="d-flex justify-content-between"><label class="form-label text-dark m-0" for="form3Example3">Địa chỉ email</label><?php echo $emailAvailable ?></div>
                    <!-- <label for="form3Example3">
                        <h4>Email</h4>
                    </label> -->
                    <input value="<?php echo $row['email']?>" name="email" type="email" id="form3Example3"
                        placeholder="Email address" class="<?php echo $warningEmail ?> form-control" />
                </div>
                <div class="form-group mb-3">
                    <label for="form3Example5">
                        <h4>Avatar</h4>
                    </label>
                    <input value="" name="fileToUpload" type="file" class="form-control" id="form3Example5">
                </div>
                <div class="form-group">
                    <label for="form3Example6">
                        <h4>Vai trò</h4>
                    </label>
                    <select id="form3Example6" name="vaitro" class="form-select" aria-label="Default select example">
                        <option selected value="admin">Administrator</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <input name="submit" type="submit" class="btn btn-primary" value="Cập nhật">
            </form>
            <!-- <h4 class="mt-2" >Thêm thành công</h4> -->
        </section>




    </section>
    <script>
    ClassicEditor
        .create(document.querySelector('#editor'))
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/super-build/ckeditor.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>