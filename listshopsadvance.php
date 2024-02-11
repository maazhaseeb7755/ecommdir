<?php
error_reporting(E_ALL);
ob_start();
session_start();
$pt="/home/anchortextseo/public_html";
// $pt="";
?>

<!DOCTYPE html>
<html>
<head>
  <title>List of Online Shops (Advanced Filters) in Pakistan |www.ecommercedirectorypk.com</title>
  <meta charset="utf-8">
   <?php include($pt."/includes/fav.php"); ?>
  <meta name="description" content="">
  <meta name="author" content="VitzWebTech"> 	
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="canonical"  href="listofonlineshops.php"/>
  <?php include($pt."/includes/meta.php"); ?>
  <?php include($pt."/includes/style.php"); ?>
  <script src="libs/jquery.pjax.js"></script>
  <script>
  
  $(function() {
   $(document).pjax('a[data-pjax]')
	
});
  </script>
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

<div><h2 class="alert alert-info" style="width:400px;">Displaying You Results of Online Shops</h2></div>
 <?php
	 
          include($pt."/classes_php/DBSQLi.php");
		 $db =new DBSQLi();
		 $conn=$db->getCon();
		 $st;
		 if(isset($_GET['rstype']) && $_GET['rstype']=="scity"){
		 if(isset($_GET['ocity'])){
		 $st=$_GET['ocity'];
		 $sql ="SELECT * FROM tbl_shop Where operating_city='$st' And approved='yes' Order BY shopname ";
		 //echo "rscity=".$_GET['scity'];
		 //echo "<br/>st= $st<br/>";
		 //echo $sql;
		 
		 }
		 }else if(isset($_GET['rstype']) && $_GET['rstype']=="cattype"){
		 if(isset($_GET['cat'])){
		 $ot=$_GET['cat'];
		 $sql="SELECT * FROM tbl_shop Where maincat='$ot' And approved='yes'";
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
         //mysqli_close($conn);
		// echo "</br>Trying to close the connection";
		 //$db->close($conn);
      ?>
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

