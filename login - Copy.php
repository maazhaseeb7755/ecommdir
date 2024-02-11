<?php
         error_reporting(E_ALL);
		 ob_start();
		 session_start();
		 $pt="/home/anchortextseo/public_html";
		 //$pt=$_SERVER['DOCUMENT_ROOT']."/ecomdir2020/";
		 
		  
		 if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
         header("Location:admin.php");
         }
		  
	    
		 
		 //session empty 
		 if(isset($_POST['act'])&& !empty($_POST['act'])){
		 //
		include($pt."/classes_php/DBSQLi.php");
		 include($pt."/classes_php/Login.class.php");
		 $db =new DBSQLi();
		 $conn=$db->getCon();
		 
		 
		 $a=$_POST['act'];
	 	 
		 if($a=="login"){
		  if(isset($_SESSION['lToken']) && !empty($_SESSION['lToken'])){ 
         $s=$_SESSION['lToken'];
        if(isset($_POST['lgToken'])){
        $crid=$_POST['lgToken'];
         }
       if(!empty($crid) && $crid==$s){
		  global $lg;
		 global $setup;
		 
		 $n=trim($_POST['pwd']);
		 $n=html_entity_decode($n, ENT_COMPAT, 'UTF-8');		 
		 $e=trim($_POST['email']);
		 $e=html_entity_decode($e, ENT_COMPAT, 'UTF-8');
		 $l=new Login();
		 $l->setEmail($e);
		 $l->setP($n);
		 
		 $lg=$l->checklogin();
		   }
		  }
       	 } else if($a=="register") {
		 //try
		 //if (isset($_POST['submit'])){
		//$fields = array();
		//$values = array();
		//foreach($_POST as $field => $value) {
			//$fields[] = $field;
			//$values[] = $value;

		//}
          // print_r($fields);
           //print_r($values);

		 if(isset($_SESSION['rToken']) && !empty($_SESSION['rToken'])){ 
         $s=$_SESSION['rToken'];
        if(isset($_POST['crToken'])){
        $crid=$_POST['crToken'];
         }
       if(!empty($crid) && $crid==$s){
		
		
		
		 $n=trim($_POST['uname']);
		 $e=trim($_POST['email45']);
		  
		 $p=trim($_POST['pwd']);
		 $cp=trim($_POST['cpwd']);
		 
		 $c=trim($_POST['company']);
         $u=trim($_POST['address']);
         $m=trim($_POST['contact']);
         $city=trim($_POST['city']);
     	 $n=html_entity_decode($n, ENT_COMPAT, 'UTF-8');
	 	 $p=html_entity_decode($p, ENT_COMPAT, 'UTF-8');
		 $cp=html_entity_decode($cp, ENT_COMPAT, 'UTF-8');
		 $e=html_entity_decode($e, ENT_COMPAT, 'UTF-8');
    	 $c=html_entity_decode($c, ENT_COMPAT, 'UTF-8');
	 	 $u=html_entity_decode($u, ENT_COMPAT, 'UTF-8');
	 	 $m=html_entity_decode($m, ENT_COMPAT, 'UTF-8');
	 	 $city=html_entity_decode($city, ENT_COMPAT, 'UTF-8');
		 if($p!=$cp){
		  header("Location:login.php?reg=pwd");
		 } 
		 $ip=$_SERVER['REMOTE_ADDR'];
		 $d=date("Y-m-d h:i:s");
		 $lastlogin=$d;
		 $ustatus="pending";
		 $sid=rand();
		 include($pt."/classes_php/BrowserDetect.php");
         $bd =new BrowserDetect();
         $ua = $bd->getBrowser();
         $ubrowser = "User browser: " . $ua['name'] . " " . $ua['version'] .
            " on " .$ua['platform'] . " reports: <br >" . $ua['userAgent'];
         	   include($pt."/classes_php/Random.class.php");		 
		
	   $actc=new Random();
       $actcode=$actc->random_code(24);
		 		 
 		 $sql = "INSERT INTO tbl_user Set uname='$n',uemail='$e',sysid=$sid,upassword='$cp',company='$c',url='$u',mobile='$m',
		 city='$city',os_detected='$ubrowser',reg_ip='$ip',date_registered='$d',lastlogin='$lastlogin',
		 
		 uemail_approved='yes',uemail_sent='yes',activation_code='$actcode',email_count=1,ustatus='$ustatus'";
         
		 $result=mysqli_query($conn, $sql);
        
	 	   $_SESSION['email']=$e;
		   $_SESSION['pass']=$cp;
     
	   $email=$e;
	   $subject = "Welcome to EcommerceDirectorypk.com";
       $message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>";
$message .= "<html xmlns:v='urn:schemas-microsoft-com:vml'>";
$message .= "<head>";
$message .= "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
$message .= "<meta name='viewport' content='width=600,initial-scale = 2.3,user-scalable=no'>";
$message .= " <!--[if !mso]><!-- -->";
$message .= "<link href='https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700' rel='stylesheet'>";
$message .= "<link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet'>";
$message .="<!-- <![endif]-->";	
$message .= " <title>Welcome to www.commercedirectorypk.com !</title>";
$message .= " <style type='text/css'>";
$message .= "body {width: 100%;background-color: #ffffff;margin: 0;padding: 0;";
$message .= "-webkit-font-smoothing: antialiased;mso-margin-top-alt: 0px";
$message .= "mso-margin-bottom-alt: 0px;mso-padding-alt: 0px 0px 0px 0px;}";
$message .= " p,h1,h2,h3,h4 {margin-top: 0;margin-bottom: 0;padding-top: 0; padding-bottom: 0;}";
$message .= "  span.preheader {display: none;font-size: 1px;}";
$message .= "  html {width: 100%;}";
$message .= "  table {font-size: 14px;border: 0;}";
		

$message .= "@media only screen and (max-width: 640px) { ";
$message .= ".main-header { font-size: 20px !important; } ";
$message .= " .main-section-header {font-size: 28px !important;}";
$message .= "  .show {display: block !important;} ";
$message .= "  .hide {display: none !important; } ";
$message .= "  .align-center {text-align: center !important;} ";
$message .= "  .no-bg { background: none !important;} ";
$message .= "  .main-image img {width: 440px !important;height: auto !important;} ";
$message .= "  .divider img {width: 440px !important;}";
$message .= "   .container590 {width: 400px !important;} ";
$message .= "  .container580 { width: 400px !important; } ";
$message .= " .main-button {width: 220px !important;} ";
$message .= " .section-img img {width: 320px !important;height: auto !important;} ";
$message .= " .team-img img {width: 100% !important;height: auto !important;} ";
$message .= "  }";
$message .= " @media only screen and (max-width: 479px) { ";
$message .= ".main-section-header {font-size: 26px !important; } ";
$message .= "  .divider img {width: 280px !important;} ";
$message .= ".container590 { width: 280px !important; } ";
$message .= " .container590 {width: 280px !important;}";
$message .= "  .container580 {width: 260px !important;}";
$message .= ".section-img img {width: 280px !important;height: auto !important;} ";
$message .= " }</style> ";
$message .= " <!-- [if gte mso 9]>";
$message .= " <style type='text/css'>";
$message .= "body {font-family: arial, sans-serif!important;}  ";   
$message .= "</style>  "; 
$message .= " <![endif]-->  ";
$message .= "</head> ";	
$message .= "</head> ";
$message .= "<body class='respond' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'>
 ";
$message .= " <table style='display:none!important;'> ";
$message .= "<tr> <td> ";
$message .= "<div style='overflow:hidden;display:none;font-size:1px;color:#ffffff;line-height:1px;font-family:Arial;maxheight:0px;max-width:0px;opacity:0;'> ";
$message .= "</div></td></tr></table> ";
$message .= "<table border='0' width='100%' cellpadding='0' cellspacing='0' bgcolor='ffffff'> ";
$message .= "<tr><td align='center'> ";
$message .= "<table border='0' align='center' width='590' cellpadding='0' cellspacing='0' class='container590'> ";
$message .= "<tr><td height='25' style='font-size: 25px; line-height: 25px;'>&nbsp;</td></tr> ";
$message .= "<tr><td align='center'>";
$message .= " <table border='0' align='center' width='590' cellpadding='0' cellspacing='0' class='container590'>";
$message .= "<tr> <td align='center' height='300' style='height:300px;'>";
$message .= "<div style='background-color:#99CC00;color:#fff;'>";
$message .= "<h1>EcommerceDirectorypk.com</h1><h3>Web Driectory of online shopping websites</h3>";
$message .= " <p>Find your favourites products online now!.</p><p>The website is created for everyone.</p>";
$message .= "</div>";
$message .= " <p>&nbsp;</p><h3>Congratulations!</h3><br/><p> You have been Registered Successfully at www.ecommercedirectorypk.com Your account status is pending. </br><h3>Please Activate your account!</h3><p>Please click the link below to activate your account or copy and paste the url in your browser if it is not opening by clicking.<br/><h4><a href='http://www.ecommercedirectorypk.com/activate.php?e=$e&ac=$actcode' target='_blank'>http://www.ecommercedirectorypk.com/activate.php?e=$e&ac=$actcode</a></h4></br></p/></p> ";
$message .= " </td></tr></table></td></tr>";
$message .= "<tr><td height='25' style='font-size: 25px; line-height: 25px;'>&nbsp;</td></tr>";
$message .= "</table></td></tr></table>";
$message .= "<table border='0' width='100%' cellpadding='0' cellspacing='0' bgcolor='ffffff' class='bg_color'>";
$message .= "<tr><td align='center'>&nbsp;</td></tr>";
$message .= "<table border='0' width='100%' cellpadding='0' cellspacing='0' bgcolor='ffffff' class='bg_color' align='center'>";
$message .= "<tr><td align='center'>HOME | Log In or Register | Online Shops | Contact Us </td></tr>";
$message .= "<table border='0' width='100%' cellpadding='0' cellspacing='0' bgcolor='f4f4f4' align='center'>";
$message .= "<tr><td align='center'></td></tr>";
$message .= "<tr><td height='25' style='font-size: 25px; line-height: 25px;'>&nbsp;</td></tr>";
$message .= "</table>";
$message .= "</table>";
$message .= "</table>";
$message .= "</body></html>";
	   
	   $headers  = "MIME-Version: 1.0\r\n";
       $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $headers .= "From: {noreply@ecommercedirectorypk.com}\r\n";
       $headers .= "CC:maaz.haseeb75@gmail.com \r\n";
	  
	  mail($email, $subject, $message, $headers);
	  header("Location:pending.php");
		 	
		//catch(Exception e){
		 
		 //}
		   }
		  }
		 }
		 //$db->close($conn);
		 }
      ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login OR Register at www.ecommercedirectorypk.com</title>
   <?php include($pt."/includes/fav.php"); ?>
  <meta name="description" content="Login or Register to create a New Account at Ecommercedirectorypk.com">
  <meta name="author" content="VitzWebTech"> 	 
  <meta charset="utf-8">
  <meta name="keywords" content="Login,Register, Create new Account, Add Online shop">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include($pt."/includes/meta.php"); ?>
  <?php include($pt."/includes/style.php"); ?>
  <script src="libs/jquery.pjax.js"></script>
 <script>
  
  $(function() {
   
   $(document).pjax('a[data-pjax]')
   $("[data-toggle='tooltip']").tooltip();
  // javascript pjax   
	});
 


 </script>
