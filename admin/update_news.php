<?php
include '../models/classes.php';
 include "../layout.php";
ini_set('display_errors', 1); error_reporting(E_ALL);
if(!isset($_SESSION['admin']) || $_SESSION['vai_tro'] === "user"){
    header("Location: ../index.php");
} 
$updateSuccess = false;
$updateFailure = false;
if (isset($_POST['submit'])) {
    $change = new  UpdateHandler(); 
    $updateNews = $change->updateNews();  
}


if (isset($_GET['id_news'])) {
    $name_table = "news";
    $col_name = "id_news";
    $id_item = $_GET['id_news'];
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
    <title>Cập nhật bài đăng</title>
</head>
<body>
<?php echo sidebarDashboar() ?>

    <section id="wrapper">
    <?php echo navDashboard() ?>
        <section class="p-4">
            <h2 class="  mb-3">Cập nhật bài đăng</h2>
            <div class="alert alert-success " style="background-color: #5cb85c; display:<?php echo $updateSuccess ? 'block' : 'none'; ?>">
           <i class=" text-white fa-solid fa-circle-check"></i>&nbsp; <strong class="text-white">Cập nhật thành công!</strong>
            </div>
            <div class="alert alert-success bg-danger" style="display:<?php echo $updateFailure ? 'block' : 'none'; ?>">
            <i class="  text-white fa-solid fa-triangle-exclamation"></i>&nbsp; <strong class="text-white">Cập nhật thất bại!</strong>
        </div>
            <form  action="update_news.php?id_news=<?php echo $row['id_news']?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">
                        <h4>Tiêu đề</h4>
                    </label>
                    <input type="hidden" name="id_news" value="<?php echo $row['id_news'] ?>">
                    <input value="<?php echo $row['title']?>" name="title" type="text" class="<?php echo $resultTitle ?> form-control" id="exampleInputEmail1" placeholder="Tiêu đề">
                </div>
                <div class="form-group">
                        <h4>Nội dung</h4>
                    <textarea  name="content" id="editor"><?php echo $row['description']?></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="form3Example5">
                        <h4>Hình ảnh</h4>
                    </label>
                    <input name="fileToUpload" type="file" class="form-control" id="form3Example5">
                </div>
                <input name="submit" type="submit" class="btn btn-primary" value="Cập nhật">

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






