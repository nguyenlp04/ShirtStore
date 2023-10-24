<?php
session_start();
include '../classes/classes.php';
if(!isset($_SESSION['admin']) || $_SESSION['vai_tro'] === "user"){
    header("Location: ../index.php");
} 
$name_table = 'category';
$col_name = 'id_category';
$id_item = $_GET['id_category'];
$delete = new  DeleteHandler(); 
$deleteCategory = $delete->deleteItem($name_table, $col_name, $id_item);
?>