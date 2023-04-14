<?php
session_start();
require 'conn.php';

// as vari�veis login e senha recebem os dados digitados na p�gina anterior
$user = $_POST['email_usu'];
$senha = md5($_POST['senha_usu']);

// as pr�ximas 3 linhas s�o respons�veis em se conectar com o bando de dados.
// A variavel $result pega as varias $login e $senha, faz uma
//pesquisa na tabela de usuarios

$sql = "SELECT * FROM users WHERE usuario ='$user' && senha ='$senha'";
$query = mysqli_query($connection, $sql);
$dados = mysqli_fetch_array($query);

if (mysqli_num_rows($query)>= 1) {

     echo  $_SESSION['msg'] = '2';  // indica usuario online
     $_SESSION['id'] = $dados['id'];
     $_SESSION['nome'] = $dados['nome'];
     $_SESSION['user'] = $dados['usuario'];
     $_SESSION['password'] = $dados['senha'];
     header('location: ../home/dashboard/main.php');
  	
  }else{
    echo  $_SESSION['msg'] = '1';  // indica usuario não logado
    header('location:../index.php');

  };

?>
