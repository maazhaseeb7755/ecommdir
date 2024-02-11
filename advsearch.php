<?php
error_reporting(E_ALL);
ob_start();
session_start();
 $pt="/home/anchortextseo/public_html";
// $pt="";
 include($pt."/classes_php/DBSQLi.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Advance Search |www.ecommercedirectorypk.com</title>
  <meta charset="utf-8">
   <?php include($pt."/includes/fav.php"); ?>
  <meta name="description" content="Advanced Search. Use Advance Search form to perform a thorough search at ecommcerdirectorypk.com">
  <meta name="author" content="VitzWebTech"> 	
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Advance Search, Search Online Shpping Websites in Pakistan">
  <?php include($pt."/includes/meta.php"); ?>
  <?php include($pt."/includes/style.php"); ?>
  <script src="libs/jquery.pjax.js"></script>
  <script>
  
  $(function() {
   $(document).pjax('a[data-pjax]')
   $("[data-toggle='tooltip']").tooltip();
    var maxLength = 100;
   $('#keyword').keyup(function() {
    var length = $(this).val().length;
    var length = maxLength-length;
    $('#chars1').text(length);
   });
});
  </script>
</head>
<body>
<?php include($pt."/includes/ga.php"); ?>
<?php include($pt."/includes/header.php"); ?>
<?php include($pt."/includes/nav.php"); ?>

<div class="container-fluid" style="height:850px;">
<ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li class="active">Advance Search </li>        
  </ol>
<?php include($pt."/includes/ad.php"); ?>
  <h1>Advance Search of Online Shops EcommerceDirectorypk.com</h1>
  <div class="row">
<div class="col-sm-9">
<div class="panel panel-default">
<div class="panel-body">
<div class="page-header">
<div class="container">
<h3 class="alert alert-info" style="width:400px;">Basic Filters</h3>
<form id="biz" method="post" name="biz" action="advancesearch_results.php" class="form-inline">
<div class="form-group">
      <label for="cat">Choose Option to  Search</label>
         <select class="form-control"  name="cat" id="cat"> 
        <option value="1">Major Products</option>
		<option value="2">Shipping Areas</option>
		<option value="3">Payment Options</option>
      </select>
 
    </div><br/>
	<div class="form-group">
      <label for="payment">Enter keywords or search terms:</label>
      <textarea name="keyword" rows="3" maxlength="100" class="form-control" id="keyword" placeholder="Enter Keywords or Search Terms"></textarea><br/>
     <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top"  -
title="Enter Product name OR Cash on delivery, City for Shipping  ">Example</button><span id="chars1">100</span> characters remaining
    </div>
	</br>
	<div class="form-group">
    <button type="submit" id="login" class="btn btn-primary">Advance Search</button>
	</div>
</form>

  
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
<?php //include("/includes/footer.php"); ?>


</body>
</html>