<script type="text/javascript">
  function fetch(str){
		  if (str.length == 0) { 
    document.getElementById("email_status").innerHTML = "";
    return;
  }
	    var request = new XMLHttpRequest();
	    request.onreadystatechange = function(){
	       if(this.readyState == 4 && this.status == 200){
	          var response = this.responseText;
		  document.getElementById("email_status").innerHTML=response;
	      if( document.getElementById("email_status").innerHTML =="Email is Available"){
		 document.getElementById("register").removeAttribute("disabled");
		  }
		   }
            };
            request.open("GET", "checkdata.php?user_email="+str, true);
	    request.send();
         }
		 
	// function checkemail(){
	 //var u = document.account.address.value;
	 //var str =document.account.email45.value
		//  if (str.length == 0 || u.length==0) { 
   // document.getElementById("approve_status").innerHTML = "";
    //return;
  //}
	//    var request = new XMLHttpRequest();
	  //  request.onreadystatechange = function(){
	    //   if(this.readyState == 4 && this.status == 200){
	      //    var response = this.responseText;
		 //document.getElementById("approve_status").innerHTML=response;
		  //if( document.getElementById("appstat").innerHTML =="Your Email Addres is Approved!"){
		  //document.getElementById("register").removeAttribute("disabled");
		  //}else{
  		  //document.getElementById("register").setAttribute("disabled");
		  //}
	       //}
            //};
            //request.open("POST", "", true);
			//request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	    //request.send("url="+u+"&aem="+str);
         //}	 
		 
	function checkpass(){
	//var status=
	var pass=document.account.pwd.value;
	var cpass=document.account.cpwd.value;
	if(pass !=cpass ){
	document.getElementById("pass_status").innerHTML="<h4 class='alert alert-danger'>Passwords Do Not Match!</h4>";
	} else {
	document.getElementById("pass_status").innerHTML="<h4 class='alert alert-success'>Passwords Match!</h4>";
	}
}	 
</script>

