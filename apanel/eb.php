<?php 

         ob_start();
		 session_start();
		 
		 if(!isset($_SESSION['admin']) && empty($_SESSION['admin'])){
         header("Location:index.php");
         }
		 
//$pt="/home/anchortextseo/public_html";
//$pt="";
include("/home/anchortextseo/public_html/classes_php/DBSQLi.php");
  $id=$_SESSION['id'];
  if(isset($_POST['do'])&& !empty($_POST['do'])){
  $sid=$_POST['sid'];
  $db =new DBSQLi();
  $conn=$db->getCon();
  $sn=trim($_POST['sname']);
  $sn=html_entity_decode($sn, ENT_COMPAT, 'UTF-8');		
  $ad=trim($_POST['address']);
  $ad=html_entity_decode($ad, ENT_COMPAT, 'UTF-8');		
  $mnc=trim($_POST['maincat']);
  $mnc=html_entity_decode($mnc, ENT_COMPAT, 'UTF-8');		
  $sc=trim($_POST['subcat']);
  $sc=html_entity_decode($sc, ENT_COMPAT, 'UTF-8');		
  $oc=trim($_POST['ocity']);
  $oc=html_entity_decode($oc, ENT_COMPAT, 'UTF-8');
  $ship=trim($_POST['shipping']);
  $ship=html_entity_decode($ship, ENT_COMPAT, 'UTF-8');		
  $resl=trim($_POST['responsive']);
  $resl=html_entity_decode($resl, ENT_COMPAT, 'UTF-8');		
  $payop=trim($_POST['payment']);
  $payop=html_entity_decode($payop, ENT_COMPAT, 'UTF-8');		
  $od=trim($_POST['orderd']);
  $od=html_entity_decode($od, ENT_COMPAT, 'UTF-8');		
  
   if (isset($_POST['gl']) && ($_POST['gl'] == "yes")) {
  $gapp="yes";
  }else{
  $gapp="no";
  }		
  //$iosapp=trim($_POST['ios']);
  //$iosapp=html_entity_decode($iosapp, ENT_COMPAT, 'UTF-8');		
 
  if (isset($_POST['ios']) && ($_POST['ios'] == "yes")) {
  $iosapp="yes";
  }else{
  $iosapp="no";
  }
  
  $d=date("Y-m-d h:i:s");
  //$lastlogin=$d;
  $bemail=trim($_POST['email55']);
  $bemail=html_entity_decode($bemail, ENT_COMPAT, 'UTF-8');		
  
  $badd=trim($_POST['addbiz']);
  $badd=html_entity_decode($badd, ENT_COMPAT, 'UTF-8');		
  
  $btel=trim($_POST['tel']);
  $btel=html_entity_decode($btel, ENT_COMPAT, 'UTF-8');		
  $biztype=trim($_POST['biztype']);
  $bizype=html_entity_decode($biztype, ENT_COMPAT, 'UTF-8');		
  $bizcode=3
  if($biztype=="Ecommerce Website"){
  $bizcode=3;
  } else if($biztype=="Ebusiness"){
  $bizcode=5;
  } else if ($biztype=="Online Brand"){
  $biztype=7;
  else{
  $bizcode=9;
  }
  }
  $sql="UPDATE tbl_shop set shopname='$sn',url='$ad',maincat='$mnc', Subcat='$sc',payment_options='$payop',
  order_time='$od',operating_city='$oc',Shipping_areas='$ship',responsive_layout='$resl',google_app='$gapp',ios_app='$iosapp', bizemail='$bemail',bizaddress='$badd', bizcode=$bizcode,biztype=$biztype,tel='$btel',last_updated='$d',shop_image='' where shopid=$sid";
   mysqli_query($conn, $sql);
   $db->close($conn);
  // echo "<h3>You have added your business sucessfully!</h3>";
  unset($_POST['do']);
  header("Location:listshops.php?id=$sid");
}

?>


<html>
<head>
  <title>Edit Biz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script>
  $(function () {
  $("[data-toggle='tooltip']").tooltip();

  var maxLength = 100;
   $('#payment').keyup(function() {
    var length = $(this).val().length;
    var length = maxLength-length;
    $('#chars1').text(length);
   });
   var maxLength2 = 250;
   $('#subcat').keyup(function() {
    var length2 = $(this).val().length;
    var length2 = maxLength2-length2;
    $('#chars2').text(length2);
   });
   
   var maxLength3 = 150;
   $('#shipping').keyup(function() {
    var length3 = $(this).val().length;
    var length3 = maxLength3-length3;
    $('#chars3').text(length3);
   });
   
   var max4 = 150;
   $('#addbiz').keyup(function() {
    var lt4 = $(this).val().length;
    var lt4 = max4-lt4;
    $('#chars4').text(lt4);
   });
   
   });     
  </script>
</head>
   <body>
   <div class="container">
 <h2>Edit biz</h2>
<p>
 <?php 
 $db =new DBSQLi();
		 $conn=$db->getCon();
		 $id=$_GET['shopid'];
		 $sql = "SELECT * FROM tbl_shop WHERE shopid=$id";
		          $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); 
 ?>
	<form id="editbiz" method="post" name="editbiz" action="<?php echo $_SERVER['PHP_SELF'];?>" >
    <div class="form-group">
      <label for="sname">Shop Name:</label>
      <input type="text"  class="form-control" maxlength="30" id="sname"  name="sname" value="<?php echo $row['shopname']; ?>">
    </div>
	<label for="address">Website Address of Company:</label>
      <input type="url" class="form-control" id="address"   maxlength="40" name="address" value="<?php echo $row['url']; ?>"> 
    <div class="form-group">
      
	 <div class="form-group">
      <label for="maincat">Main Category<br>
      (Online Order Traking an Delievery of):</label>
