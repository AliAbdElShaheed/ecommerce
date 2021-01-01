<?php
	//////// Check if user is coming from HTTP POST request 


	//if ( count ($_POST) > 0 ){
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$username = $_POST['user'];
		$password = $_POST['pass'];
		$hashedpass = sha1($password);

		//echo $username . $password . $hashedpass;

		//Check if the user is exist in database

		$stmt = $con->prepare("SELECT
									UserID, Username, Password
								FROM
									users
								WHERE 
									Username = ?
								AND
									Password = ?
								AND
									GroupID = 1
								LIMIT 1");

		$stmt->execute(array($username, $hashedpass));
		$row = $stmt->fetch();
		$count = $stmt->rowCount();
		//echo $count;

		// If count > 0 this mean that user has record in database

		if ($count > 0) {
			//echo"<pre>";
			//print_r($row);

			$_SESSION['Username'] = $username;	// Register Session Username
			$_SESSION['ID'] = $row['UserID'];	// Register Session ID
			header('location: dashboard.php');	// Redirect to Dashboard Page
			exit();

		}



	}
?>

	<form class="login" action=<?php echo "$_SERVER[PHP_SELF]"; ?> method="POST" >
		<h4 class="text-center">Admin Login</h4>
		<input class="form-control" type="text" name="user" placeholder="Username" autocomplete="off" />
		<input class="form-control" type="password" name="pass" placeholder="Password" autocomplete="new-password" />
		<input class="btn btn-primary btn-block" type="submit" value="Login" />
	</form>

