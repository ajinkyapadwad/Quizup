<?php
	//connection
	$host = "localhost";
	$user = 'root';
	$pass = '';
	$name = 'quizup';

	//create object
	$mysqli = new mysqli($host, $user, $pass, $name);

	// error handler
	if( $mysqli -> connect_error)
	{
		echo "CONNECTION FAILED : ". $mysqli->connect_error;
		exit();
	}

	
?>