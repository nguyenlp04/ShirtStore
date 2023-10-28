<?php
session_start();
include '../config/config.php';
include '../models/function.php';
include "../layout.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['admin']) || $_SESSION['vai_tro'] === "user") {
    header("Location: ../index.php");
}


$sql_total_user = "SELECT *, COUNT(*) AS total_users, fullname FROM customer";
$result = $conn->query($sql_total_user);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalUsers = $row['total_users'];
} else {
    echo "Không có dữ liệu người dùng.";
}

if (isset($_SESSION['fullname'])) {
    $Fullnames = $_SESSION['fullname'];
} else {
    $Fullnames = "";
}

$sql_total_orders = "SELECT COUNT(*) AS total_orders FROM order_payments";
$result_total_orders = $conn->query($sql_total_orders);
$row_total_orders = $result_total_orders->fetch_assoc();
$total_orders = $row_total_orders['total_orders'];


$sql_total_revenue = "SELECT SUM(payment_amount) AS total_revenue FROM order_payments";
$result_total_revenue = $conn->query($sql_total_revenue);
$row_total_revenue = $result_total_revenue->fetch_assoc();
$total_revenue = number_format($row_total_revenue['total_revenue'], 2);


$date = getdate();
$target_month = $date['mon'];
$sql_total_revenue_month = "SELECT SUM(payment_amount) AS total_revenues, DATE_FORMAT(payment_date, '%Y-%m-%d') AS formatted_payment_date
                            FROM order_payments 
                            WHERE MONTH(payment_date) = $target_month";
$result_total_revenue_month = $conn->query($sql_total_revenue_month);
$row_total_revenue_month = $result_total_revenue_month->fetch_assoc();
$total_revenue_month = $row_total_revenue_month['total_revenues'];
$formatted_payment_date = $row_total_revenue_month['formatted_payment_date'];
$total_revenue_month_formatted = number_format($total_revenue_month, 2);


$t_shirt = getQuantityCategory(13);
$hoodie = getQuantityCategory(14);
$graphic_tee = getQuantityCategory(15);

$sqlCategory = "SELECT COUNT(*) AS product_count
    FROM products";
$result = $conn->query($sqlCategory);
if ($result) {
    $row = $result->fetch_assoc();
    $allCategory = $row["product_count"];
} else {
    $allCategory = 0; // Đặt allCategory thành 0 nếu có lỗi
}
$remaining = $allCategory - ($t_shirt + $hoodie + $graphic_tee);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/59847bd5e5.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>


    <title>Quản trị</title>

    <script>
        CKEDITOR.replace('editor');
    </script>
</head>

