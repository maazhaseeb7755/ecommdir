<?php
ob_start();
session_start();
$pt="/home/anchortextseo/public_html"; 
//$pt="";
 global $em;
   include($pt."/classes_php/DBSQLi.php");
   include($pt."/classes_php/Random.class.php");		 
		
         if(isset($_POST['active'])){
		  $e=$_POST['email55'];
		  $em=$e;
		 $db =new DBSQLi();
		 $conn=$db->getCon();
		 $actc=new Random();
		 $actcode=$actc->random_code(24);
		 $sql = "Update tbl_user SET activation_code='$actcode' where uemail='$e'";
         $result = mysqli_query($conn, $sql);
         $sql = "Select * from tbl_user where uemail='$e'";
		 $result = mysqli_query($conn, $sql);
		 $row = mysqli_fetch_assoc($result);
         //$e=$row['uemail'];  
		 $ac=$row['activation_code'];
		 $ecount=$row['email_count'];
		 
		 $to=$e;
         $email="noreply@ecommercedirectorypk.com";
	     $subject = 'Activate Your Account at EcommerceDirectorypk.com ';
		 //include("../classes_php/EmailUtil.php");	   
		 if (!empty($ac)){
		 	 
	   
		 
$message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>";
$message .= "<html xmlns:v='urn:schemas-microsoft-com:vml'>";
$message .= "<head>";
$message .= "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
$message .= "<meta name='viewport' content='width=600,initial-scale = 2.3,user-scalable=no'>";
$message .= " <!--[if !mso]><!-- -->";
$message .= "<link href='https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700' rel='stylesheet'>";
$message .= "<link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet'>";
$message .="<!-- <![endif]-->";	
$message .= " <title>Material Design for Bootstrap</title>";
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
$message .= "<h1>EcommercePakistan.com</h1><h3>Web Driectory of online shopping websites</h3>";
$message .= " <p>Find your favourites products online now!.</p><p>The website is created for everyone.</p>";
$message .= "</div>";
$message .= " <p>&nbsp;</p><p> Account Activation code is sent to you! for ecommercedirectorypk.com. Please click the link below to activate or copy and paste the url in your browser.<br/><a href='http://www.ecommercedirectorypk.com/activate.php?e=$e&ac=$ac' target='_blank'>http://www.ecommercedirectorypk.com/activate.php?e=$e&ac=$ac</a></br> </p> ";
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
$headers .= "From: {$email}\r\n";
$issent=mail($to, $subject, $message, $headers);
if($issent){
 $ecount=$ecount+1;
 $sql = "Update tbl_user SET uemail_sent='yes',email_count=$ecount where uemail='$e'";
         $result = mysqli_query($conn, $sql);		 
		 }
		 } 
		 unset($_POST['active']);
		 $db->close($conn);
		 }




?>

<!DOCTYPE html>
<html>
<head>
  <title>Account Status Pending! | www.ecommercedirectorypk.com</title>
  <meta charset="utf-8">
  <?php include($pt."/includes/fav.php"); ?>
  <meta name="description" content="">
  <meta name="author" content="VitzWebTech"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include($pt."/includes/meta.php"); ?>
  <?php include($pt."/includes/style.php"); ?>
  <style>
  #divtime{
  background-color:#419D78;
  color:#EFD0CA;
  font-size:20px;
  text-align:center;
}
  </style>
</head>
<body>
<?php include($pt."/includes/ga.php"); ?>
<?php include($pt."/includes/header.php"); ?>

<?php include($pt."/includes/nav.php"); ?>

<div class="container-fluid" style="height:850px;">
<ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li class="active">Account Status Pending</li>        
  </ol>
<?php include($pt."/includes/ad.php"); ?>
  <h1>Your Account Status is Pending . Please verify your Email Address! </h1>
  <div class="row">
<div class="col-sm-9">
<div class="panel panel-default">
<div class="panel-body">
<div class="page-header">
<div class="container">
<?php 
 //include("/classes_php/DBSQLI.php");
 $db =new DBSQLi();
 $conn=$db->getCon();
 $e=$_SESSION['email'];
 $p=$_SESSION['pass'];
