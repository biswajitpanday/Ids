<?php
	/*===== Product Upload Start =====*/
	$productName = $_POST["prName"];
	$productType = $_POST["prType"];
	$productPrice = $_POST["prPrice"];
	$productQuantity = $_POST["prQuantity"];
	$productFeature = $_POST["prFeature"];

	if(isset($_FILES["file"]["type"])){
		$validextensions = array("jpeg", "jpg", "png");
		$temporary = explode(".", $_FILES["file"]["name"]);
		$file_extension = end($temporary);
		if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && ($_FILES["file"]["size"] < 1000000)//Approx. 1000kb files can be uploaded.
			&& in_array($file_extension, $validextensions)) {
			if ($_FILES["file"]["error"] > 0) {
				echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
			}
			else {
				if (file_exists("../../upload/". $productType . "/" . $_FILES["file"]["name"])) {
					//echo $productType . "/" . $_FILES["file"]["name"] . "/" .  " <span id='invalid'><b>already exists.</b></span> ";
					echo " <span id='invalid'><b>Product already exists.</b></span> ";
				}
				else {
					if(!is_dir("../../upload/" . $productType)){
						mkdir("../../upload/" . $productType);
					}
					$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
					$targetPath = "../../upload/" . $productType . "/" .$_FILES['file']['name']; // Target path where file is to be stored
					$move_success = move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file

					if(isset($productName) && isset($productType) && isset($productPrice) && isset($productQuantity) && isset($productFeature) && isset($move_success)) {
						$image_name = substr($targetPath, 13);
						$image_path_with_file_name = "upload/" . $image_name; 

						$prouucts = array($productName, $productType, $productPrice, $productQuantity, $productFeature, $image_path_with_file_name);
						include 'adminController.php';
						saveProducts($prouucts, "productInsert");
						echo "<span id='success'>Product Uploaded Successfully...!!</span><br/>";	
					}
					//echo "<span id='success'>Error...!! Please Try Again Later...!</span><br/>";		
				}
			}
		}
		else {
			echo "<span id='invalid'>***Invalid file Size or Type***<span>";
		}
	}
	/*===== Product Upload End =====*/




?>