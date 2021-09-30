<?php

$title = 'Dashboard';

// $myfile = "signin-form.php";
require "../templates/header.php";


$active[0] = "bg-green-500";

$customer = true;

if(isset($_SESSION["logged_user"]["admin_email"])){
	require "../templates/staff-side-left.php";
	$customer = false;
	$firstname = $_SESSION['logged_user']['admin_firstname'];
	$lastname = $_SESSION['logged_user']['admin_lastname'];
	$password = $_SESSION['logged_user']['admin_password'];
}else{
	$firstname = $_SESSION['logged_user']['cst_firstname'];
	$middlename = $_SESSION['logged_user']['cst_middlename'];
	$lastname = $_SESSION['logged_user']['cst_lastname'];
	$email = $_SESSION['logged_user']['cst_email'];
	$contact = $_SESSION['logged_user']['cst_contact'];
	$post_address = $_SESSION['logged_user']['cst_post_address'];
	$tax_id = $_SESSION['logged_user']['cst_tax_id'];
	$password = $_SESSION['logged_user']['cst_password'];


	require "../templates/customer-side-left.php";
}


?>  

	<div class="flex-grow pb-3 px-2 font-semibold pt-2">

		<div class="w-full rounded bg-white overflow-y-auto" style="height: 80vh;">
			<div class="text-2xl border-b-2 font-bold p-3">
				Your Account Details
			</div>

			<div class="px-2">
				<?php

				//Action class
				require("../action/Action.php");

				$action = new Action();

				$action->updateLoggedUser();
				?>
			</div>

			<div class="px-2">
				<div class="p-2 m-2 bg-blue-300 rounded ">Email Cannot Be Changed Due to Management Purposes!</div>
			</div>

			<form class="px-2" method="POST">
				<div class="px-3">
					<div class="py-2 w-full text-xl">
						Your Email: jacob@mail.com
					</div>
				</div>
				<div class="p-3">
					<label>First Name</label>
					<div class="">
						<input type="text" name="first_name" class="py-2 border-b-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" placeholder="First Name" required="" value="<?php echo $firstname; ?>">
					</div>
				</div>
				<?php if($customer):?>
				<div class="p-3">
					<label>Middle Name</label>
					<div class="">
						<input type="text" name="middle_name" class="py-2 border-b-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" placeholder="First Name" required="" value="<?php echo $middlename; ?>">
					</div>
				</div>
				<?php endif;?>
				<div class="p-3">
					<label>Last Names</label>
					<div class="">
						<input type="text" name="last_name" class="py-2 border-b-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" placeholder="Last Name" required="" value="<?php echo $lastname; ?>">
					</div>
				</div>

				<?php if($customer):?>
				<div class="p-3">
					<label class="">Contact Number</label>
					<input type="text" name="c_contactNumber" placeholder="Contact Number" class="py-2 border-b-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" value="<?php echo $contact; ?>"/>
				</div>
				<div class="p-3">
					<label class="">Postal Address</label>
					<input type="text" name="c_postalAddress" placeholder="Postal Address" class="py-2 border-b-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" value="<?php echo $post_address; ?>"/>
				</div>
				<div class="p-3">
					<label class="">Tax Id</label>
					<input type="text" name="c_taxId" placeholder="Tax Id" class="py-2 border-b-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" value="<?php echo $tax_id; ?>"/>
				</div>
				<?php endif;?>

				<div class="p-3">
					<label>New Password</label>
					<div class="">
						<input type="password" name="new_password" class="py-2 border-b-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" placeholder="New Password" required="" minlength="5" value="<?php echo $password; ?>">
					</div>
				</div>

				<div class="mt-3 p-4">
					<button type="submit" name="update_logged_user_btn" class="py-2 border-2 w-full text-xl p-2 border-green-600 hover:text-white focus:text-white bg-green-500 focus:bg-green-600 focus:border-green-600">Update Your Account Details</button>
				</div>
				
			</form>
		</div>

	</div>
	
	

</div>


<?php include "../templates/footer.php"; ?>