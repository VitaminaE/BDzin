<!DOCTYPE html>
<html>
	<head>
		<title>Banco de Dados</title>
		<!-- Include meta tag to ensure proper rendering and touch zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Include bootstrap stylesheets -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	</head>

	<style>
		body {
			background-color: #29A5D4;
		}
		.container {
			background-color: #f2f2f2;
		}
	</style>

	<body>
		<div class="container theme-showcase" role="main">
			<div class="header">
				<h1>Home</h1>
			</div>
			<div>
				<form method="post" action="entrada.php">
					<label>Buscar por : </label>
					<select name="item">
						<option value="fonte">Fontes</option>
						<option value="hd">HDs</option>
						<option value="dvd">DVDs</option>
						<option value="placaMae">Placas Mae</option>
					</select>
					<input type="submit" value="Enviar"/>
				</form>
			</div>
			<br/>
			<div id="result" >
				<?php
					session_start();

					$dbLink = mysql_connect('localhost', 'root', 'root');

					mysql_select_db('Manutencao', $dbLink); // Seleciona o BD da manutencao

					// Recebe os dados
					$table = $_POST["item"];

					// Realiza a consulta, no caso de erro fecha a conexao
					$sql = "SELECT * FROM ". $table;
					$result = mysql_query($sql) or die(mysql_error()); 

					// Imprime os nomes das colunas como o cabecalho da tabela
					echo "<form class=\"form-inline\" action=\"#\">";
					echo "<label>".$table."</label>";
					for($i = 1; $i < mysql_num_fields($result)-2; $i++) {
					    $field_info = mysql_fetch_field($result, $i);
					    echo "<input type=\"text\" name=\"".$field_info->name."\" placeholder=\"".$field_info->name."\">";
					}
					
					echo "</form>";	
				?>
			</div>               
		</div>

		<!-- JavaScript placed at the end of the document so the pages load faster -->
		<!-- Optional: Include the jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- Optional: Incorporate the Bootstrap JavaScript plugins -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>

</html>




