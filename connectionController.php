<?php 
	$GLOBALS['connect'] = '';
	$GLOBALS['authentication'] = '';
	$msg = '';

	function startConnection() {
		$dbUser = "system";
		$dbpass = "Cse440033";
		$db = "localhost:1521/orcl";

		$GLOBALS['connect'] = oci_connect($dbUser, $dbpass, $db);
	 	if (!$GLOBALS['connect']) {
	    	$msg = "An error has occured connecting to the database" . oci_error();
	      	exit;
		}
	}

	function closeConnection() {
		oci_free_statement($GLOBALS['authentication']);
		oci_close($GLOBALS['connect']);
	}
?>