<?php
	session_start();
	//print_r($_SESSION);
	$noNavbar = '';
	$page_title = "Login";

	include "init.php";

	if (isset($_SESSION['Username'])) {

		//include_once("dashboard.php");

	 	header('location: dashboard.php');	// Redirect to Dashboard Page
	 } 


?>

<!--<div class="btn btn-danger btn-block">test bootstrap</div> -->
<!--<i class="fa fa-home fa-5x"></i>  		 test fontawesome -->
<!--
	<?php
		//echo lang('MESSAGE') . ' ' . lang('ADMIN');  // check languages
	?>
-->
<?php



	include_once("login.php");



	include $tpl . "footer.php"; ?>