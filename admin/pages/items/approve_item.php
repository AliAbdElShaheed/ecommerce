<?php

	echo "<h1 class='text-center'>Approve Item</h1>";

	//print_r($_GET);

	$gettedid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;

	//echo $gettedid;

	$check_DB =SelectDB ("ItemID", $table, "ItemID", $gettedid );

	if ($check_DB !== 1) {

		echo "7amra from Approve Item page";

		exit();

	} else {		// Proceed To Activate Operation

		$stmt = $con->prepare("UPDATE
									$table
								SET
									Approval = ?
								WHERE
									ItemID = ? ");

		$stmt->execute(array(1, $gettedid));

		// Echo Success Message

		echo "<div class = 'alert alert-success'>". $stmt->rowcount() . " Record Updated" . "</div>";

		header("refresh:3,url='$_SERVER[PHP_SELF]?page=$page&sub=manage'");
	}