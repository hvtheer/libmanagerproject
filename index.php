<?php include "disconn_andconn/dbconnect.php" ?>
<?php include "test.php" ?>
<?php include "status.php" ?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<title>libmaneger</title>
</head>
<body>
	
	<?php include "layout/signin.php" ?>
    <?php include "layout/signup.php" ?>
	
	<?php if($_SESSION["signinstatus"] == 0){  ?>
	<?php include "layout/header.php" ?>
	<?php }
	else { ?>
		<?php include "layout/dropdown.php" ?>
	<?php 
	}
	?>


	<div class="imageintro">
		<img src = "images/Introlib.jpeg">
	</div>
	<?php include "layout/searchbar.php" ?>
	<?php include "layout/searchbooktable.php" ?>
    <?php include "disconn_andconn/disconnectdb.php" ?>
	
</body>
<script src="js/app.js"></script>
