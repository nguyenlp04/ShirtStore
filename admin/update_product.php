<?php
include '../models/classes.php';
include "../layout.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
if (!isset($_SESSION['admin']) || $_SESSION['vai_tro'] === "user") {
    header("Location: ../index.php");
}
$updateSuccess = false;
$updateFailure = false;
if (isset($_POST['submit'])) {
    $change = new  UpdateHandler();
    $updateNews = $change->updateProduct();
}


if (isset($_GET['id_product'])) {
    $name_table = "products";
    $col_name = "id_product";
    $id_item = $_GET['id_product'];
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
    <title>Cập nhật bài đăng</title>
</head>
<body>
    <?php echo sidebarDashboar() ?>
    <section id="wrapper">
        <?php echo navDashboard() ?>

        <section class="p-4">
            <h2 class="  mb-3">Cập nhật sản phẩm</h2>
            <div class="alert alert-success" style="background-color: #5cb85c; display: <?php echo $updateSuccess ? 'block' : 'none'; ?>">
                <i class=" text-white fa-solid fa-circle-check"></i>&nbsp; <strong class="text-white">Cập nhật thành công!</strong>
            </div>
            <div class="alert alert-success bg-danger" style="display:<?php echo $updateFailure ? 'block' : 'none'; ?>">
                <i class="  text-white fa-solid fa-triangle-exclamation"></i>&nbsp; <strong class="text-white">Cập nhật thất bại!</strong>
            </div>
            <form  action="update_product.php?id_product=<?php echo $row['id_product']?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputGroupFile01">
                        <h4>Tên sản phẩm</h4>
                        <input type="hidden" name="id_product" value="<?php echo $row['id_product'] ?>">
                    </label>
                    <input value="<?php echo $row['name_products']?>" name="nameProduct" type="text" class="<?php echo $resultName ?> form-control" id="inputGroupFile01" placeholder="Tiêu đề">
                </div>
                <div class="form-group mb-3">
                    <label for="inputGroupFile02">
                        <h4>Hình ảnh</h4>
                    </label>
                    <input name="fileToUpload" type="file" class="form-control" id="inputGroupFile02">
                </div>
                <div class="form-group">
                    <label for="inputGroupFile03">
                        <h4>Giá</h4>
                    </label>
                    <input value="<?php echo $row['price']?>" name="priceProduct" type="number" step="0.01" class="<?php echo $resultPrice ?> form-control" id="inputGroupFile03" placeholder="Giá">
                </div>
                <div class="form-group">
                    <label for="inputGroupFile04 ">
                        <h4>Giảm giá</h4>
                    </label>
                    <input value="<?php echo $row['discount']?>" name="discountPriceProduct" step="0.01" type="number" class="<?php echo $resultDiscount ?> form-control" id="inputGroupFile04" placeholder="Giá">
                </div>
                <div class="form-group">
                    <label for="inputGroupFile05">
                        <h4>Ngày nhập</h4>
                    </label>
                    <input value="<?php echo $row['entry_date']?>" name="dateProduct" type="date" class="<?php echo $resultDate ?> form-control" id="inputGroupFile05" placeholder="Giá">
                </div>

                <div class="form-group">
                    <label for="inputGroupFile04">
                        <h4>Số lượng</h4>
                    </label>
                    <input value="<?php echo $row['quantity']?>" name="quantityPriceProduct" type="number" class="form-control" id="inputGroupFile04" placeholder="Số lượng">
                </div>

                <div class="form-group">
                    <label for="inputGroupFile06">
                        <h4>Danh mục</h4>
                    </label>
                    <select name='categoryProducts' id="inputGroupFile06" class="form-select" aria-label="Default select example">
                       <?php
                        $defaultCategory = $row['id_category'];
                        $query = "SELECT * FROM category";
                        $resultShow = mysqli_query($conn, $query);
                        while ($rowCategory = mysqli_fetch_assoc($resultShow)) {
                            $selected = ($rowCategory['id_category'] == $defaultCategory) ? 'selected' : '';
                            echo "<option value='" . $rowCategory['id_category'] . "' $selected>" . $rowCategory['title'] . "</option>";
                        }
                        ?>
                    </select>

                </div>
                <div class="form-group">
                    <h4>Mô tả</h4>
                    <textarea name="description" id="editor"><?php echo $row['description']?></textarea>
                </div>

                <input name="submit" type="submit" class="btn btn-primary" value="Thêm sản phẩm">

            </form>
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