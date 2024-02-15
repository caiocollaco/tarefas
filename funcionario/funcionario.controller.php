<?php

include '../dataBase/conexao.php';

$action = $_GET['action'];

switch ($action) {
  case 'add':
    add();
    break;
}

function add() {

  include '../dataBase/conexao.php';
  
  $nome = $_POST['nome'];
  
  $sql = "INSERT INTO `funcionario`(`nome`) VALUES ('$nome')";

  mysqli_query($conexao,$sql);

  header("Location: add.view.php?status=inserido");
}
?>
