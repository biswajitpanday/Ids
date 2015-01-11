<?php
	session_start();
	if( isset($_POST['email']) && isset($_POST['password']) ) {
		$email = $_POST['email'];
		$password = md5($_POST['password']);

		$dbUser = "system";
		$dbpass = "Cse440033";
		$db = "localhost:1521/orcl";

		$msg = '';

		//Connect to DB
		//oci_connect(username, password, oracle_sid);
     	$connect = oci_connect($dbUser, $dbpass, $db);

     	if (!$connect) {
        	$msg = "An error has occured connecting to the database" . oci_error();
          	exit;
    	}
    	//echo "SErver Connected...";

    	//$query = "SELECT EMAIL, PASSWORD FROM IDSUSER WHERE USEREMAIL= '$email' AND USERPASSWORD= '$password'";
        $query = "SELECT USEREMAIL, USERPASSWORD FROM IDSUSER WHERE USEREMAIL= '$email' AND USERPASSWORD= '$password'";
    	$authentication = oci_parse($connect, $query);
    	$execute = oci_execute($authentication);
    	if(!$execute) {
    		$msg = "Possible Errror : Check Query!";
    	}
    	
    	$row = '';
    	while($row = oci_fetch_array($authentication)) {
    		$msg =  "Login Successfull!";
    		header("Location: http://localhost/ids/admin/admin_home/index.php?msg=$msg");
    		die();
		}
    	if($row == '') {
    		$msg = "UserName Or Password Mismatch!";
    		header("Location: http://localhost/ids/admin/login.php?msg=$msg");
    		die();	
    	}

    	oci_free_statement($authentication);
		oci_close($connect);

	}
?>

