<?php
error_reporting(E_ALL);
ob_start();
session_start();
 //$pt="/home/anchortextseo/public_html";
 $pt=$_SERVER['DOCUMENT_ROOT']."/ecomdir2020";
 //$pt=$_SERVER['DOCUMENT_ROOT'];
 //$pt=$pt."/ecomdir2020/";
  include($pt."/classes_php/DBSQLi.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>List of Online Shops in Pakistan |www.ecommercedirectorypk.com</title>
  <meta charset="utf-8">
   <?php include($pt."/includes/fav.php"); ?>
  <meta name="description" content="">
  <meta name="author" content="VitzWebTech"> 	
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include($pt."/includes/meta.php"); ?>
  <?php include($pt."/includes/style.php"); ?>
  <script src="libs/jquery.pjax.js"></script>
  <script>
  
  $(function() {
   $(document).pjax('a[data-pjax]')
	
});

function h(){
var t=document.getElementById("tbl");
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
  <h1>List of Online Shops (Ecommerce Websites) in Karachi,Lahore, Islamabad and Pakistan.</h1>
  <div class="row">
<div class="col-sm-9">
<div class="panel panel-default">
<div class="panel-body">
<div class="page-header">
<div class="container">

<!--<details>
 <summary><h3> > Basic Filters</h3></summary>
<div id="tbl1">
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
  <th><form action="listshopsadvance.php" method="get" name="sort"><div class="form-group">
      <label for="cat">Select Category/Type</label>
<select class="form-control"  name="cat" id="cat">
		
	  <?php
         include($pt."classes_php/DBSQLi.php");
         $db =new DBSQLi();
		 $conn=$db->getCon();
         $sql = 'SELECT DISTINCT(maincat) as cat FROM tbl_shop Where bizcode=3  ORDER BY cat';
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
</details>-->
<?php 
 if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
?>

<div><h2 class="alert alert-info" style="width:400px;">Displaying You Results of Online Shops - <?php echo "Page ".$pageno ; ?></h2></div>
 <?php
	 
         
		 $db =new DBSQLi();
		 $conn=$db->getCon();
		 $st;
		 
		
		
		$no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $total_pages_sql = "SELECT COUNT(*) FROM tbl_shop where bizcode=3";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

 		 
		 //if(isset($_GET['rstype']) && $_GET['rstype']=="shopname"){
		 //if(isset($_GET['stype'])){
		 //$st=$_GET['stype'];
		
		 //if($st=="A-Z"){
		 //$sql = "SELECT * FROM tbl_shop Where approved='yes' Order BY shopname asc";
		 //}else if ($st=="Z-A"){
		 //$sql = "SELECT * FROM tbl_shop Where approved='yes' Order BY shopname desc";
		 //}else{
		 //$sql = "SELECT * FROM tbl_shop Where approved='yes' Order BY shopname";
		  //}
		 //}
		 //}else if(isset($_GET['rstype']) && $_GET['rstype']=="cattype"){
		 //if(isset($_GET['cat'])){
		 //$ot=$_GET['cat'];
		 //$sql="SELECT * FROM tbl_shop Where maincat='$ot' And aprroved='yes'";
		 //}
		 //}else{
		 $sql="Select * from tbl_shop Where approved='yes'  And bizcode=3 Order by shopname LIMIT $offset, $no_of_records_per_page";
		 //}
         $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {?>
  <table class="table table-bordered" style="width:450px;">
<thead>
<tr>
<th>Shop Name </th>
<th bgcolor="#99CC00"><?php	echo "<a href='onlineshopdetails.php?id=".$row['shopid']."' data-pjax='#main'> ".$row['shopname']." </a>"; ?></th>
</tr>
</thead>
<tbody>
<tr>
<th>URL</th>
<td><?php echo $row["url"]; ?> |  <?php	echo "<a href='".$row['url']."' target='_blank'> Visit Now!  </a>"; ?></td>
</tr>

<tr>
<th>Main Category</th>
<td><?php echo $row["maincat"]; ?></td>
</tr>

<tr>
  <th>Business Type </th>
  <td><?php echo $row["biztype"]; ?></td>
</tr>
<tr>
<th>Major Prodcuts</th>
<td><?php echo $row["subcat"]; ?></td>
</tr>
<tr>
<th>Shipping Areas</th>
<td><?php echo $row["shipping_areas"]; ?></td>
</tr>
<tr>
<th>Email</th>
<td><a href="mailto:<?php echo $row["bizemail"]; ?>"><?php echo $row["bizemail"]; ?></a></td>
</tr>
</tbody>
</table>

   <?php
		    
			}
			
         } else {
            echo "<h3 class='alert alert-info'>0 results found!</h3>";
         }
		?>
		    <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
		<?php
         //mysqli_close($conn);
		// echo "</br>Trying to close the connection";
		 //$db->close($conn);
      ?>
	  
<div id="tbl">

<h2 class="alert alert-info" style="width:400px;">Sort By Name A-Z or Z-A</h2>
<table class="table table-bordered" style="width:450px;">
<thead>
<tr>
<th><h3>Select Option</h3></th>

</thead>
<tbody>
<tr>
<th><form action="listofonlineshops.php" method="get" id="fsort" name="fsort" enctype="multipart/form-data"><div class="form-group">
      <label for="stype">Filter Shops A-Z or Z-A </label>
<select class="form-control"  name="stype" id="stype">
     	<option value="a">A-Z</option>
		<option value="z">Z-A</option>
      </select>
	  <input name="rstype" type="hidden" value="scity">
	  <input name="srt" type="submit" value="SORT" class="btn btn-default">
 

    </div></form></th>
</tr>

<tr>
  <th>&nbsp;</th>
 
</tr>
</tbody>
</table>
</div>	  

<!--tbl div -->
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

