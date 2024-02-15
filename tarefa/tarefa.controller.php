<?php

include '../dataBase/conexao.php';

$action = $_GET['action'];

switch ($action) {
  case 'add':
    add();
    break;
  case 'edit':
    edit();
    break;
  case 'delete':
    delete();
    break;
}

function add() {

  $totalTarefa = getTotalTarefas();
  $limiteMaxTarefa = 3;
  $statusAdd = "inserido";

  if ($totalTarefa < $limiteMaxTarefa) {    

    $titulo = $_POST['titulo'];
    $prioridade = $_POST['id_prioridade'];
    $funcionario = $_POST['id_funcionario'];
    $status = $_POST['id_status'];  


    include '../dataBase/conexao.php';
    $sql = "INSERT INTO `tarefa`(`titulo`, `prioridade`, `funcionario`, `status`) VALUES ('$titulo','$prioridade','$funcionario','$status')";
    
    mysqli_query($conexao,$sql);
  } else {
    $statusAdd = "limite";
  }
  header("Location: list.view.php?status=" . $statusAdd);
}


function edit() {
  include '../dataBase/conexao.php';

  $id = $_POST['id'];
  $titulo = $_POST['titulo'];
  $prioridade = $_POST['id_prioridade'];
  $status = $_POST['id_status'];

  echo $sql = "UPDATE `tarefa` SET `titulo`='$titulo',`prioridade`='$prioridade',`status`='$status' WHERE id_tarefa = $id";
  mysqli_query($conexao,$sql);

  header("Location: list.view.php?status=editado");
}

function delete() {
  include '../dataBase/conexao.php';
  $id = $_GET['id'];

  $sql = "DELETE FROM `tarefa` WHERE id_tarefa = $id";
  $deletar = mysqli_query($conexao,$sql);

  header("Location: list.view.php?status=excluido");
}


function getTotalTarefas() {
 $funcionario = $_POST['id_funcionario'];
 
 include '../dataBase/conexao.php';
    $sql = "SELECT count(*) AS TOTAL
    FROM `tarefa`
    WHERE `funcionario` = " . $funcionario;

  $busca = mysqli_query($conexao,$sql);
  $data = mysqli_fetch_array($busca);

  return $data["TOTAL"];
}



?>
