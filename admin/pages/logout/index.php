<?php



	//session_start();			// Start The Session

 	if( isset ($_SESSION['Username'] ) ){

		session_unset();		// Unset The Data

		session_destroy();		// Destroy the Session

		
		echo "<div class= 'row justify-content-center'><h3 class = 'alert alert-success col-sm-4 text-center'>" . "You Are Logged Out Successfilly" . "</h3></div>";
		

	}

	//header('location: index.php');

	header('refresh:3,url=index.php');

	exit();