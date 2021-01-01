<?php

	$dsn = 'mysql:host=localhost;dbname=shop';
	$user = 'root';
	$pass = '';
	$option = array(

		PDO::MYSQL_ATTR_INIT_COMMAND => 'set names UTF8',

	);

	try {
		$con = new PDO($dsn, $user, $pass);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//echo 'you are connected';

	}

	catch(PDOException $e){

		echo 'Failed to connect' . $e->getMessage();
	}