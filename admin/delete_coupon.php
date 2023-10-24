<?php
session_start();
include '../config/config.php';
include '../classes/classes.php';
if(!isset($_SESSION['admin']) || $_SESSION['vai_tro'] === "user"){
    header("Location: ../index.php");
} 

$name_table = 'coupons';
$col_name = 'id_coupon';
$id_item = $_GET['id_coupon'];
$delete = new  DeleteHandler(); 
$deleteCoupon = $delete->deleteItem($name_table, $col_name, $id_item);

?>