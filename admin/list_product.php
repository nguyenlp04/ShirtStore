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
    <title>Danh sách sản phẩm</title>
</head>

<body>
<?php echo sidebarDashboar() ?>

    <section id="wrapper">
    <?php echo navDashboard() ?>



        <section class="p-4">
        <h2 class="  mb-3">Tất cả sản phẩm</h2>
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
                                <th class="w-15" scope="col">Tên sản phẩm</th>
                                <th class="w-7" scope="col">Hình ảnh</th>
                                <th class="w-10" scope="col">Giá</th>
                                <th class="w-10" scope="col">Giảm giá</th>
                                <th class="w-11" scope="col">Ngày nhập</th>
                                <th class="w-11" scope="col">Danh mục</th>
                                <th class="w-27" scope="col">Mô tả</th>
                                <th class="w-7" scope="col">Số lượng</th>
                                <th class="w-7" scope="col">Số lượt xem</th>
                                <th class="w-4" scope="col">Hành động</th>

                              </tr>
                            </thead>
                            <tbody>
                                
                            <?php
                                $query = "SELECT products.id_product, products.name_products, products.price, products.discount, products.image, products.entry_date, products.quantity,category.title 
                                AS category_name, products.special_product, products.views, products.description 
                                FROM products JOIN category ON products.id_category = category.id_category";
                                $resultShow = mysqli_query($conn, $query);
                                $stt = 1;
                                while ($row = mysqli_fetch_assoc($resultShow)) {
                                    echo '<tr>';
                                    echo "<input type='hidden' value=".$row['id_product']." >";
                                    echo "<th class='text-lg-center' scope='row'> ".$stt."</th>";
                                    echo "<td>".$row['name_products']."</td>";
                                    echo "<td><img class='w-100' src='../img/imgProducts" .$row['image']. "' alt=''></td>";
                                    echo "<td>".$row['price']."</td>";
                                    echo "<td>".$row['discount']."</td>";
                                    echo "<td>".$row['entry_date']."</td>";
                                    echo "<td>".$row['category_name']."</td>"; 
                                    echo "<td>".$row['description']."</td>";
                                    echo "<td>".$row['quantity']."</td>";
                                    echo "<td>".$row['views']."</td>";
                                    echo "<td class='text-center justify-content-between'>";
                                    echo "<a href='update_product.php?id_product=" . $row['id_product'] . "'><i class='fa-solid fs-5 fa-pen-to-square text-primary'></i></a>";
                                    echo "<a href='delete_product.php?id_product=" . $row['id_product'] . "' onclick=\"return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')\"><i class='fa-solid fs-5 fa-trash-can text-danger'></i></a>";
                                    echo "</td>";
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