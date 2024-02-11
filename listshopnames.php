<?php
error_reporting(E_ALL);
ob_start();
session_start();
 $pt="/home/anchortextseo/public_html";
 //$pt="";
?>

<!DOCTYPE html>
<html>
<head>
  <title>List of Online Shops in Pakistan |www.ecommercedirectorypk.com</title>
  <meta charset="utf-8">
   <?php include($pt."/includes/fav.php"); ?>
  <meta name="description" content="The list of online shopping websites in Pakistan exclusively Karachi, Lahore and Islamabad. Find your favorite product online for purchasing.">
  <meta name="author" content="VitzWebTech"> 	
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="list,list of online shoppin websites, ecommerce websites, directory, ecommerce directory">
  <link rel="canonical"  href="listofonlineshops.php"/>
  <?php include($pt."/includes/meta.php"); ?>
  <?php include($pt."/includes/style.php"); ?>
  <script src="libs/jquery.pjax.js"></script>
  <script>
  
  $(function() {
   $(document).pjax('a[data-pjax]')
	
});
function h(){
var t=document.getElementById("tbl2");
t.className="hide";
}
function h1(){
var t=document.getElementById("tbl1");
t.className="hide";
}
  </script>
  <style>
  .hide{display:none;
  visibility:hidden;
  }
  </style>
</head>
<body>
<?php include($pt."/includes/ga.php"); ?>
<?php include($pt."/includes/header.php"); ?>
<?php include($pt."/includes/nav.php"); ?>

<div class="container-fluid" style="height:auto;">
<ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li class="active">List of Online Shops (Shopping Websites)</li>        
  </ol>
<?php include($pt."/includes/ad.php"); ?>
  <h1>List of Online Shops in Karachi,Lahore, Islamabad and Pakistan.</h1>
  <div class="row">
<div class="col-sm-9">
<div class="panel panel-default">
<div class="panel-body">
<div class="page-header">
<div class="container">
<div id="tbl1">
<h3><a href="javascript:h1()">Hide Filter</a></h3>
<h3 class="alert alert-info" style="width:400px;">Basic Filters</h3>
<table class="table table-bordered" style="width:450px;">
<thead>
<tr>
<th>Sort Shops A-Z or Z-A </th>

</thead>
<tbody>
<tr>
<th><form action="listofonlineshops.php" method="get" name="sort"><div class="form-group">
      <label for="stype">Select Sort Type</label>
<select class="form-control"  name="stype" id="stype">
		<option value="A-Z"> A-Z</option>
    	<option value="Z-A">Z-A</option>
      </select>
	  <input name="rstype" type="hidden" value="shopname">
 <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-sort"></span>&nbsp;Sort</button>

    </div></form></th>
</tr>
<tr>
  <th>Select Shops By Bussiness Category/Type:  </th>
  
</tr>
<tr>
  <th><form action="listofonlineshops.php" method="get" name="sort"><div class="form-group">
      <label for="cat">Select Category/Type</label>
<select class="form-control"  name="cat" id="cat">
		
	  <?php
         include($pt."/classes_php/DBSQLi.php");
         $db =new DBSQLi();
		 $conn=$db->getCon();
         $sql = 'SELECT DISTINCT(maincat) as cat FROM tbl_shop ORDER BY cat';
		 $result = mysqli_query($conn, $sql);
		  if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {?>
		 ?>
		<option value="<?php echo $row["cat"]; ?>"><?php echo $row["cat"]; ?></option>

		<?php }
		}?>
      </select>
	  	  <input name="rstype" type="hidden" value="cattype">
 <button type="submit" class="btn btn-default">&nbsp;Show</button>

    </div></form></th>
 
</tr>
</tbody>
</table>
</div>
<div><h2 class="alert alert-info" style="width:400px;">Displaying You Results of Online Shops</h2></div>
 <?php
	 
         
		 $db =new DBSQLi();
		 $conn=$db->getCon();
		 $st;
		 if(isset($_GET['rstype']) && $_GET['rstype']=="shopname"){
		 if(isset($_GET['stype'])){
		 $st=$_GET['stype'];
		
		 if($st=="A-Z"){
		 $sql = "SELECT * FROM tbl_shop Where approved='yes' Order BY shopname asc";
		 }else if ($st=="Z-A"){
		 $sql = "SELECT * FROM tbl_shop Where approved='yes' Order BY shopname desc";
		 }else{
		 $sql = "SELECT * FROM tbl_shop Where approved='yes' Order BY shopname";
		  }
		 }
		 }else if(isset($_GET['rstype']) && $_GET['rstype']=="cattype"){
		 if(isset($_GET['cat'])){
		 $ot=$_GET['cat'];
		 $sql="SELECT * FROM tbl_shop Where maincat='$ot' And  approved='yes'";
		 }
		 }else{
		 $sql="Select * from tbl_shop Where approved='yes' Order by shopname";
		 }
         $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {?>
  
   <table class="table table-bordered" style="width:450px;">
<thead>
<tr>
<th>Shop Name </th>
<th>URL</th>
<th>Oper. Ciity</th>
</tr>
</thead>
<tbody>
<tr>
<th  bgcolor="#99CC00"><?php	echo "<a href='onlineshopdetails.php?id=".$row['shopid']."' data-pjax='#main'> ".$row['shopname']." </a>"; ?></th>
<td><?php echo $row["url"]; ?> |  <?php	echo "<a href='".$row['url']."' target='_blank'> Visit Now!  </a>"; ?></td>
<td><?php echo $row["operating_city"]; ?></td>
</tr>
<?php
		    
			}
         } else {
            echo "<h3 class='alert alert-info'>0 results found!</h3>";
         }
         //mysqli_close($conn);
		// echo "</br>Trying to close the connection";
		 $db->close($conn);
      ?>
</tbody>

</table>
<div id="tbl2">
<h3><a href="javascript:h()">Hide Filter</a></h3>
  <h2 class="alert alert-info" style="width:400px;">Advanced Filters</h2>
<table class="table table-bordered" style="width:450px;">
<thead>
<tr>
<th><h3>Select Operating City Shopping Website</h3></th>

</thead>
<tbody>
<tr>
<th><form action="listshopsadvance.php" method="get" name="sort"><div class="form-group">
      <label for="ocity">Select Shops having Operating City</label>
<select class="form-control"  name="ocity" id="ocity">
<?php    $db =new DBSQLi();
		 $conn=$db->getCon();
         $sql = 'SELECT DISTINCT(operating_city) as oc FROM tbl_shop ORDER BY operating_city';
		 $result = mysqli_query($conn, $sql);
		  if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {?>
		 ?>
		<option value="<?php echo $row["oc"]; ?>"><?php echo $row["oc"]; ?></option>

		<?php }
		}?>
      </select>
	  <input name="rstype" type="hidden" value="scity">
 <button type="submit" class="btn btn-default">&nbsp;Show</button>

    </div></form></th>
</tr>
<tr>
  <th>Sort Shops By ShopID: <form action="listofonlineshops.php" method="get" name="sort"><div class="form-group">
      <label for="ordertype">Select Order Type</label>
<select class="form-control"  name="ordertype" id="ordertype">
		<option value="ASC">Ascending </option>
    	<option value="DESC">Descending</option>
      </select>
	  	  <input name="rstype" type="hidden" value="shopid">
 <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-sort-by-order"></span>&nbsp;Sort</button>

    </div></form> </th>
  
</tr>
<tr>
  <th>&nbsp;</th>
 
</tr>
</tbody>
</table>	  
</div>
<!-- div table-->
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
<?php include("/includes/footer.php"); ?>


</body>
</html>

