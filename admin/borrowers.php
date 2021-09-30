<?php

$title = 'Dashboard';


// $myfile = "signin-form.php";

include "../templates/header.php";

$active[3] = "bg-green-500";

include "../templates/staff-side-left.php";


?>

	<div class="flex-grow p-2 font-semibold">

		<?php
		//Action class
		require("../action/Action.php");

		$action = new Action();
		$customers = $action->getCustomerPlusLoan("all");

		// echo "<pre>";
		// print_r($customers->fetch_assoc());
		// echo "</pre>";
		?>
		
		<div class="overflow-y-auto" style="height: 100vh">

			<?php if($customers->num_rows > 0):?>
			<table class="w-full">
				<thead>
					<tr class="border-2 border-green-500">
						<th class="border-2 border-green-500">No</th>
						<th class="border-2 border-green-500">Full Names</th>
						<th class="border-2 border-green-500">Loan Type</th>
						<th class="border-2 border-green-500">Loan Plan</th>
						<th class="border-2 border-green-500">Loan Amount</th>
						<th class="border-2 border-green-500">Date Time</th>
					</tr>
				</thead>

				<tbody class="border-2">
					<?php $i=1; while($row = $customers->fetch_assoc()):?>
						<tr class="border-2 border-green-500">
							<th class="border-2 border-green-500"><?php echo $i; ?></th>
							<td class="border-2 border-green-500">
								<?php echo $row["cst_firstname"]."\t".$row["cst_middlename"]."\t".$row["cst_lastname"]; ?>	
							</td>
							<td class="border-2 border-green-500">
								<?php echo $row["type"]; ?>	
							</td>
							<td class="border-2 border-green-500">
								<?php echo $row["plan"]; ?>	
							</td>
							<td class="border-2 border-green-500">
								$<?php echo $row["returned_amount"]; ?>	
							</td>
							<td class="border-2 border-green-500">
								<?php echo $row["date_created"]; ?>	
							</td>
						</tr>
					<?php $i++; endwhile;?>
				</tbody>



			</table>
		<?php else: ?>
			<div class="p-3">
				No customers available!
			</div>
		<?php endif;?>
		</div>

	</div>
	
	

</div>


<?php include "../templates/footer.php"; ?>