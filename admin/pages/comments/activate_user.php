<?php

	echo "<h1 class='text-center'>Activate Member</h1>";

	//print_r($_GET);

	$gettedid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

	//echo $gettedid;

	$check_DB =SelectDB ("UserID", "users", "UserID", $gettedid );

	if ($check_DB !== 1) {

		echo "7amra from Activate User page";

		exit();

	} else {		// Proceed To Activate Operation

		$stmt = $con->prepare("UPDATE
									users
								SET
									Regstatus = ?
								WHERE
									UserID = ? ");

		$stmt->execute(array(1, $gettedid));

		// Echo Success Message

		echo "<div class = 'alert alert-success'>". $stmt->rowcount() . " Record Updated" . "</div>";

		header("refresh:3,url='$_SERVER[PHP_SELF]?page=users&sub=manage'");
	}