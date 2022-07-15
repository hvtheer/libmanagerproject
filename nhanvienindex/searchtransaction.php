<div class="tableofbook" style="overflow-x: auto;">
		
		<table>
			  <tr>
				<th>User</th>
				<th>Bookborrow</th>
				<th>Borrowdate</th>
				<th>Duedate</th>
			  </tr>
<?php 

// Perform query
if ($searchtransaction == ""){
	$query = 'SELECT * FROM findall_actransaction()';
	$result = pg_query($Conn,$query);
	if (!$result) {
    	echo "An error occurred.\n";
    	exit;
	}
	
}
else{
	$query = 'SELECT * FROM findall_actransaction() WHERE position(\''.$searchtransaction.'\' in name) > 0;';
	$result = pg_query($Conn,$query);
	if (!$result) {
    	echo "An error occurred.\n";
    	exit;
	}
}

while ($row = pg_fetch_assoc($result)) {
?>
 	<tr>

 		<td><?php  echo $row["name"]; ?></td>
 		<td><?php  echo $row["book_name"]; ?></td>
 		<td><?php  echo $row["borrowdate"]; ?></td>
 		<td><?php  echo $row["duedate"]; ?></td>
 		<td>
		 <form action="nhanvienindex\confirm.php" method = "POST">
				<input type="hidden" name = "transaction" value = "<?php echo $row["transaction_id"]; ?>"> 
		 		<button type= "submit">Confirm</button>
			</form></td>
 	</tr>
<?php
}
?>
</table>