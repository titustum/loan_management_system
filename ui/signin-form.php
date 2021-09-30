<div class="mb-4 rounded p-3 border border-gray-600">
	<div class="flex">
		<h2 class="text-2xl font-bold border-b-2 border-gray-700 uppercase">SIGNIN HERE</h2>
	</div>

	<div>

		<?php

		//Action class
		require("../action/Action.php");

		$action = new Action();
		$action->loginCustomer();

		?>
	</div>

	<form class="py-2" method="POST">
		<div class="mt-3">
			<label class="sr-only">Email Address</label>
			<input type="text" name="c_emailAddress" placeholder="Email Address" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" value="<?php if(isset($_POST['c_emailAddress'])) echo $_POST['c_emailAddress']; ?>"/>
		</div>
		<div class="mt-3">
			<label class="sr-only">Password</label>
			<input type="password" name="c_password" placeholder="Password" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
		</div>
		<div class="mt-3">
			<button type="submit" name="login_btn" class="bg-gray-500 text-white w-full hover:bg-blue-400 focus:bg-blue-800 py-3 font-semibold">Signin To Your Customer Account</button>
		</div>

		<div class="mt-3 text-blue-700 text-center">
			<a href="password_reset.php" class="decoration-none font-normal">Forgot password? Reset here!</a>
		</div>

		<div class="mt-3 text-blue-700 text-center">
			<a href="signup.php" class="decoration-none font-normal">Don't have account? Create one here!</a>
		</div>
	</form>

</div>