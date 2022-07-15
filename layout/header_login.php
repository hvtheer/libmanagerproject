<head>
<link rel="stylesheet" href="css/userstyle.css">
</head>
<div class="user_header">
    <p><a href="index.php"><?php echo "Hello ". $_SESSION["typeaccount"] ." ". $_SESSION["accountname"]; ?></a></p>
    <div class ="optionaluser">
        <ul>
            <li class = "logout"><a href = "../logout.php">logout </a></li>
            <li class = "profile"><a href = "../profile/profile.php">Profile</a></li>
	        <?php 
	        if($_SESSION["typeaccount"] == "user") { ?>
            <li class = "borrowing book"><a href = "accountindex/borrowingbook.php">Borrowing</a></li>
            <?php 
            } 
            else if($_SESSION["typeaccount"] == "nhanvien"){
            ?>
            <li class = "confirmed book"><a href = "nhanvienindex/confirmedbook.php">Confirmed</a></li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>


	
