<?php

	if (count($_POST) > 0) {			// ======== Redirect To Update Secsion ======== //

		// echo"welcome in update page and your ID is " . $_POST['postedid'];
		// echo"<pre>";
		// print_r($_POST);
		// exit();

		echo "<h1 class='text-center'>Update Comment</h1>";

		// echo "<div class = 'container' >";

			// Get The Variables From The Form

			$id 		= $_POST['postedid'];
			$comment 		= $_POST['comment'];

			// echo $id . $comment  ;
			// exit();


			// Validate The Form

			$formErrors = array();

			if ( empty($user)) {

				$formErrors[] = '<strong>( The Comment )</strong> is Required';
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
											Comment = ?

										WHERE
											CommentID = ? ");

				$stmt->execute(array($comment, $id));

				// Echo Success Message

				echo "<div class = 'alert alert-success'>". $stmt->rowcount() . " Record Updated" . "</div>";

				header("refresh:3,url='$_SERVER[PHP_SELF]?page=comments&sub=manage'");
			}
			
		// echo "</div>";
		
		
	} else {							// ======== Redirect To Edit Secsion   ======== //

		// echo"welcome in edit page and your Comment ID is " . $_GET['commentid'];
		// exit();


		// check if get request id is numeric and get intigar value of it

		$gettedid = isset($_GET['commentid']) && is_numeric($_GET['commentid']) ? intval($_GET['commentid']) : 0;

		// echo $gettedid ;
		// exit();

		// Select all data depend on this id

		$stmt = $con->prepare("SELECT * FROM $table WHERE commentID = ? LIMIT 1");

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

			<h1 class="text-center">Edit Comment</h1>

<!-- 			<div class="container"> -->
				
				<form class="form-horizontal" action=<?php echo "$_SERVER[PHP_SELF]?page=$_GET[page]&sub=$_GET[sub]"; ?> method="POST" >
				 	<input type="hidden" name="postedid" value="<?php echo $gettedid;  ?>">
					<!-- Start Comment Field -->
					<div class="form-group row">
						<label for="comment" class="col-sm-2 col-form-label">The Comment</label>
						<div class="col-md-6">
							<textarea class="form-control" name="comment" required = "required"> <?php echo $row['Comment']?> </textarea>
						</div>
					</div>
					<!-- End Comment Field -->

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

