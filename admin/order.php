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


        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        

        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <title>Danh sách người dùng</title>
    <style>
      #dataTable_wrapper .row {
    display: flex;
    justify-content: space-between;
}
        </style>
</head>
<body>
<?php echo sidebarDashboar() ?>

    <section id="wrapper">
        <?php echo navDashboard() ?>
        <section class="p-4">
        <h2 class="  mb-3">Tất cả người dùng</h2>
        <div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã đơn hàng	</th>
                        <th>Khách hàng	</th>
                        <th>Trạng thái	</th>
                        <th>Thành tiền	</th>
                        <th>Thời gian đặt hàng</th>
                    </tr>
                </thead>
                <tbody>

                        <?php
                        $query = "SELECT * FROM order_payments";
                        $resultShow = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($resultShow)) {
                            echo '
                                <tr">
                                    <td>' . $row['order_id'] . '</td>
                                    <td>' . $row['customer_fullname'] . '</td>
                                    <td><span class="badge bg-success">' . $row['payment_status'] . '</span></td>
                                    <td>$' . $row['payment_amount'] . '</td>
                                    <td>' . $row['payment_date'] . '</td>
                                </tr>';
                        }
                        ?>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
        </section>




    </section>
    <script>
    new DataTable('#dataTable');
</script>
    <script src="../js/main.js"></script>
    
</body>

</html>