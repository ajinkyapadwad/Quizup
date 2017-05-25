<?php 
	include 'database.php';
 ?>
 <?php

 	//total questions
 	$query = "SELECT * FROM questions";

 	//results
 	$results =  $mysqli->query($query) or die($mysqli->error.__LINE__);

 	$total = $results->num_rows;
 ?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>PHP Quizup</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
	<header>
		<div class="container">
			<h1 align="center">AJ's PHP Quizup</h1>
		</div>
	</header>
	<main>
	<center>
	<div class="container">
			<h2 align="center">Test Your PHP Knowledge</h2>
			<p>This is a multiple choice quiz to test your knowledge of PHP</p>
			<ul>
				<li><strong>Number of Questions: </strong><?php echo $total ?></li>
				<li><strong>Type: </strong>Multiple Choice</li>
				<li><strong>Estimated Time: </strong><?php echo $total * 0.5 ?> minutes</li>
			</ul>
			<a href="question.php?n=1" class="start">Start Quiz</a>
		</div>
	</main>
	</center>

</body>
</html>