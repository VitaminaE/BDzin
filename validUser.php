<?php
	session_start();
	$user=$_POST["user"];
	$pass=$_POST["pass"];

	$ipbanco = "localhost";
	$usuario = "root";
	$senha = "root";
	$banco = "manutencao";
	
	$c = mysql_connect($ipbanco, $usuario, $senha);
	if(!$c)
	{
		echo "Erro na conexao com o Servidor: ";
		echo mysql_error();
		die();
	}

	if(!mysql_select_db($banco))
	{
		echo "Erro no Servidor: ";
		echo mysql_error();
		mysql_close($c);
		die();
	}
	
	$sql = "SELECT senha FROM usuario WHERE nome = " .$user. " ";
	
	$resp = mysql_query($sql);
	if(!$resp)
	{
		echo "<script type='text/javascript'> 
					alert(\" Erro na consulta: '$sql'\" );
					location.href = 'login.php';
					</script>";
	}
	else{
		$linha = mysql_fetch_assoc($resp);
		if(!$linha)
		{
			echo "<script type='text/javascript'> 
					alert(\" Usuario/Senha nao encontrado\" );
					location.href = 'login.php';
					</script>";
		}
		else{
			if($pass==$linha['senha']){
				$_SESSION['user']=$user;
				$_SESSION['permissao']=$linha['permissao'];
				header("location:login.php");
				}
			else{
				echo "<script type='text/javascript'> 
						alert(\" Usuario/Senha nao encontrado\" );
						location.href = 'login.php';
						</script>";
				}
		}
	}
	
?>
