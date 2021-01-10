<?php

	echo "<h1 class='text-center'>Delete Comment</h1>";

	// echo "<div class = 'container' >";

	// echo"Welcome In Delete Page and The ID Your Requested Row Is " . $_GET['commentid'];
	// exit();

	// check if get request id is numeric and get intigar value of it

	$gettedid = isset($_GET['commentid']) && is_numeric($_GET['commentid']) ? intval($_GET['commentid']) : 0;

	// echo $gettedid ;
	// exit();


	//Make The Select Querry By My SelectDB Function Instend Of The Regular Querry /|\

	$check_DB =SelectDB ("CommentID", $table, "CommentID", $gettedid );

	// IF there is no such ID Show Error Message

	if ($check_DB !== 1) {

		echo "7amra from delete page";

		exit();

	} else {		// Proceed To Delete Operation

		$stmt = $con->prepare("DELETE FROM $table WHERE CommentID = :zid");

		$stmt->bindparam(":zid", $gettedid);

		$stmt->execute();

		echo "<div class = 'alert alert-success'>". $stmt->rowcount() . " Record Deleted" . "</div>";

		header("refresh:4,url='$_SERVER[PHP_SELF]?page=comments&sub=manage'");
	}

// echo "</div>";