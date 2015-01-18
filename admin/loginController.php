<?php
    require "../connectionController.php";
    
    function checkLogin() {
        startConnection();

        if( isset($_POST['email']) && isset($_POST['password']) ) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            
            $query = "SELECT USEREMAIL, USERPASSWORD FROM IDSUSER WHERE USEREMAIL= '$email' AND USERPASSWORD= '$password'";
            
            $GLOBALS['authentication'] = oci_parse($GLOBALS['connect'], $query);
            $execute = oci_execute($GLOBALS['authentication']);
            if(!$execute) {
                $msg = "Possible Errror Is On Query!";
            }
            else {
                $row = '';
                while($row = oci_fetch_array($GLOBALS['authentication'])) {
                    $msg =  "Login Successfull!";
                    header("Location: http://localhost/ids/admin/admin_home/index.php?msg=$msg");
                    die();
                }
                if($row == '') {
                    $msg = "UserName Or Password Mismatch!";
                    header("Location: http://localhost/ids/admin/index.php?msg=$msg");
                    die();  
                }
            }
        }
        closeConnection();
    }
    
    checkLogin();
?>