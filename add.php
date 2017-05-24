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
			<form method="post" action="add.php">
				<p>
					<label>Question Number: </label>
					<input type="number" name="qno" />
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
					<input type="number" name="is_correct"/>
				</p>
				<input type="submit" value="Submit" >
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