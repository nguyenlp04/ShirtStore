<?php
session_start();
include '../config/config.php';
include '../classes/classes.php';

if(!isset($_SESSION['admin']) || $_SESSION['vai_tro'] === "user"){
    header("Location: ../index.php");
} 



$name_table = 'products';
$col_name = 'id_product';
$id_item = $_GET['id_product'];


$delete = new  DeleteHandler(); 
$deleteProduct = $delete->deleteItem($name_table, $col_name, $id_item);



?>