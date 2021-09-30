<?php

$title = 'Loans';


// $myfile = "signin-form.php";
include "../templates/header.php"; 

$active[3] = "bg-green-500";

include "../templates/customer-side-left.php";

?>


	<div class="flex-grow font-semibold">


		<div class="overflow-y-auto p-2" style="height: 100vh">
				<?php

				//Action class
				require("../action/Action.php");

				$action = new Action();

				$plans = $action->getPlan("all");

				$types = $action->getLoanType("all");
				
				$action->requestLoan();

				?>
			<form class="py-2 bg-white rounded m-2" method="post">

				<div class="mt-3 px-4">
					<label class="">Loan Type</label>

					<select name="loan_type" class="my-2 py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 font-semibold">
						<option value="" class="text-gray-300">Select Loan Type</option>
					<?php while($row = $types->fetch_assoc()):?>
						<option value="<?php echo $row['type_name'];?>"><?php echo $row["type_name"];?></option>
					<?php endwhile;?>
					</select>
				</div>

				<div class="mt-3 px-4">
					<label class="">Loan Plan</label>

					<select name="loan_plan" class="my-2 py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 font-semibold">
						<option value="" class="text-gray-300">Select Loan Plan</option>
						<?php while($row = $plans->fetch_assoc()):?>
							<option value="<?php echo $row['plan_id'];?>">
								<?php echo $row["plan_name"]."\t(Rate ".$row["plan_interest_rate"]."%)";?></option>
						<?php endwhile;?>
					</select>
				</div>

				<div class="mt-3 px-4">
					<label class="">Requested Amount ($)</label>
					<input type="number" name="loan_amount" placeholder="Amount" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
				</div>


				<div class="mt-3 px-4">
					<button type="submit" name="request_btn" class="py-2 border-2 w-full text-xl p-2 border-green-600 hover:text-white focus:text-white bg-green-500 focus:bg-green-600 focus:border-green-600">Submit Loan Request</button>
				</div>

			</form>

		</div>

	</div>
	
	

</div>

<?php include "../templates/footer.php"; ?>