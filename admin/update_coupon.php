<?php
include '../classes/classes.php';
 include "../layout.php";
if(!isset($_SESSION['admin']) || $_SESSION['vai_tro'] === "user"){
    header("Location: ../index.php");
} 
// ini_set('display_errors', 1); error_reporting(E_ALL);

$couponlAvailable = "";
$updateSuccess = false;
$updateFailure = false;
if (isset($_POST['addCoupon'])) {
    $update = new  UpdateHandler(); 
    $updateCoupon = $update->updateCoupon();  
}


if (isset($_GET['id_coupon'])) {
    $name_table = "coupons";
    $col_name = "id_coupon";
    $id_item = $_GET['id_coupon'];
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
    <title>Cập nhật mã giảm giá</title>
</head>

<body>
<?php echo sidebarDashboar() ?>

    <section id="wrapper">
    <?php echo navDashboard() ?>
    <section class="p-4">

<h2 class="  mb-3">Cập nhật giảm giá</h2>
<div class="alert alert-success " style="background-color: #5cb85c; display:<?php echo $updateSuccess ? 'block' : 'none'; ?>">
    <i class=" text-white fa-solid fa-circle-check"></i>&nbsp; <strong class="text-white">Cập nhật thành công!</strong>
</div>
<div class="alert alert-success bg-danger" style="display:<?php echo $updateFailure ? 'block' : 'none'; ?>">
    <i class="  text-white fa-solid fa-triangle-exclamation"></i>&nbsp; <strong class="text-white">Cập nhật thất bại!</strong>
</div>

    <div class="col-12">
        <form action="update_coupon.php?id_coupon=<?php echo $row['id_coupon']?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
            <div class="d-flex justify-content-between"><label class="m-0" for="form3Example1">
            <input type="hidden" name="id_coupon" value="<?php echo $row['id_coupon'] ?>">
                    <h4 class="m-0">Nhập mã giảm giá</h4>

                </label><?php echo $couponlAvailable ?></div>
                <input value="<?php echo $row['name_coupon'] ?>" name="code" type="text" id="form3Example1" placeholder="Nhập mã giảm giá" class="<?php echo $resultCode ?> form-control" />

            </div>
            <div class="form-group">
                <label class="m-0" for="form3Example2">
                    <h4 class="m-0">Số % giảm giá</h4>
                </label>
                <div class="d-flex justify-content-between"><?php  ?></div>
                <input value="<?php echo $row['discount_coupon'] ?>" name="discount" type="text" id="form3Example2" placeholder="Số % giảm giá" class="<?php echo $resultDiscount ?> form-control" />
            </div>
            <div class="form-group">
                <label class="m-0" for="form3Example5">
                    <h4 class="m-0">Ngày bắt đầu</h4>
                </label>
                <div class="d-flex justify-content-between"><?php  ?></div>
                <input value="<?php echo $row['start_date_coupon'] ?>" name="startDate" type="date" id="form3Example5" placeholder="" class="<?php echo $resultStartDate ?> form-control" />
            </div>
            <div class="form-group">
                <label class="m-0" for="form3Example4">
                    <h4 class="m-0">Ngày kết thúc</h4>
                </label>
                <div class="d-flex justify-content-between"><?php  ?></div>
                <input value="<?php echo $row['end_date_coupon'] ?>" name="endDate" type="date" id="form3Example4" placeholder="" class="<?php echo $resultEndDate ?> form-control" />
            </div>
            <div class="form-group">
                <label class="m-0" for="form3Example2">
                    <h4 class="m-0">Số lần sử dụng tối đa</h4>
                </label>
                <div class="d-flex justify-content-between"><?php  ?></div>
                <input value="<?php echo $row['max_uses_coupon'] ?>" name="uses" type="number" id="form3Example2" placeholder="Số lần sử dụng tối đa" class="<?php echo $resultUses ?> form-control" />
            </div>
            <div class="form-group">
                <label class="m-0" for="form3Example2">
                    <h4 class="m-0">Mô tả</h4>
                </label>
                <div class="d-flex justify-content-between"><?php  ?></div>
                <input value="<?php echo $row['description_coupon'] ?>" name="description" type="text" id="form3Example2" placeholder="Mô tả" class=" form-control" />
            </div>

            <input name="addCoupon" type="submit" class="btn btn-primary" value="Thêm mã giảm giá">
        </form>
    </div>

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