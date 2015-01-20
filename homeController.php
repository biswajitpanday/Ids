<?php 
	require "connectionController.php";

	function getProducts($queryName) {
		startConnection();

		$query = "SELECT * FROM (SELECT * FROM IDSPRODUCT ORDER BY PRODUCTCODE DESC) WHERE rownum<9";

		if($queryName == "getProducts") {
			$GLOBALS['authentication'] = oci_parse($GLOBALS['connect'], $query);
		 	$execute = oci_execute($GLOBALS['authentication']);
		 	if(!$execute) {
		 		$msg = "Possible Errror Is On Query!";
		 	}
		 	else {
		 		//Here products Come....
		 		$row = '';
		 		$data = array();
                while($row = oci_fetch_array($GLOBALS['authentication'])) {
                	//echo "<span>" . $row[6] . "</span>";
	                //echo "<img data-src="images/kitchen_bath1.jpg"alt="image" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"/>";
                	$data[] = $row[6];
                }
                if($row == '') {
                    $msg = "Product Not Found";
                }
                return $data;
		 	}
		}

		closeConnection();
	}

?>