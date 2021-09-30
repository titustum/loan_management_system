<?php

$title = 'Dashboard';


// $myfile = "signin-form.php";


include "../templates/header.php"; 

$active[2] = "bg-green-500";

include "../templates/staff-side-left.php";

?>



	<div class="flex-grow font-semibold">
		
		<div class="flex justify-between border-b-2 border-green-500 py-2 bg-white">
			<a href="payments.php" class="decoration-none border-b-2 border-t-2 border-2 border-green-500 py-1 px-4  mx-2 hover:text-white bg-green-500 hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex justify-center items-center">
				Last Payments
			</a>

			<a href="add_payment.php" class="decoration-none border-b-2 border-t-2 border-2 border-green-500 py-1 px-4 mx-2  hover:text-white hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex justify-center items-center">
				<span class="material-icons-outlined">add</span>Add New Payment
			</a>

		</div>


		<div class="overflow-y-auto p-2" style="height: 100vh">

			<?php


			//Action class
			require("../action/Action.php");

			$action = new Action();
			$payments = $action->getPayments("all");

			// echo "<pre>";
			// print_r($payments);
			// echo "</pre>";

			if ($payments->num_rows > 0):
			?>

			<table class="w-full">
				<thead>
					<tr class="border-2 border-green-500 ">
						<th class="border-2 border-green-500 py-1">No</th>
						<th class="border-2 border-green-500">Borrower</th>
						<th class="border-2 border-green-500">Paid</th>
						<th class="border-2 border-green-500">Reference</th>
						<th class="border-2 border-green-500">Date Time</th>
					</tr>
				</thead>

				<tbody class="border-2">
					<?php $i=1; while($payment = $payments->fetch_assoc()): ?>
					<tr class="border-2 border-green-500 ">
						<th class="border-2 border-green-500 py-1"><?php echo $i; ?></th>
						<td class="border-2 border-green-500 py-1"><?php echo $payment["cst_firstname"]."\t".$payment["cst_lastname"]; ?></td>
						<td class="border-2 border-green-500 py-1">$<?php echo $payment["amount"]; ?></td>
						<td class="border-2 border-green-500 py-1"><?php echo $payment["payment_reference"]; ?></td>
						<td class="border-2 border-green-500 py-1"><?php echo $payment["date_created"]; ?></td>
					</tr>
					<?php $i++; endwhile; ?>
				</tbody>



			</table>
		<?php else: ?>
			<div class="m-2">
				No payments yet!
			</div>
		<?php endif; ?>
		</div>

	</div>
	
	

</div>


<?php include "../templates/footer.php"; ?>