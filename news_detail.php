<?php

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
$titleCategory = "Hoodie";
if (isset($_SESSION['getAvatarUser'])) {
    $avatar = $_SESSION['getAvatarUser'];
} else {
    $avatar = '/user.png';
}

if (isset($_SESSION['vai_tro']) && $_SESSION['vai_tro'] === "admin") {
    $btnDeleteCmt = "inline-block";
} else {
    $btnDeleteCmt = "none";
}
$id_news = $_GET['news_detail'];
if (isset($_POST['postComment'])) {

    if (isset($_SESSION['id_customer'])) {
        $id_customer = $_SESSION['id_customer'];
    } else {
        $id_customer = 0;
    }
    $comment = $_POST["comment"];
    $type = "news";
    $dateCmt = date('Y-m-d');
    $sqlCmt = "INSERT INTO `comments` (`id_customer`,`comment`,`type`,`id_news`,`date_comment`) 
    VALUES('$id_customer','$comment','$type','$id_news','$dateCmt')";
    $old = mysqli_query($conn, $sqlCmt);
}


if (isset($_GET['news_detail'])) {
    $id_news = $_GET['news_detail'];
    $sql = "SELECT *  FROM news WHERE id_news='$id_news'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $rowNews = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy dữ liệu";
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/favicon/favicon.ico" type="image/x-icon">
    <title>Hoodie</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/search.css">
    <link rel="stylesheet" href="./css/all_products.css">
    <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


</head>

<body>
    <?php menu() ?>
    <section class="py-5">
        <div class="container">
            <h1><?php echo $rowNews['title'] ?></h1>
            <p><?php echo $rowNews['description'] ?></p>
            <div class="d-flex justify-content-end align-items-center"><h5>Tác giả:&nbsp; </h5> <h4 class="author text-end"><?php echo $rowNews['author'] ?></h4></div>
        </div>
        <div class="title-comment-product">
            <form action="news_detail.php?news_detail=<?php echo $id_news ?>" method="POST" enctype="multipart/form-data">
                <h3>Bình luận</h3>
                <div class=" p-2">
                    <div class="d-flex flex-row align-items-start">
                        <img class="rounded-circle me-2" src="./img/avatarUser<?php echo $avatar ?>" height="40" width="40">
                        <textarea name="comment" class="form-control ml-1 shadow-none textarea" rows="4"></textarea>
                    </div>
                    <div class="mt-2 text-right">
                        <button class="mb-3 btn btn-primary btn-sm shadow-none p-2" type="button"><input name="postComment" style="background: unset; color: white; border: none;" type="submit" value="Bình luận"></button>
                    </div>
                </div>

            </form>


            
            <?php
            $query = "SELECT comments.id_customer, comments.id_comment, comments.comment, comments.date_comment, customer.fullname, customer.avatar 
                        FROM comments 
                        JOIN customer ON comments.id_customer = customer.id_customer
                        WHERE id_news = $id_news";
            $resultShowCmt = mysqli_query($conn, $query);
            if ($resultShowCmt) {
                while ($row = mysqli_fetch_assoc($resultShowCmt)) {
                    echo '<div class="bg-white p-2">
                    <input type="hidden" value="' . $row['id_comment'] . '">
                    <div class="d-flex flex-row user-info">
                        <img class="rounded-circle me-2" src="./img/avatarUser/' . $row['avatar'] . '" height="40" width="40">
                        <div class="d-flex flex-column justify-content-start ml-2">
                            <span class="d-block font-weight-bold name"><h5>' . $row['fullname'] . '</h5></span>
                            <span class="date text-black-50">Được chia sẻ công khai - ' . $row['date_comment'] . '
                                <a style="display:' . $btnDeleteCmt . '" href="admin/delete_comment.php?id_comment=' . $row['id_comment'] . '"><i class="mx-2 fa-solid fa-trash"></i></a>
                            </span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="comment-text">' . $row['comment'] . '</p>
                    </div>
                </div>';
                }
            }
            ?>



        </div>
    </section>
    <?php footer() ?>

    <script src="./js/search.js"></script>
    <script src="./js/all_products.js"></script>
</body>

</html>