<?php

$title = 'Loans';


// $myfile = "signin-form.php";
include "../templates/header.php"; 

$active[2] = "bg-green-500";

include "../templates/customer-side-left.php";

?>


	<div class="flex-grow font-semibold">

		<?php

		//Action class
		require("../action/Action.php");

		$action = new Action();
		$payments = $action->getPayments($_SESSION['logged_user']["cst_email"]);

		// echo "<pre>";
		// print_r($payments->fetch_assoc());
		// echo "</pre>";


		// echo strtoupper(uniqid()."-".date("His"));

		?>

		<div class="overflow-y-auto p-2" style="height: 100vh">
			<?php if($payments->num_rows > 0): ?>

			<table class="w-full">
				<thead>
					<tr class="border-2 border-green-500 ">
						<th class="border-2 border-green-500 py-1">No</th>
						<th class="border-2 border-green-500">Amount Paid</th>
						<th class="border-2 border-green-500">Reference</th>
						<th class="border-2 border-green-500">Datetime Paid</th>
					</tr>
				</thead>

				<tbody class="border-2">
					<?php $i=1; while ($row = $payments->fetch_assoc()):?>
					<tr class="border-2 border-green-500 py-2">
						<th class="border-2 border-green-500 py-1"><?php echo $i; ?></th>
						<td class="border-2 border-green-500 py-1">
							$<?php echo $row["amount"];?>
						</td>
						<td class="border-2 border-green-500 py-1">
							<?php echo $row["payment_reference"];?>
						</td>
						<td class="border-2 border-green-500 py-1">
							<?php echo $row["date_created"];?>
						</td>
					
					</tr>
				<?php $i++; endwhile; ?>
				</tbody>



			</table>

		<?php else:?>
			<div class="p-2 mt-2 ml-2">
				No payments yet!
			</div>
		<?php endif;?>
		</div>

	</div>
	
	

</div>

<?php include "../templates/footer.php"; ?>