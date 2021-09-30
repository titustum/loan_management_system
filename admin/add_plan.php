<?php

$title = 'Dashboard';


// $myfile = "signin-form.php";


include "../templates/header.php"; 

$active[4] = "bg-green-500";

include "../templates/staff-side-left.php";

?>


	<div class="flex-grow font-semibold">
		
		<div class="flex justify-between border-b-2 border-green-500 py-2 bg-white">
			<a href="plans.php" class="decoration-none border-b-2 border-t-2 border-2 border-green-500 py-1 px-4  mx-2 hover:text-white hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex justify-center items-center">
				<span class="material-icons-outlined mr-2">money</span>Loan Plans
			</a>

			<a href="add_plan.php" class="decoration-none border-b-2 border-t-2 border-2 border-green-500 py-1 px-4 mx-2  hover:text-white hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 bg-green-500 flex justify-center items-center">
				<span class="material-icons-outlined mr-2">add</span>Add New Loan Plan
			</a>

		</div>


		<div class="overflow-y-auto" style="height: 100vh">

			<?php

			//Action class
			require("../action/Action.php");

			$action = new Action();
			$action->addPlan();
			
			?>

			<form class="py-2 bg-white rounded m-2" method="post">

				<div class="mt-3 px-4">
					<label class="">Plan Name</label>
					<input type="text" name="plan_name" placeholder="Plan Name" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
				</div>

				<div class="mt-3 px-4">
					<label class="">Repayment Period</label>

					<select name="repayment_period" class="my-2 py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 font-semibold">
						<option value="" class="text-gray-300">Select repayment period</option>
						<option value="1 Weeks">1 Week</option>
						<option value="2 Weeks">2 Weeks</option>
						<option value="1 Months">1 Month</option>
						<option value="2 Months">2 Months</option>
						<option value="3 Months">3 Months</option>
						<option value="6 Months">6 Months</option>
						<option value="8 Months">8 Months</option>
						<option value="1 Year">1 Years</option>
						<option value="2 Year">2 Years</option>
						<option value="3 Year">3 Years</option>
						<option value="4 Year">4 Years</option>
						<option value="5 Year">5 Years</option>
					</select>
				</div>


				<div class="mt-3 px-4">
					<label class="">Interest Rate (%)</label>
					<input type="number" name="rate" placeholder="Interest rate" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
				</div>
				<div class="mt-3 px-4">
					<button type="submit" name="add_plan_btn" class="py-2 border-2 w-full text-xl p-2 border-green-600 hover:text-white focus:text-white bg-green-500 focus:bg-green-600 focus:border-green-600">Create New Plan</button>
				</div>

			</form>
		</div>

	</div>
	
	

</div>


<?php include "../templates/footer.php"; ?>