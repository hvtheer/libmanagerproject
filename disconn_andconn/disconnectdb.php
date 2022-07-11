<?php 
if(!pg_close($Conn)) {
	print "Failed to close connection to " . pg_host($pgsql_conn) . ": " .
   pg_last_error($Conn) . "<br/>\n";
}
?>