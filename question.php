<?php 
	include 'database.php';
 ?>
<?php session_start(); ?>
 <?php
 	// set question number
 	$number =(int) $_GET['n'];

 			// get total
 		$query = "SELECT * FROM questions";
 		$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
 		$total = $results->num_rows;

 	// Get questions
 	$query = " SELECT * FROM questions
 				WHERE qno = $number";

 	//results
 	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

 	$question = $result->fetch_assoc();

 	// Get options
 	$query = " SELECT * FROM options
 				WHERE qno = $number";

 	// results
 	$options = $mysqli->query($query) or die($mysqli->error.__LINE__);

 	
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
			<h1>PHP Quizup</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<div class="current">Question 
			<?php echo $question['qno']; ?>
			of
			<?php echo $total; ?>
			 </div>
			<p class="question">
				<?php echo $question['qtext']; ?>
			</p>
			<form method="post" action="process.php">
				<ul class="choices">
				<?php while($row = $options->fetch_assoc()): ?>
					<li>
					<input name="choice" type="radio" value="<?php echo $row['id'] ?>" />
						<?php echo $row['optext'] ?>
					</li>
				<?php endwhile; ?>
					
					
				</ul>
				<input type="submit" value="Submit" />
				<input type="hidden" name="number" value="<?php echo $number ?>"/>
			</form>
		</div>
	</main>

</body>
</html>