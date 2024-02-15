<?php
	include "../dataBase/conexao.php";
	$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<style type="text/css">
		#tamanhoContainer{
			width: 500px;
		}
		
	</style>	
</head>
<body>

	<div class="container" id="tamanhoContainer" style="margin-top: 40px;">
		<h4>Tarefa sendo Editada</h4>

		<form action= "tarefa.controller.php?action=edit" method="post" style="margin-top: 20px;">

			<?php
				$sql = "SELECT * FROM `tarefa` WHERE id_tarefa = $id";
				$buscar = mysqli_query($conexao,$sql);

				while ($array = mysqli_fetch_array($buscar)) {
					$id_tarefa = $array['id_tarefa'];
					$titulo = $array['titulo'];
					$prioridade = $array['prioridade'];	
					$funcionario = $array['funcionario'];
					$status = $array['status'];
			?>	

			<div class="form-group">
				<input type="number" class="form-control" name="id" value="<?php echo $id ?>" style = "display: none">
			</div>
			
			<div class="form-group">
				<label>Título Tarefa</label>
				<input type="text" class="form-control" name="titulo" autocomplete="off" value="<?php echo $titulo ?>">
			</div>

			<div class="form-group">
				<label>Prioridade</label>
				<select class="form-control" name="id_prioridade">
					<?php 
					include '../dataBase/conexao.php'; 
					$sql = "SELECT * FROM `prioridade`";
					$buscar = mysqli_query($conexao,$sql);

					while ($array = mysqli_fetch_array($buscar)){
						$id_prioridade = $array['id_prioridade'];
						$nomePrioridade = $array['nome'];
					?>

					<option value="<?php echo $id_prioridade ?>" 
						<?php echo ($prioridade == $id_prioridade) ? "selected" : ""; ?>>
						<?php echo $nomePrioridade ?>
					</option>

					<?php } ?>
				</select>
			</div>


			<div class="form-group">
				<label>Funcionário</label>
				<select class="form-control" name="id_funcionario" disabled>

					<?php 
						include '../dataBase/conexao.php'; 
						$sql = "SELECT * FROM `funcionario` WHERE id_funcionario = " . $funcionario;
						$buscar = mysqli_query($conexao,$sql);
						$dataFuncionario = mysqli_fetch_array($buscar);
					?>
					<option value="<?php echo $funcionario ?>"><?php echo $dataFuncionario['nome'] ?></option>
					
				</select>
			</div>

			<div class="form-group">
				<label>Status</label>
				<select class="form-control" name="id_status" 
				>
					<?php 
					include '../dataBase/conexao.php'; 
					$sql = "SELECT * FROM `status`";
					$buscar = mysqli_query($conexao,$sql);

					while ($array = mysqli_fetch_array($buscar)){
						$id_status = $array['id_status'];
						$nomeStatus = $array['nome'];
					?>
					<option value="<?php echo $id_status ?>" 
						<?php echo ($status == $id_status) ? "selected" : ""; ?>
					>
						<?php echo $nomeStatus ?>
					</option>

					<?php } ?>
				</select>
			</div>

			<br>
			<button type="submit" class="btn btn-success btn-sm">Atualizar</button>
			<a class="btn btn-danger btn-sm" style="color:#fff" href="list.view.php"role="button"><i></i>Cancelar</a>
			<?php } ?> 
		</form>
	</div>

	<script type="text/javascript" src="../js/bootstrap.js"></script>

</body>
</html>