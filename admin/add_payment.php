<?php

$title = 'Dashboard';


// $myfile = "signin-form.php";


include "../templates/header.php"; 

$active[2] = "bg-green-500";

include "../templates/staff-side-left.php";

?>



	<div class="flex-grow font-semibold">
		
		<div class="flex justify-between border-b-2 border-green-500 py-2 bg-white">
			<a href="payments.php" class="decoration-none border-b-2 border-t-2 border-2 border-green-500 py-1 px-4  mx-2 hover:text-white hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex justify-center items-center">
				Last Payments
			</a>

			<a href="add_payment.php" class="decoration-none border-b-2 border-t-2 border-2 border-green-500 py-1 px-4  mx-2 hover:text-white bg-green-500 hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex justify-center items-center">
				<span class="material-icons-outlined">add</span>Add New Payment
			</a>

		</div>


		<div class="overflow-y-auto" style="height: 100vh">

			<?php

			//Action class
			require("../action/Action.php");

			$action = new Action();
			$action->addPayment();
			
			?>

			<div class="py-2 border-b-2 text-2xl">Cash Payments</div>

			<form class="py-2 bg-white rounded m-2" method="post">

				<div class="mt-3 px-4">
					<label class="">Amount ($)</label>
					<input type="number" name="payment_amount" placeholder="Amount" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
				</div>

				<div class="mt-3 px-4">
					<label class="">Customer Email</label>
					<input type="email" name="customer_email" placeholder="Customer Email" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
				</div>
				<div class="mt-3 px-4">
					<button type="submit" name="add_payment_btn" class="py-2 border-2 w-full text-xl p-2 border-green-600 hover:text-white focus:text-white bg-green-500 focus:bg-green-600 focus:border-green-600">Submit Payment</button>
				</div>

			</form>

		</div>

	</div>
	
	

</div>


<?php include "../templates/footer.php"; ?>