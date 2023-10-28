<?php
include '../models/classes.php';
 include "../layout.php";
if(!isset($_SESSION['admin']) || $_SESSION['vai_tro'] === "user"){
    header("Location: ../index.php");
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
    <link rel="stylesheet" href="../css/post-new.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/category-new.css">
    <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
    <title>Danh sách bình luận</title>
</head>

<body>
<?php echo sidebarDashboar() ?>

    <section id="wrapper">
    <?php echo navDashboard() ?>



        <section class="p-4">
        <h2 class="  mb-3">Tất cả người dùng</h2>
        <div class="alert alert-success" style="background-color: #5cb85c; display: <?php echo $deleteSuccess ? 'block' : 'none'; ?>">
                                        <i class=" text-white fa-solid fa-circle-check"></i>&nbsp; <strong class="text-white">Xoá thành công!</strong>
                                    </div>
                                    
            <div class="container category-new">
                <div class="row p-0">
                    <div class="col-12">
                        <table class="table table-hover  table-bordered">
                            <thead>
                              <tr>
                                <th class="w-3" scope="col">STT</th>
                                <th class="w-20" scope="col">Họ và tên</th>
                                <th class="w-30" scope="col">Bình luận</th>
                                <th class="w-10" scope="col">Đường dẫn</th>
                                <th class="w-11" scope="col">Loại</th>
                                <th class="w-10" scope="col">Ngày</th>
                                <th class="w-11" scope="col">Trạng thái</th>
                                <th class="w-7" scope="col">Hành động</th>
                              </tr>
                            </thead>
                            <tbody>
                        <?php
                        $stt = 1;
                        $render = new  RenderHandler(); 
                        $renderComments = $render->renderJoinedData("comments", "customer", "id_customer");  
                        foreach ($renderComments as $row){
                            echo "<tr>";
                            echo "<td class='id text-lg-center align-middle'scope='row'>" . $stt . "</td>";
                            echo "<td class='align-middle'><p class='m-0'>". $row['fullname'] ."</p></td>";
                            echo "<td class='align-middle'><p class='m-0'>". $row['comment'] ."</p></td>";
                            echo "<td class='align-middle'><a class='text-decoration-none' href=\"../product_detail.php?product_detail={$row['id_product']}\">Link</a></td>";
                            echo "<td class='align-middle'><p class='m-0'>". $row['type'] ."</p></td>";
                            echo "<td class='align-middle'><p class='m-0'>" . $row['date_comment'] . "</p></td>";
                            echo "<td class='align-middle'><p class='m-0'>Công khai</p></td>";
                            echo "<td class='align-middle text-center justify-content-between'>
                            <a href='delete_comment.php?id_comment=".$row['id_comment']."'onclick=\"return confirm('Bạn có chắc chắn muốn xóa bình luận này không?')\"><i class='fa-solid fs-5 fa-trash-can text-danger'></i></a></td>";
                            echo "</tr>";
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