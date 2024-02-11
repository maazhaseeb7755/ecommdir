<?php
ob_start();
session_start();
$pt="/home/anchortextseo/public_html";
if(!isset($_SESSION['login']) && empty($_SESSION['login'])){
header("Location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel! | www.ecommercedirectorypk.com</title>
  <meta charset="utf-8">
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
    <li class="active">Admin Panel</li>        
  </ol>
<?php include($pt."/includes/ad.php"); ?>
  <h1>Admin Panel.</h1>
  <p>&nbsp;</p>
  <h4>
  <?php 
  echo "Welcome ".$_SESSION['name']." !";
  ?>
  </h4>
  <div class="row">
<div class="col-sm-9">
<div class="panel panel-default">
<div class="panel-body">
<div class="page-header">
<div class="container">
  <table class="table" style="width:350px;">
<thead>
<tr>
<th>1: </th>
<th><a href="myaccount.php?action=view"><span class="glyphicon glyphicon-pushpin"></span>&nbsp; My Account </a></th>
</tr>
</thead>
<tbody>
<tr>
<th>2:</th>
<td><a href="cpass.php"><span class="glyphicon glyphicon-lock"></span>&nbsp; Change Password</a></td>
</tr>
<tr>
<th>3:</th>
<td>Change Email </td>
</tr>
<tr>
<th>4:</th>
<td><a href="add_biz.php"><span class="	glyphicon glyphicon-plus"></span>&nbsp; Add Online Business</a></td>
</tr>
<tr>
  <th>5:</th>
  <td><a href="edit_biz.php">&nbsp; Edit Online Business</a></td>
</tr>
<tr>
  <th>6:</th>
  <td> <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Log Out</a></td>
</tr>
</tbody>
</table>
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

