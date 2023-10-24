<?php
session_start();

if (isset($_GET['index'])) {
    
    echo "<pre>";
    var_dump($_SESSION['cart']);
    echo "</pre>";
    $index = $_GET["index"]; // Get the index from the GET parameter
    foreach ($_SESSION['cart'] as $key => $product) {
        if ($product['index'] == $index) {
            unset($_SESSION['cart'][$key]);  // Xoá phần tử tương ứng với 'index'
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            break;  // Dừng vòng lặp sau khi xoá
        }
    }
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
?>
