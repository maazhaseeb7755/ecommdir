<?php
ob_start();
session_start();
$pt="/home/anchortextseo/public_html";
		unset($_SESSION['id']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        unset($_SESSION['city']);
		unset($_SESSION['company']);
		unset($_SESSION['url']);
		unset($_SESSION['city']);
        unset($_SESSION['login']);
		setcookie("em", "", time()-1, "/","localhost");
        setcookie("pd", "", time()-1, "/","localhost");
		session_destroy(); 
			?>

<!DOCTYPE html>
<html>
<head>
  <title>Log Out! | www.ecommercedirectorypk.com</title>
  <meta charset="utf-8">
   <meta name="description" content="Log out from EcommerceDirectorypk.com. You can log in again any time. ">
  <meta name="author" content="VitzWebTech"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include($pt."/includes/meta.php"); ?>
  <?php include($pt."/includes/style.php"); ?>
</head>
<body>

<?php include($pt."/includes/header.php"); ?>

<?php include($pt."/includes/nav.php"); ?>

<div class="container-fluid" style="height:850px;">
<ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li class="active">Log Out</li>        
  </ol>
<?php include($pt."/includes/ad.php"); ?>
  <h1 class="alert alert-success">You have successfully log out!</h1>
  <div class="row">
<div class="col-sm-9">
<div class="panel panel-default">
<div class="panel-body">
<div class="page-header">
<div class="container">
  <p><h4>You can log in again anytime you want!</h4></p>
</div>
</div>
</div>
</div>
<!-- col-sm-9 -->
</div>

<!--sidebar added-->

 <div class="col-sm-3">
            <div class="sidebar pull-right">
                <div class="well">
                   <?php include($pt."/includes/sidebar.php"); ?>
		      </div>
                <!--/.well -->
            </div>
            <!--/sidebar-nav-fixed -->
    </div>
</div>
</div>
<!--<nav class="navbar navbar-default navbar-fixed-bottom">-->
<?php include($pt."/includes/footer.php"); ?>


</body>
</html>

