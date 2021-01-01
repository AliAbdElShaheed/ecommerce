<?php

	//echo"welcome in manage categotries page";

	// Variable ($sort) To Make Dynamic Sort
	$sort = 'DESC';

	$sort_array = array('ASC', 'DESC');

	if (isset($_GET['sort']) && in_array($_GET['sort'], $sort_array)) {

		$sort = $_GET['sort'];
	}

	
	//Select All Categories
	$stmt2 = $con->prepare("SELECT * FROM $table ORDER BY Ordering $sort ");

	//Execute The Statement
	$stmt2->execute();

	//Assign TO Variable
	$cats = $stmt2->fetchAll();

?>

	<h1 class='text-center'>Manage Categories</h1>

		<div class="card border border-info categotries">
	  		<div class="card-header ">
	  			<i class="fas fa-bars"></i> Manage Categories
	  			<span class="ordering">
	  				<i class="fas fa-sort"></i> Ordering :
	  				<a class = "<?php if ($sort == 'ASC'){ echo 'active';} ?>" href='<?php echo "$_SERVER[PHP_SELF]?page=categories&sub=manage&sort=ASC"; ?>'>Asc</a> |
	  				<a class = "<?php if ($sort == 'DESC'){ echo 'active';} ?>" href='<?php echo "$_SERVER[PHP_SELF]?page=categories&sub=manage&sort=DESC";?>'>Desc</a>
	  				

	  			</span>
		  	</div>
			<div class="card-body">
			    <blockquote class="blockquote mb-0">
			    	<p>
			    		<?php

			    			foreach ($cats as $cat) {

			    				echo "<div class = 'cat'>";

				    				echo "<h3>" . $cat['Name'] . "</h3>";

				    				$Descrip = empty($cat['Description']) ? 'This Category Has No Description' : $cat['Description'];
				    				echo "<p>" . $Descrip . "</p>";
				    				$visablity = $cat['Visablity'] == 0 ? 'Hedden' : 'Appered';
				    				echo "<span class = 'visablity'>" . $visablity . "</span>";
				    				$comment = $cat['Allow_Comments'] == 0 ? "Commenting Is Disabled" : "Commenting Is Allowed";
				    				echo "<span>" . $comment . "</span>";
				    				$ads = $cat['Allow_Ads'] == 0 ? "Ads Is Disabled" : "Ads Is Allowed";
				    				echo "<span>" . $ads . "</span>";


									echo "<a class='btn btn-danger btn-cat confirm' href=" . "$_SERVER[PHP_SELF]?page=categories&sub=delete&catid=$cat[CatID]" . "><i class='fas fa-trash'></i>". " " . "Delete</a>";
									echo "<a class='btn btn-success btn-cat ' href=" . "$_SERVER[PHP_SELF]?page=categories&sub=edit&catid=$cat[CatID]" . "><i class='far fa-edit'></i></i> Edit</a>";



			    				echo "</div>";
			    				echo "<hr />";

			    			}


			    		?>
			    	</p>
			    </blockquote>
			</div>
		</div>
		ali4


