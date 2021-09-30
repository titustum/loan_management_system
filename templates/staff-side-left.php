<style>
  .material-icons-outlined{
  	font-size: inherit !important;
  }
</style>


<div class="flex bg-gray-200" style="min-height:80vh">

	<div class="font-semibold text-xl flex flex-col bg-white py-3 pr-3">

		<a href="dashboard.php" class="decoration-none border-b-2 border-t-2 border-r-2 border-green-500 rounded-r-full w-full py-3 px-4 w-full mb-2 hover:text-white hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex items-center <?php echo $active[0];?>">
			<span class="material-icons-outlined">home</span> <span class="pl-2">Home</span>
		</a>

		
		<a href="loans.php" class="decoration-none border-b-2 border-t-2 border-r-2 border-green-500 rounded-r-full w-full py-3 px-4 w-full mb-2 hover:text-white hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex items-center <?php echo $active[1];?>">
			<span class="material-icons-outlined">group</span> <span class="pl-2">Loans</span>
		</a>

		<a href="payments.php" class="decoration-none border-b-2 border-t-2 border-r-2 border-green-500 rounded-r-full w-full py-3 px-4 w-full mb-2 hover:text-white hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex items-center <?php echo $active[2];?>">
			<span class="material-icons-outlined">money</span> <span class="pl-2">Payments</span>
		</a>

		<a href="borrowers.php" class="decoration-none border-b-2 border-t-2 border-r-2 border-green-500 rounded-r-full w-full py-3 px-4 w-full mb-2 hover:text-white hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex items-center <?php echo $active[3];?>">
			<span class="material-icons-outlined">people</span> <span class="pl-2">Borrowers</span>
		</a>

		<a href="plans.php" class="decoration-none border-b-2 border-t-2 border-r-2 border-green-500 rounded-r-full w-full py-3 px-4 w-full mb-2 hover:text-white hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex items-center <?php echo $active[4];?>">
			<span class="material-icons-outlined">money</span> <span class="pl-2">Loan Plans</span>
		</a>

		<a href="types.php" class="decoration-none border-b-2 border-t-2 border-r-2 border-green-500 rounded-r-full w-full py-3 px-4 w-full mb-2 hover:text-white hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex items-center <?php echo $active[5];?>">
			<span class="material-icons-outlined">money</span> <span class="pl-2">Loan Types</span>
		</a>


		<a href="admins.php" class="decoration-none border-b-2 border-t-2 border-r-2 border-green-500 rounded-r-full w-full py-3 px-4 w-full mb-2 hover:text-white hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex items-center <?php echo $active[6];?>">
			<span class="material-icons-outlined">group</span> <span class="pl-2">Admins</span>
		</a>

		
		<a href="../action/logout.php" class="decoration-none border-b-2 mt-4 border-t-2 border-r-2 border-red-500 rounded-r-full w-full py-3 px-4 w-full mb-5 hover:text-white hover:bg-red-500 focus:bg-red-600 focus:text-white focus:border-red-600 flex items-center">
			<span class="material-icons-outlined">power_settings_new</span> <span class="pl-2">Logout</span>
		</a>
		
		
	</div>