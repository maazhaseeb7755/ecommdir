<?php
ob_start();
session_start();
 // $pt="/home/anchortextseo/public_html";
  //$pt=$_SERVER['DOCUMENT_ROOT']."/ecomdir2020/";
 //$pt="";
 $pt=$_SERVER['DOCUMENT_ROOT'];
  $pt=$pt."/ecomdir2020/";
  include($pt."classes_php/DBSQLi.php");
 
		
  
  if(isset($_SESSION['cToken']) && !empty($_SESSION['cToken'])){
  $s=$_SESSION['cToken'];
  if(isset($_POST['cmntToken'])){
  $cid=$_POST['cmntToken'];
  }
  if(!empty($cid) && $cid==$s){
  $cn=trim($_POST['cname']);
  $cn=html_entity_decode($cn, ENT_COMPAT, 'UTF-8');
  $ce= trim($_POST['cemail']);
  $ce=html_entity_decode($ce, ENT_COMPAT, 'UTF-8');
  $c=trim($_POST['comment']);
  $c=html_entity_decode($c, ENT_COMPAT, 'UTF-8');
  $w=trim($_POST['caddress']);
  $w=html_entity_decode($w, ENT_COMPAT, 'UTF-8');
  $sid=trim($_POST['shopid']);
  $sid=html_entity_decode($sid, ENT_COMPAT, 'UTF-8');
    $ip=$_SERVER['REMOTE_ADDR'];
	include($pt."/classes_php/BrowserDetect.php");
         $bd =new BrowserDetect();
         $ua = $bd->getBrowser();
         $ubrowser = "User browser: " . $ua['name'] . " " . $ua['version'] .
            " on " .$ua['platform'] . " reports: <br >" . $ua['userAgent'];
  $d=date("Y-m-d h:i:s");
   $db =new DBSQLi();
  $conn=$db->getCon();
   $sql = "INSERT INTO  tbl_comments_5334 SET cname='$cn',cemail='$ce',content_type='shop',contentid=$sid,comments='$c',website='$w',date_posted='$d',ip_reg='$ip',browser='$ubrowser',approved='no'";
   //echo $sql;
   $result = mysqli_query($conn, $sql);
   $db->close($conn);
  unset($_POST['dotask']);
  header("Location:onlineshopdetails.php?id=$sid");
      unset($_SESSION['cToken']);
	  }//else{
	  //echo "<br/><h3>An Error has Occured!</h3>";
	  //}
	  //cid
	 }//else{//session
	//echo "<br/><h3>Unable to post comment</h3>";
	
    //main
  
  ?>
