<?php 
	require "connectionController.php";
	
	function getProductByProductCode() {
		startConnection();

		$productCode = $_POST['orderid'];

		$query = "SELECT * FROM IDSPRODUCT WHERE PRODUCTCODE = $productCode";

		$GLOBALS['authentication'] = oci_parse($GLOBALS['connect'], $query);
	 	$execute = oci_execute($GLOBALS['authentication']);
	 	if(!$execute) {
	 		$msg = "Possible Errror Is On Query!";
	 	}
	 	else {
	 		$row = '';
	 		$data = array();
	        while($row = oci_fetch_array($GLOBALS['authentication'])) {
	        	$data = $row[6];
	        }
	        if($row == '') {
	            $msg = "Product Not Found";
	        }
	        echo $data;
	 	}
		closeConnection();
	}

	getProductByProductCode();
	
?>