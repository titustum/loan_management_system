<?php

$title = 'Dashboard';


// $myfile = "signin-form.php";


include "../templates/header.php"; 

$active[4] = "bg-green-500";

include "../templates/staff-side-left.php";

?>


	<div class="flex-grow font-semibold">
		
		<div class="flex justify-between border-b-2 border-green-500 py-2 bg-white">
			<a href="plans.php" class="decoration-none border-b-2 border-t-2 border-2 border-green-500 py-1 px-4  mx-2 hover:text-white bg-green-500 hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex justify-center items-center">
				<span class="material-icons-outlined mr-2">money</span>Loan Plans
			</a>

			<a href="add_plan.php" class="decoration-none border-b-2 border-t-2 border-2 border-green-500 py-1 px-4 mx-2  hover:text-white hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex justify-center items-center">
				<span class="material-icons-outlined mr-2">add</span>Add New Loan Plan
			</a>

		</div>
		
		<div class="overflow-y-auto m-2" style="height: 100vh">

			<?php
			//Action class
			require("../action/Action.php");

			$action = new Action();
			$plans = $action->getPlan("all");

			// echo "<pre>";
			// print_r($plans->fetch_assoc());
			// echo "</pre>";

			$action->removePlan();
			
			if($plans->num_rows > 0):?>

			<table class="w-full">
				<thead>
					<tr class="border-2 border-green-500">
						<th class="border-2 border-green-500">No</th>
						<th class="border-2 border-green-500">Plan Name</th>
						<th class="border-2 border-green-500">Repayment Period</th>
						<th class="border-2 border-green-500">Interest Rate</th>
						<th class="border-2 border-green-500">Date Created</th>
						<th class="border-2 border-green-500">Action</th>
					</tr>
				</thead>

				<tbody class="border-2">
					<?php $i=1; while($row = $plans->fetch_assoc()):?>
						<tr class="border-2 border-green-500">
							<th class="border-2 border-green-500"><?php echo $i; ?></th>
							<td class="border-2 border-green-500">
								<?php echo $row["plan_name"]; ?>	
							</td>
							<td class="border-2 border-green-500">
								<?php echo $row["plan_period"]; ?>	
							</td>
							<td class="border-2 border-green-500">
								<?php echo $row["plan_interest_rate"]; ?>%	
							</td>
							<td class="border-2 border-green-500">
								<?php echo $row["plan_date_created"]; ?>	
							</td>
							<td class="border-2 border-green-500">
								<form method="POST">
									<input type="hidden" name="plan_id" value="<?php echo $row['plan_id']; ?>" />
									<button type="submit" onClick="if(confirm('Are you sure you want to delete Loan Plan permanently?')){return true}else{return false}" name="removePlan" class="text-red-700 px-2">Remove</button>
								</form>
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