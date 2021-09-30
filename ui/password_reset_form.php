<div class="mb-4 rounded p-3 border border-gray-600">
	<div class="flex">
		<h2 class="text-2xl font-bold border-b-2 border-gray-700 uppercase">RESET PASSWORD</h2>
	</div>

	<div>

		<?php

		//Action class
		require("../action/Action.php");

		$action = new Action();
		
		$action->changePassword();
		?>
	</div>

	<form class="py-2" method="POST">
      <?php if(isset($_POST["validate_code_btn"]) AND $action->retrieveResetCode()):?>
      	<input type="hidden" name="c_emailAddress" value="<?php if(isset($_POST['c_emailAddress'])) echo $_POST['c_emailAddress']; ?>">
      	<div class="mt-3">
			<label class="sr-only">New Password</label>
			<input type="password" name="c_password" placeholder="Enter New Password" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none"  required="" />
		</div>
		<div class="mt-3">
			<label class="sr-only">Confirm Password</label>
			<input type="password" name="c_password_confirm" placeholder="Enter Confirm Password" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none"  required="" />
		</div>

		<div class="mt-3">
			<button type="submit" name="change_password_btn" class="bg-gray-500 text-white w-full hover:bg-blue-400 focus:bg-blue-800 py-3 font-semibold">Submit new password</button>
		</div>
	  <?php else: ?>
			<div class="mt-3">
			<label class="sr-only">Email Address</label>
			<input type="email" name="c_emailAddress" placeholder="Email Your Address" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none"  required="" value="<?php if(isset($_POST['c_emailAddress'])) echo $_POST['c_emailAddress']; ?>"/>
		</div>
      <?php endif?>

		
		<?php if(isset($_POST["get_code_btn"]) AND $action->insertResetCode()):?>
		<div class="mt-3">
			<label class="sr-only">Reset Code</label>
			<input type="text" name="reset_code" placeholder="Reset code" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" required="" />
		</div>

		<div class="mt-3">
			<button type="submit" name="validate_code_btn" class="bg-gray-500 text-white w-full hover:bg-blue-400 focus:bg-blue-800 py-3 font-semibold">Validate Code</button>
		</div>

		<?php endif ?>
		<?php if(empty($_POST)):?>
		<div class="mt-3">
			<button type="submit" name="get_code_btn" class="bg-gray-500 text-white w-full hover:bg-blue-400 focus:bg-blue-800 py-3 font-semibold">Get reset code</button>
		</div>

		<?php endif?>



	</form>

</div>