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
 	
	
	function executeQuery($data, $queryName) {
		startConnection();
		$query = "INSERT INTO idsProduct (PRODUCTNAME, PRODUCTTYPE, PRICE, QUANTITY, FEATURE, IMAGEURL) 
		 				VALUES ('$data[0]', '$data[1]', $data[2], $data[3], '$data[4]', '$data[5]')";

		if($queryName == "productInsert") {
			$GLOBALS['authentication'] = oci_parse($GLOBALS['connect'], $query);
		 	$execute = oci_execute($GLOBALS['authentication']);
		 	if(!$execute) {
		 		$msg = "Possible Errror Is On Query!";
		 	}
		 	else {
		 		$msg = "Product Uploaded Successfully.";
		 	}
		}
		closeConnection();
	}
	


?>