</head>
<body>
<?php include($pt."/includes/ga.php"); ?>
<?php include($pt."/includes/header.php"); ?>
<?php include($pt."/includes/nav.php"); ?>

<div class="container-fluid" style="height:auto;">
  <ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li class="active">Login or Create Account Now!</li>        
  </ol>
<?php include($pt."/includes/ad.php"); ?>

<!--sidebar added-->

<h1>Login or Regsiter. Get your Account on EcommercePakistan.com Now!</h1>
<div style="visibility:hidden;">&nbsp;&nbsp;&nbsp;vvv&nbsp;&nbsp;v&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;&nbsp;&nbsp;v&nbsp;v&nbsp;&nbsp;&nbsp;&nbsp;vv&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;v&nbsp;&nbsp;vv&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v</div>
<h3><a href="login.php#register">Register</a></h3>
<?php 
//auto login
if(isset($_COOKIE['em'])&& isset($_COOKIE['pd'])){
 $e=$_COOKIE['em'];
 $p=$_COOKIE['pd'];
 
  $sql = "SELECT * FROM tbl_user WHERE upassword='$p' AND uemail='$e'";
		 $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); 
            $status=$row['ustatus'];
			if($status=="approved"){
		   $_SESSION['id']=$row['sysid'];
           $_SESSION['name']=$row['uname'];
           $_SESSION['email']=$row['uemail'];
           $_SESSION['city']=$row['city'];
           $_SESSION['company']=$row['company'];
           $_SESSION['url']=$row['url'];
           $_SESSION['login']="yes";
           header("Location:admin.php");
		   } 
		 }
}
?>
<div id="msglogin" > 
<?php 
if(isset($lg)){
if(!$lg){
echo "<h3 class='alert alert-danger'>Your Email and Password Do Not Macth!</h3>";
}else{
header("Location:admin.php");
}
}
if(isset($_GET['msg'])){
echo "<h3 class='alert alert-success'> Congratulations. Your Account has been activated. Please login Below!</h3>";
}
if(isset($_GET['reg']) && $_GET['reg']=="pwd"){
echo "<h3 class='alert alert-danger'>Error! Your Passowrd Do Not Match</h3>";
}
?>
</div>
<!--<ul class="nav nav-tabs">
  <li class="active">
  <a data-toggle="tab" href="#home">Login In</a></li>
  
  <li><a data-toggle="tab" href="#menu2">Register</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">-->
   <!--<p><h3>Important Notice ! Registration of users and login will start from Monday, 3rd Septemebr, 2018. Apology for any Inconvenience </h3></p>-->
   <!-- <div id="loginhide" style="display:none;">-->
   <div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Login</h3>

