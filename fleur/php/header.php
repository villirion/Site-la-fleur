<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/styleFooter.css">
	<link rel="stylesheet" href="css/styleHeader.css">
	<link rel="stylesheet" href="css/styleIndex.css">
	<title>Site la fleur</title>
</head>
<body>
	<div class="header">
		<div class="left">
			<img 
				src = "https://static.vecteezy.com/system/resources/previews/001/191/141/non_2x/flower-logo-png.png"
			/>
		</div>
		<div class="middle">
			<h1>Site la fleur</h1>
		</div> 
		<div class="right">
			<div class="login-container">
				<?php include('php/' . $_SESSION['status'] . '.php'); ?>
			</div>
		</div>
	</div> 