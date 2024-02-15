<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

	<script type="text/javascript">
	  $(document).ready(function(){	
	    setTimeout(function() {
	    	console.log($(".alert")); 	
			$(".alert").fadeOut("slow", function(){
				$(this).alert('close');
			});				
	    }, 2000);
	});
	</script>
</head>	
<body>

	<?php 

		$status = array_key_exists('status', $_GET) ? $_GET['status'] : null;

		if ($status == "excluido") {
			echo '
			<div class="alert alert-success" role="alert">
			  Registro Excluído com Sucesso!
			</div>';

		} else if ($status == "inserido") {
			echo '
			<div class="alert alert-success" role="alert">
			  Registro Adicionado com Sucesso!
			</div>';
		} else if ($status == "editado") {
			echo '
			<div class="alert alert-success" role="alert">
			  Registro Alterado com Sucesso!
			</div>';
		} else if ($status == "limite") {
			echo '
			<div class="alert alert-danger" role="alert">
			 Não foi possível inserir uma nova tarefa. Funcionário alcançou o limite máximo de tarefas
			</div>';
		}

	?>


	<div class="container" style="margin-top: 40px;">
		<h3>Lista de Tarefas</h3>
		
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Título</th>
					<th scope="col">Prioridade</th>
					<th scope="col">Funcionario</th>
					<th scope="col">Status</th>
					<th scope="col">Ações</th>
					
				</tr>
			</thead>

			<div class="btn-group" role="group">
			  <a style="margin-right: 5px;" href="add.view.php" role="button" class="btn btn-secondary btn-sm">Adicionar Tarefa</a>
			</div>
			<div class="btn-group" role="group">
			  <a href="../funcionario/add.view.php" role="button" class="btn btn-secondary btn-sm">Adicionar Funcionário</a>
			</div>

			<?php
				include '../dataBase/conexao.php';
					$sql = "
						SELECT 
							T.*,
							F.nome AS 'nomeFuncionario', 
							P.nome AS 'nomePrioridade', 
							S.nome AS 'nomeStatus'
						FROM tarefa as T
								LEFT JOIN funcionario as F
									ON T.funcionario = F.id_funcionario
						        LEFT JOIN prioridade as P
									ON T.prioridade = P.id_prioridade
						        LEFT JOIN status as S
									ON T.status = S.id_status
						ORDER BY T.prioridade, T.status";

				$busca = mysqli_query($conexao,$sql);

				while($array = mysqli_fetch_array($busca)){
					$id_tarefa = $array['id_tarefa'];
					$titulo = $array['titulo'];
					$prioridade = $array['nomePrioridade'];	
					$funcionario = $array['nomeFuncionario'];
					$status = $array['nomeStatus'];
			?>
			<tr>
				<td><?php echo $titulo ?></td>
				<td><?php echo $prioridade ?></td>
				<td><?php echo $funcionario ?></td>
				<td><?php echo $status ?></td>
				<td>
					<a class="btn btn-warning btn-sm" style="color:#fff" href="edit.view.php?id=<?php echo $id_tarefa ?>"role="button"><i class="far fa-edit"></i>Editar</a>
					<a class="btn btn-danger btn-sm" style="color:#fff" href="tarefa.controller.php?action=delete&id=<?php echo $id_tarefa ?>"role="button"><i class="far fa-trash-alt"></i>Excluir</a>
				</td>

			</tr>

			<?php } ?>

		</table>
			
	</div>

</body>
</html>