<?php
ob_start();
session_start();
//$pt="/home/anchortextseo/public_html";
//$pt="";
$pt=$_SERVER['DOCUMENT_ROOT']."/ecomdir2020";
 
 
?>

<!DOCTYPE html>
<html>
<head>
  <title>Congratulations! | www.ecommercedirectorypk.com</title>
  <meta charset="utf-8">
  <?php include($pt."/includes/fav.php"); ?>
  <meta name="description" content="Successfull you are successfully regoistered with www.ecommercedriectorypk.com ">
  <meta name="author" content="VitzWebtech"> 	
  <meta name="keywords" content="Successfull, Congegulations,">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include($pt."/includes/meta.php"); ?>
  <?php include($pt."/includes/style.php"); ?>
  
</head>
<body style="height:2500px;">
<?php include($pt."/includes/ga.php"); ?>
<?php include($pt."/includes/header.php"); ?>

<?php include($pt."/includes/nav.php"); ?>

<div class="container-fluid"  style="height:auto;">
  <ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li class="active">Contact Us</li>        
  </ol>
<?php include($pt."/includes/ad.php"); ?>
  <div id="msg">
 
  </div>
  <div class="row">
<div class="col-sm-9">
  
  <div id="ct" style="border:#000000 solid 1px; padding:5px 5px 5px 5px;">
  <h1>Successfull!</h1>
  <h3 style='color:#00CC00;'>Congratulations you have been registered Succesfully! at Ecommercediectorypk.com</h3>
  <p>Notice: Goto <a href="login.php">Login</a> page for adding your business! </p>
  <span style="visibility:hidden; padding:10px 10px 10px 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
</div>
</div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>v
<p>&nbsp;</p>
<!--sidebar added-->
<?php 
//include($pt."/classes_php/DBSQLi.php");
 //$db =new DBSQLi();
 //$conn=$db->getCon();
    //$conn = new mysqli("192.168.0.101", "kazimkh", "khan786", "mysite_db7334");
?>
 <!--<div class="col-sm-3">
            <div class="sidebar pull-right">
                <div class="well">
                   <?php //include($pt."/includes/sidebar.php"); ?>
		      </div>
                <!--/.well -->
           <!-- </div>--->
            <!--/sidebar-nav-fixed 
    </div>
</div>-->
<!--<nav class="navbar navbar-default navbar-fixed-bottom">-->
<?php include($pt."/includes/footer.php"); ?>

</div>
</body>
</html>

