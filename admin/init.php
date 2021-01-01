<?php

	include 'connect.php';

	///////// Routes  ////////////

	$tpl ='includes/templates/';		// templates Directory

	// echo $tpl;

	$css = 'layout/css/';				// CSS Directory

	$js = 'layout/js/';					// JS Directory

	$lang = 'includes/languages/';		// Languages Directory

	$func = 'includes/functions/';		// Functions Directory

	


	////////////////////  //////////// ///     Include The Important Files

	include $func . 'functions.php';
	include $lang . 'english.php';
	include $tpl . "header.php";


	// Include the Navbar on All pages except the pages that have noNavbar variable
	if (!isset($noNavbar)){ include $tpl . "navbar.php"; }


	