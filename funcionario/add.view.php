<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
	</script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


	<script type="text/javascript">
	  $(document).ready(function(){			
	    setTimeout(function() {	    	
			$(".alert").fadeOut("slow", function(){
				$(this).alert('close');
			});				
	    }, 2000);
	});
	</script>

	<style type="text/css">
		#tamanhoContainer{
			width: 500px;
		}

	</style>	
</head>
<body>

	<?php
		
		$status = array_key_exists('status', $_GET) ? $_GET['status'] : null;

		if ($status == "inserido") {
			echo '
			<div class="alert alert-success" role="alert">
			  Funcionário Adicionado com Sucesso!
			</div>';
		}
	?>

	<div class="container" id="tamanhoContainer" style="margin-top: 40px;">
		<h4>Funcionário</h4>

		<form action= "funcionario.controller.php?action=add" method="post" style="margin-top: 20px;">

			<div class="form-group">
				<label>Nome Funcionário</label>
				<input type="text" class="form-control" name="nome" autocomplete="off" placeholder="Insira nome do Funcionário">
			</div>
			<br>
			<button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
			<a class="btn btn-info btn-sm" style="color:#fff" href="../tarefa/list.view.php"role="button"><i></i>Lista de Tarefas</a>
		</form>

	</div>
	

</body>
</html>