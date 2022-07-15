<?php
$Conn = pg_connect("host=localhost port=5432 dbname=libmaneger user=postgres password=admin");
if (!$Conn) {
    echo "An error occurred.\n";
    exit;
}
session_start();
// Query data
?>