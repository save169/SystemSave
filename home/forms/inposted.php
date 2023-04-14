<?php

session_start();
require '../../inc/conn.php';


$tipo = $_POST['tipo'];
$data = $_POST['data'];
$date=explode("-",$data);
$ano = $date[0];
$mes = $date[1];
$dia = $date[2];

$valor = $_POST['valor'] * 1000;
$descricao = $_POST['descricao'];



$add = "INSERT INTO `extrato`(`descricao`, `dia`, `mes`, `ano`, `valor`, `tipo`, `inclusao`) VALUES ('$descricao','$dia','$mes','$ano','$valor','$tipo', NOW())";
$query = mysqli_query($connection, $add);

if($query){
    echo  $_SESSION['efetivo'] = 'Sucesso! lançamento efetivado';
    header("location: Lancamentos.php");
}else{

    echo  $_SESSION['efetivo'] = 'Erro! tente novamente';
    header("location: Lancamentos.php");
}




?>