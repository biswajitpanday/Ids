<!DOCTYPE html>
<html lang="en">
    <head>
    	<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    	<script type="text/javascript" src="../js/scripts.js"></script>
    </head>

<body>

	<h1><span class="message"><?php $message = @$_GET['msg']; if($message) echo $message; ?></span></h1>

</body>
</html>
