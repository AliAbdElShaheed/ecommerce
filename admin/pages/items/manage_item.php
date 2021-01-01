<?php

	// echo"welcome in manage Items page";
	// exit();

	// Variable ($sort) To Make Dynamic Sort
	$sort = 'DESC';

	$sort_array = array('ASC', 'DESC');

	if (isset($_GET['sort']) && in_array($_GET['sort'], $sort_array)) {

		$sort = $_GET['sort'];
	}

	// Condition To Get Approved or Wait Approve Items
	
	$approve = "";

	if (isset($_GET['approve']) && $_GET['approve'] == 'yes') {

		$approve = "$table.Approval  = 1";

	} elseif (isset($_GET['approve']) && $_GET['approve'] == 'no') {

		$approve = " $table.Approval  = 0 ";

	} else {

		$approve = "$table.Approval  != 2";
	}
	

	//Select Statement
	$stmt2 = $con->prepare("SELECT
								$table.*,
								categories.Name AS Category,
								users.Fullname AS Member
							FROM
								$table
							INNER JOIN
								categories
							ON
								$table.Cat_ID = categories.CatID
							INNER JOIN
								users
							ON
								$table.User_ID = users.UserID
							WHERE
								$approve
							");

	//Execute The Statement
	$stmt2->execute();

	//Assign TO Variable
	$items = $stmt2->fetchAll();

?>

	<h1 class='text-center'>Manage Items</h1>

	<div class="table-responsive ">

		<table class="table table-bordered text-center main-table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#ID</th>
					<th scope="col">Name</th>
					<th scope="col">Description</th>
					<th scope="col">Price</th>
					<th scope="col">Date</th>
					<th scope="col">Category</th>
					<th scope="col">Owner</th>
					<th scope="col">Control</th>

				</tr>
			</thead>
			<tbody>
			<?php

				foreach ($items as $item) {
					echo "<tr>";
						echo "<th scope='row'>" . $item['ItemID'] . "</th>";
						echo "<td>" . $item['Name'] . "</td>";
						echo "<td>" . $item['Description'] . "</td>";
						echo "<td>" . $item['Price'] . "</td>";
						echo "<td>" . $item['Add_Date'] . "</td>";
						echo "<td>" . $item['Category'] . "</td>";
						echo "<td>" . $item['Member'] . "</td>";
						echo "<td class = 'item'>";

							echo "<a class='btn btn-success' href=" . "$_SERVER[PHP_SELF]?page=$page&sub=edit&itemid=$item[ItemID]" . "><i class='far fa-edit'></i> Edit</a>";
							echo "<a class='btn btn-danger confirm' href=" . "$_SERVER[PHP_SELF]?page=$page&sub=delete&itemid=$item[ItemID]" . "><i class='far fa-trash-alt'></i>". " " . "Del</a>";

							if ($item['Approval'] == 0) {

								echo "<a class='btn btn-primary' href=" . "$_SERVER[PHP_SELF]?page=$page&sub=approve&itemid=$item[ItemID]" . "><i class='fas fa-check'></i>". " " . "Approve</a>";
							}

						echo "</td>";
					echo "</tr>";

				}


			?>
			
			</tbody>				
		</table>
	</div>