//echo "e=$e</br>";
//echo "p=$p";
 
 $sql = "SELECT * FROM tbl_user WHERE upassword='$p' AND uemail='$e'";
 $result = mysqli_query($conn, $sql);
 
            $row = mysqli_fetch_assoc($result); 
            if(empty ($result) && empty($row) ){
			header("Location:login.php");
			}else{
		    $status=$row['uemail_approved'];
			$ustatus=$row['ustatus'];
			if($ustatus=="pending"){
			echo "<div style='width:325px;'><h4> Congratultations you ave sucessfully registered at ecommercepakistan.com! We do not accept un-official domains like yahoo,hotmail and outlook etc. You must register with the domain name of your respecting company like Daraz.pk and czone.com.pk <br/>After your email gets approved your will recieve  activation code in your inbox!</h4>		
 <div style='width:325px;'><h4> Activation code has been sent to you! Please check your inbox</h4></div>";
  
  }else if($ustatus=="approved"){
  //echo "<div style='width:325px;'><h4> Your Email Address has been approved  And Activation code has been sent to you! Please check your inbox</h4></div>";
  header("Location:login.php?msg=success");
  }
  }
  $db->close($conn);	 		
		 
?>
<!--  <p>Your account requires approval and will be activated uopn due dilignce. </p>-->
  <p>
<?php 
 
 $db =new DBSQLi();
 $conn=$db->getCon();
 $e=$_SESSION['email'];
 $p=$_SESSION['pass'];
 //echo "e=$e</br>";
 //echo "p=$p";
 
 $sql2 = "SELECT * FROM tbl_user WHERE upassword='$p' AND uemail='$e'";
 $result2 = mysqli_query($conn, $sql2);
   $row2 = mysqli_fetch_assoc($result2); 
    if(empty ($result2) && empty($row2) ){
			header("Location:login.php");
			}else{
		    $status=$row2['uemail_approved'];
			$ustatus=$row2['ustatus'];
			$count=$row2['email_count'];
			if($count<3){
			 
			
?>			
  <div id="login"></div>
  <h2>Resend Activation Code </h2>
  <div style="visibility:hidden;">&nbsp;&nbsp;&nbsp;vvv&nbsp;&nbsp;v&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;&nbsp;&nbsp;v&nbsp;v&nbsp;&nbsp;&nbsp;&nbsp;vv&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;v&nbsp;&nbsp;vv&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v</div>

  <div style="width:375px;"><h4>If you have not recieved activation link in your email. Use the following resend button to recieve the activation link!. It will enabled after 45 seconds</h4></div>
  <form  method="post" id="verify" role="form" action="pending.php" class="form-inline">
    <div class="form-group">
      <label for="email" class="control-label">Email:</label>
      <input type="email" class="form-control" maxlength="35" id="email45" value="<?php 
	  if (empty($_SESSION['email'])){
	  echo $em;
	  }else{
	  echo $_SESSION['email'];
	  }?>" name="email45" disabled="disabled"> 
	  <input name="email55"  id="email55"type="hidden" value="<?php if (empty($_SESSION['email'])){
	  echo $em;
	  }else{
	  echo $_SESSION['email'];
	  }?>">
	   
    </div>
    
    
      <input name="active" type="hidden" id="active" value="yes">

	 <div class="form-group">
    <button type="submit" id="resend"  name="resend" class="btn btn-primary" disabled>Resend</button>
	</div>
	<!-- js timer starts-->
	<!-- <div id="divtime">Time left = <span id="timer"></span></div>-->

    
	<!-- js timer ends-->
  </form>
 
  

  </p>
  <script>
	function code() {
   document.getElementById("resend").removeAttribute("disabled");
}

setTimeout(code, 30000);
	</script>
  <?php  } else if($count>=3){
  echo "<h4 style='width:375px;'>You have recieved Activation code 3 times in your Email. You cannot be send activation code anymore. <br/>Please contact the admin at contact us for getting assistance on account activation.</h4>";
  }else{
  
  }
  
			}
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
<?php include($pt."/includes/footer.php"); ?>


</body>
</html>