</div>
<div class="panel-body">

   <div class="container">
  <div id="result"></div>

<h2>Login </h2>
  <p>The login module uses auto login through php cookies. If you select remeber me checkbox while logging in you will login automatically through cookies when you will click at login page. If you close the window the cookie will not expire. However logging out will delete the cookie and will require you to log in agian.</p>
  <form  method="post" id="login_form" role="form" action="login.php">
    <div class="form-group">
      <label for="email" class="control-label">Email:</label>
      <input type="email" class="form-control" maxlength="35" id="email" placeholder="Enter email" name="email">
	   <div class="help-block with-errors"></div>
    </div>
    <div class="form-group">
      <label for="pwd" class="control-label">Password:</label>
      <input type="password"  maxlength="12" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
	  <div class="help-block with-errors"></div>
    </div>
    <div class="checkbox">
      <label class="control-label"><input name="rememberme" type="checkbox" id="rememberme" value="yes"> 
      Remember me</label>
	  <?php 
include($pt."/classes_php/Random.class.php"); 
$r=new Random();
$t=$r->getToken(); 
?>
<input name="lgToken" type="hidden" value="<?php echo $t;?>">
	<?php 
	$_SESSION['lToken']=$t;
	?>
      <input name="act" type="hidden" id="act" value="login">
    </div>
	 <div class="form-group">
    <button type="submit" id="login" class="btn btn-primary">Submit</button>
	</div>
  </form>
  </div>
  <span><h3><a href="forgot.php" data-pjax="#main">Forgot Password</a> </h3>
  </span>
  </div>
