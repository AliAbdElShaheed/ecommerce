<?php

	if (count($_POST) > 0) {			// ======== Redirect To Update Secsion ======== //

		// echo"welcome in update page and your ID is " . $_POST['postedid'];
		// echo"<pre>";
		// print_r($_POST);
		// exit();

		echo "<h1 class='text-center'>Update Item</h1>";


		// Get The Variables From The Form

		$id 			= $_POST['postedid'];
		$name 			= $_POST['name'];
		$description 	= $_POST['description'];
		$price 			= $_POST['price'];
		$country 		= $_POST['country'];
		$category 		= $_POST['category'];
		$status 		= $_POST['status'];


		// Validate The Form

		$formErrors = array();

		if ( empty($name)) {

			$formErrors[] = '<strong>( Item Name )</strong> is Required';
		}

		if ( empty($price)) {

			$formErrors[] = '<strong>( Item Price )</strong> is Required';
		}

		if ( empty($country)) {

			$formErrors[] = '<strong>( Item Country )</strong> is Required';
		}

		if ( empty($status)) {

			$formErrors[] = '<strong>( Item status )</strong> is Required';
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
										Price = ?,
										Country_Made = ?,
										Cat_ID = ?,
										Status = ?
									WHERE
										ItemID = ? ");

			$stmt->execute(array($name, $description, $price, $country, $category, $status, $id));

			// Echo Success Message

			echo "<div class = 'alert alert-success'>". $stmt->rowcount() . " Record Updated" . "</div>";

			header("refresh:3,url='$_SERVER[PHP_SELF]?page=$page&sub=manage'");
		}



	} else {							// ======== Redirect To Edit Secsion   ======== //

		// echo"welcome in edit page and your item ID is " . $_GET['itemid'];
		// exit();


		// check if get request id is numeric and get intigar value of it

		$gettedid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']) : 0;

		// echo $gettedid ;
		// exit();

		// Select all data depend on this id

		$stmt = $con->prepare("SELECT * FROM $table WHERE ItemID = ?");

		// Excute The Query

		$stmt->Execute(array($gettedid));

		// Fetch The Data

		$row = $stmt->Fetch();

		// The Row Count

		$count = $stmt->rowcount();

		// IF there is no such ID Show Error Message

		if ($count !== 1) {

			echo "7amra from edit items page";

			exit();
		
		}else {		// Show the Form With The data of That ID 


		


		?>

			<h1 class="text-center">Edit Item</h1>
				
			<form class="form-horizontal" action=<?php echo "$_SERVER[PHP_SELF]?page=$_GET[page]&sub=$_GET[sub]"; ?> method="POST" >
				<input type="hidden" name="postedid" value="<?php echo $gettedid; ?>">
			<!-- Start Name Field -->
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Name :</label>
				<div class="col-md-4">
					<input type="text" name="name" id= "name" class="form-control" value="<?php echo $row['Name'] ?>" />
				</div>
			</div>
			<!-- End Name Field -->
			<!-- Start Description Field -->
			<div class="form-group row">
				<label for="description" class="col-sm-2 col-form-label">Description :</label>
				<div class="col-md-4">
					<input type="text" name="description" id= "description" class="form-control" placeholder="Category Description (Optional)" value="<?php echo $row['Description'] ?>"  />
				</div>
			</div>
			<!-- End Description Field -->
			<!-- Start Price Field -->
			<div class="form-group row">
				<label for="price" class="col-sm-2 col-form-label">Price :</label>
				<div class="col-md-3">
					<input type="number" name="price" id= "price" class="form-control" value="<?php echo $row['Price'] ?>"  />
				</div>
				<div class="col-md-1">
					<p> USD </p>
				</div>
			</div>
			<!-- End Price Field -->
			<!-- Start Country Field -->
			<div class="form-group row">
				<label for="country" class="col-sm-2 col-form-label">Country :</label>
				<div class="col-md-4">
					<input type="text" name="country" id= "country" class="form-control" value="<?php echo $row['Country_Made'] ?>" />
				</div>
			</div>
			<!-- End Country Field -->
			<!-- Start Category Field -->
			<div class="form-group row">
				<label for="category" class="col-sm-2 col-form-label">Category :</label>
				<div class="col-md-4">
					<select name="category" id= "category" class=" custom-select">
						<?php
						$stmt = $con->prepare("SELECT * FROM categories");
						$stmt->execute();
						$cats = $stmt->fetchall();
						foreach ($cats as $cat) {
							echo "<option value ='" . $cat['CatID'] . "'";
							if ($row['Cat_ID'] == $cat['CatID'] ) { echo 'selected'; }
							echo " >".$cat['Name'];
							echo "</option>";
						}

						?>
					</select> 
				</div>
			</div>
			<!-- End Category Field -->
			<!-- Start Status Field -->
			<div class="form-group row">
				<label for="status" class="col-sm-2 col-form-label">Status :</label>
				<div class="col-md-4">
					<select name="status" id= "status" class=" custom-select">
						<option value="1" <?php if ($row['Status'] == 1 ) { echo 'selected'; } ?>>New</option>
						<option value="2" <?php if ($row['Status'] == 2 ) { echo 'selected'; } ?>>Like New</option>
						<option value="3" <?php if ($row['Status'] == 3 ) { echo 'selected'; } ?>>Used</option>
					</select> 
				</div>
			</div>
			<!-- End Status Field -->
			<!-- Start Image Field -->
			<div class="form-group row ">
				<div class="custom-file col-md-4 ">
					<input type="file" class="custom-file-input " id="customFile">
					<label class="custom-file-label" for="customFile">Choose file</label>
				</div>
			</div>
			<!-- End Image Field -->

			<!-- Start Save Buttom -->
			<div class="form-group row col-sm-2">
				<div class="col-sm-6">
					<button type="submit" class="btn btn-primary ">Save Item</button>
				</div>
			</div>
			<!-- End Save Buttom -->									
			</form>
		<?php
		}		
	}
	?>

