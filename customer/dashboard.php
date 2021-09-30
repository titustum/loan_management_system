<?php

$title = 'Dashboard';


// $myfile = "signin-form.php";
include "../templates/header.php"; 

$active[0] = "bg-green-500";

include "../templates/customer-side-left.php";

?>

	<div class="flex-grow pb-3 px-2 font-semibold pt-2">
		<div class="grid grid-cols-2 md:grid-cols-4 md:gap-3 ml-2">
			<a href="payments.php" class="hover:bg-green-500 focus:bg-green-600 decoration-none rounded bg-white flex flex-col  justify-center items-center mt-2 ml-2" style="height: 30vh">
				<h2 class="text-4xl font-bold">$</h2>
				<div class="text-2xl">Payments</div>
			</a>

			<a href="loans.php" class="hover:bg-green-500 focus:bg-green-600 decoration-none rounded border bg-white flex flex-col justify-center items-center mt-2 ml-2" style="height: 30vh">
				<h2 class="text-4xl font-bold flex items-center">
					<span class="material-icons-outlined mr-2" style="font-size: 25px;">local_atm</span>
				</h2>
				<div class="text-2xl">Loans</div>
			</a>
	
			<a href="payloan.php" class="hover:bg-green-500 focus:bg-green-600 decoration-none rounded border bg-white flex flex-col justify-center items-center mt-2 ml-2" style="height: 30vh">
				<h2 class="text-4xl font-bold flex items-center">
					<span class="material-icons-outlined">add</span></h2>
				<div class="text-2xl">Pay Loan</div>
			</a>

			<a href="request.php" class="hover:bg-green-500 focus:bg-green-600 decoration-none rounded border bg-white flex flex-col justify-center items-center mt-2 ml-2" style="height: 30vh">
				<h2 class="text-4xl font-bold flex items-center"><span class="material-icons-outlined">add</span></h2>
				<div class="text-2xl">Request Loan</div>
			</a>

			
		</div>

	</div>
	
	

</div>


<?php include "../templates/footer.php"; ?>