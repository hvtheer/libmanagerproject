<?php include "../disconn_andconn/dbconnect.php" ?>
<?php include "../test.php" ?>
<?php include "../status.php" ?>
<?php
if (isset($_POST['submit'])) {
    $iusername = $_POST['username'];
    $ipassword = $_POST['password'];
    $iemail = $_POST['email'];
    $iaddress = $_POST['address'];
    $iphone = $_POST['phone'];

    $query = "UPDATE user_info SET username = '$iusername', 
    password = '$ipassword', email = '$iemail', 
    address = '$iaddress', phone = '$iphone'
    WHERE userinfo_id = ".$_SESSION["account_id"]."";
    $result = pg_query($Conn,$query);
     if (!$result) {
    	echo "An error occurred.\n";
    	exit;
	}
}
?>
