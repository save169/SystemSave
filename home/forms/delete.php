<?php

session_start();
require '../../inc/conn.php';

$id = $_GET['id'];

$del = "DELETE FROM `extrato` WHERE `idExtrato` = $id";
$query = mysqli_query($connection, $del);

if($query){
    
    header("location: ../dashboard/main.php");
}else{

    header("location: ../dashboard/main.php");
}




?>