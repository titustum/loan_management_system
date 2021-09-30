<!DOCTYPE html>
<html lang="en-US">
<head>
	<title><?php echo $title; ?>- Fast Loan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Keywords" content="loan, morgage, car, bank, money">
	<meta name="Description" content="Best and Easy Loan Web Application that lets you get them instantly.">
	<link rel="icon" href="../images/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="../assets/css/tailwindcss/tailwind.css"/>
	<link rel="stylesheet" type="text/css" href="../assets/fontawesome-free-5.15.4-web/css/all.css">
</head>
<body class="bg-white">
	<div class="border-b border-gray-200 py-2 mb-5">
		<div class="flex container mx-auto items-center px-2 md:px-1">
			<a href="index.php" class="brand decoration-none flex items-center text-green-500">
				<img src="../images/logo.png" class="h-10 w-14">
				<span class="ml-2 text-4xl font-bold">Quick Loan</span>
			</a>

			<div class="ml-auto flex font-bold">
				<?php
				if($forStaff){
				   include("adminLoginForm.php");
				}else{?>
					<a href="adminlogin.php" class="decoration-none text-green-500 text-xl">Admin Login</a>
				<?php } ?>
				
			</div>
		</div>
	</div>
	<div class="flex container mx-auto">
		<div class="w-full flex-grow pb-3 hidden md:inline" style="min-height: 80vh;">
			<img src="../images/Best-Quick-Loan-App-in-Nigeria-4.png" class="rounded w-full h-full">
		</div>
		
		<div class="md:ml-auto md:w-2/5 px-2 w-full py-3 md:py-0 mb-3 md:mb-0">
			<?php include($myfile);?>
		</div>
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
				<h2 class="text-xl">Developer Links</h2>
				<ul>
					<li>
						<a href="https://github.com/titustum" class="decoration-none text-green-500">
							<i class="fab fa-github mr-1"></i>
							Github
						</a>
					</li>
					<li>
						<a href="https://linkedin.com/in/titustum/" class="decoration-none text-green-500">
							<i class="fab fa-linkedin mr-1"></i>
							LinkedIn
						</a>
					</li>
					<li>
						<a href="mailto:tituskiptanuitum@gmail.com" class="decoration-none text-green-500">
							<i class="far fa-envelope mr-1"></i>
							Email
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="bg-black text-white py-2">
		<div class="container mx-auto flex justify-center">
			&copy; <?php echo date('Y'); ?> - <a href="https://github.com/titustum" class="decoration-none text-green-500"><i class="fab fa-github mx-1"></i>Titus Tum</a>, Developer, All rights reserved
		</div>
	</div>

</body>
</html>