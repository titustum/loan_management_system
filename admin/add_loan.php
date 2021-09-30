<?php

$title = 'Dashboard';


// $myfile = "signin-form.php";

include "../templates/header.php"; 

$active[1] = "bg-green-500";

include "../templates/staff-side-left.php";


?>

	<div class="flex-grow font-semibold">
<?php
$active_loans[4] = "bg-green-500";
require("../templates/loan_top_links.php");
?>


		<div class="overflow-y-auto p-2" style="height: 100vh">

			<?php

			//Action class
			require("../action/Action.php");

			$action = new Action();
			$action->requestLoan();
			
			?>

			<form class="py-2 bg-white rounded m-2" method="post">

				<div class="mt-3 px-4">
					<label class="">Loan Type</label>

					<select name="loan_type" class="my-2 py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 font-semibold">
						<option value="" class="text-gray-300">Select Loan Type</option>
						<option value="morgage">Morgage Loan</option>
						<option value="car">Car Loan</option>
						<option value="business">Business Loan</option>
					</select>
				</div>

				<div class="mt-3 px-4">
					<label class="">Loan Plan</label>

					<select name="loan_plan" class="my-2 py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 font-semibold">
						<option value="" class="text-gray-300">Select Loan Plan</option>
						<option value="monthly">Monthly Plan (Rate 10%)</option>
						<option value="semi-annual">Semi Annual Plan (Rate 20%)</option>
						<option value="annual">Annual Plan (Rate 30%)</option>
					</select>
				</div>

				<div class="mt-3 px-4">
					<label class="">Amount ($)</label>
					<input type="number" name="loan_amount" placeholder="Amount" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
				</div>

				<div class="mt-3 px-4">
					<label class="">Customer Email</label>
					<input type="email" name="customer_email" placeholder="Customer Email" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
				</div>
				<div class="mt-3 px-4">
					<button type="submit" name="request_btn" class="py-2 border-2 w-full text-xl p-2 border-green-600 hover:text-white focus:text-white bg-green-500 focus:bg-green-600 focus:border-green-600">Submit Loan Request</button>
				</div>

			</form>

		</div>

		</div>

	</div>
	
	

</div>


<?php include "../templates/footer.php"; ?>