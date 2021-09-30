<?php

$title = 'Loans';


// $myfile = "signin-form.php";
include "../templates/header.php"; 

$active[1] = "bg-green-500";

include "../templates/customer-side-left.php";

?>


	<div class="flex-grow font-semibold p-2">

		<?php

		//Action class
		require("../action/Action.php");

		$action = new Action();
		$loans = $action->getLoans($_SESSION['logged_user']["cst_email"]);

		$owed_amount = $action->getOwedAmount($_SESSION['logged_user']["cst_email"]);

		?>

		<div class="overflow-y-auto" style="height: 100vh">
			<?php if($loans->num_rows > 0): ?>
			<table class="w-full">
				<thead>
					<tr class="border-2 border-green-500 ">
						<th class="border-2 border-green-500 py-1">No</th>
						<th class="border-2 border-green-500">Type</th>
						<th class="border-2 border-green-500">Plan</th>
						<th class="border-2 border-green-500">Requested</th>
						<th class="border-2 border-green-500">To Return</th>
						<th class="border-2 border-green-500">Rate</th>
						<th class="border-2 border-green-500">Paid</th>
						<th class="border-2 border-green-500">Balance</th>
						<th class="border-2 border-green-500">Status</th>
						<th class="border-2 border-green-500">Due Date</th>
					</tr>
				</thead>

				<tbody class="border-2">
					<?php
					$i = 1;
					while($row = $loans->fetch_assoc()):?>
					<tr class="border-2 border-green-500 py-2">
						<th class="border-2 border-green-500 py-1"><?php echo $i; ?></th>
						<td class="border-2 border-green-500 py-1">
							<?php echo $row["type"];?>
						</td>
						<td class="border-2 border-green-500 py-1">
							<?php echo $row["plan"];?>
						</td>
						<td class="border-2 border-green-500 py-1">
							$<?php echo $row["amount"];?>
						</td>
						<td class="border-2 border-green-500 py-1">
							$<?php echo $row["returned_amount"];?>
						</td>
						<td class="border-2 border-green-500 py-1">
							<?php echo $row["rate"];?>%
						</td>
						<td class="border-2 border-green-500 py-1">
							$<?php echo $row["returned_amount"] - $owed_amount ;?>
						</td>
						<td class="border-2 border-green-500 py-1">
							$<?php echo $owed_amount; ?>
						</td>
						
						<?php if ($row["loan_status"] == "Active"):?>
						<td class="border-2 text-green-700 border-green-500 py-1">
							<?php echo $row["loan_status"];?>
						</td>
						<?php elseif ($row["loan_status"] == "Requested"):?>
						<td class="border-2 border-green-500 py-1">
							<?php echo $row["loan_status"];?>
						</td>
						<?php else:?>
						<td class="border-2 text-red-700 border-green-500 py-1">
							<?php echo $row["loan_status"];?>
						</td>
						<?php endif;?>
						<td class="border-2 border-green-500 py-1">
							<?php echo $row["due_date"];?>
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

<?php include "../templates/footer.php"; ?>