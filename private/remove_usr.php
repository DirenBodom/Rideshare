<?php
	include_once '../private/create_conn.php';

	// Create DB connection
	$conn = create_connect();

	// This function removes a user

        if(isset($_REQUEST['method']) && $_REQUEST['method'] == 'remove' && isset($_REQUEST['identification']) && !empty($_REQUEST['identification']))
        {
            remove($_REQUEST['identification'],$conn);
        }    
	function remove ($id,$conn) {
		echo "Removing user";
		$query = "DELETE FROM user_base WHERE ID=" . $id;
		$res = mysqli_query($conn, $query);
	}
?>