<?php 
	include 'database.php';
 ?>

 <?php
 	session_start();
 ?>

 <?php

 	if(!isset($_SESSION['score']))
 	{
 		$_SESSION['score']=0;

 	}
 	if ($_POST)
 	{
 		$number = $_POST['number'];
 		$selec_choice = $_POST['choice'];

 		$next = $number + 1;

 		// print_r($_POST);

 		// get total
 		$query = "SELECT * FROM questions";
 		$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
 		$total = $results->num_rows;

 		//get correct ans
 		$query = "SELECT * FROM options
 					WHERE qno = $number AND is_correct = 1";
 		$result = $mysqli->query($query) or die ($mysqli->error.__LINE__);

 		$row = $result->fetch_assoc();

 		$target = $row['id'];

 		if($target == $selec_choice)
 		{
 			$_SESSION['score'] ++;
 		}

 		//check if end of quiz
 		if($number == $total)
 		{
 			header("Location: final.php");
 			exit();
 		}
 		else
 		{
 			header("Location: question.php?n=".$next);
 		}
 	}
 ?>