</div>
</div>

<!--</div>-->

<!--</div>-->

 <!-- </div>-->
  
 <!-- <div id="menu2" class="tab-pane fade">-->
 
  <div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Register and Create Account Now!</h3>
</div>
<div class="panel-body">

    <h1>Register! Create New Account Now </h1><a name="register"></a>
	 <div id="show">
	   <h4>WHO Needs AN Account!. A user does not need an account on ecommercedirectorypk.com unless he or she wnats to add a business or onlie shop in the directory. For creating New Account, the user's email address requires approval and then will have to activate the account throught activation code send in a registered email. <br>
	   </h4>
	 </div>
     <p>
	 <div id="rmsg"></div>
	<form id="account" method="post" name="account"  action="login.php" autocomplete="on">
    <div class="form-group">
      <label for="email">Full Name:</label>
      <input type="text"  maxlength="30" class="form-control" id="uname" placeholder="Enter Full Name" name="uname" required >
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email"  maxlength="35" class="form-control" id="email45" placeholder="Enter email" name="email45" onKeyUp="fetch(this.value)" required>
     <span id="email_status"></span>Note: Email should be unique.
	</div>
	
	<div class="form-group">
      <label for="company">Company:</label>
      <input type="text" class="form-control"  maxlength="18" id="company" placeholder="Enter Company Name" name="company" required>Note: Comapny here means the Online Shop/biz
    </div>
   <div class="form-group">
      <label for="address">Website Address of Company:</label>
      <input type="url"  maxlength="35"class="form-control" id="address" placeholder="Enter Company URL" name="address"   style="border:#0000FF 1px solid;" required> 
	  <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Enter Doamin of your online business without http://www. like czone.pk or daraz.pk but not http://www.czone.pk">Help</button>URLs without http:// prefix won't approve.
      <span id="approve_status"></span>

   	
	 <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password"  minlength="8" maxlength="12" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>Note: Passowrd should be minimum 8 chracters and mximum 12 characters.
    </div>
	 <div class="form-group">
      <label for="pwd">Confirm Password:</label>
      <input type="password"    minlength="8" maxlength="12" class="form-control" id="cpwd" placeholder="Enter password" name="cpwd" onKeyUp="checkpass()" required ><span id="pass_status"></span>
    </div>
	 </div>
	
   <div class="form-group">
      <label for="contact">Contact (Mobile #):</label>
      <input type="text"  maxlength="14" class="form-control" id="contact" placeholder="Enter Contact No." name="contact" >
    </div>
	<div class="form-group">
  <label for="city">Select Shop's Operating City:</label>
  <select class="form-control"  name="city" id="city">
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
<?php 

$r=new Random();
$t=$r->getToken(); 
?>
<input name="crToken" type="hidden" value="<?php echo $t;?>">
	<?php 
	$_SESSION['rToken']=$t;
	?>

   <input name="act" type="hidden" id="act" value="register">
    <button type="submit"  name="reg" id="register" class="btn btn-default">Create Account</button>
   |<h3> <a href="addbusiness.php">ADD Business without Registering</a> </h3>
	</form>
	</p>
<!--  </div>-->
</div>
</div>
</div>
</div>
</div>
<!--<nav class="navbar navbar-default navbar-fixed-bottom">-->
<?php include($pt."/includes/footer.php"); ?>


</body>
</html>

