<?php

	$table = "categories";

	//echo"welcome in categories index page"."<br />";

	echo "<div class = 'container' >";

		if(!isset($_GET["sub"])){						// /// ///// //////    Index of Categories Page			

			$_GET["sub"] = "index";

		?>
			<div class="stat-father text-center">
				<h1>Categories’s Home Page</h1>

				<div class="row ">

				    <div class="col-sm ">
				    	<div class="stat border border-info">
				      		<a href='<?php echo "$_SERVER[PHP_SELF]?page=categories&sub=manage"; ?>' ><i class="fas fa-sitemap"></i> Manage Categories</a>
				      		<span><a href='<?php echo "$_SERVER[PHP_SELF]?page=categories&sub=manage"; ?>' ><?php echo countRows('CatID', $table); ?></a></span>
				      	</div>
				    </div>

				    <div class="col-sm">
				    	<div class="stat border border-info st-admin">
				      		<div><a href='<?php echo "$_SERVER[PHP_SELF]?page=categories&sub=add"; ?>' ><i class="far fa-plus-square"></i> Add Categories</a></div>
				      		<div><a href='<?php echo "$_SERVER[PHP_SELF]?page=categories&sub=edit"; ?>' ><i class="far fa-edit"></i></i> Edit Categories</a></div>
				      		<div><a href='<?php echo "$_SERVER[PHP_SELF]?page=categories&sub=delete"; ?>' ><i class="fas fa-trash"></i> Delete Categories</a></div>
				      		<div>delayed</div>
				      	</div>
				    </div>

		  		</div>

		  	</div>







		<?php
		}



		if ($_GET["sub"] == "manage")					// /// ///// //////    Redirect To Manage Categories Page
			{
				include_once ("manage.php");
			}
			
			

		elseif ($_GET["sub"] == "add")					// /// ///// //////    Redirect To Add & Insert Category Page
			{
				include_once ("add_cat.php");
			}
			
			
		elseif ($_GET["sub"] == "edit")					// /// ///// //////    Redirect To Edit & Update Page
			{
				include_once ("edit_row.php");
			}



		elseif ($_GET["sub"] == "delete")				// /// ///// //////    Redirect To Delete Page
			{
				include_once ("delete_row.php");
			}

						
			

			
		else{
			
		}
	echo "</div>";



