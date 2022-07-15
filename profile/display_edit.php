<?php
if ($_SESSION["signinstatus"] != 1&&$_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $usernameErr = $password = $passwordErr = $re_password = $re_passwordErr = $email = $emailErr = $numberphone = $numberErr = $address = $addressErr ="";
  
    if (empty($_POST["last_name"])) {
      $last_nameErr = "Last Name is required";
      
    } else {
      
      $last_name = test_input($_POST["last_name"]);
      // check if name only contains letters and whitespace
    }

    if (empty($_POST["first_name"])) {
        $first_nameErr = "First Name is required";
      } else {
        $first_name = test_input($_POST["first_name"]);
        // check if name only contains letters and whitespace
      }
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    }
    else {
        $username = test_input($_POST["username"]);
        $query = 'SELECT * FROM getinfo_allacuser() WHERE username = \''.$username.'\'';
	      $result = pg_query($Conn,$query);
        if(pg_num_rows($result) != 0){
          $usernameErr = "username already exists.";
        }
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    }  
    else{
      $password = test_input($_POST["password"]); 
    }
    if (empty($_POST["re_password"])) {
      $re_passwordErr = "re_Password is required";
    }  
    else{
      $re_password = test_input($_POST["re_password"]);
      if($password != $re_password){
        $re_passwordErr = "Password not equal repassword";
      }    
    }
       if (empty($_POST["numberphone"])) {
        $numberErr = "numberphone is required";
      }
      else {
        $numberphone = test_input($_POST["numberphone"]);
        // check if numberphone only number
        if (!preg_match("/^[0-9]*$/",$numberphone)) {
          $numberphoneErr = "Only Number allowed";
        }
        else{
          $query = 'SELECT * FROM getinfo_allacuser() WHERE phone = \''.$numberphone.'\'';
          $result = pg_query($Conn,$query);
          if(pg_num_rows($result) != 0){
            $numberErr = "numberphone already exists.";
          }
        }
      }
      if (empty($_POST["address"])) {
        $addressErr = "Address is required";
      } else {
        $address = test_input($_POST["address"]);
        // check if name only contains letters and whitespace
      }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } 
     else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
      else {
        $query = 'SELECT * FROM getinfo_allacuser() WHERE email = \''.$email.'\'';
          $result = pg_query($Conn,$query);
          if(pg_num_rows($result) != 0){
            $emailErr = "email already exists.";
          }
      }
    }
    if($last_nameErr == "" && $first_nameErr == "" && $usernameErr == "" && $emailErr == "" && $addressErr == "" && $passwordErr == ""&& $usernameErr == "" && $re_passwordErr == ""&& $numberErr == ""){
      if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
    
        $query = "UPDATE user_info SET username = '$username', 
        password = '$password', email = '$email', 
        address = '$address', phone = '$phone'
        WHERE userinfo_id = ".$_SESSION["account_id"]."";
        $result = pg_query($Conn,$query);
         if (!$result) {
          echo "An error occurred.\n";
          exit;
      }
    }
?>
                <script>
                  alert('Created User Success!');
                </script>
<?php
      }
    else {
?>
                <script>
                  alert('Created User faile!');
                </script>
<?php
          }
}
    else {
      ?>
              <script>
                  alert('you have some warning in your information');
                </script>
<?php
    }
?>
<?php 

// Perform query
	        if($_SESSION["typeaccount"] == "user") {
            $query = 'SELECT * FROM getinfo_acuser(\''.$_SESSION["accountname"].'\')';
          }
            else if($_SESSION["typeaccount"] == "nhanvien"){
            $query = 'SELECT * FROM getinfo_nhanvien(\''.$_SESSION["accountname"].'\')';
            }
	$result = pg_query($Conn,$query);
	if (!$result) {
    	echo "An error occurred.\n";
    	exit;
	}
while ($row = pg_fetch_assoc($result)) {
?> 
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo "Hello ". $row["name"]."!"; ?></h4>
                      <p class="text-secondary mb-1"><?php echo $_SESSION["typeaccount"].": ".$_SESSION["account_id"]; ?></p>
                      <p class="text-muted font-size-sm"><?php echo $row["address"]; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method= "POST" target="_self">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input name="first_name" class="form-control" value="<?php echo $row["name"]; ?>">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                    <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name = "username" class="form-control" value="<?php echo $_SESSION["accountname"]; ?>">
                    <span class="error">* <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION["signinstatus"] != 1) echo $usernameErr;?></span>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                    <h6 class="mb-0">Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name = "password" class="form-control" value="<?php echo $row["password"]; ?>">
                    <span class="error">* <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION["signinstatus"] != 1) echo $passwordErr;?></span>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                    <h6 class="mb-0">Re-password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name = "password" class="form-control" value="<?php echo $row["password"]; ?>">
                    <span class="error">* <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION["signinstatus"] != 1) echo $re_passwordErr;?></span>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name = "email" class="form-control" value="<?php echo $row["email"]; ?>">
                    <span class="error">* <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION["signinstatus"] != 1) echo $emailErr;?></span>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name = "address" class="form-control" value="<?php echo $row["address"]; ?>">
                    <span class="error">* <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION["signinstatus"] != 1) echo $addressErr;?></span>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name = "phone" class="form-control" value="<?php echo $row["phone"]; ?>">
                    <span class="error">* <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION["signinstatus"] != 1) echo $numberErr;?></span>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                    <input type="submit" name="submit" value="Save Changes" class="btn btn-info"><a href="../profile/profile.php"><a></input>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>

          <?php
        }
        ?>