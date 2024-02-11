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
  <title>Search Results of Online Shops in Pakistan | www.ecommercedirectorypk.com</title>
  <meta charset="utf-8">
  <?php include($pt."/includes/fav.php"); ?>
  <meta name="description" content="">
  <meta name="author" content="VitzWebTech"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include($pt."/includes/meta.php"); ?>
  <?php include($pt."/includes/style.php"); ?>
</head>
<body>
<?php include($pt."/includes/ga.php"); ?>
<?php include($pt."/includes/header.php"); ?>

<?php include($pt."/includes/nav.php"); ?>

<div class="container-fluid" style="height:auto;">
<ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li class="active">Advance Search Results </li>        
  </ol>
<?php include($pt."/includes/ad.php"); ?>
  <h1>Advance Search Results for Online Shops <?php echo $_POST['keyword'];?> at Ecommercerdirectorypk.com</h1>
  <div class="row">
<div class="col-sm-9">
<div class="panel panel-default">
<div class="panel-body">
<div class="page-header">
<!--<div class="container">-->
 <?php
	     
		 if (isset($_POST['cat'])){
		 $s=trim($_POST['cat']);
		 $s=html_entity_decode($s, ENT_COMPAT, 'UTF-8');
		 //echo "s=$s";
		 include($pt."/classes_php/DBSQLi.php");
         $started = microtime(true);
		 $db =new DBSQLi();
		 $conn=$db->getCon();
		 $kw=trim($_POST['keyword']);
		 $kw=html_entity_decode($kw, ENT_COMPAT, 'UTF-8');
	      //echo "kw=$kw";	 
		 if($s==1){
		 $sql = "SELECT * FROM tbl_shop Where subcat like '%$kw%' Order BY shopname";
         }else if($s==2){
		 $sql = "SELECT * FROM tbl_shop Where shipping_areas like '%$kw%' Order BY shopname";
		 }else if($s==3){
 		 $sql = "SELECT * FROM tbl_shop Where payment_options like '%$kw%' Order BY shopname";
		 }else{
		  $sql = "SELECT * FROM tbl_shop Where subcat like '%$kw%' Order BY shopname";
		 }
		 //echo "sql=$sql";
		 $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {?>
  <table class="table table-bordered" style="width:450px;">
<thead>
<tr>
<th>Shop Name </th>
<th><?php echo $row["shopname"]; ?> &nbsp;&nbsp;  <?php	echo "<a href='".$row['url']."' target='_blank'> Visit Now!  </a>"; ?></th>
</tr>
</thead>
<tbody>
<tr>
<th>URL</th>
<td><?php echo $row["url"]; ?></td>
</tr>

<tr>
<th>Category/Type</th>
<td><?php echo $row["maincat"]; ?></td>
</tr>

<tr>
<th>Major Products</th>
<td><?php echo $row["subcat"]; ?></td>
</tr>
<tr>
<th>Shipping Areas</th>
<td><?php echo $row["shipping_areas"]; ?></td>
</tr>
<tr>
<th>Payment Options</th>
<td><?php echo $row["payment_options"]; ?></td>
</tr>
<tr>
<th>Email</th>
<td><a href="mailto:<?php echo $row["bizemail"]; ?>"><?php echo $row["bizemail"]; ?></a></td>
</tr>
<tr>
  <th>&nbsp;</th>
  <td></td>
</tr>
</tbody>
</table>
 <p>  
 <?php
		    
			}
		 $end = microtime(true);
		 $difference = $end - $started;
		 $queryTime = number_format($difference, 5);
		 echo "</br> <strong>Query took $queryTime seconds.</strong>";	
         } else {
            echo "<h3>No results Found for $kw</h3>";
        include($pt."/classes_php/Search.class.php"); 
		$srch= new Search();
		$srch->notfound($s);
		 }
        
		 $db->close($conn);
		 }else{
		 ?>
		 <h2>This page requires Query String to display Records.</h2>
		 <?php
		 }
      ?>
</p>
<!--</div>-->

</div>
</div>
<!-- col-sm-9 -->
</div>
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

