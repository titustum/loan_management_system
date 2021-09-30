<?php

$title = 'Loans';


// $myfile = "signin-form.php";
include "../templates/header.php"; 

$active[4] = "bg-green-500";

include "../templates/customer-side-left.php";

?>


	<div class="flex-grow font-semibold">


		<div class="overflow-y-auto p-2" style="height: 100vh">
				<?php

				//Action class
				require("../action/Action.php");

				$action = new Action();

				$owed_amount = $action->getOwedAmount($_SESSION["logged_user"]["cst_email"]);

				$action->addPayment();

				
				if($owed_amount > 0):
				?>
			<form class="py-2 bg-white rounded m-2" method="post">

				<div class="mt-3 px-4">
					<label class="">Full Names on the Credit Card</label>
					<input type="text" name="atm_card_number" placeholder="Enter Full Names on the Card" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" minlength="5"required="" />
				</div>

				<div class="mt-3 px-4">
					<label class="">Credit Card Number</label>
					<input type="number" name="atm_card_number" placeholder="Enter Credit Card Number e.g. 124312341234" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" minlength="10" />
				</div>

				<div class="mt-3 px-4">
					<label class="">Card Expiry Date</label>
					<input type="text" name="atm_card_number" placeholder="Enter Credit Card Number e.g. 01-2022" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" required />
					
				</div>

				<div class="mt-3 px-4">
					<label class="">Security Code</label>
					<input type="number" name="atm_card_pin" placeholder="Enter 4 Digit Security Code at the back of your card e.g. 2121" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" required="" minlength="4" maxlength="4" />
				</div>

				<div class="mt-3 px-4">
					<label class="">Amount</label>
					<div class="flex items-center">
						<span class="font-semibold text-xl px-1">$</span>
						<input type="text" name="payment_amount" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" required="" value="<?php echo $owed_amount; ?>">
					</div>
					
				</div>


				<div class="mt-3 px-4">
					<button type="submit" name="add_payment_btn" class="py-2 border-2 w-full text-xl p-2 border-green-600 hover:text-white focus:text-white bg-green-500 focus:bg-green-600 focus:border-green-600">Submit Payment</button>
				</div>

			</form>

		<?php else: ?>
			<div class="p-3 w-full">
				<div class="m-2">
					You have no loans to pay
				</div>
			</div>
		<?php endif; ?>

		</div>

	</div>
	
	

</div>

<?php include "../templates/footer.php"; ?>