<?php
session_start();
include "./config/config.php";
include "./classes/function.php";
include "layout.php";
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
$titleCategory = "Graphic Tee";
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphic tee</title>
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
        <span class="text-decoration-none text-body-emphasis fs-4 fw-normal" href="index.php"><?php echo $titleCategory ?></span>
    </div>
    <?php showProducts($titleCategory) ?>



    <?php footer() ?>

    <script src="./js/search.js"></script>
    <script src="./js/all_products.js"></script>
</body>

</html>