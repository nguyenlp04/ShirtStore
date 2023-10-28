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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
        <title>Danh sách bài đăng</title>
        <style>
            .content-news{
	display: -webkit-box;
  -webkit-line-clamp: 7;
  -webkit-box-orient: vertical;
  overflow: hidden;
  padding: 0 !important;
}
        </style>
</head>

<body>
<?php echo sidebarDashboar() ?>
    <section id="wrapper">
    <?php echo navDashboard() ?>

        <section class="p-4">
        <h2 class="  mb-3">Tất cả bài đăng</h2>
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
                                <th class="w-20" scope="col">Tiêu đề</th>
                                <th class="w-40" scope="col">Nội dung</th>
                                <th class="w-15" scope="col">Tác giả</th>
                                <th class="w-15" scope="col">Thời gian</th>
                                <th class="w-7" scope="col">Hành động</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                            $stt = 1;
                            $render = new  RenderHandler(); 
                            $renderNews = $render->renderTableData("news");  
                            foreach ($renderNews as $row) {
                            echo "<tr>";
                            echo "<th class='text-lg-center' scope='row'>". $stt."</th>";
                            echo "<td>".$row['title']."</td>";
                            echo "<td ><div class='content-news'>".$row['description']."</div></td>";
                            echo "<td>".$row['author']."</td>";
                            echo "<td>".$row['date']."</td>";
                            echo "<td class='align-middle text-center justify-content-between'>
                            <a href='update_news.php?id_news=".$row['id_news']."'><i class='fa-solid fs-5 fa-pen-to-square text-primary'></i></a>&nbsp;&nbsp;
                            <a href='delete_news.php?id_news=".$row['id_news']."'onclick=\"return confirm('Bạn có chắc chắn muốn xóa bài đăng này không?')\"><i class='fa-solid fs-5 fa-trash-can text-danger'></i></a></td>";
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