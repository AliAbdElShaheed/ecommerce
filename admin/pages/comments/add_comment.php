<?php

	if (count($_POST) > 0) {			// ======== Redirect To Insert Secsion ======== //

		//echo"welcome in Insert page";
		//echo"<pre>";
		//print_r($_POST);
		//exit();

		echo "<h1 class='text-center'>Add Member</h1>";

		// echo "<div class = 'container' >";

			// Get The Variables From The Form

			$user 		= $_POST['username'];
			$pass 		= $_POST['password'];
			$email 		= $_POST['email'];
			$name 		= $_POST['full'];

			$hashedpass = sha1($pass);
			//echo  $user .$pass . $email . $name ;



			// Validate The Form

			$formErrors = array();

			if ( empty($user)) {

				$formErrors[] = '<strong>( Username )</strong> is Required';
			}

			if (empty($pass)) {

				$formErrors[] = '<strong>( Password )</strong> is Required';
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

			// Check if No Errors ---> Proceed The Insert Operation To The Database
			if (empty($formErrors)) {

				// Chech If The User Email Is Exist IN Database (Using SelectDB Function)

				$checkDB = SelectDB("Email", "users", "Email", $email);

				if ($checkDB > 0) {

					echo "The Email That You Have Entered Is Already Exist, And You Can Reset Your Password From Here --> <a href = '#' >Reset Password</a>";
				} else {
				
					// Insert The Data Into The Database
			
					$stmt = $con->prepare("INSERT INTO
												users (Username, Password, Email, Fullname, Regstatus, Date)
												VALUES (:zuser, :zpass, :zemail, :zname, 1, now())
												");

					$stmt->execute(array(

						'zuser' => $user,
						'zpass' => $hashedpass,
						'zemail'=> $email,
						'zname' => $name
					));

					// Echo Success Message

					echo "<div class = 'alert alert-success'>". $stmt->rowcount() . " Record Inserted" . "</div>"; 

					header("refresh:4,url='$_SERVER[PHP_SELF]?page=users&sub=add'");

				}
			}
			
		// echo "</div>";
		
		
	} else {							// ======== Redirect To Add Secsion   ======== //



	//echo "Welcome In Add Member Page";
?>

		<h1 class="text-center">Add Member</h1>

<!-- 		<div class="container"> -->
			
			<form class="form-horizontal" action=<?php echo "$_SERVER[PHP_SELF]?page=$_GET[page]&sub=$_GET[sub]"; ?> method="POST" >
			 	
				<!-- Start Username Field -->
				<div class="form-group row">
					<label for="username" class="col-sm-2 col-form-label">Username</label>
					<div class="col-md-4">
						<input type="text" name="username" id= "username" class="form-control" autocomplete="off" required = "required" />
					</div>
				</div>
				<!-- End Username Field -->
				<!-- Start Password Field -->
				<div class="form-group row">
					<label for="password" class="col-sm-2 col-form-label">Password</label>
					<div class="col-md-4">
						<input type="password" name="password" id= "password" class="form-control" autocomplete="new-password" placeholder="P@$s0wrd" required = "required" />
<!-- 						<i class="show_pass fa fa-eye fa-2x"></i> -->
					</div>
				</div>
				<!-- End Password Field -->
				<!-- Start Email Field -->
				<div class="form-group row">
					<label for="Email" class="col-sm-2 col-form-label">Email</label>
					<div class="col-md-4">
						<input type="Email" name="email" id= "Email" class="form-control" autocomplete="off" placeholder="name@example.com" required = "required" />
					</div>
				</div>
				<!-- End Email Field -->
				<!-- Start Full Name Field -->
				<div class="form-group row">
					<label for="Full" class="col-sm-2 col-form-label">Full Name</label>
					<div class="col-md-4">
						<input type="text" name="full" id= "Full" class="form-control" required = "required" />
					</div>
				</div>
				<!-- End Full Name Field -->
				<!-- Start Save Buttom -->
				<div class="form-group row col-sm-2">
					<div class="col-sm-6">
						<button type="submit" class="btn btn-primary ">Add Member</button>
					</div>
				</div>
				<!-- End Save Buttom -->						
			</form>
<!-- 		</div> -->
		<?php
	}
