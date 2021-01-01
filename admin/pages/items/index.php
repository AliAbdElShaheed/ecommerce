<?php

	$table = "items";
	$page = "items";

	// echo"welcome in itmes index page"."<br />";
	// exit();

	echo "<div class = 'container' >";

		if(!isset($_GET["sub"])){						// /// ///// //////    Index of Categories Page			

			$_GET["sub"] = "index";

		?>
			<div class="stat-father text-center">
				<h1>Items’s Home Page</h1>

				<div class="row ">

				    <div class="col-sm ">
				    	<div class="stat border border-info">
				      		<a href='<?php echo "$_SERVER[PHP_SELF]?page=$page&sub=manage"; ?>' ><i class="fas fa-tags"></i> Manage Items</a>
				      		<span><a href='<?php echo "$_SERVER[PHP_SELF]?page=$page&sub=manage"; ?>' ><?php echo countRows('ItemID', $table); ?></a></span>
				      	</div>
				    </div>
				    <div class="col-sm ">
				    	<div class="stat border border-info st-panding">
				      		<a href='<?php echo "$_SERVER[PHP_SELF]?page=$page&sub=manage&approve=no"; ?>' ><i class="fas fa-tags"></i> Panding Items</a>
				      		<span class="st-panding"><a href='<?php echo "$_SERVER[PHP_SELF]?page=$page&sub=manage&approve=no"; ?>' ><?php echo countRowsPro('ItemID', $table, 'Approval', 0); ?></a></span>
				      	</div>
				    </div>
				    <div class="col-sm ">
				    	<div class="stat border border-info st-admin">
				      		<a href='<?php echo "$_SERVER[PHP_SELF]?page=$page&sub=manage&approve=yes"; ?>' ><i class="fas fa-tags"></i> Approved Items</a>
				      		<span class="st-admin"><a href='<?php echo "$_SERVER[PHP_SELF]?page=$page&sub=manage&approve=yes"; ?>' ><?php echo countRowsPro('ItemID', $table, 'Approval', 1); ?></a></span>
				      	</div>
				    </div>


				    <div class="col-sm">
				    	<div class="stat border border-info st-admin">
				      		<div><a href='<?php echo "$_SERVER[PHP_SELF]?page=$page&sub=add"; ?>' ><i class="far fa-plus-square"></i> Add Items</a></div>
				      		<div><a href='<?php echo "$_SERVER[PHP_SELF]?page=$page&sub=edit"; ?>' ><i class="far fa-edit"></i></i> Edit Items</a></div>
				      		<div><a href='<?php echo "$_SERVER[PHP_SELF]?page=$page&sub=delete"; ?>' ><i class="fas fa-trash"></i> Delete Items</a></div>
				      		<div><a href='<?php echo "$_SERVER[PHP_SELF]?page=$page&sub=approve"; ?>' ><i class="far fa-check-circle"></i> Approve Items</a></div>
				      	</div>
				    </div>

		  		</div>

		  	</div>







		<?php
		exit();
		}



		if ($_GET["sub"] == "manage")					// /// ///// //////    Redirect To Manage Categories Page
			{
				include_once ("manage_item.php");
			}
			
			

		elseif ($_GET["sub"] == "add")					// /// ///// //////    Redirect To Add & Insert Category Page
			{
				include_once ("add_item.php");
			}
			
			
		elseif ($_GET["sub"] == "edit")					// /// ///// //////    Redirect To Edit & Update Page
			{
				include_once ("edit_item.php");
			}



		elseif ($_GET["sub"] == "delete")				// /// ///// //////    Redirect To Delete Page
			{
				include_once ("delete_item.php");
			}

						
			

		elseif ($_GET["sub"] == "approve")				// /// ///// //////    Redirect To approve Page
			{
				include_once ("approve_item.php");
			}

						
			

						
		else{
			
		}
	echo "</div>";



