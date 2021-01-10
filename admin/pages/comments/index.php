<?php

	$table = "comments";

	echo "<div class = 'container' >";

		if(!isset($_GET["sub"])){						// /// ///// //////    Index of Comments Page
			

			$_GET["sub"] = "index";
			?>

			<div class="stat-father text-center">
				<h1>Comments’s Home Page</h1>

				<div class="row ">

				    <div class="col-sm ">
				    	<div class="stat border border-info">
				      		<a href='<?php echo "$_SERVER[PHP_SELF]?page=comments&sub=manage"; ?>' ><i class='fas fa-user-cog'></i> Manage Comments</a>
				      		<span><a href='<?php echo "$_SERVER[PHP_SELF]?page=comments&sub=manage"; ?>' ><?php echo countRows('CommentID', $table); ?></a></span>
				      	</div>
				    </div>

				    <div class="col-sm">
				    	<div class="stat border border-info st-panding">
				      		<a href='<?php echo "$_SERVER[PHP_SELF]?page=comments&sub=manage&status=pending"; ?>' ><i class='fas fa-user-cog'></i> Panding Comments</a>
				      		<span class="st-panding"><a href='<?php echo "$_SERVER[PHP_SELF]?page=comments&sub=manage&status=pending"; ?>' ><?php echo countRowsPro('CommentID', $table, 'Status', 0); ?></a></span>
				      	</div>
				    </div>
				    
				    <div class="col-sm">
				    	<div class="stat border border-info st-admin ">
				      		<a href='<?php echo "$_SERVER[PHP_SELF]?page=comments&sub=manage&status=approved"; ?>' ><i class='fas fa-user-cog'></i> Approved Comments</a>
				      		<span class="st-admin"><a href='<?php echo "$_SERVER[PHP_SELF]?page=comments&sub=manage&status=approved"; ?>' ><?php echo countRowsPro('CommentID', $table, 'Status', 1); ?></a></span>
				      	</div>
				    </div>
				    


		  		</div>
		  	</div>




		
		<?php
		}



		if ($_GET["sub"] == "manage")					// /// ///// //////    Redirect To Manage Comments Page
			{
				include_once ("manage.php");
			}
			
			

		elseif ($_GET["sub"] == "add")					// /// ///// //////    Redirect To Add & Insert Comments Page
			{
				include_once ("add_member.php");
			}
			
			
		elseif ($_GET["sub"] == "edit")					// /// ///// //////    Redirect To Edit & Update Page
			{
				include_once ("edit_row.php");
			}



		elseif ($_GET["sub"] == "delete")				// /// ///// //////    Redirect To Delete Page
			{
				include_once ("delete_row.php");
			}

			
			
		elseif ($_GET["sub"] == "activate")				// /// ///// //////    Redirect To approve Comments Page
			{
				include_once ("activate_user.php");
			}

			
			

		elseif ($_GET["sub"] == "forget_password")
			{
				include_once ("forget_password.php");
			}
			
			
		elseif ($_GET["sub"] == "reset_password")
			{
				include_once ("reset_password.php");
			}
			
				
		elseif ($_GET["sub"] == "login")
			{
				include_once ("login.php");
			}
			
			
		elseif ($_GET["sub"] == "register")
			{
				include_once ("register.php");
			}
			
			

			
		else{
			
		}
	echo "</div>";		