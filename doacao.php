<?php
	session_start();

	$dbLink = mysql_connect('localhost', 'root', 'root');

	mysql_select_db('Manutencao', $dbLink); // Seleciona o BD da manutencao

	// Recebe os dados
	$origem = $_POST["origem"];
	$data = $_POST["data"];

	// Realiza a consulta, no caso de erro fecha a conexao
	$sql = "INSERT INTO Doacao (origem, data) VALUES ('".$origem."','".$data."')";
	$result = mysql_query($sql) or die(mysql_error()); 

	// Feedback
	echo "Sucesso!";
	
?>
