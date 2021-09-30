<?php

$title = 'Dashboard';

// $myfile = "signin-form.php";
require "../templates/header.php";


$active[0] = "bg-green-500";

require "../templates/staff-side-left.php";

?>  

	<div class="flex-grow pb-3 px-2 font-semibold pt-2">
		<div class="grid grid-cols-2 md:grid-cols-4 md:gap-3 ml-2">
			<a href="payments.php" class="hover:bg-green-500 focus:bg-green-600 decoration-none rounded bg-white flex flex-col  justify-center items-center mt-2 ml-2" style="height: 30vh">
				<h2 class="text-4xl font-bold">$</h2>
				<div class="text-2xl">Payments</div>
			</a>
			<a href="borrowers.php" class="hover:bg-green-500 focus:bg-green-600 decoration-none rounded border bg-white flex flex-col justify-center items-center mt-2 ml-2" style="height: 30vh">
				<h2 class="text-4xl font-bold flex items-center">
					<span class="material-icons-outlined mr-2">group</span>
				</h2>
				<div class="text-2xl">
					Borrowers
				</div>
			</a>
			<a href="active.php" class="hover:bg-green-500 focus:bg-green-600 decoration-none rounded border bg-white flex flex-col justify-center items-center mt-2 ml-2" style="height: 30vh">
				<h2 class="text-4xl font-bold flex items-center">
					<span class="material-icons-outlined mr-2" style="font-size: 25px;">local_atm</span>
				</h2>
				<div class="text-2xl">Active Loans</div>
			</a>
			<a href="loans.php" class="hover:bg-green-500 focus:bg-green-600 decoration-none rounded border bg-white flex flex-col justify-center items-center mt-2 ml-2" style="height: 30vh">
				<h2 class="text-4xl font-bold flex items-center">
					<span class="material-icons-outlined mr-2">messenger</span>
				</h2>
				<div class="text-2xl">Loan Requests</div>
			</a>

			<a href="plans.php" class="hover:bg-green-500 focus:bg-green-600 decoration-none rounded border bg-white flex flex-col justify-center items-center mt-2 ml-2" style="height: 30vh">
				<h2 class="text-4xl font-bold">
					<span class="material-icons-outlined">watch_later</span>
				</h2>
				<div class="text-2xl">Loan Plans</div>
			</a>

			<a href="add_plan.php" class="hover:bg-green-500 focus:bg-green-600 decoration-none rounded border bg-white flex flex-col justify-center items-center mt-2 ml-2" style="height: 30vh">
				<h2 class="text-4xl font-bold"><span class="material-icons-outlined">add</span></h2>
				<div class="text-2xl">Create Loan Plan</div>
			</a>

			<a href="add_loan_type.php" class="hover:bg-green-500 focus:bg-green-600 decoration-none rounded bg-white flex flex-col  justify-center items-center mt-2 ml-2" style="height: 30vh">
				<h2 class="text-4xl font-bold"><span class="material-icons-outlined">add</span></h2>
				<div class="text-2xl">Create Loan Type</div>
			</a>

			<a href="add_admin.php" class="hover:bg-green-500 focus:bg-green-600 decoration-none rounded border bg-white flex flex-col justify-center items-center mt-2 ml-2" style="height: 30vh">
				<h2 class="text-4xl font-bold"><span class="material-icons-outlined">add</span></h2>
				<div class="text-2xl">Add New Admin</div>
			</a>
		</div>

	</div>
	
	

</div>


<?php include "../templates/footer.php"; ?>