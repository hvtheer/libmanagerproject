<?php
// define variables and set to empty values
$searchbookErr = $searchbook = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST["searchbook"])){
		$searchbookErr = "search is required";
	}
	else
  $searchbook = test_input($_POST["searchbook"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<?php
	include "dbconnect.php" 
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>index of intro</title>
</head>
<body>
	<div class="canvassignin hide">
		<div class="signinbox">
			<form action="#" method="post">
				<div class = "info">
					<ul>
						<li><p>Username</p></li>
						<li><input type = "text" placeholder ="Username" autocomplete="on" name="username"></li>
					</ul>
				</div>
				<div class = "info">
					<ul>
						<li><p>Password</p></li>
						<li><input type = "text" placeholder ="Password" autocomplete="on" name="password"></li>
					</ul>
				</div>
				<div class="info">
					<button type="submit">Sign Up</button>
				</div>
			</form>
		</div>
	</div>
	<div class="canvas hide">
		<div class="box">
			<form action="#" method="post">
				
				<div class="info">
					<p>First Name</p>
					<input type = "text" placeholder ="First name" autocomplete="on" name="first_name"> 
				</div>
				<div class="info">
					<p>Last Name</p>
					<input type = "text" placeholder ="Last name" autocomplete="on" name="last_name">
				</div>
				<div class="info">
					<p>Username</p>
					<input type = "text" placeholder ="Username" autocomplete="on" name="username">
				</div>
				<div class="info">
					<p>Password</p>
					<input type = "text" placeholder ="Password" autocomplete="on" name="password">
				</div>
				<div class="info">
					<p>Email</p>
					<input type = "text" placeholder ="Email" autocomplete="on" name="email">
				</div>
				<div class="info">
					<p>Address</p>
					<input type = "text" placeholder ="Address" autocomplete="on" name="address">
				</div>
				<div class="info">
					<p>Numberphone</p>
					<input type = "text" placeholder ="Numberphone" autocomplete="on" name="numberphone">
				</div>
			    <button type="submit">Sign Up</button>
			</form>
		</div>
	</div>
	<div class ="optional">
		<ul>
			<li class="signup"> Sign Up</li>
			<li class="signin"> Sign In</li>
		</ul>
	</div>
	<div class="imageintro">
		<img src = "images/Introlib.jpeg">
	</div>
	<div class = "searchbar">
		<form method="post" action="#" >
			<input type = "search" placeholder ="Search Book" autocomplete="on" name="searchbook"> 
			<button type="submit"><i class="fa fa-search"></i></button>
		</form>
	</div>
	<div class="tableofbook" style="overflow-x: auto;">
		
			<table>
			  <tr>
				<th>Name</th>
				<th>Type</th>
				<th>Author</th>
				<th>available</th>
			  </tr>
<?php 

// Perform query
if ($result = $conn -> query("SELECT * FROM book")) {
	for($i = 0;$i < ($result -> num_rows);$i++){
		$row = mysqli_fetch_assoc($result);
?>
 	<tr>
 		<td><?php  echo $row["book_name"]; ?></td>
 		<td><?php  echo $row["type"]; ?></td>
 		<td><?php  echo $row["author"]; ?></td>
 		<td><?php  echo $row["available"]; ?></td>
 		<td><button>Muon</button></td>
 	</tr>
<?php
}}
?>
</table>
</body>
<script src="app.js"></script>
<?php
 $conn->close();
?>
