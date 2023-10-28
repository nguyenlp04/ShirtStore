<?php
session_start();
include '../config/config.php';
include '../models/classes.php';
if(!isset($_SESSION['admin']) || $_SESSION['vai_tro'] === "user"){
    header("Location: ../index.php");
} 

$name_table = 'comments';
$col_name = 'id_comment';
$id_item = $_GET['id_comment'];
$delete = new  DeleteHandler(); 
$deleteComment = $delete->deleteItem($name_table, $col_name, $id_item);

?>