<?php

$title = 'Dashboard';


// $myfile = "signin-form.php";


include "../templates/header.php"; 

$active[6] = "bg-green-500";

include "../templates/staff-side-left.php";

?>



	<div class="flex-grow font-semibold">
		
		<div class="flex justify-between border-b-2 border-green-500 py-2 bg-white">
			<a href="admins.php" class="decoration-none border-b-2 border-t-2 border-2 border-green-500 py-1 px-4  mx-2 hover:text-white hover:bg-green-500 bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex justify-center items-center">
				Admins
			</a>

			<a href="add_admin.php" class="decoration-none border-b-2 border-t-2 border-2 border-green-500 py-1 px-4  mx-2 hover:text-white  hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex justify-center items-center">
				<span class="material-icons-outlined">add</span>Add New Admin
			</a>

		</div>


		<div class="overflow-y-auto p-2" style="height: 100vh">

			<?php

			//Action class
			require("../action/Action.php");

			$action = new Action();
			$admins = $action->getAdmin("all");

			// echo "<pre>";
			// print_r($admins->fetch_assoc());
			// echo "<pre>";
			
			?>

			<?php if($admins->num_rows > 0):?>
			<table class="w-full">
				<thead>
					<tr class="border-2 border-green-500">
						<th class="border-2 border-green-500">No</th>
						<th class="border-2 border-green-500">Full Names</th>
						<th class="border-2 border-green-500">Email</th>
						<th class="border-2 border-green-500">Admin Level</th>
						<th class="border-2 border-green-500">Date Added</th>
					</tr>
				</thead>

				<tbody class="border-2">
					<?php $i=1; while($row = $admins->fetch_assoc()):?>
						<tr class="border-2 border-green-500">
							<th class="border-2 border-green-500"><?php echo $i; ?></th>
							<td class="border-2 border-green-500">
								<?php echo $row["admin_firstname"]."\t".$row["admin_lastname"]; ?>	
							</td>
							<td class="border-2 border-green-500">
								<?php echo $row["admin_email"]; ?>	
							</td>
							<td class="border-2 border-green-500">
								<?php echo $row["admin_level"]; ?>	
							</td>
							<td class="border-2 border-green-500">
								<?php echo $row["registered_date"]; ?>	
							</td>
						</tr>
					<?php $i++; endwhile;?>
				</tbody>



			</table>
		<?php else: ?>
			<div class="p-3">
				No customers available!
			</div>
		<?php endif;?>

			
		</div>

	</div>
	
	

</div>


<?php include "../templates/footer.php"; ?>