<?php 
  if (isset($_GET['id'])){
		 $id=trim($_GET['id']);
 		 $id=html_entity_decode($id, ENT_COMPAT, 'UTF-8');
         global $rid;
		 global $name; 
         
		 $db =new DBSQLi();
		 $conn=$db->getCon();
		
		 $sql = "SELECT * FROM tbl_shop WHERE shopid=$id";
		          $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Find info about  <?php echo $row['shopname'];?> Online Shop Details | www.ecommercedirectorypk.com</title>
  <meta charset="utf-8">
  <?php include($pt."/includes/fav.php"); ?>
  <meta name="description" content="Find information about Operating location, Shipping, Payment and delivery  options of Online Shop <?php echo $row['shopname'];?> at www.ecommercedirectorypk.com">
  <meta name="author" content="VitzWebTech"> 
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include($pt."/includes/meta.php"); ?>
  <script>
  $(function () {
  
  
  
  
  var maxLength = 350;
   $('#comment').keyup(function() {
    var length = $(this).val().length;
    var length = maxLength-length;
    $('#chars1').text(length);
   });
   });
   
    </script> 
           
      
      
       
   
   
  <?php include($pt."/includes/style.php"); ?>
  
   
</head>
<body>
<?php include($pt."/includes/ga.php"); ?>
<?php include($pt."/includes/header.php"); ?>

<?php include($pt."/includes/nav.php"); ?>

<div class="container-fluid" style="height:auto;>
<ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
	 <li><a href="listofonlineshops.php">List of Online Shops</a></li>
    <li class="active">Online Shop Details</li>        
  </ol>
<?php include($pt."/includes/ad.php"); ?>
  <h1><?php echo $row['shopname']; ?> | Online Shop at EcommerceDirectorypk.com</h1>
  <div class="row">
<div class="col-sm-9">
<div class="panel panel-default">
<div class="panel-body">
<div class="page-header">
<div class="container">
 <h3>Shop Details</h3>
  <table class="table table-bordered" style="width:600px;">
  <?php
	   
	?>
<thead>
<tr>
<th>Shop Name </th>
<th><?php echo $row['shopname']; 
$rid=$row['shopid'];
$name=$row['shopname'];
?></th>
</tr>
</thead>
<tbody>
<tr>
<th>URL</th>
<td><?php echo $row['url']; ?> | <?php	echo "<a href='".$row['url']."' target='_blank'> Visit Now!  </a>"; ?></td>
</tr>
<tr>
  <th colspan="2"><div class="container">
  <h2>Image of the Shop</h2>
  <img class="img-responsive" src="ecomimg/daraz.jpg" alt="Daraz.pk" width="460" height="345"> 
</div>
</th>
  </tr>
<tr>
<th>Main Category</th>
<td><?php echo $row['maincat']; ?></td>
</tr>
<tr>
<th>Major Products </th>
<td><?php echo $row['subcat']; ?></td>
</tr>
<tr>
  <th>Operating City</th>
  <td><?php echo $row['operating_city']; ?></td>
</tr>
<tr>
  <th>Shipping Areas</th>
  <td><?php echo $row['shipping_areas']; ?></td>
</tr>
<tr>
  <th>Payment Options</th>
  <td><?php echo $row['payment_options']; ?></td>
</tr>
<tr>
  <th>Order Delivery Time</th>
  <td><?php echo $row['order_time']; ?></td>
</tr>

<tr>

  <th>Responsive Layout</th>
  <td><?php echo $row['responsive_layout']; ?></td>
</tr>
<tr>
  <th>If Has Google APP</th>
  <td><?php echo $row['google_app']; ?></td>
</tr>
<tr>
  <th>If Has IOS APP</th>
  <td><?php echo $row['ios_app']; ?></td>
</tr>
<tr>
  <th>Email</th>
  <td><?php echo $row['bizemail']; ?></td>
</tr>
<tr>
  <th>Address</th>
  <td><?php echo $row['bizaddress']; ?></td>
</tr>
<tr>
  <th>Telephone and Mobile# </th>
  <td><?php echo $row['tel']; ?></td>
</tr>
<!--<tr>  <th>Added BY</th>  <td><?php echo $row['addedby']; ?></td></tr>-->
<tr>
  <th>Date Added</th>
  <td><?php	echo $row['date_added']; ?></td>
</tr>
<tr>
  <th>Last Updated</th>
  <td><?php	echo $row['last_updated']; ?></td>
</tr>
<tr>
  <th>Total Page Views</th>
  <td><?php	echo $row['page_views']; 
 include($pt."/classes_php/PageViews.class.php");
 $p = new PageViews();
 $p->increment($id);
  ?></td>
</tr>
<tr>
  <th colspan="2">  </th>
</tr>
<tr>
<th colspan="2" align="center">
 <table class="table">
 <tr>
<?php include($pt."/classes_php/RecordHelper.class.php");        
 $rs =new RecordHelper();
 $t=$rs->getRows();?> 
<th> <?php if($rid==1){
echo "";
}else{
$k;
$k=$rid-1;
echo "<a href='onlineshopdetails.php?id=".$k."' >Prev.</a>"; 
}?><span class="glyphicon glyphicon-arrow-left"></span> </th>
<th> Current Shop <h4><em> <?php echo $name;?></em></h4> | Total Records:<?php echo $t;?></th>
<th> 
<th> <?php if($rid==$t){
echo "";
}else{
$l;
$l=$rid+1;
echo "<a href='onlineshopdetails.php?id=".$l."' >Next</a>"; 
}?> <span class="glyphicon glyphicon-arrow-right"></span></th>
</tr>
 </table></tr>
</tbody>
</th></table>

	
			

  
<!--commnets end-->

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
  <p>
  <!--commnets strats-->
  <div class="container">
  <div class="col-sm-9">
  <h2 class="alert alert-success">Responses About This Online Shop </h2>
  <hr>
  <?php 
  $cid=$_GET['id'];
   $sql = "SELECT * FROM tbl_comments_5334 WHERE contentid=$id Order by cid desc";
		          $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) {
         while($row = mysqli_fetch_assoc($result)) {
			
  ?>
  <b><?php echo $row['cname']; ?> on</b> <span><?php echo $row['date_posted']; ?></span> Said:
  <p><?php echo $row['comments']; ?></p>
  <hr>
<?php } 
}else{ ?>
<hr>
<h2 class="alert alert-info">There are no Comments on this Online Shop Yet!</h2>
<?php }?>
</div>
  <div class="col-sm-9">
  <h2>Leave Your Comments</h2>
  <div style="visibility:hidden">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;vv&nbsp;&nbsp;&nbsp;vvvv&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;vv&nbsp;&nbsp;&nbsp;vvvv&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;vv&nbsp;&nbsp;&nbsp;vvvv&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;vv&nbsp;&nbsp;&nbsp;vvvv&nbsp;</div>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" id="cform" method="post">
  <table  class="table" style="width:425px;">
