<?php

	echo "<h1 class='text-center'>Approve Comment</h1>";

	// print_r($_GET);
	// exit();

	$gettedid = isset($_GET['commentid']) && is_numeric($_GET['commentid']) ? intval($_GET['commentid']) : 0;

	//echo $gettedid;

	$check_DB =SelectDB ("CommentID", $table, "CommentID", $gettedid );

	if ($check_DB !== 1) {

		echo "7amra from Approve Comment page";

		exit();

	} else {		// Proceed To Activate Operation

		$stmt = $con->prepare("UPDATE
									$table
								SET
									Status = ?
								WHERE
									CommentID = ? ");

		$stmt->execute(array(1, $gettedid));

		// Echo Success Message

		echo "<div class = 'alert alert-success'>". $stmt->rowcount() . " Record Updated" . "</div>";

		header("refresh:4,url='$_SERVER[PHP_SELF]?page=comments&sub=manage'");
	}