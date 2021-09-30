
<?php

//Action class
require("../action/Action.php");

$action = new Action();

$action->changePassword();

?>

	<div>
	<?php if(empty($_POST)):?>
	<form method="POST" class="flex">
		<input type="email" name="c_emailAddress" class="border-2 text-xl py-1 px-2 border-gray-600 focus:border-blue-600 outline-none" placeholder="Enter Admin Email"/>
		<button type="submit" name="get_code_btn" class="ml-1 bg-gray-500 text-white hover:bg-blue-400 focus:bg-blue-800 font-semibold py-1 px-3">Get Reset Code</button>
	</form>

	<?php endif;?>

	<?php if(isset($_POST["get_code_btn"]) AND $action->insertResetCode()):?>
	<form method="POST" class="flex">
		<input type="email" name="c_emailAddress" class="border-2 text-xl ml-1 py-1 px-2 border-gray-600 focus:border-blue-600 outline-none" placeholder="Enter Admin Email" value="<?php echo $_POST['c_emailAddress']; ?>" value="<?php echo $_POST['c_emailAddress']; ?>"/>
		<input type="text" name="reset_code" class="border-2 text-xl py-1 ml-1 px-2 border-gray-600 focus:border-blue-600 outline-none" placeholder="Enter Reset Code" />
		<button type="submit" name="validate_code_btn" class="ml-1 bg-gray-500 text-white hover:bg-blue-400 focus:bg-blue-800 font-semibold py-1 px-3">Get Reset Code</button>
	</form>
	<?php endif;?>

	<?php if(isset($_POST["validate_code_btn"]) AND $action->retrieveResetCode()):?>
	<form method="POST" class="flex">
		<input type="email" name="c_emailAddress" class="border-2 text-xl py-1 px-2 border-gray-600 focus:border-blue-600 outline-none" placeholder="Enter Admin Email" value="<?php echo $_POST['c_emailAddress']; ?>" value="<?php echo $_POST['c_emailAddress']; ?>"/>
		<input type="password" name="c_password" class="border-2 text-xl ml-1 py-1 px-2 border-gray-600 focus:border-blue-600 outline-none" placeholder="New Password"/>
		<input type="password" name="c_password_confirm" class="border-2 text-xl ml-1 py-1 px-2 border-gray-600 focus:border-blue-600 outline-none" placeholder="Confirm Password" />
		<button type="submit" name="change_password_btn" class="ml-1 bg-gray-500 text-white hover:bg-blue-400 focus:bg-blue-800 font-semibold py-1 px-3">Change Password</button>
	</form>
<?php endif;?>


</div>