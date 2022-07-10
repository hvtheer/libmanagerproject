<?php
	include "dbconnect.php" 
?>
<?php
// define variables and set to empty values
$searchbookErr = $searchbook = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if(empty($_GET["searchbook"])){
		$searchbookErr = "search is required";
	}
	else
  $searchbook = test_input($_GET["searchbook"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
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
		<form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
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
if ($searchbook == ""){
	$query = 'SELECT * FROM getinfo_availablebook()';
	$result = pg_query($Conn,$query);
	if (!$result) {
    	echo "An error occurred.\n";
    	exit;
	}
	
}
else{
	$query = 'SELECT * FROM find_availablebookbyname(\''.$searchbook.'\')';
	$result = pg_query($Conn,$query);
	if (!$result) {
    	echo "An error occurred.\n";
    	exit;
	}
}

while ($row = pg_fetch_assoc($result)) {
?>
 	<tr>

 		<td><?php  echo $row["name"]; ?></td>
 		<td><?php  echo $row["type"]; ?></td>
 		<td><?php  echo $row["author"]; ?></td>
 		<td><?php  echo $row["available"]; ?></td>
 		<td><button>Muon</button></td>
 	</tr>
<?php
}
?>
</table>
<?php 
if(!pg_close($Conn)) {
	print "Failed to close connection to " . pg_host($pgsql_conn) . ": " .
   pg_last_error($Conn) . "<br/>\n";
}
?>
</body>
<script src="app.js"></script>
