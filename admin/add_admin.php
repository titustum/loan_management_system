<?php

$title = 'Dashboard';


// $myfile = "signin-form.php";


include "../templates/header.php"; 

$active[6] = "bg-green-500";

include "../templates/staff-side-left.php";

?>



	<div class="flex-grow font-semibold">
		
		<div class="flex justify-between border-b-2 border-green-500 py-2 bg-white">
			<a href="admins.php" class="decoration-none border-b-2 border-t-2 border-2 border-green-500 py-1 px-4  mx-2 hover:text-white hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex justify-center items-center">
				Admins
			</a>

			<a href="add_admin.php" class="decoration-none border-b-2 border-t-2 border-2 border-green-500 py-1 px-4  mx-2 hover:text-white bg-green-500 hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex justify-center items-center">
				<span class="material-icons-outlined">add</span>Add New Admin
			</a>

		</div>


		<div class="overflow-y-auto" style="height: 100vh">

			<?php

			//Action class
			require("../action/Action.php");

			$action = new Action();
			$action->addAdmin();
			
			?>

			<form class="py-2 bg-white rounded m-2" method="post">

				<div class="mt-3 px-4">
					<label class="">Admin First Name</label>
					<input type="text" name="adm_firstname" placeholder="Admin First Name" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
				</div>

				<div class="mt-3 px-4">
					<label class="">Admin Last Name</label>
					<input type="text" name="adm_lastname" placeholder="Admin Last Name" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
				</div>

				<div class="mt-3 px-4">
					<label class="">Admin Email</label>
					<input type="email" name="adm_email" placeholder="Admin Email" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
				</div>

<!-- 				<div class="mt-3 px-4">
					<label class="">Admin Level</label>
					<input type="number" name="adm_level" placeholder="Admin Level" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
				</div>
 -->
				<div class="mt-3 px-4">
					<label class="">Admin Password</label>
					<input type="password" name="adm_password" placeholder="Admin Password" class="py-2 border-2 w-full text-xl p-2 border-gray-600 focus:border-blue-600 outline-none" />
				</div>

				<div class="mt-3 px-4">
					<button type="submit" name="add_admin_btn" class="py-2 border-2 w-full text-xl p-2 border-green-600 hover:text-white focus:text-white bg-green-500 focus:bg-green-600 focus:border-green-600">Add New Admin</button>
				</div>

			</form>

		</div>

	</div>
	
	

</div>


<?php include "../templates/footer.php"; ?>