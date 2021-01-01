<?php

	$table = "users";

	echo "<div class = 'container' >";

		if(!isset($_GET["sub"])){						// /// ///// //////    Index of User Page
			

			$_GET["sub"] = "index";
			?>

			<div class="stat-father text-center">
				<h1>Member’s Home Page</h1>

				<div class="row ">

				    <div class="col-sm ">
				    	<div class="stat border border-info">
				      		<a href='<?php echo "$_SERVER[PHP_SELF]?page=users&sub=manage"; ?>' ><i class='fas fa-user-cog'></i> Manage Mambers</a>
				      		<span><a href='<?php echo "$_SERVER[PHP_SELF]?page=users&sub=manage"; ?>' ><?php echo countRows('UserID', 'users'); ?></a></span>
				      	</div>
				    </div>

				    <div class="col-sm">
				    	<div class="stat border border-info st-panding">
				      		<a href='<?php echo "$_SERVER[PHP_SELF]?page=users&sub=manage&pending=pending"; ?>' ><i class='fas fa-user-cog'></i> Manage Panding</a>
				      		<span class="st-panding"><a href='<?php echo "$_SERVER[PHP_SELF]?page=users&sub=manage&pending=pending"; ?>' ><?php echo countRowsPro('UserID', 'users', 'Regstatus', 0); ?></a></span>
				      	</div>
				    </div>
				    
				    <div class="col-sm">
				    	<div class="stat border border-info st-admin ">
				      		<a href='<?php echo "$_SERVER[PHP_SELF]?page=users&sub=manage&admins=admins"; ?>' ><i class='fas fa-user-cog'></i> Admins</a>
				      		<span class="st-admin"><a href='<?php echo "$_SERVER[PHP_SELF]?page=users&sub=manage&admins=admins"; ?>' ><?php echo countRowsPro('UserID', 'users', 'GroupID', 1); ?></a></span>
				      	</div>
				    </div>
				    
				    <div class="col-sm">
				    	<div class="stat border border-info">
				      		<a href='<?php echo "$_SERVER[PHP_SELF]?page=users&sub=add"; ?>'><i class='fas fa-user-plus'></i> ADD Member </a>
				      		
				      	</div>
				    	<div class="stat border border-info">
				      		<a href='<?php echo "$_SERVER[PHP_SELF]?page=users&sub="; ?>'><i class='fas fa-user-plus'></i> ?? </a>
				      		
				      	</div>

				    </div>


		  		</div>
		  	</div>




		
		<?php
		}



		if ($_GET["sub"] == "manage")					// /// ///// //////    Redirect To Manage Members Page
			{
				include_once ("manage.php");
			}
			
			

		elseif ($_GET["sub"] == "add")					// /// ///// //////    Redirect To Add & Insert Member Page
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

			
			
		elseif ($_GET["sub"] == "activate")				// /// ///// //////    Redirect To Activate User Page
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