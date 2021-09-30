		<div class="flex justify-between border-b-2 border-green-500 py-2 bg-white">
			<a href="loans.php" class="decoration-none border-b-2 border-t-2 border-2 border-green-500 py-1 px-4  mx-2 hover:text-white  hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex justify-center items-center <?php echo $active_loans[0];?>">
				<span class="material-icons-outlined mr-2">local_atm</span>
				Requested Loans
			</a>

			<a href="active.php" class="decoration-none border-b-2 border-t-2 border-2 border-green-500 py-1 px-4 mx-2  hover:text-white hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex justify-center items-center <?php echo $active_loans[1];?>">
				<span class="material-icons-outlined mr-2">update</span>
				Active Loans
			</a>

			<a href="declined_loans.php" class="decoration-none border-b-2 border-t-2 border-2 border-green-500 py-1 px-4 mx-2  hover:text-white hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex justify-center items-center <?php echo $active_loans[2];?>">
				<span class="material-icons-outlined mr-2">error</span>
				Declined Loans
			</a>

			<a href="paid_loans.php" class="decoration-none border-b-2 border-t-2 border-2 border-green-500 py-1 px-4 mx-2  hover:text-white hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex justify-center items-center <?php echo $active_loans[3];?>">
				<span class="material-icons-outlined mr-2">done_all</span>
				Paid Loans
			</a>

			<a href="add_loan.php" class="decoration-none border-b-2 border-t-2 border-2 border-green-500 py-1 px-4 mx-2  hover:text-white hover:bg-green-500 focus:bg-green-600 focus:text-white focus:border-green-600 flex justify-center items-center <?php echo $active_loans[4];?>">
				<span class="material-icons-outlined mr-2">add</span>
				Add New Loan
			</a>

		</div>