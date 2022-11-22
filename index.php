<?php

session_start();

if(isset($_SESSION['user'])){

  header("location: home/dashboard/main.php");

}else{

  header("location: login/login.php");

}

?>