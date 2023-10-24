<?php
session_start();
include '../config/config.php';
include '../classes/classes.php';

if(!isset($_SESSION['admin']) || $_SESSION['vai_tro'] === "user"){
    header("Location: ../index.php");
} 
$name_table = 'customer';
$col_name = 'id_customer';
$id_item = $_GET['id_customer'];
$delete = new  DeleteHandler(); 
$deleteUser = $delete->deleteItem($name_table, $col_name, $id_item);

?>


