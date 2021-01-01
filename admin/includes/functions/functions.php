<?php

	//echo "functions are here";

	/*
	** Title function ( Version 1.0 )
	** This Function echo the title of the page if the page
	** has $page_title variable and echo Default if the variable not found
	*/

	function print_page_title(){

		global $page_title;

		if ( isset($page_title) ) {

			echo $page_title;

		} else {

			echo "Default";

		}

	}

	/*
	** Home Redirect Function ( Version 1.0 )
	** [ Accept Parameters]
	** $errorMsg --> Echo The Error Message
	** $seconds  --> Seconds Before Redirecting
	*/

	function RedirectHome($errorMsg, $seconds = 3) {

		echo "<div class = 'alert alert-denger'>$errorMsg</div>";

		echo "<div class = 'alert alert-info'>You Will Be Redirect To $_SERVER[PHP_SELF] After $seconds Seconds.</div>";

		header("refresh:$seconds,url='$_SERVER[PHP_SELF]'");

		exit();
	}



	/*
	** SelectDB ( Version 1.0 )
	** Function Select 1 Row From The Database [ Accept Parameters]
	** [Accept Parameters] [$select, $from, $where, $value] 
	** $seconds  --> Seconds Before Redirecting
	*/

	Function SelectDB ($select, $from, $where, $value) {

		global $con;

		$statement = $con->prepare("SELECT $select FROM $from WHERE $where = ?");

		$statement->execute(array($value));

		$count = $statement->rowcount();

		return $count;
	}


	/*
	** Count Rows Function ( Version 1.0 )
	** This Function Count The Rows in A Database Table
	** Has $Column and $Table 
	*/

	function countRows ($column, $table) {

		global $con;

		$stmt2 = $con->prepare("SELECT COUNT($column) FROM $table ");

		$stmt2->execute();

		return $stmt2->fetchColumn();
	}




	/*
	** Count Rows Function ( Version 2.0 )
	** This Function Count The Rows in A Database Table
	** Has $Column, $Table, $Where and $Value  Variable
 
	*/

	function countRowsPro ($column, $table, $where, $value) {

		global $con;

		$stmt3 = $con->prepare("SELECT COUNT($column) FROM $table WHERE $where =? ");

		$stmt3->execute(array($value));

		return $stmt3->fetchColumn();

		// $count = $stmt3->rowcount();

		// return $count;		
	}




	/*
	** Select Latest Records Function ( Version 1.0 )
	** Function Select Latest Rows From A Database Table [ Accept Parameters]
	** [Accept Parameters] [$select, $from, $order, $limit] 
	** $limit Variable Has A Default Value 5 
	*/

	Function getLatest ($select, $from, $order, $limit = 5) {

		global $con;

		$getstmt = $con->prepare("SELECT $select FROM $from ORDER BY $order DESC LIMIT $limit");

		$getstmt->execute();

		$rows = $getstmt->fetchAll();

		return $rows;
	}	