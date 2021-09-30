<div>
	<form method="POST" class="flex">
		<input type="email" name="adminEmail" class="border-2 text-xl py-1 px-2 border-gray-600 focus:border-blue-600 outline-none" placeholder="Admin Email" required="" value="<?php if(isset($_POST['adminEmail'])) echo $_POST['adminEmail']; ?>"/>
		<input type="password" name="adminPassword" class="ml-1 border-2 text-xl py-1 px-2 border-gray-600 focus:border-blue-600 outline-none" placeholder="Password" required="" />
		<button type="submit" name="admin_login_btn" class="ml-1 bg-gray-500 text-white hover:bg-blue-400 focus:bg-blue-800 font-semibold py-1 px-3">Admin Login</button>
	</form>

	<?php

	//Action class
	require("../action/Action.php");

	$action = new Action();
	$action->loginAdmin();

	?>

	<div class="px-3 py-1">
		<a href="admin_reset.php" class="decoration-none font-normal text-blue-700">Forgot password? Reset here</a>
	</div>

</div>