<?php 
    $usernamesignin = $passwordsignin = $usernamesigninErr = $typeaccount =  "";
    $signinStatus = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["signinusername"])){
        $usernamesigninErr = "username must not empty.";
    }
    else {
        $usernamesignin = test_input($_POST["signinusername"]);
        $passwordsignin = test_input($_POST["signinpassword"]);
        if($_POST["typeaccount"] == "user"){
            $signinStatus = 0;
	        $result = pg_query($Conn,'SELECT * FROM getinfo_acuser(\''.$usernamesignin.'\')');
	        if (!$result) {
    	        echo "An error occurred.\n";
    	        exit;
	        } 
            else{
                if($row = pg_fetch_assoc($result)){
                    if($row["password"] == $passwordsignin){
                        $signinStatus = 1;
                    }
                }
                if($signinStatus){
?>
                <script>
                    alert('login user account suscess!');
                </script>
<?php                
                }
                else{
?>
                <script>
                    alert('login user account fail!');
                </script>
<?php
                }
            }
        }
        else if($_POST["typeaccount"] == "nhanvien"){
            $signinStatus = 0;
            $result = pg_query($Conn,'SELECT * FROM getinfo_nhanvien(\''.$usernamesignin.'\')');
	        if (!$result) {
    	        echo "An error occurred.\n";
    	        exit;
	        } 
            else{
                if($row = pg_fetch_assoc($result)){
                    if($row["password"] == $passwordsignin){
                        $signinStatus = 1;
                    }

                }
                if($signinStatus){
?>
                <script>
                    alert('login nhanvien account suscess!');
                </script>
<?php                
                }
                else{
?>
                <script>
                    alert('login nhanvien account fail!');
                </script>
<?php
                }
            }
        }
    }
}
?>
<div class="canvassignin hide">
		<div class="signinbox">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" target = "_self">
				<div class = "info">
					<ul>
						<li><p>Username</p></li>
						<li><input type = "text" placeholder ="Username" autocomplete="on" name="signinusername"></li>
                        <span class="error" style = "color:red;"> <?php echo $usernamesigninErr;?></span>
					</ul>
				</div>
				<div class = "info">
					<ul>
						<li><p>Password</p></li>
						<li class = "passwordsignin"><input type = "password" placeholder ="Password" autocomplete="on" name="signinpassword" required>
                        <span class="show-btn"><i class="fas fa-eye"></i></span>
                    </li>
					</ul>
				</div>
                <input type="radio" id="userpick" name="typeaccount" value="user" required="required">
                <label for="user">User</label>
                <input type="radio" id="nhanvienpick" name="typeaccount" value="nhanvien" required="required">
                <label for="nhanvien">NhanVien</label>
				<div class="info">
					<button type="submit">Sign Up</button>
				</div>
			</form>
		</div>
	</div>