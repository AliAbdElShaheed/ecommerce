<?php

	if (count($_POST) > 0) {			// ======== Redirect To Insert Secsion ======== //

		// echo"welcome in Insert page";
		// echo"<pre>";
		// print_r($_POST);
		// exit();

		echo "<h1 class='text-center'>Insert Item</h1>";

			// Get The Variables From The Form

			$name 				= $_POST['name'];
			$description 		= $_POST['description'];
			$price 				= $_POST['price'];
			$country 			= $_POST['country'];
			$category 			= $_POST['category'];
			$status 			= $_POST['status'];
			$Memberid			= $_POST['postedid'];



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

			// Check if No Errors ---> Proceed The Insert Operation To The Database
			if (empty($formErrors)) {
				
					// Insert The Data Into The Database
			
					$stmt = $con->prepare("INSERT INTO
												$table (Name, Description, Price, Country_Made, Cat_ID, Status, User_ID)
												VALUES (:zName, :zDescription, :zPrice, :zCountry, :zCategory, :zStatus, :zUserid)
												");

					$stmt->execute(array(

						'zName' 		=> $name,
						'zDescription' 	=> $description,
						'zPrice' 		=> $price,
						'zCountry' 		=> $country,
						'zCategory' 	=> $category,
						'zStatus' 		=> $status,
						'zUserid'		=> $Memberid
					));

					// Echo Success Message

					echo "<div class = 'alert alert-success'>". $stmt->rowcount() . " Record Inserted" . "</div>"; 

					header("refresh:4,url='$_SERVER[PHP_SELF]?page=$page&sub=add'");
			}
			
		
		
	} else {							// ======== Redirect To Add Secsion   ======== //



	// echo "Welcome In Add Items Page";
	// exit();
	// echo $_SESSION['ID'];
?>

		<h1 class="text-center">Add New Item</h1>
		
		<form class="form-horizontal items" action=<?php echo "$_SERVER[PHP_SELF]?page=$_GET[page]&sub=$_GET[sub]"; ?> method="POST" >
		 	<input type="hidden" name="postedid" value="<?php echo $_SESSION['ID']; ?>">

			<!-- Start Name Field -->
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Name :</label>
				<div class="col-md-4">
					<input type="text" name="name" id= "name" class="form-control" required = "required" />
				</div>
			</div>
			<!-- End Name Field -->
			<!-- Start Description Field -->
			<div class="form-group row">
				<label for="description" class="col-sm-2 col-form-label">Description :</label>
				<div class="col-md-4">
					<input type="text" name="description" id= "description" class="form-control" placeholder="Category Description (Optional)"  />
				</div>
			</div>
			<!-- End Description Field -->
			<!-- Start Price Field -->
			<div class="form-group row">
				<label for="price" class="col-sm-2 col-form-label">Price :</label>
				<div class="col-md-3">
					<input type="number" name="price" id= "price" class="form-control" required = "required"  />
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
					<input type="text" name="country" id= "country" class="form-control" placeholder="Country of Made" required = "required" />
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
							echo "<option value ='".$cat['CatID'] ."'>".$cat['Name']."</option>";
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
						<option selected >..</option>
						<option value="1">New</option>
						<option value="2">Like New</option>
						<option value="3">Used</option>
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
					<button type="submit" class="btn btn-primary ">Add Item</button>
				</div>
			</div>
			<!-- End Save Buttom -->						
		</form>

		<?php
	}
