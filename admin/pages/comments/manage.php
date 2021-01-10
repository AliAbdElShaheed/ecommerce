<?php

	// echo"welcome in manage comments page";
	// exit();

	// echo $_SERVER["DOCUMENT_ROOT"]. "<br/>";
	// echo $_SERVER['REQUEST_URI']. "<br/>";

	// echo $_SERVER['PHP_SELF'];

	$status = "$table.Status != 2";

	// Condition To Get Panding Comments or Approved Comments 

	

	if (isset($_GET['status']) && $_GET['status'] == 'pending') {

		$status = "$table.Status = 0";

	} elseif (isset($_GET['status']) && $_GET['status'] == 'approved') {
	

		$status = "$table.Status = 1";
	}
				
	//Select All comments 
	$stmt3 = $con->prepare("SELECT
								$table.*,
								items.Name AS Item,
								users.Fullname AS Member
							FROM
								$table
							INNER JOIN
								items
							ON
								$table.Item_ID = items.ItemID
							INNER JOIN
								users
							ON
								$table.User_ID = users.UserID
							WHERE
								$status
							");

	//Execute The Statement
	$stmt3->execute();

	//Assign To Variable
	$comments = $stmt3->fetchAll();

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
					<th scope="col">Member</th>
					<th scope="col">Item</th>
					<th scope="col">Control</th>

				</tr>
			</thead>
			<tbody>
			<?php

				foreach ($comments as $comment) {
					echo "<tr>";
						echo "<th scope='row'>" . $comment['CommentID'] . "</th>";
						echo "<td>" . $comment['Comment'] . "</td>";
						echo "<td>";

							if ($comment['Status'] == 0){
								echo "<p class='text-danger'>Not Approved Yet</p>";

							} else {

								echo "<p class='text-success'>Approved & Published</p>";
							}
							
						echo "</td>";
						echo "<td>" . $comment['Add_Date'] . "</td>";
						echo "<td>" . $comment['Member'] . "</td>";
						echo "<td>" . $comment['Item'] . "</td>";
						echo "<td>";

							echo "<a class='btn btn-success' href=" . "$_SERVER[PHP_SELF]?page=comments&sub=edit&commentid=$comment[CommentID]" . "><i class='fas fa-user-edit'></i> Edit</a>";
							echo "<a class='btn btn-danger confirm' href=" . "$_SERVER[PHP_SELF]?page=comments&sub=delete&commentid=$comment[CommentID]" . "><i class='fas fa-user-times'></i>". " " . "Delete</a>";

							if ($comment['Status'] == 0) {

								echo "<a class='btn btn-primary' href=" . "$_SERVER[PHP_SELF]?page=comments&sub=activate&commentid=$comment[CommentID]" . "><i class='fas fa-user-check'></i>". " " . "Activate</a>";
							}

						echo "</td>";
					echo "</tr>";

				}


			?>
			
			</tbody>				
		</table>
	</div>