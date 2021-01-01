<?php

	echo "<h1 class='text-center'>Delete Item</h1>";

	// echo"Welcome In Delete Page and The ID Your Requested Row Is " . $_GET['itemid'];
	// exit();

	// check if get request id is numeric and get intigar value of it

	$gettedid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;

	//echo $gettedid ;
/*
	// Select all data depend on this id

	$stmt = $con->prepare("SELECT * FROM $table WHERE ItemID = ?");

	// Excute The Query

	$stmt->Execute(array($gettedid));

	// The Row Count

	$count = $stmt->rowcount();
*/
	//Make The Select Querry By My SelectDB Function Instend Of The Regular Querry Above Here /|\

	$check_DB =SelectDB ("ItemID", $table, "ItemID", $gettedid );

	// IF there is no such ID Show Error Message

	if ($check_DB !== 1) {

		echo "7amra from delete page";

		exit();

	} else {		// Proceed To Delete Operation

		$stmt = $con->prepare("DELETE FROM $table WHERE ItemID = :zid");

		$stmt->bindparam(":zid", $gettedid);

		$stmt->execute();

		echo "<div class = 'alert alert-success'>". $stmt->rowcount() . " Record Deleted" . "</div>";

		header("refresh:4,url='$_SERVER[PHP_SELF]?page=$page&sub=manage'");
	}