<body>
    <?php echo sidebarDashboar() ?>
    <section id="wrapper">
        <?php echo navDashboard() ?>

        <div class="p-4">
            <div class="welcome">
                <div class="content rounded-3 p-3">
                    <h1 class="fs-3">Welcome to Dashboard</h1>
                    <p class="mb-0">Hello <?php echo $Fullnames ?>, welcome to your awesome dashboard! </p>
                </div>
            </div>

        </div>

        <section class="statistics mt-4">
            <div class="row m-2">
                <div class="col-lg-3">
                    <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
                        <i class="fa-solid fa-money-bill-trend-up fs-2 text-center bg-primary rounded-circle"></i>
                        <div class="ms-3">
                            <div class="d-flex align-items-center">
                                <h3 class="mb-0">$<?php echo $total_revenue_month_formatted ?></h3> <span class="d-block ms-2"><i class="uil-angle-up"></i>
                                    32%</span>
                            </div>
                            <p class="fs-normal mb-0">Doanh thu tháng này</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
                        <i class="fa-solid fa-money-bill-trend-up fs-2 text-center bg-danger rounded-circle"></i>
                        <div class="ms-3">
                            <div class="d-flex align-items-center">
                                <h3 class="mb-0">$<?php echo $total_revenue ?></h3> <span class="d-block ms-2"></span>
                            </div>
                            <p class="fs-normal mb-0">Tổng doanh thu</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box d-flex rounded-2 align-items-center p-3">
                        <i class="uil-bag fs-2 text-center bg-success rounded-circle"></i>
                        <div class="ms-3">
                            <div class="d-flex align-items-center">
                                <h3 class="mb-0"><?php echo $total_orders ?></h3> <span class="d-block ms-2"></span>
                            </div>
                            <p class="fs-normal mb-0">Tổng đơn hàng</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box d-flex rounded-2 align-items-center p-3">
                        <i class="uil uil-user fs-2 text-center bg-info rounded-circle"></i>
                        <div class="ms-3">
                            <div class="d-flex align-items-center">
                                <h3 class="mb-0"><?php echo $totalUsers ?></h3> <span class="d-block ms-2"></span>
                            </div>
                            <p class="fs-normal mb-0">Số lượng người dùng</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="charts mt-4 p-4">
            <h4 class="  mb-3"><i class="uil uil-comparison"></i>&nbsp;Tổng quan</h4>
            <div class="row">
                <div class="col-lg-6">
                    <div class="chart-container rounded-2 p-3">
                        <h3 class="fs-6 mb-3">Biểu đồ doanh thu </h3>
                        <canvas id="myChart1" width="1290" height="644"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="chart-container rounded-2 p-3">
                        <h3 class="fs-6 mb-3">Tổng quan về thu nhập</h3>
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>
        </section>

        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                var myChart1 = new Chart(document.getElementById('myChart1'), {
                    type: 'doughnut',
                    data: {
                        labels: ["T-Shirt", "Hoode", "Graphic", "Khác"],
                        datasets: [{
                            data: [<?php echo $t_shirt; ?>, <?php echo $hoodie; ?>, <?php echo $graphic_tee; ?>,<?php echo $remaining; ?> ],
                            backgroundColor: ["#0d6efd", "#dc3545", "#f0ad4e", "#6610f2"],
                            hoverBackgroundColor: ["rgba(219, 0, 0, 0.2)", "rgba(0, 165, 2, 0.2)",
                                "rgba(255, 195, 15, 0.3)"
                            ]
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });

                // var myChart2 = new Chart(document.getElementById('myChart2'), {
                //     type: 'line',
                //     data: {
                //         labels: ["Tháng Một", "Tháng Hai", "Tháng Ba", "Tháng Tư", "Tháng Năm", "Tháng Sáu", "Tháng Tám", "Tháng Chín", "Tháng Mười", "Tháng Mười Một", "Tháng Mười Hai"],
                //         datasets: [{
                //             label: "Ngày",
                //             data: [12, 52, 34, 10, 21, 44, 23, 57, 33, 52, 78],
                //             backgroundColor: '#0d6efd',
                //             borderColor: '#0d6efd',
                //             lineTension: .4,
                //             borderWidth: 1.5,
                //             barPercentage: 0.4,
                //         }, {
                //             label: "Tháng",
                //             data: [60, 260, 170, 50, 105, 220, 115, 285, 204, 220, 120],
                //             backgroundColor: '#dc3545',
                //             borderColor: '#dc3545',
                //             lineTension: .4,
                //             borderWidth: 1.5,
                //             barPercentage: 0.4,
                //         }, {
                //             label: "Tổng",
                //             data: [900, 790, 650, 750, 575, 900, 725, 675, 574, 843, 743],
                //             backgroundColor: '#f0ad4e',
                //             borderColor: '#f0ad4e',
                //             lineTension: .4,
                //             borderWidth: 1.5,
                //             barPercentage: 0.4,
                //         }]
                //     },
                const xValues = ["Tháng Một", "Tháng Hai", "Tháng Ba", "Tháng Tư", "Tháng Năm", "Tháng Sáu", "Tháng Tám", "Tháng Chín", "Tháng Mười", "Tháng Mười Một", "Tháng Mười Hai"];
                const yValues = [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000];

                var myChart2 = new Chart(document.getElementById('myChart2'), {
                    type: 'line',
                    data: {
                        labels:  xValues,
                        datasets: [{
                            label: "Tổng đơn hàng",
                            data: yValues,
                            backgroundColor: '#f0ad4e',
                            borderColor: '#f0ad4e',
                            lineTension: .4,
                            borderWidth: 2.5,
                            barPercentage: 0.4,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    drawBorder: false
                                },
                            }],
                            xAxes: [{
                                gridLines: {
                                    display: false,
                                },
                            }]
                        }
                    }
                });
            });
        </script>

        <section class="list-order p-4">
            <div class="title-order d-flex align-items-center justify-content-between">
                <h4 class="mb-3"><i class="fa-regular fa-rectangle-list"></i>&nbsp;Đơn hàng</h4>
                <a href="order.php" class="text-decoration-none">
                    <p class="m-0  mb-3">Xem tất cả <i class="fa-solid fa-arrow-right"></i></p>
                </a>
            </div>
            <div class="">
                <div class="rounded ">
                    <div class="table-responsive table-borderless rounded-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Khách hàng</th>
                                    <th>Trạng thái</th>
                                    <th>Thành tiền</th>
                                    <th>Thời gian đặt hàng</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                <?php
                                $query = "SELECT * FROM order_payments LIMIT 5";
                                $resultShow = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($resultShow)) {
                                    echo '
                                        <tr class="cell-1">
                                            <td>' . $row['order_id'] . '</td>
                                            <td>' . $row['customer_fullname'] . '</td>
                                            <td><span class="badge bg-success">' . $row['payment_status'] . '</span></td>
                                            <td>$' . $row['payment_amount'] . '</td>
                                            <td>' . $row['payment_date'] . '</td>
                                        </tr>';
                                }
                                ?>

                                <tr class="cell-1">
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                    <td>...</td>
                                </tr>
                                <!-- <tr class="cell-1">
                                        <td>#SO-16499</td>
                                        <td>Samban Hubart</td>
                                        <td><span class="badge bg-success">Thành công</span></td>
                                        <td>$375.00</td>
                                        <td>September 20,2023</td>
                                    </tr>  -->
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