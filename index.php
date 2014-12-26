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
				<form method="post" action="index.php">
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

				$table = $_POST["item"];

				$dbLink = mysql_connect('localhost', 'root', 'root');

				mysql_select_db('Manutencao', $dbLink); // Seleciona o BD da manutencao

				// Realiza a consulta, no caso de erro fecha a conexao
				$sql = "SELECT * FROM " .$table ;
				$result = mysql_query($sql) or die(mysql_error()); 

				// Imprime os nomes das colunas como o cabecalho da tabela
				echo "<table class=\"table table-stripped table-bordered\"><tr>";
				for($i = 0; $i < mysql_num_fields($result); $i++) {
				    $field_info = mysql_fetch_field($result, $i);
				    echo "<th>" .$field_info->name. "</th>"; // Acessa o campo nome em field_info
				}

				// Imprime os dados na tabela
				while($row = mysql_fetch_row($result)) {
				    echo "<tr>";
				    foreach($row as $_column) {
				        echo "<td>" .$_column. "</td>";
				    }
				    echo "</tr>";
				}

				echo "</table>";
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