<select class="form-control"  name="maincat" id="maincat" required>
        <option value="<?php echo $row['maincat']; ?>"><?php echo $row['maincat']; ?></option>
		        <?php include("/home/anchortextseo/public_html/includes/selectshop.php"); ?>
      </select>
 
    </div>
	 <div class="form-group">
      <label for="subcat">Major Products :</label>
      <textarea name="subcat" rows="3" maxlength="200" class="form-control" id="subcat"  required><?php echo $row['subcat']; ?></textarea><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top"  
title="Examples are PC/Laptop ,LCD/LED TV,T-Shirts,Paints etc.">Example For Major Products</button>
  <span id="chars2">200</span>
    </div>
		<div class="form-group">
  <label for="city">Select Operating City:</label>
  <select class="form-control"  name="ocity" id="ocity">
    <option value="<?php echo $row['operating_city']; ?>"><?php echo $row['operating_city']; ?></option>
  	<option value="Karachi">Karachi</option>
    <option value="Lahore">Lahore</option>
    <option value="Islamabaad">Islamabaad</option>
    <option value="Faislabaad">Faislabaad</option>
	<option value="Rwawlpindi">Rawalpindi</option>
	<option value="Multan">Multan</option>
	<option value="Sialkot">Sialkot</option>
	<option value="Hyderabaad">Hyderabaad</option>
	<option value="Sukkar">Sukkar</option>
	<option value="Peshawar">Peshawar</option>
  </select>
</div>
  
   <div class="form-group">
      <label for="payment">Payment Options:</label>
      <textarea name="payment" rows="3" maxlength="100" class="form-control" id="payment"><?php echo $row['payment_options']; ?></textarea><button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top"  -
title="Cash on delivery, 1 Link, Easypaisa, Credit/Debit Card.">Example For Payment</button>    <span id="chars1">100</span> characters remaining
    </div>
	<div class="form-group">
      <label for="shipping">Shipping Areas:</label>
      <textarea name="shipping" rows="3" maxlength="150" class="form-control" id="shipping" required><?php echo $row['shipping_areas']; ?></textarea> <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top"  -
title="Examples are Karachi, Lahore , All over Pakistan.
  ">Example For Shipping</button>  <span id="chars3">150</span> characters remaining 
    </div>
   
   <div class="form-group">
      <label for="orderd">Order Delivery Time</label>
      <select class="form-control"  name="orderd" id="orderd" required>
        <option value="<?php echo $row['order_time']; ?>"><?php echo $row['order_time']; ?></option>
		<option value="1 Day">1 Day</option>
		<option value="2 Days">2 Days</option>
		<option value="3 Days">3 Days</option>
		<option value="4 Days">4 Days</option>
		<option value="5 Days">5 Days</option>
		<option value="6 Days">6 Days</option>
		<option value="Varies on Type of Product">Varies on Type of Product</option>
		</select>
   </div>

   
   <div class="form-group">
      <label for="responsive">Has Responsive Layout </label>
      <select class="form-control"  name="responsive" id="responsive" required>
        <option value="<?php echo $row['resposive_layout']; ?>"><?php echo $row['responsive_layout']; ?></option>
		<option value="No">No</option>
		<option value="Yes">Yes</option>
      </select>
	  <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top"  
title="Website can be adjusted to computer and mobile screen">Info</button>  
   </div>

	<div class="form-group">
<label for="has_google">


<input   id="gl" name="gl" type="checkbox" value="yes" <?php if ($row['google_app']=="yes"){echo "checked='checked'"; } ?>>

Has Goolge(Android) App
</label>
</div>
<div class="form-group">
<label for="has_ios">
<input id="ios" name="ios" type="checkbox" value="yes" <?php if ($row['ios_app']=="yes"){echo "checked='checked'"; } ?>>
Has Apple(iOS) App
</label>
</div>
<div class="form-group">
<div class="form-group">
      <label for="orderd">Type of Business</label>
      <select class="form-control"  name="biztype" id="biztype" required>
        <option value="Ecommerce Website">Ecommerce Website</option>
		<option value="Ebusiness">Ebusiness (Manufacturer)</option>
		<option value="Online Brand">Online Brand </option>
		<option value="Other">Other</option>
		
      </select>
   </div>
      <label for="email55" class="control-label">Official Email:</label>
      <input type="email" class="form-control" maxlength="35" id="email55" value="<?php echo $row['bizemail']; ?>" name="email55">  <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top"  -
title="info@daraz.pk">Example for Email</button>  
  </div>
   <div class="form-group">
      <label for="addbiz">Address of the Business:</label>
      <textarea name="addbiz" rows="3" maxlength="150" class="form-control" id="addbiz"><?php echo $row['bizaddress']; ?>
	  </textarea>  <span id="chars4">150</span> characters remaining 
    </div>
	<div class="form-group">
      <label for="tel">Telephone amnd Mobile number:</label>
      <textarea name="tel" rows="3" class="form-control" id="tel"><?php echo $row['tel']; ?>
	  </textarea> <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top"  -
title="Seperate numbers by commas.">Note</button>
    </div>
   <input name="do" type="hidden" id="act" value="addbiz">
    <input name="sid" type="hidden" id="sid" value="<?php echo $row['shopid']; ?>">
	<button type="submit" id="regsiter" class="btn btn-default">Update Biz</button>
  </form>
  <?php }else{
  echo "<h2>You need to have Account and logged in to edit biz.</h2>";
  }?>
	</p>   </div>
   </body>
</html>
