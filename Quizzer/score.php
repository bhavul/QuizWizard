<?php
	
	// echo $_SESSION['username'];
	// echo $_SESSION['password'];

	$con = mysqli_connect("localhost","root","bits&bytes","quiz");

	session_start();

	$question_numbers = $_SESSION['question_numbers'];

	$score = 0;

	for($i=0; $i<10; $i++){

		$query = "Select OptRight from questions where QNo =".$question_numbers[$i];
		$result = mysqli_query($con, $query);
		$OptRight = mysqli_fetch_row($result);

		$option = "Choice".$i;

		//Following commented line was to display the choices of applicant. used just for testing something.
		// echo $_POST[$option];

		if($_POST[$option] ==  $OptRight[0])
		{
			$score+=1;
		}



	}

	?>

	<html>
		<head>

			<link href="css/score.css" rel="stylesheet" type="text/css">

		</head>

		<body>

			<h1> DRDO Quiz </h1>
			<?php
				echo "<div id='finalScore'>Your Score : $score/10</div>";
				$username = $_SESSION['username'];
				$sql2 = "Update userinfo set Score = $score where Username = '$username'";
				$result = mysqli_query($con,$sql2);


				?>
				<div id='finalResult'> Result : 
				<?php
				switch($score){

					case 1:
					case 2:
					case 3:
					case 4: 	echo "You've failed in the exam. You need to re-appear.";
								break;
					case 5: 	echo "You've passed the exam with average score.";
								break;
					case 6 :
					case 7: 	echo "You've passed the exam with a good score.";
								break;
					case 8 :
					case 9:	echo "You've passed the exam with a very good score.";
								break;
					case 10:	echo "You've passed the exam with an excellent score! Congratulations!";
								break;
					default:	echo "Sorry, there seems to be some error with your score value. System Code needs to be reconfigured/checked. Tell the authorities.";
				}
				
			?>
				</div>
		</body>

	</html>