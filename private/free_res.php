<?php
	// Release resources.

	function release (&$connection, &$res) {
		// 4. Release returned data
		mysqli_free_result($res);

		// 5. Close database connection
		mysqli_close($connection);
	}
?>