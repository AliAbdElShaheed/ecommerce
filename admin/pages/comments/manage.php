<?php

	// echo"welcome in manage comments page";
	// exit();

	// echo $_SERVER["DOCUMENT_ROOT"]. "<br/>";
	// echo $_SERVER['REQUEST_URI']. "<br/>";

	// echo $_SERVER['PHP_SELF'];

	$status = "";

	// Condition To Get Panding Comments or Approved Comments 

	

	if (isset($_GET['status']) && $_GET['status'] == 'panding') {

		$status = "Status = 0";

	} elseif (isset($_GET['status']) && $_GET['status'] == 'approved') {
	

		$status = "Status = 1";
	}
				
	//Select All comments 
	$stmt = $con->prepare("SELECT * FROM $table WHERE $status");

	//Execute The Statement
	$stmt->execute();

	//Assign To Variable
	$rows = $stmt->fetchAll();

?>

	<h1 class='text-center'>Manage Comments</h1>

	<div class="table-responsive ">

		<table class="table table-bordered text-center main-table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#ID</th>
					<th scope="col">Comment</th>
					<th scope="col">Status</th>
					<th scope="col">Add_Date</th>
					<th scope="col">User_ID</th>
					<th scope="col">Item_ID</th>
					<th scope="col">Control</th>

				</tr>
			</thead>
			<tbody>
			<?php

				foreach ($rows as $row) {
					echo "<tr>";
						echo "<th scope='row'>" . $row['CommentID'] . "</th>";
						echo "<td>" . $row['Comment'] . "</td>";
						echo "<td>" . $row['Status'] . "</td>";
						echo "<td>" . $row['Add_Date'] . "</td>";
						echo "<td>" . $row['User_ID'] . "</td>";
						echo "<td>" . $row['Item_ID'] . "</td>";
						echo "<td>";

							echo "<a class='btn btn-success' href=" . "$_SERVER[PHP_SELF]?page=comments&sub=edit&userid=$row[UserID]" . "><i class='fas fa-user-edit'></i> Edit</a>";
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