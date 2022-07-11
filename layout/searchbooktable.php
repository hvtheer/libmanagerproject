<div class="tableofbook" style="overflow-x: auto;">
		
		<table>
			  <tr>
				<th>Name</th>
				<th>Type</th>
				<th>Author</th>
				<th>available</th>
			  </tr>
<?php 

// Perform query
if ($searchbook == ""){
	$query = 'SELECT * FROM getinfo_availablebook()';
	$result = pg_query($Conn,$query);
	if (!$result) {
    	echo "An error occurred.\n";
    	exit;
	}
	
}
else{
	$query = 'SELECT * FROM find_availablebookbyname(\''.$searchbook.'\')';
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
 		<td><?php  echo $row["type"]; ?></td>
 		<td><?php  echo $row["author"]; ?></td>
 		<td><?php  echo $row["available"]; ?></td>
 		<td><button>Muon</button></td>
 	</tr>
<?php
}
?>
</table>