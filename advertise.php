<?php
ob_start();
session_start();
$pt="/home/anchortextseo/public_html";
//$pt="";

?>

<!DOCTYPE html>
<html>
<head>
  <title>Advertise at www.ecommercedirectorypk.com</title>
  <meta charset="utf-8">
  <?php include($pt."/includes/fav.php"); ?>
  <meta name="description" content="Find out the different options available for advertising on ecommercedirectorypk.com. We are always looking forward to you for ads. Different options are CPC,CPM etc.....">
  <meta name="author" content="vitzwebtech"> 	
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Advertise, CPC, CPM, Advertising and Marketing solution">
  <?php include($pt."/includes/meta.php"); ?>
  <?php include($pt."/includes/style.php"); ?>
</head>
<body>
<?php include($pt."/includes/ga.php"); ?>
<?php include($pt."/includes/header.php"); ?>

<?php include($pt."/includes/nav.php"); ?>

<div class="container-fluid" style="height:1150px;">
  <ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li class="active">Advertise Info </li>        
  </ol>
<?php include($pt."/includes/ad.php"); ?>
  <h1>Advertise with Us.</h1>
  <ul>
    <li>
      <h4>Advertising is available in two different banners Horizontal and Vertical.  </h4>
    </li>
    <li>All advertising is PrePaid for fist two months. </li>
    <li>Advertisement is available for 1 ,5 ,7 ,14 and 30 days. </li>
    <li>You can aslo custom advertise on List of shops and shop details page. </li>
  </ul>
  <div class="row"><div class="col-sm-9"><div class="panel panel-default"><div class="panel-body"><div class="page-header"><div class="container">
    <table class="table" style="width:350px;">
<thead>
<tr>
<th>Mobile #: <span class="glyphicon glyphicon-phone"></span> </th>
<th>92-03431273848 </th>
</tr>
</thead>
<tbody>
<tr>
<th>City <span class="glyphicon glyphicon-map-marker"></span> </th>
<td>Karachi</td>
</tr>
<tr>
<th>Area <span class="glyphicon glyphicon-map-marker"></span></th>
<td>North Karachi</td>
</tr>
<tr>
<th>Email <span class="glyphicon glyphicon-envelope"></span></th>
<td><a href="mailto:info@ecommercedirectorypk.com">info@ecommercedirectorypk.com</a></td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
</div>
</div>
</div>
</div>
<!-- col-sm-9 -->
</div>

<!--sidebar added-->
<?php 
 include($pt."/classes_php/DBSQLi.php");
 $db =new DBSQLi();
 $conn=$db->getCon();
    //$conn = new mysqli("192.168.0.101", "kazimkh", "khan786", "mysite_db7334");
?>
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

