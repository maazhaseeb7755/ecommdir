<?php 
ob_start();
session_start();

$pt="/home/anchortextseo/public_html";
//$pt=$_SERVER['DOCUMENT_ROOT']."/ecomdir2020/";

//if(!isset($_SESSION['login']) && empty($_SESSION['login'])){
//header("Location:login.php");
//}



?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Online Shop (Biz) |www.ecommercedirectorypk.com</title>
  <meta charset="utf-8">
  <?php include($pt."/includes/fav.php"); ?>
  <meta name="description" content="">
  <meta name="author" content="VitzWebTech"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include($pt."/includes/meta.php"); ?>
  <?php include($pt."/includes/style.php"); ?>
  <script>
  $(function () {
  $("[data-toggle='tooltip']").tooltip();

  
   var maxLength2 = 250;
   $('#subcat').keyup(function() {
    var length2 = $(this).val().length;
    var length2 = maxLength2-length2;
    $('#chars2').text(length2);
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
    <li class="active">Add Biz</li>        
  </ol>
<?php include($pt."/includes/ad.php"); ?>
  <h1>Add Your Online Business </h1>
  <p>For following form of adding online shop (biz) if you do not want to register and wants to ad business directly. <br>
  </p>
  <p><?php 
  if(isset($_GET['msg']) && !empty($_GET['msg'])){
  if($_GET['msg']=="succ"){
  
  ?>
 <h3>Success! You have added your business in the database!. Your business will be listed after it get appropved.</h3>
  <?php
  }else if($_GET['msg']="fail"){
  ?>
 <h3>Failure! You have added Captcha wrong. please enter Captcah again.</h3>
 
  <?Php
  }
  }
  //}else{
  ?> </p>
  <div class="row">
<div class="col-sm-8">
<div class="panel panel-default">
<div class="panel-body">
<div class="page-header">
 <p>
 <?php 
 //$db =new DBSQLi();
	//	 $conn=$db->getCon();
		// $id=$_SESSION['id'];
		 //$sql = "SELECT * FROM tbl_user WHERE sysid=$id";
		   //       $result = mysqli_query($conn, $sql);

        // if (mysqli_num_rows($result) > 0) {
          //  $row = mysqli_fetch_assoc($result); 
 ?>
	<form id="business" method="post" name="business" action="kdsfj84u58ofw4.php" >
    <div class="form-group">
      <label for="uname"><h4> Your Name:</h4></label>&nbsp;&nbsp;&nbsp;&nbsp;
      <input class="form-control" type="text"  maxlength="25"   id="uname"  name="uname" value="" placeholder="Adeel">
    </div>
	<div class="form-group">
	<label for="uemail"><h4>Email:</h4></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 <input class="form-control"  type="email"  id="uemail"  name="uemail" value="" placeholder="Enter Email"required> 
	</div>                             
    
	 <div class="form-group">
      <label for="bname"><h4>Business Name: </h4></label>&nbsp;
      <input type="text"  class="form-control"  id="bname"  name="bname" value="" placeholder="Enter Biz Name" required>
    </div>
	
	<div class="form-group">
	<label for="address"><h4>Website Address:</h4></label>
      <input type="url"  class="form-control" id="address"  name="address" value="" placeholder="Enter Url" required> 
    </div>
	  
	 <div class="form-group">
      <label for="maincat">Main Category/Type<br>
      (Online Order Traking an Delievery of):</label>
         <select class="form-control"  name="maincat" id="maincat" required>
        <?php include($pt."/includes/selectshop.php"); ?>
      </select>
 
    </div>
	 <div class="form-group">
      <label for="subcat">Major Products :</label>
      <textarea name="subcat" rows="3" maxlength="200"class="form-control" id="subcat" placeholder="Enter Major Prodcuts"></textarea>
	 <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top"  -
title="Examples are PC/Laptop ,LCD/LED TV,T-Shirts,Paints etc.
   ">Example For Major Products</button>  <span id="chars2">200</span>  </div>
		<div class="form-group">
  <label for="ocity"><h4>Operatng City : </h4>    <select class="form-control"  name="city" id="city">
  	<option value="Karachi">Karachi</option>
    <option value="Lahore">Lahore</option>
    <option value="Islamabaad">Islamabaad</option>
    <option value="Faislabaad">Faislabaad</option>
	<option value="Rawalpindi">Rawalpindi</option>
	<option value="Multan">Multan</option>
	<option value="Sialkot">Sialkot</option>
	<option value="Hyderabaad">Hyderabaad</option>
	<option value="Sukkar">Sukkar</option>
	<option value="Peshawar">Peshawar</option>
  </select></label>
		</div>
   
   <div class="form-group">
  <label for="shoptype"><h4>Online Business Type : </h4></label>
<select  class="form-control"id="shoptype" name="shoptype" required>
<option value="0">Select Option</option>
<option value="Ecommerce Website">Ecommerce Website</option>
<option value="EBusiness Website">EBusiness Website</option>
</select>
    </div>
	<div class="form-group">
	<label for="cpt"><h4>Enter Captcha:</h4><?php 
	 include($pt."/classes_php/Random.class.php");	
      $actc=new Random();
      $actcode=$actc->getCaptcha();
	  $_SESSION['cpt']=$actcode;  
	 ?><div id="captcha" style="background-color:#00FFFF; display:block; height:40px; width:100px; padding:7px 7px 7px 7px; cursor:none; font-size:16px;"><?php echo $actcode; ?> </div></label>
      <input type="text"  class="form-control" id="cpt"  name="cpt" value="" placeholder="Enter Capctha" required> 
    </div>
	
    
   <input name="do" type="hidden" id="do" value="addbiz">
    <button type="submit" id="regsiter" class="btn btn-primary">Add Business</button>
  </form>
  <?php //}else{
  //echo "<h2 class=''>You need to have Account and logged in to add biz.</h2>";
  //}?>
	</p>
	<?php //}?>
	</div>
</div>
</div>
</div>

<!--sidebar added-->

 <!--<div class="col-sm-3">
            <div class="sidebar pull-right">
                <div class="well">
                   What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                <!--/.well 
            </div>
            <!--/sidebar-nav-fixed 
    </div>-->
</div>
</div>
<!--<nav class="navbar navbar-default navbar-fixed-bottom">-->
<?php //include("/includes/footer.php"); ?>


</body>
</html>

