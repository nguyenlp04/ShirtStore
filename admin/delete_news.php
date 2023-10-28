<?php
session_start();
include '../config/config.php';
include '../models/classes.php';
if(!isset($_SESSION['admin']) || $_SESSION['vai_tro'] === "user"){
    header("Location: ../index.php");
} 


$name_table = 'news';
$col_name = 'id_news';
$id_item = $_GET['id_news'];
$delete = new  DeleteHandler(); 
$deleteNews = $delete->deleteItem($name_table, $col_name, $id_item);


?>