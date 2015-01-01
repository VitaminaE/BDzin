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
