<?php 
	require "connectionController.php";

	function getGalleryProducts() {
		startConnection();

		$query = "SELECT * FROM (SELECT * FROM IDSPRODUCT ORDER BY PRODUCTCODE DESC) WHERE rownum<9";

		$GLOBALS['authentication'] = oci_parse($GLOBALS['connect'], $query);
	 	$execute = oci_execute($GLOBALS['authentication']);
	 	if(!$execute) {
	 		$msg = "Possible Errror Is On Query!";
	 	}
	 	else {
	 		$row = '';
	 		$data = array();
            while($row = oci_fetch_array($GLOBALS['authentication'])) {
            	$data[] = $row;
            }
            if($row == '') {
                $msg = "Product Not Found";
            }
            return $data;
	 	}

		closeConnection();
	}


	function getListProducts() {
		startConnection();
		
		$query = "SELECT * FROM (SELECT * FROM IDSPRODUCT ORDER BY PRODUCTCODE DESC) WHERE rownum<21";

		$GLOBALS['authentication'] = oci_parse($GLOBALS['connect'], $query);
	 	$execute = oci_execute($GLOBALS['authentication']);
	 	if(!$execute) {
	 		$msg = "Possible Errror Is On Query!";
	 	}
	 	else {
	 		$row = '';
	 		$data = array();
            while($row = oci_fetch_array($GLOBALS['authentication'])) {
            	$data[] = $row;
            }
            if($row == '') {
                $msg = "Product Not Found";
            }
            return $data;
	 	}
		closeConnection();
	}

	function getProductByProductCode($productCode) {
		startConnection();
		
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
            	$data[] = $row;
            }
            if($row == '') {
                $msg = "Product Not Found";
            }
            return $data;
	 	}
		closeConnection();
	}

?>