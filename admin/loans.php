<?php

$title = 'Dashboard';


// $myfile = "signin-form.php";

include "../templates/header.php"; 

$active[1] = "bg-green-500";

include "../templates/staff-side-left.php";

?>

	<div class="flex-grow font-semibold">


		<?php

		//Action class
		require("../action/Action.php");

		$action = new Action();
		$loans = $action->getLoansPlusUsers("Requested");

		// echo "<pre>";
		// print_r($loans->fetch_assoc());
		// echo "</pre>";

		$active_loans[0] = "bg-green-500";

		require("../templates/loan_top_links.php");

		?>


		<div class="overflow-y-auto w-full p-2" style="height: 100vh">

			<?php

			if(isset($_GET["approve"])){
				$loan_id = $_GET["approve"];
				$action->updateLoanStatus($loan_id, "Active");
			} 
			if(isset($_GET["decline"])){
				$loan_id = $_GET["decline"];
				$action->updateLoanStatus($loan_id, "Declined");
			} 


			if($loans->num_rows > 0): ?>
			<table class="w-full">
				<thead>
					<tr class="border-2 border-green-500">
						<th class="border-2 border-green-500">No</th>
						<th class="border-2 border-green-500">Borrower</th>
						<th class="border-2 border-green-500">Amount</th>
						<th class="border-2 border-green-500">Type</th>
						<th class="border-2 border-green-500">Plan</th>
						<th class="border-2 border-green-500">Reference</th>
						<th class="border-2 border-green-500">Date</th>
						<th class="border-2 border-green-500">Status</th>
						<th class="border-2 border-green-500">Approve</th>
						<th class="border-2 border-green-500 text-red-500">Decline</th>
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
							<?php echo $row["loan_reference"];?>
						</td>
						<td class="border-2 border-green-500 py-1">
							<?php echo $row["date_created"];?>
						</td>
						<td class="border-2 border-green-500 py-1">
							<?php echo $row["loan_status"];?>
						</td>
						<td class="border-2 border-green-500 py-1">
							<a href="?approve=<?php echo $row["ln_id"];?>" class="w-full text-center ml-3 border-2 border-green-500"><span class="material-icons-outlined">done</span></a>
						</td>
						<td class="border-2 border-green-500 py-1">
							<a href="?decline=<?php echo $row["ln_id"];?>" class="w-full text-center ml-3 border-2 border-red-500"><span class="material-icons-outlined">close</span></a>
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