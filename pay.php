<?php include "disconn_andconn/dbconnect.php" ?>
<?php include "test.php" ?>
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_SESSION["account_id"]){
            $query = 'INSERT INTO fines(nhanvien_id,userinfo_id,money) values ('.$_SESSION["account_id"].','.$_POST["user_id"].','.$_POST["fines"].');';
            $result = pg_query($Conn,$query);
            if($result){
                $query = 'UPDATE returnbooks SET status = true WHERE transaction_id = '.$_SESSION["transaction_id"];
                $result = pg_query($Conn,$query);
                header('location:nhanvienindex/confirmedbook.php');
            }
            else{
                header('location:index.php');
            }
        }
    }
?>