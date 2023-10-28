<?php
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
?>