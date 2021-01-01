<?php

	if (count($_POST) > 0) {			// ======== Redirect To Update Secsion ======== //

		// echo"welcome in update page and your ID is " . $_POST['postedid'];
		// echo"<pre>";
		// print_r($_POST);
		// exit();

		echo "<h1 class='text-center'>Update Category</h1>";


		// Get The Variables From The Form

		$id 			= $_POST['postedid'];
		$name 			= $_POST['name'];
		$description 	= $_POST['description'];
		$ordering 		= $_POST['ordering'];
		$visablity 		= $_POST['visablity'];
		$comments 		= $_POST['comments'];
		$ads 			= $_POST['ads'];


		// Validate The Form

		$formErrors = array();

		if ( empty($name)) {

			$formErrors[] = '<strong>( Category Name )</strong> is Required';
		}

		// Loop into Error Array and Echo it 
		foreach ($formErrors as $error) {


			echo "<div class = 'alert alert-danger'>" . $error . "</div>";
		}

		// Check if No Errors ---> Proceed The Update Operation And Update The Database
		if (empty($formErrors)) {
			
		
			// Update The Database With This Info
	
			$stmt = $con->prepare("UPDATE
										$table
									SET
										Name = ?,
										Description = ?,
										Ordering = ?,
										Visablity = ?,
										Allow_Comments = ?,
										Allow_Ads = ?
									WHERE
										CatID = ? ");

			$stmt->execute(array($name, $description, $ordering, $visablity, $comments, $ads, $id));

			// Echo Success Message

			echo "<div class = 'alert alert-success'>". $stmt->rowcount() . " Record Updated" . "</div>";

			header("refresh:3,url='$_SERVER[PHP_SELF]?page=categories&sub=manage'");
		}



	} else {							// ======== Redirect To Edit Secsion   ======== //

		//echo"welcome in edit page and your Category ID is " . $_GET['catid'];
		//exit();


		// check if get request id is numeric and get intigar value of it

		$gettedid = isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET['catid']) : 0;

		//echo $gettedid ;
		//exit();

		// Select all data depend on this id

		$stmt = $con->prepare("SELECT * FROM $table WHERE CatID = ?");

		// Excute The Query

		$stmt->Execute(array($gettedid));

		// Fetch The Data

		$row = $stmt->Fetch();

		// The Row Count

		$count = $stmt->rowcount();

		// IF there is no such ID Show Error Message

		if ($count !== 1) {

			echo "7amra from edit categories page";

			exit();
		
		}else {			// Show the Form With The data of That ID 


		


		?>

			<h1 class="text-center">Edit Category</h1>
				
			<form class="form-horizontal" action=<?php echo "$_SERVER[PHP_SELF]?page=$_GET[page]&sub=$_GET[sub]"; ?> method="POST" >
				<input type="hidden" name="postedid" value="<?php echo $gettedid; ?>">
				<!-- Start Name Field -->
				<div class="form-group row">
					<label for="name" class="col-sm-2 col-form-label">Name</label>
					<div class="col-md-4">
						<input type="text" name="name" id= "name" class="form-control"  required = "required" value="<?php echo $row['Name'] ?>" />
					</div>
				</div>
				<!-- End Name Field -->
				<!-- Start Description Field -->
				<div class="form-group row">
					<label for="description" class="col-sm-2 col-form-label">Description</label>
					<div class="col-md-4">
						<input type="text" name="description" id= "description" class="form-control" placeholder="Category Description (Optional)" value="<?php echo $row['Description'] ?>"  />
					</div>
				</div>
				<!-- End Description Field -->
				<!-- Start Ordering Field -->
				<div class="form-group row">
					<label for="ordering" class="col-sm-2 col-form-label">Ordering</label>
					<div class="col-md-4">
						<input type="number" name="ordering" id= "ordering" class="form-control" value="<?php echo $row['Ordering'] ?>" />
					</div>
				</div>
				<!-- End Ordering Field -->

				<!-- Start Visablity Field -->
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Visablity</label>
					<div class="col-md-1">
						<input type="radio" name="visablity" id= "visablity" value="1" <?php if ( $row['Visablity'] == 1){echo 'Checked';} ?> />
						<label for="visablity" >Yes</label>
					</div>
					<div class="col-md-1">
						<input type="radio" name="visablity" id= "visablityno" value="0" <?php if ( $row['Visablity'] == 0){echo 'Checked';} ?> />
						<label for="visablityno" >No</label>
					</div>

				</div>
				<!-- End Visablity Field -->
				<!-- Start Allow Comments Field -->
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Allow Comments</label>
					<div class="col-md-1">
						<input type="radio" name="comments" id= "comments" value="1" <?php if ( $row['Allow_Comments'] == 1){echo 'Checked';} ?> />
						<label for="comments" >Yes</label>
					</div>
					<div class="col-md-1">
						<input type="radio" name="comments" id= "commentsno" value="0" <?php if ( $row['Allow_Comments'] == 0){echo 'Checked';} ?> />
						<label for="commentsno" >No</label>
					</div>

				</div>
				<!-- End Allow Comments Field -->
				<!-- Start Allow Ads Field -->
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Allow Ads</label>
					<div class="col-md-1">
						<input type="radio" name="ads" id= "ads" value="1" <?php if ( $row['Allow_Ads'] == 1){echo 'Checked';} ?> />
						<label for="ads" >Yes</label>
					</div>
					<div class="col-md-1">
						<input type="radio" name="ads" id= "adsno" value="0" <?php if ( $row['Allow_Ads'] == 0){echo 'Checked';} ?> />
						<label for="adsno" >No</label>
					</div>

				</div>
				<!-- End Allow Ads Field -->

				<!-- Start Save Buttom -->
				<div class="form-group row col-sm-2">
					<div class="col-sm-6">
						<button type="submit" class="btn btn-primary ">Save</button>
					</div>
				</div>
				<!-- End Save Buttom -->						
			</form>
		<?php
		}		
	}
	?>

