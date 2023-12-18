<?php
include "config.php";
$delete=new Database();
$ID=$_GET['Id'];
$delete= new Database();
if(isset($_GET['Id'])){
    $ID=$_GET['Id'];
    $delete->deleteArticle( $ID );
}
$delete->deleteArticle( $ID );
header('location:insert.php');
?>