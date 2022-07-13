<head>
<link rel="stylesheet" href="css/userstyle.css">
</head>
<div class="user_header">
    <p><?php echo "Hello ". $_SESSION["typeaccount"] ." ". $_SESSION["accountname"]; ?></p>
    <div class ="optionaluser">
        <ul>
            <li class = "logout"><a href = "logout.php">logout </a></li>
            <li class = "profile"><a href = "profileuser.php">Profile</a></li>
        </ul>
    </div>
</div>