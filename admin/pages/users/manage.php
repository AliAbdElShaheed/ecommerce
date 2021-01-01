<?php

	//echo"welcome in manage members page";

	echo $_SERVER["DOCUMENT_ROOT"]. "<br/>";
	echo $_SERVER['REQUEST_URI']. "<br/>";

	echo $_SERVER['PHP_SELF'];

	$pending = "";

	// Condition To Get Panding Users only

	if (isset($_GET['pending']) && $_GET['pending'] == 'pending') {

		$pending = "And Regstatus = 0";
	}

	// Condition To Get Admin Users or Normal Users
	
	$admins = "";

	if (isset($_GET['admins']) && $_GET['admins'] == 'admins') {

		$admins = "GroupID = 1";
	} else {

		$admins = "GroupID != 1";
	}

				
	//Select All Users Except Admins
	$stmt = $con->prepare("SELECT * FROM $table WHERE $admins $pending");

	//Execute The Statement
	$stmt->execute();

	//Assign TO Variable
	$rows = $stmt->fetchAll();

?>

	<h1 class='text-center'>Manage Mambers</h1>

	<div class="table-responsive ">

		<table class="table table-bordered text-center main-table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#ID</th>
					<th scope="col">Username</th>
					<th scope="col">Email</th>
					<th scope="col">Full Name</th>
					<th scope="col">Register Date</th>
					<th scope="col">Control</th>

				</tr>
			</thead>
			<tbody>
			<?php

				foreach ($rows as $row) {
					echo "<tr>";
						echo "<th scope='row'>" . $row['UserID'] . "</th>";
						echo "<td>" . $row['Username'] . "</td>";
						echo "<td>" . $row['Email'] . "</td>";
						echo "<td>" . $row['Fullname'] . "</td>";
						echo "<td>" . $row['Date'] . "</td>";
						echo "<td>";

							echo "<a class='btn btn-success' href=" . "$_SERVER[PHP_SELF]?page=users&sub=edit&userid=$row[UserID]" . "><i class='fas fa-user-edit'></i> Edit</a>";
							echo "<a class='btn btn-danger confirm' href=" . "$_SERVER[PHP_SELF]?page=users&sub=delete&userid=$row[UserID]" . "><i class='fas fa-user-times'></i>". " " . "Delete</a>";

							if ($row['Regstatus'] == 0) {

								echo "<a class='btn btn-primary' href=" . "$_SERVER[PHP_SELF]?page=users&sub=activate&userid=$row[UserID]" . "><i class='fas fa-user-check'></i>". " " . "Activate</a>";
							}

						echo "</td>";
					echo "</tr>";

				}


			?>
			
			</tbody>				
		</table>
	</div>

