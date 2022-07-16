<?php include "../disconn_andconn/dbconnect.php" ?>
<?php include "../test.php" ?>
<?php include "../status.php" ?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/userstyle.css">
	<link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	
	<title>libmaneger</title>
</head>
<body>

    <div class="user_header">
        <p><?php echo "Hello ". $_SESSION["typeaccount"] ." ". $_SESSION["accountname"]; ?></p>
        <div class ="optionaluser">
            <ul>
            <li class = "logout" style = "font-size:11px;"><a href = "../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                <li class = "profile" style = "font-size:11px;"><a href = "profileuser.php"><i class="fas fa-user"></i>Profile</a></li>
                <li class = "home" style = "font-size:11px;"><a href = "../index.php"><i class="fa fa-home"></i>Home</a></li>
            </ul>
        </div>
    </div>


	<div class="imageintro">
		<img src = "../images/Introlib.jpeg">
	</div>
<?php
    $searchdate = $searchdateErr = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if(empty($_GET["searchdate"])){
		$searchrtbookErr = "search is required";
	}
	else
  $searchdate = test_input($_GET["searchdate"]);
}
?>
<div class = "searchbar">
		<form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" target = "_self" >
			<input type = "date" value = "<?php echo date("Y-m-d");?>" name="searchdate" > 
			<button type="submit"><i class="fa fa-search"></i></button>
		</form>
</div>
	<div class="tableofbook" style="overflow-x: auto;">
		
		<table>
			  <tr>
                <th>Name</th>
				<th>User</th>
				<th>ReceiveNhanVien</th>
				<th>Money</th>
                <th>Finesdate</th>
			  </tr>
<?php 

// Perform query
if($searchdate == ""){
	$query = 'SELECT * FROM findallfined()';
}
else{
    $query = 'SELECT * FROM findallfined() WHERE finesdate = \''.$searchdate.'\';';
}
	$result = pg_query($Conn,$query);
	if (!$result) {
    	echo "An error occurred.\n";
    	exit;
	}
while ($row = pg_fetch_assoc($result)) {
?>
 	<tr>
        <td><?php  echo $row["name"]; ?></td>
 		<td><?php  echo $row["username"]; ?></td>
 		<td><?php  echo $row["nhanvienusername"]; ?></td>
 		<td><?php  echo $row["money"]; ?></td>
        <td><?php  echo $row["finesdate"];?></td>
 	</tr>
<?php
}
?>
</table>
    <?php include "../disconn_andconn/disconnectdb.php" ?>
	
</body>

<script src="../js/app.js"></script>
