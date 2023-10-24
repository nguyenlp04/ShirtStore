<?php
include "../layout.php";
include '../classes/classes.php';
if (!isset($_SESSION['admin']) || $_SESSION['vai_tro'] === "user") {
    header("Location: ../index.php");
}
ini_set('display_errors', 1);
error_reporting(E_ALL);
$addSuccess = false;
$addFailure = false;
if (isset($_POST['submit'])) {
    $add = new  AddHandler();
    $addCategory = $add->addCategorys();
}
$deleteSuccess = false;
if (isset($_SESSION['delete_success'])) {
    $deleteSuccess = true;
    unset($_SESSION['delete_success']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/post-new.css">
    <link rel="stylesheet" href="../css/category-new.css">
    <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
    <title>Thêm danh mục</title>
</head>

<body>
    <?php echo sidebarDashboar() ?>
    <section id="wrapper">
        <?php echo navDashboard() ?>
        <section class="p-4">
            <div class="container category-new">
                <div class="row p-0">
                    <div class="col-5">
                        <h2 class="  mb-3">Thêm danh mục</h2>
                        <div class="alert alert-success" style="background-color: #5cb85c; display: <?php echo $addSuccess ? 'block' : 'none'; ?>">
                            <i class=" text-white fa-solid fa-circle-check"></i>&nbsp; <strong class="text-white">Thêm thành công!</strong>
                        </div>
                        <div class="alert alert-success bg-danger" style="display:<?php echo $addFailure ? 'block' : 'none'; ?>">
                            <i class="  text-white fa-solid fa-triangle-exclamation"></i>&nbsp; <strong class="text-white">Thêm thất bại!</strong>
                        </div>
                        <div class="alert alert-success" style="background-color: #5cb85c; display: <?php echo $deleteSuccess ? 'block' : 'none'; ?>">
                            <i class=" text-white fa-solid fa-circle-check"></i>&nbsp; <strong class="text-white">Xoá thành công!</strong>
                        </div>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    <h4>Tên danh mục</h4>
                                </label>
                                <input name="nameCategory" type="text" class="form-control <?php echo $resultNameCategery ?>" id="exampleInputEmail1" placeholder="Tiêu đề">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">
                                    <h4>Mô tả</h4>
                                </label>
                                <textarea name="description" class="form-control <?php echo $resultDescription ?>" id="exampleFormControlTextarea1" rows="5" placeholder="Mô tả"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="inputGroupFile02">
                                    <h4>Hình ảnh</h4>
                                </label>
                                <input name="fileToUpload" type="file" class="form-control" id="inputGroupFile02">
                            </div>
                            <input name="submit" type="submit" class="btn btn-primary" value="Thêm danh mục">
                        </form>
                    </div>
                    <div class="col-7">
                        <table class="table table-hover  table-bordered">
                            <thead>
                                <tr class="align-middle">
                                    <th class="w-3" scope="col">STT</th>
                                    <th class="" scope="col">Mã danh mục</th>
                                    <th class="w-15" scope="col">Hình ảnh</th>
                                    <th class="w-32" scope="col">Tên danh mục</th>
                                    <th class="w-50" scope="col">Mô tả</th>
                                    <th class="w-7" scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM category";
                                $resultShow = mysqli_query($conn, $query);
                                $stt = 1;
                                while ($row = mysqli_fetch_assoc($resultShow)) {
                                    echo "<tr>
                            <input type='hidden' value=" . $row['id_category'] . " >
                            <th class='text-lg-center' scope='row'>" . $stt . "</th>
                            <td>" . $row['id_category'] . "</td>
                            <td><img class='w-100' src='../img/imgCategory" . $row['img'] . "' alt=''></td>
                            <td>" . $row['title'] . "</td>
                            <td>" . $row['description'] . "</td>
                            <td class='align-middle text-center '>
                                <a href='update_category.php?id_category=" . $row['id_category'] . "'><i class='fa-solid fs-5 fa-pen-to-square text-primary'></i></a>
                                <a href='delete_category.php?id_category=" . $row['id_category'] . "'onclick=\"return confirm('Bạn có chắc chắn muốn xóa danh mục này không?')\"><i class='fa-solid fs-5 fa-trash-can text-danger'></i></a>
                            </td>
                          </tr>";
                                    $stt++;
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </section>
    </section>
    <script src="../js/main.js"></script>
</body>
</html>