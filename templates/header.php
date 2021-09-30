<?php 
//if start sessions if not started
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION["logged_user"]))
	header("Location: ../ui/");

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Dashboard - Fast Loan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Keywords" content="loan, morgage, car, bank, money">
	<meta name="Description" content="Best and Easy Loan Web Application that lets you get them instantly.">
	<link rel="icon" href="../images/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="../assets/css/tailwindcss/tailwind.css"/>
	<!-- Google Fonts -->
  	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  	<link rel="stylesheet" href="../assets/material-icons/iconfont/material-icons.css">
</head>
<body class="bg-white">
	<div class="border-b border-gray-200 py-3">
		<div class="flex container mx-auto items-center px-2 md:px-1">
			<a href="dashboard.php" class="brand decoration-none flex items-center text-green-500">
				<img src="../images/logo.png" class="h-10 w-14">
				<span class="ml-2 text-4xl font-bold">Quick Loan</span>
			</a>

			<div class="ml-auto flex font-bold">
				<a href="user_account.php" class="decoration-none text-green-500 text-xl flex items-center">
					<span class="material-icons-outlined mr-2">person</span>
					<?php

					if (isset($_SESSION["logged_user"])){
						if (isset($_SESSION["logged_user"]['admin_firstname'])) {
							echo $_SESSION["logged_user"]['admin_firstname'] ." ". $_SESSION["logged_user"]['admin_lastname'];
						}
						if (isset($_SESSION["logged_user"]['cst_firstname'])) {
							echo $_SESSION["logged_user"]['cst_firstname'] ." ". $_SESSION["logged_user"]['cst_lastname'];
						}
					}
					 ?>
				</a>
			</div>
		</div>
	</div>

	<?php

	$active=array("","","","","","","",""); 
	$active_loan = array("","","","","");
?>