<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Admin Panel Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="IDS">
        <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
        <!-- CSS -->
        <link rel='stylesheet' href='assets/css/media.css'>
        <link rel='stylesheet' href='assets/css/media_latin.css'>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <script type="text/javascript" src="../js/scripts.js"></script>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="logo span4">
                        <h1><a href="">Interior Design Site<span class="red">.</span></a></h1>
                    </div>
                    <div class="links span8">
                        <a class="home" href="http://localhost/ids" rel="tooltip" data-placement="bottom" data-original-title="Home"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="register-container container">
            <div class="row">
                <div class="iphone span3">
                    <!-- <img src="assets/img/iphone.png" alt=""> -->
                </div>
                <div class="register span6">
                    <form action="http://localhost/ids/admin/loginController.php" method="post">
                        <h2><span class="red"><strong>Admin Login Form</strong></span></h2>
                        <label for="username">
                            <span class="message" style = "color: red;"> 
                                <?php
                                    $message = @$_GET['msg'];
                                    if($message) echo $message;
                                    $message = "";
                                ?> 
                            </span>
                        </label>
                        <label for="email">User Name </label>
                        <input type="text" id="email" name="email" placeholder="Enter Your Email Here">
                        <label for="password">Password </label>
                        <input type="password" id="password" name="password" placeholder="********">
                        <button type="submit">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>
</html>

