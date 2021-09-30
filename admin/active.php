<?php

$title = 'Dashboard';


// $myfile = "signin-form.php";

require "../templates/header.php"; 

$active[1] = "bg-green-500";

require "../templates/staff-side-left.php";

?>

	<div class="flex-grow font-semibold">


		<?php

		//Action class
		require("../action/Action.php");

		$action = new Action();
		$loans = $action->getLoansPlusUsers("Active");


		// echo "<pre>";
		// print_r($loans->fetch_assoc());
		// echo "</pre>";

		$active_loans[1] = "bg-green-500";

		require("../templates/loan_top_links.php");

		?>
		



		<div class="overflow-y-auto p-2" style="height: 100vh">
			<?php if($loans->num_rows > 0): ?>
			<table class="w-full">
				<thead>
					<tr class="border-2 border-green-500">
						<th class="border-2 border-green-500">No</th>
						<th class="border-2 border-green-500">Borrower</th>
						<th class="border-2 border-green-500">Amount</th>
						<th class="border-2 border-green-500">Type</th>
						<th class="border-2 border-green-500">Plan</th>
						<th class="border-2 border-green-500">Date</th>
						<th class="border-2 border-green-500">Status</th>
					</tr>
				</thead>

				<tbody class="border-2">
					<?php
					$i = 1;
					while($row = $loans->fetch_assoc()):?>
					<tr class="border-2 border-green-500 py-2">
						<th class="border-2 border-green-500 py-1"><?php echo $i; ?></th>
						<td class="border-2 border-green-500 py-1">
							<?php echo $row["cst_firstname"]." ".$row["cst_lastname"];?>
						</td>
						<td class="border-2 border-green-500 py-1">
							$<?php echo $row["amount"];?>
						</td>
						<td class="border-2 border-green-500 py-1">
							<?php echo $row["type"];?>
						</td>
						<td class="border-2 border-green-500 py-1">
							<?php echo $row["plan"];?>
						</td>
						<td class="border-2 border-green-500 py-1">
							<?php echo $row["date_created"];?>
						</td>
						<td class="border-2 border-green-500 py-1">
							<?php echo $row["loan_status"];?>
						</td>
						
					</tr>
				<?php $i++; endwhile; ?>
				</tbody>



			</table>
			<?php else: ?>
			<div class="p-2">
				No loan requests
			</div>
			<?php endif; ?>
			</div>

		</div>

	</div>
	
	

</div>


<?php include "../templates/footer.php"; ?>