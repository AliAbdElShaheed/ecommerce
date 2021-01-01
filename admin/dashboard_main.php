<?php

	//////////////////   ********		Start of DashBoard Page 	********   //////////////////////
	?>

	<div class="container text-center stat-father">

		<h1>Dashboard</h1>

		<div class="row ">

		    <div class="col-sm ">
		    	<div class="stat border border-info">
		      		Total Members
		      		<span><a href='<?php echo "$_SERVER[PHP_SELF]?page=users&sub=manage"; ?>' ><?php echo countRows('UserID', 'users'); ?></a></span>
		      	</div>
		    </div>

		    <div class="col-sm">
		    	<div class="stat border border-info ">
		      		Panding Members
		      		<span class="st-panding"><a href='<?php echo "$_SERVER[PHP_SELF]?page=users&sub=manage&pending=pending"; ?>' ><?php echo countRowsPro('UserID', 'users', 'Regstatus', 0); ?></a></span>
		      	</div>
		    </div>
		    
		    <div class="col-sm">
		    	<div class="stat border border-info">
		      		Total Items
		      		<span><a href='<?php echo "$_SERVER[PHP_SELF]?page=items"; ?>' ><?php echo countRows('ItemID', 'items'); ?></a></span>
		      	</div>
		    </div>
		    
		    <div class="col-sm">
		    	<div class="stat border border-info">
		      		Total Comments
		      		<span><a href='<?php echo "$_SERVER[PHP_SELF]?page=users"; ?>' >0</a></span>
		      	</div>
		    </div>


  		</div>		
		
	</div>

	<div class="container latest">

		<div class="row">
			<div class="col-sm-6 ">
				<div class="card border border-info">
					<?php $num_users = 3 ?>
			  		<div class="card-header ">
			  			<i class="fas fa-users"></i> Latest <?php echo $num_users ?> Registered users
				  	</div>
					<div class="card-body">
					    <blockquote class="blockquote mb-0">
					    	<p>
					    		<?php

					    		$latest_users = getLatest("Fullname", "users", "UserID", $num_users);

					    		//echo "<pre>";
					    		//print_r($theLatest)

					    		foreach ($latest_users as $fullname) {
					    			
					    			echo "<a href = '#'>"."<i class='fas fa-user-tag'></i>"." ". $fullname['Fullname'] . "</a>" . "<br />";
					    		}
					    		?>
					    	</p>
					      	<footer class="blockquote-footer">
					      		Someone famous in <cite title="Source Title">Source Title</cite>
					      	</footer>
					    </blockquote>
					</div>

				</div>

			</div>

			<div class="col-sm-6 ">
				<div class="card border border-info">
					<?php $num_items = 6; ?>
			  		<div class="card-header ">
				 	   <i class="fas fa-tag"></i> Latest <?php echo $num_items; ?> Items
				  	</div>
					 <div class="card-body">
					    <blockquote class="blockquote mb-0">
					      	<p>
					      		<?php
					      		$latest_items = getLatest ("*", "items", "Add_Date", "6");
					      		// echo "<pre>";
					      		// print_r($latest_items);
					      		foreach ($latest_items as $item ) {

					      			echo "<div class = 'row'>";
					      			
					    				echo "<a class = 'col col-sm-8' href = '#'>"."<i class='fas fa-tag'></i>"." ". $item['Name'] . "</a>"; 
					    				echo "<a class = 'col text-center' href = '#'>". $item['Price'] . "</a>";
					    				echo "<a class = 'col text-right' href = '". "$_SERVER[PHP_SELF]?page=items&sub=edit&itemid=$item[ItemID]"  ."'>". "Edit" . "</a>";

					    			echo "</div>";
					      		}
					      		?>
					      	</p>
					      	<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite>
					      	</footer>
					    </blockquote>
					</div>
				</div>
			</div>
							
		</div>

	</div>


	<?php
	//////////////////   ********		End of DashBoard Page 		********   //////////////////////
