<!DOCTYPE html>
<html>
<?php include "disconn_andconn/dbconnect.php" ?>
<?php
    if($_SESSION["account_id"]&&$_SESSION["borrowbook_id"]){
        $query = 'INSERT INTO transaction(userinfo_id,book_id) values('.$_SESSION["account_id"].','.$_SESSION["borrowbook_id"].')';
        $result = pg_query($Conn,$query);
        if($result){
?>
        <script>
            alert('borrow success!');
        </script>

         <head>
        <meta charset="UTF-8">
        <title>Product Card</title>
        <link rel="stylesheet" href="../css/create_transaction.css">
    </head>
    <body>
        <div class="card">
        <div class="card_ima">
                <img src="images/book.jpeg">
            </div>
            <div class="card_title" style = "font-size: 15px;"> 
            <?php
                if(isset($_SESSION["borrowbook_id"])){
                $query = 'SELECT book_name,description FROM book WHERE book_id = '.$_SESSION["borrowbook_id"];
                $result = pg_query($Conn,$query);
                if($row = pg_fetch_assoc($result)){
                    echo 'Borrow success '. $row["book_name"];
                }
            }
            ?> 
            </div>
            <div class="card_option">
                <p><?php  echo $row["description"]; ?></p>
            </div>
            <div class="card_action">
            <a href = "../index.php">Cancel</a>
            </div>
        </div>
    </body>
</html>
<?php
        }
        else{
?>
        <script>
            alert('borrow fail!');
        </script>
    <body>
        <div class="card">
            <div class="card_icon"></div>
           
            <div class="card_title"> 
            <?php
                if(isset($_SESSION["borrowbook_id"])){
                $query = 'SELECT book_name,description FROM book WHERE book_id = '.$_SESSION["borrowbook_id"];
                $result = pg_query($Conn,$query);
                if($row = pg_fetch_assoc($result)){
                    echo 'wrong borrow '. $row["book_name"];
                }
            }
            ?> 
            </div>
            <div class="card_option">
                <p><?php  echo $row["description"]; ?></p>
            </div>
            <div class="card_action">
            <a href = "../index.php">Cancel</a>
            </div>
        </div>
    </body>
</html>
<?php
        }
    }
    
?>