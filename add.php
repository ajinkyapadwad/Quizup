<?php 
include 'database.php';
?>
<?php
	if(isset($_POST['submit']))
	{
		// get POST variables
		$qno = $_POST['qno'];
		$qtext = $_POST['qtext'];

		$choices = array();
		$choices[1] = $_POST['option1'];
		$choices[2] = $_POST['option2'];
		$choices[3] = $_POST['option3'];
		$choices[4] = $_POST['option4'];
		
		$target = $_POST['target'];
		//query for questions
		$query = "INSERT INTO questions (qno, qtext)
					VALUES ('$qno','$qtext')";

		$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

		//validate
		if($insert_row)
		{
			foreach ($choices as $choice => $value)
			{
				if($value!='')
				{
					if($target == $choice)
					{
						$is_correct = 1;

					}
					else
					{
						$is_correct = 0;
					}
					$query = "INSERT INTO options (qno, is_correct, optext)
						VALUES ('$qno','$is_correct','$value')";

					$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

					if($insert_row)
					{
						continue;
					}
					else
					{
						die('ERROR ! : '.$mysqli->error);
					}
				}	
			}
			$msg = 'Question added successfully !';
		}
	}
	 		// get total
 		$query = "SELECT * FROM questions";
 		$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
 		$total = $results->num_rows;
 		$next = $total+1;
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
		<div class="container">
			<h2>Add a Question</h2>
			<?php
				if(isset($msg))
				{
					echo '<p>'.$msg.'</p>';
				}
			?>
			<form method="post" action="add.php">
				<p>
					<label>Question Number: </label>
					<input type="number" name="qno" value="<?php echo $next; ?>" />
				</p>	
				<p>
					<label>Question text: </label>
					<input type="text" name="qtext" />
				</p>				
				<p>
					<label>Choices: </label><br>
					<label>option 1 : </label>
					<input type="text" name="option1"/>
				</p>
				<p>
					<label>option 2 : </label>
					<input type="text" name="option2"/>
				</p>
				<p>
					<label>option 3 : </label>
					<input type="text" name="option3"/>
				</p>
				<p>
					<label>option 4 : </label>
					<input type="text" name="option4"/>
				</p>
				<p>
					<label>Correct choice number : </label>
					<input type="number" name="target"/>
				</p>
				<input type="submit" value="Submit" name="submit">
			</form>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2017, Ajinkya Padwad
		</div>
	</footer>
</body>
</html>