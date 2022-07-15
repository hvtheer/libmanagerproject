<?php include "../disconn_andconn/dbconnect.php" ?>
<?php include "../test.php" ?>
<?php include "../status.php" ?>
<script>
	var a = new audio();
	a.src = "../audio/tinylove.mp3";
	a.play();
</script>
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
        <p><a href="index.php"><?php echo "Hello ". $_SESSION["typeaccount"] ." ". $_SESSION["accountname"]; ?></a></p>
        <div class ="optionaluser">
            <ul>
                <li class = "logout"><a href = "../logout.php">logout </a></li>
                <li class = "profile"><a href = "../profile/profile.php">Profile</a></li>
                <li class = "home"><a href = "../index.php">Home</a></li>
            </ul>
        </div>
    </div>


	<div class="imageintro">
		<img src = "../images/Introlib.jpeg">
	</div>
	<div class="tableofbook" style="overflow-x: auto;">
		
		<table>
			  <tr>
				<th>User</th>
				<th>Bookborrow</th>
				<th>ReturnDate</th>
                <th>Confirmer</th>
			  </tr>
<?php 

// Perform query
	$query = 'SELECT * FROM findallreturned()';
	$result = pg_query($Conn,$query);
	if (!$result) {
    	echo "An error occurred.\n";
    	exit;
	}
while ($row = pg_fetch_assoc($result)) {
?>
 	<tr>

 		<td><?php  echo $row["name"]; ?></td>
 		<td><?php  echo $row["book_name"]; ?></td>
 		<td><?php  echo $row["returndate"]; ?></td>
        <td><?php  echo $row["username"] ?></td>
 	</tr>
<?php
}
?>
</table>
    <?php include "../disconn_andconn/disconnectdb.php" ?>
	
</body>

<script src="../js/app.js"></script>
