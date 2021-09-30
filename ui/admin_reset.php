
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Admin Login- Fast Loan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Keywords" content="loan, morgage, car, bank, money">
	<meta name="Description" content="Best and Easy Loan Web Application that lets you get them instantly.">
	<link rel="icon" href="../images/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="../assets/css/tailwindcss/tailwind.css"/>
</head>
<body class="bg-white">
	<div class="border-b border-gray-200 py-2 mb-5">
		<div class="flex container mx-auto items-center px-2 md:px-1">
			<a href="index.php" class="brand decoration-none flex items-center text-green-500">
				<img src="../images/logo.png" class="h-10 w-14">
				<span class="ml-2 text-4xl font-bold">Quick Loan</span>
			</a>

			<div class="ml-auto flex font-bold">
				<?php include 'admin_password_reset_form.php';?>
			</div>
		</div>
	</div>
	<div class="flex container mx-auto">
		<div class="w-full flex-grow pb-3 hidden md:inline" style="min-height: 80vh;">
			<img src="../images/Best-Quick-Loan-App-in-Nigeria-4.png" class="rounded w-full h-full">
		</div>
		
		<div class="md:ml-auto md:w-2/5 px-2 w-full py-3 md:py-0 mb-3 md:mb-0">
						<div class="mb-4">
				<div class="flex">
					<h2 class="text-2xl font-bold p-3 bg-blue-200 text-green-800 border-gray-700 uppercase">DO YOU Need Personal loans instantly?</h2>	
				</div>
				
				<p class="text-xl">We offer all sets of loans instantly. Just follow these simple steps and you will get them in no time.</p>
				<ul class="text-xl list-inside list-disc px-2">
					<li>Signin or Create Account</li>
					<li>Request for loan</li>
					<li>Receive cash</li>
				</ul>
				<div class="font-bold text-xl py-2">
					Does this sound amazing?
				</div>
				
			</div>

			<div class="w-full mt-4">
				<a href="signin.php" class="decoration-none bg-gray-500 text-white rounded-lg flex justify-center mx-auto hover:bg-blue-400 focus:bg-blue-800 py-3 font-semibold">
					Signin To Your Customer Account
				</a>
			</div>

			<div class="w-full ml-auto text-2xl font-bold text-center text-blue-600">
				or
			</div>

			<div class="w-full mt-4">
				<a href="signup.php" class="decoration-none bg-gray-500 text-white rounded-lg flex justify-center mx-auto hover:bg-blue-400 focus:bg-blue-800 py-3 font-semibold">
					Create New Customer Account
				</a>
			</div>		</div>
	</div>

	<div class="bg-blue-200">
		<div class="py-3 container mx-auto flex justify-between font-semibold">
			<div>
				<h2 class="text-xl">Customer Links</h2>
				<ul>
					<li>
						<a href="signin.php" class="decoration-none text-green-500">Login</a>
					</li>
					<li>
						<a href="signup.php" class="decoration-none text-green-500">Register</a>
					</li>
					<li>
						<a href="#" class="decoration-none text-green-500">Help</a>
					</li>
				</ul>
			</div>
			<div>
				<h2 class="text-xl">Staff Links</h2>
				<ul>
					<li>
						<a href="signin.php" class="decoration-none text-green-500">Staff Login</a>
					</li>
					<li>
						<a href="#" class="decoration-none text-green-500">Refer clients</a>
					</li>
					<li>
						<a href="#" class="decoration-none text-green-500">Report Issue</a>
					</li>
				</ul>
			</div>
			<div>
				<h2 class="text-xl">Social Links</h2>
				<ul>
					<li>
						<a href="#" class="decoration-none text-green-500">Facebook</a>
					</li>
					<li>
						<a href="#" class="decoration-none text-green-500">Twitter</a>
					</li>
					<li>
						<a href="#" class="decoration-none text-green-500">Whatsapp</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="bg-black text-white py-2">
		<div class="container mx-auto flex justify-center">
			&copy; 2020 - Quick Loans Developer, All rights reserved
		</div>
	</div>

</body>
</html>