<thead>
<tr>
<th valign="top">Name:</th>
<th> 
  <div class="form-group">
     <input type="text"  maxlength="30" class="form-control" id="cname" placeholder="Enter Full Name" name="cname" required>
    </div></th></th>
</tr>
</thead>
<tbody>
<tr>
<th>Email:</th>
<td>
    <div class="form-group">
      
      <input type="email"  maxlength="35" class="form-control" id="cemail" placeholder="Enter email" name="cemail" required>
    </div></td>
</tr>
<tr>
<th>Comment:</th>
<td>	
    <div class="form-group">
     
      <textarea class="form-control" rows="6"   maxlentgh="350" name="comment" id="comment" required></textarea>
    <span id="chars1">350</span> characters remaining
    </div></td>
	</tr>
	<tr>
<th>Website :</th>
<td>
	 <div class="form-group">
      
      <input type="url"  maxlength="35"class="form-control" id="address" placeholder="Enter Company URL" name="caddress">     </div></td>
	</tr>
	<tr>
<th>&nbsp;</th>
<td>
<?php 
include($pt."/classes_php/Random.class.php"); 
$r=new Random();
$t=$r->getToken(); 
?>
	<input name="cmntToken" type="hidden" value="<?php echo $t;?>">
	<?php 
	$_SESSION['cToken']=$t;
	?>
	
	<input name="shopid" type="hidden" value="<?php echo $_GET['id'];?>">
	<input name="dotask" type="hidden" id="dotask" value="comments">
    <button type="submit" id="comments" class="btn btn-default">Submit</button>
	</td>
	</tr>
	</tbody>
	</table>
  </form>
  </div>
  
</p> 
	 
<?php 
//$db->close($conn);

}else{

?>

  <div><h3 class="alert alert-danger">There is no record to show</h3></div>

<?php 
}
}else{
?>
<h3 class="alert alert-info" style="width:385px;">This page requires an id to display information!</h3>
<?php



}?>		
</div>
</div>
<!--<nav class="navbar navbar-default navbar-fixed-bottom">-->
<?php include($pt."/includes/footer.php"); ?>


</body>
</html>

