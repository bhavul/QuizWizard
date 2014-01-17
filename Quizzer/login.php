<!DOCTYPE>
<html>


	<head>
		<link href="css/login.css" rel="stylesheet" type="text/css">

	</head>


	<body>

		<h1> DRDO Quiz </h1>
			<form action="quiz.php" method="POST">
			
				<h1> Login to give the test! </h1>

				<table>
					<tr>
						<td><label> Username </label></td>
						<td><input type="text" name="username"></td>
					</tr>
					<tr>
						<td><label>Password</label></td>
						<td><input type="password" name="password"></td>
					</tr>
					

				</table>
				<br>
				<input type="submit" value ="Submit" class="Button">
			</form>

			<a href="register.php">	Register Now! </a>
			
	</body>


</html>