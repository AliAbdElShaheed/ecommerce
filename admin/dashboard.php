<?php

	session_start();

	$page_title = 'Dashboerd';

	if (!isset($_SESSION['Username'])) {

	 	echo "You are not autharized to view this page, Thanks For Your Hacking !!! && 7amra";

	 	header("refresh:3,index.php");

	 	exit();

	} else {


	 	include ('init.php');

	 	//print_r($_SESSION) ;
	 	
	 	//echo "Welcome In Dashboerd";
	}






	//////////////////   ********  Start of Condition of Redirections ********   ////////////////////

		if(!isset($_GET["page"])){
	         $_GET["page"] = "index";
	    }

	    switch ( $_GET["page"] )
	    {
	        
	        case "logout" :
	        include ("pages/logout/index.php");
	        break;


            case "users" :
            include ("pages/users/index.php");
            break;

            case "categories" :
            include ("pages/categories/index.php");
            break;


            case "items" :
            include ("pages/items/index.php");
            break;


            case "comments" :
            include ("pages/comments/index.php");
            break;


            default :
            include "dashboard_main.php";
            break; 

	    }


	//////////////////   ********  End of Condition of Redirections ********   //////////////////////


	include $tpl . "footer.php";

