<?php
ob_start();
session_start();

		unset($_SESSION['admin']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
		session_destroy();
		
?>		
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Log out</title>
</head>

<body>
You have sucessfully log out!
</body>
</html>
