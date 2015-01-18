<?php 
	require "connectionController.php";

	function getProducts($data, $queryName) {
		startConnection();
		$query = "SELECT IMAGEURL FROM IDSPRODUCT WHERE PRODUCTCODE=$data";

		if($queryName == "getProducts") {
			$GLOBALS['authentication'] = oci_parse($GLOBALS['connect'], $query);
		 	$execute = oci_execute($GLOBALS['authentication']);
		 	if(!$execute) {
		 		$msg = "Possible Errror Is On Query!";
		 	}
		 	else {
		 		//Here products Come....
		 		$row = '';
                while($row = oci_fetch_array($GLOBALS['authentication'])) {
                	echo "<span> Row : " . $row[0] . "</span>";
                }
                if($row == '') {
                    $msg = "Product Not Found";
                }
		 	}
		}

		closeConnection();
	}

?>