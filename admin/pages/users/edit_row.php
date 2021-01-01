<?php

	if (count($_POST) > 0) {			// ======== Redirect To Update Secsion ======== //

		//echo"welcome in update page and your ID is " . $_POST['postedid'];
		//echo"<pre>";
		//print_r($_POST);

		echo "<h1 class='text-center'>Update Member</h1>";

		// echo "<div class = 'container' >";

			// Get The Variables From The Form

			$id 		= $_POST['postedid'];
			$user 		= $_POST['username'];
			$email 		= $_POST['email'];
			$name 		= $_POST['full'];
			//echo $id . $user . $email . $name ;

			// Password Simple Trick
			$pass 		= empty($_POST['newpassword']) ? $_POST['oldpassword'] : sha1($_POST['newpassword']);


			// Validate The Form

			$formErrors = array();

			if ( empty($user)) {

				$formErrors[] = '<strong>( Username )</strong> is Required';
			}

			if (empty($email)) {

				$formErrors[] = '<strong>( Email )</strong> is Required';
			}

			if (empty($name)) {

				$formErrors[] = '<strong>( Full Name )</strong> is Required';
			}

			// Loop into Error Array and Echo it 
			foreach ($formErrors as $error) {


				echo "<div class = 'alert alert-danger'>" . $error . "</div>";
			}

			// Check if No Errors ---> Proceed The Update Operation And Update The Database
			if (empty($formErrors)) {
				
			
				// Update The Database With This Info
		
				$stmt = $con->prepare("UPDATE
											users
										SET
											Username = ?,
											Email = ?,
											Fullname = ?,
											Password = ?
										WHERE
											UserID = ? ");

				$stmt->execute(array($user, $email, $name, $pass, $id));

				// Echo Success Message

				echo "<div class = 'alert alert-success'>". $stmt->rowcount() . " Record Updated" . "</div>";

				header("refresh:3,url='$_SERVER[PHP_SELF]?page=users&sub=manage'");
			}
			
		// echo "</div>";
		
		
	} else {							// ======== Redirect To Edit Secsion   ======== //

		//echo"welcome in edit page and your ID is " . $_GET['userid'];


		// check if get request id is numeric and get intigar value of it

		$gettedid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

		//echo $gettedid ;

		// Select all data depend on this id

		$stmt = $con->prepare("SELECT * FROM users WHERE UserID = ? LIMIT 1");

		// Excute The Query

		$stmt->Execute(array($gettedid));

		// Fetch The Data

		$row = $stmt->Fetch();

		// The Row Count

		$count = $stmt->rowcount();

		// IF there is no such ID Show Error Message

		if ($count !== 1) {

			echo "7amra from edit page";

			exit();
		
		}else {			// Show the Form With The data of That ID 


		


		?>

			<h1 class="text-center">Edit Member</h1>

<!-- 			<div class="container"> -->
				
				<form class="form-horizontal" action=<?php echo "$_SERVER[PHP_SELF]?page=$_GET[page]&sub=$_GET[sub]"; ?> method="POST" >
				 	<input type="hidden" name="postedid" value="<?php echo $gettedid;  ?>">
					<!-- Start Username Field -->
					<div class="form-group row">
						<label for="username" class="col-sm-2 col-form-label">Username</label>
						<div class="col-md-4">
							<input type="text" name="username" id= "username" class="form-control" value="<?php echo $row['Username']?>" autocomplete="off" required = "required" />
						</div>
					</div>
					<!-- End Username Field -->
					<!-- Start Password Field -->
					<div class="form-group row">
						<label for="password" class="col-sm-2 col-form-label">Password</label>
						<div class="col-md-4">
							<input type="hidden" name="oldpassword" value="<?php echo $row['Password'] ?>"  />
							<input type="password" name="newpassword" id= "password" class="form-control" autocomplete="new-password" placeholder="Leave Blank If You Don't Want To Change It"  />
						</div>
					</div>
					<!-- End Password Field -->
					<!-- Start Email Field -->
					<div class="form-group row">
						<label for="Email" class="col-sm-2 col-form-label">Email</label>
						<div class="col-md-4">
							<input type="Email" name="email" id= "Email" class="form-control" value="<?php echo $row['Email']?>" autocomplete="off" placeholder="name@example.com" required = "required" />
						</div>
					</div>
					<!-- End Email Field -->
					<!-- Start Full Name Field -->
					<div class="form-group row">
						<label for="Full" class="col-sm-2 col-form-label">Full Name</label>
						<div class="col-md-4">
							<input type="text" name="full" id= "Full" value="<?php echo $row['Fullname']?>" class="form-control" required = "required" />
						</div>
					</div>
					<!-- End Full Name Field -->
					<!-- Start Save Buttom -->
					<div class="form-group row col-sm-2">
						<div class="col-sm-6">
							<button type="submit" class="btn btn-primary ">Save</button>
						</div>
					</div>
					<!-- End Save Buttom -->						
				</form>
<!-- 			</div> -->

		<?php
		}		
	}
	?>

