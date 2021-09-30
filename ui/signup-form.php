<div class="mb-4 rounded p-3 border border-gray-600">
	<div class="flex">
		<h2 class="text-2xl font-bold border-b-2 border-gray-700 uppercase">SIGNUP HERE</h2>
	</div>

	<div>

		<?php

		//Action class
		require("../action/Action.php");

		$action = new Action();
		$action->registerCustomer();

		?>
	</div>

	<form class="py-2" method="post">
		<div class="mt-3">
			<label class="sr-only">First Name</label>
			<input type="text" name="c_firstName" placeholder="First Name" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
		</div>
		<div class="mt-3">
			<label class="sr-only">Middle Name</label>
			<input type="text" name="c_middleName" placeholder="Middle Name" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
		</div>
		<div class="mt-3">
			<label class="sr-only">Last Name</label>
			<input type="text" name="c_lastName" placeholder="Last Name" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
		</div>
		<div class="mt-3">
			<label class="sr-only">Contact Number</label>
			<input type="text" name="c_contactNumber" placeholder="Contact Number" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
		</div>
		<div class="mt-3">
			<label class="sr-only">Postal Address</label>
			<input type="text" name="c_postalAddress" placeholder="Postal Address" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
		</div>
		<div class="mt-3">
			<label class="sr-only">Email Address</label>
			<input type="text" name="c_emailAddress" placeholder="Email Address" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
		</div>
		<div class="mt-3">
			<label class="sr-only">Tax Id</label>
			<input type="text" name="c_taxId" placeholder="Tax Id" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
		</div>
		<div class="mt-3">
			<label class="sr-only">Password</label>
			<input type="password" name="c_newPassword" placeholder="New Password" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
		</div>
		<div class="mt-3">
			<button name="reg_btn" type="submit" class="bg-gray-500 text-white w-full hover:bg-blue-400 focus:bg-blue-800 py-3 font-semibold">Create New Customer Account</button>
		</div>

		<div class="mt-3 text-xl text-blue-700 text-center">
			<a href="signin.php" class="decoration-none">Already having account? Signin here</a>
		</div>
	</form>

</div>