<?php

	if (count($_POST) > 0) {			// ======== Redirect To Insert Secsion ======== //

		//echo"welcome in Insert page";
		//echo"<pre>";
		//print_r($_POST);
		//exit();

		echo "<h1 class='text-center'>Insert Category</h1>";

			// Get The Variables From The Form

			$name 				= $_POST['name'];
			$description 		= $_POST['description'];
			$ordering 			= $_POST['ordering'];
			$visablity 			= $_POST['visablity'];
			$comments 			= $_POST['comments'];
			$ads 				= $_POST['ads'];


			//echo  $name .$description . $ordering . $visablity . $comments . $ads ;
			//exit();



			// Validate The Form

			$formErrors = array();

			if ( empty($name)) {

				$formErrors[] = '<strong>( Category Name )</strong> is Required';
			}

			// Loop into Error Array and Echo it 
			foreach ($formErrors as $error) {


				echo "<div class = 'alert alert-danger'>" . $error . "</div>";

			}

			// Check if No Errors ---> Proceed The Insert Operation To The Database
			if (empty($formErrors)) {

				// Chech If The User Email Is Exist IN Database (Using SelectDB Function)

				$checkDB = SelectDB("Name", "categories", "Name", $name);

				if ($checkDB > 0) {

					echo "<div class = 'alert alert-success'>". "The<strong> Category Name </strong>That You Have Entered Is Already Exist, Please Choose Another One" ."</div>" ;
					header("refresh:4,url='$_SERVER[PHP_SELF]?page=categories&sub=add'");
					
				} else {
				
					// Insert The Data Into The Database
			
					$stmt = $con->prepare("INSERT INTO
												categories (Name, Description, Ordering, Visablity, Allow_Comments, Allow_Ads)
												VALUES (:zName, :zDescription, :zOrdering, :zVisablity, :zComments, :zAds)
												");

					$stmt->execute(array(

						'zName' 		=> $name,
						'zDescription' 	=> $description,
						'zOrdering' 	=> $ordering,
						'zVisablity' 	=> $visablity,
						'zComments' 	=> $comments,
						':zAds' 		=> $ads
					));

					// Echo Success Message

					echo "<div class = 'alert alert-success'>". $stmt->rowcount() . " Record Inserted" . "</div>"; 

					header("refresh:4,url='$_SERVER[PHP_SELF]?page=categories&sub=add'");

				}
			}
			
		
		
	} else {							// ======== Redirect To Add Secsion   ======== //



	//echo "Welcome In Add Category Page";
?>

		<h1 class="text-center">Add Category</h1>

			
		<form class="form-horizontal" action=<?php echo "$_SERVER[PHP_SELF]?page=$_GET[page]&sub=$_GET[sub]"; ?> method="POST" >
		 	
			<!-- Start Name Field -->
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Name</label>
				<div class="col-md-4">
					<input type="text" name="name" id= "name" class="form-control" autocomplete="off" required = "required" />
				</div>
			</div>
			<!-- End Name Field -->
			<!-- Start Description Field -->
			<div class="form-group row">
				<label for="description" class="col-sm-2 col-form-label">Description</label>
				<div class="col-md-4">
					<input type="text" name="description" id= "description" class="form-control" autocomplete="off" placeholder="Category Description (Optional)"  />
				</div>
			</div>
			<!-- End Description Field -->
			<!-- Start Ordering Field -->
			<div class="form-group row">
				<label for="ordering" class="col-sm-2 col-form-label">Ordering</label>
				<div class="col-md-4">
					<input type="number" name="ordering" id= "ordering" class="form-control" autocomplete="off " />
				</div>
			</div>
			<!-- End Ordering Field -->

			<!-- Start Visablity Field -->
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Visablity</label>
				<div class="col-md-1">
					<input type="radio" name="visablity" id= "visablity" value="1" checked />
					<label for="visablity" >Yes</label>
				</div>
				<div class="col-md-1">
					<input type="radio" name="visablity" id= "visablityno" value="0" />
					<label for="visablityno" >No</label>
				</div>

			</div>
			<!-- End Visablity Field -->
			<!-- Start Allow Comments Field -->
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Allow Comments</label>
				<div class="col-md-1">
					<input type="radio" name="comments" id= "comments" value="1" checked />
					<label for="comments" >Yes</label>
				</div>
				<div class="col-md-1">
					<input type="radio" name="comments" id= "commentsno" value="0" />
					<label for="commentsno" >No</label>
				</div>

			</div>
			<!-- End Allow Comments Field -->
			<!-- Start Allow Ads Field -->
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Allow Ads</label>
				<div class="col-md-1">
					<input type="radio" name="ads" id= "ads" value="1" checked />
					<label for="ads" >Yes</label>
				</div>
				<div class="col-md-1">
					<input type="radio" name="ads" id= "adsno" value="0" />
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
