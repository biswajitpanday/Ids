<?php
 	require "../../connectionController.php";
 	
	/*===== Product Upload Start =====*/
	function saveProducts($data, $queryName) {
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
	/*===== Product Upload End =====*/
	
	

?>