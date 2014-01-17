
	<html>
	<head>

		<!-- 
		<?php
		// header('Refresh: ; URL=login.php');
		// ?> -->

		<link href="css/registered.css" rel="stylesheet" type="text/css">

	</head>
	<body>
		<!-- <p> Redirecting you to login page in few seconds...</p> -->
		<h1> DRDO Quiz </h1>

		<?php

			// Create connection
			$con=mysqli_connect("localhost","root","bits&bytes","quiz");

			// Check connection
			if (mysqli_connect_errno($con))
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }
				

			else {

				$name = $_POST["name"];
				$email = $_POST["email"];



				$username = $name;

				$limit = array();

				// checking the no. of rows
				$resource = mysqli_query($con,"SELECT * FROM userinfo");

				$limit = mysqli_num_rows($resource);

				//following commented line was just for testing purposes.
				//echo $limit."<br>";


				if($limit == 0){ $limit = 1;}
					
				// this will generate a new, unique username.
				while(1){

					//a random no. to be appended to username
					$rno = rand(1, $limit);

					$username = $name.$rno;

					$resource2 = mysqli_query($con, "SELECT * FROM userinfo where Username = '$username'");
					
					$check = mysqli_num_rows($resource2);

			
					if($check){
						continue;
					}
					else {
						break;
					}

				}

				function randomPassword() {
				    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
				    $pass = array(); //remember to declare $pass as an array
				    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
				    for ($i = 0; $i < 6; $i++) {
				        $n = rand(0, $alphaLength);
				        $pass[] = $alphabet[$n];
				    }
				    return implode($pass); //turn the array into a string
				}


				$password = randomPassword();

				// ADD QUERIES TO ADD USERNAME N PASSWORD TO THE USERINFO TABLE.

					// echo "Username: ".$username."<br>";
					// echo "Password: ".$password."<br>";

				$sql = "INSERT INTO userinfo(Username, Password, Name, Email) values('$username','$password','$name','$email')";


				$result = mysqli_query($con,$sql);

				if ($result){

					echo "<div id='success'>Username and password fed to the table successfully.</div>";
					echo "<div id='box'>";
					echo "<p>Username : $username</p>";
					echo "<p> Password : $password</p>";
					echo "</div>";
			}

			}

		?>




		<h3> Note them down! And then click below to go to the Login Page! </h3>

		<a href="login.php" > Go To login Page! </a>
	</body>
	</html>
<?php
	//CLOSING MYSQL CONNECTION
	// mysqli_close($con);


?>

