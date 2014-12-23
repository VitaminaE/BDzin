<!DOCTYPE html>
<html>
	<head>
		<title>Bootstrap Example</title>
		<!-- Include meta tag to ensure proper rendering and touch zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Include bootstrap stylesheets -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	
		<style>
			body {
				background-color: #29A5D4;
			}

			.container {
				background-color: #F2F2F2;
				border-radius: 5px;
			}
		</style>

	</head>

	<body>
		<div class="container theme-showcase" role="main">
		  	<div class="page-header">
            	<h1>Login</h1>
        	</div>
		  	<div>
		  		<form method="post" action="validUser.php">
					<label>Usuario :</label><br/><input type="text" name="user" /><br/>
					<label>Senha :</label><br/><input type="password" name="pass" /><br/><br/>
					<input type="submit" value="Entrar"/>
				</form>
			</div> 
			<br/>
			<br/>               
		</div>

		<!-- JavaScript placed at the end of the document so the pages load faster -->
		<!-- Optional: Include the jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- Optional: Incorporate the Bootstrap JavaScript plugins -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>

</html>
