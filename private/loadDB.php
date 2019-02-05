<?php
	// This script loads the database in a html table.

	function &load_db ($connect) {
		$query = "SELECT * FROM user_base";
		$result = mysqli_query($connect, $query);

		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td>" . $row["ID"] . "</td>";
			echo "<td>" . $row["firstN"] . " " . $row["secN"] . "</td>"; // Name
			echo "<td>" . $row["addNum"] . " " . $row["addStreet"] . // XXX StreetName
				", " . $row["addCity"] . ", " . $row["addState"] . " " // City, State
				. $row["addZip"] . 
				"<button type=\"button\" onclick=\"removeUser(" . $row["ID"] . ")\">Remove</button>"
				. "</td> </tr>";
			}

		return $result;
	}
?>