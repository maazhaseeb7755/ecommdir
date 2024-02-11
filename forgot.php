<?php 
 
 //$p=$_POST['act']; 
 $pt="/home/anchortextseo/public_html";
  include($pt."/classes_php/DBSQLi.php");
  if(isset($_POST['act'])){

 $e=trim($_POST['email35']);
 $e=html_entity_decode($e, ENT_COMPAT, 'UTF-8');		 
 $db =new DBSQLi();
 $conn=$db->getCon();
 $sql="select * from tbl_user where uemail='$e'";
 $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
         $row = mysqli_fetch_assoc($result); 
        // $db->close();
         //header("Location:forgotpassword.php?msg=err");
		 $p=$row['upassword'];
         $e=$row['uemail'];
		 $db->close($conn);
         
		 include($pt."/classes_php/EmailUtil.php");	   
	   $to=$e;
	   $email="noreply@ecommercerdirctorypk.com";
	   $subject = 'Your Password Recovered at ecommercedirectorypk.com ';
		 
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
$message .= "<h1>EcommerceDirectorypk.com</h1><h3>Web Driectory of online shopping websites</h3>";
$message .= " <p>Find your favourites products online now!.</p><p>The website is created for everyone.</p>";
$message .= "</div>";
$message .= " <p>&nbsp;</p><h3>Your Password has been recovered! at ecommercedirectorypk.com.<br/></h3>";
$message .= "<p>Your Password: $p</br> </p> ";
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
mail($to, $subject, $message, $headers);
         $lg=true;
         } else {
         $lg=false;
         }
		 unset($_POST['act']);

 }



?>
<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password| Recover your Password! | www.ecommercedirectorypk.com</title>
  <meta charset="utf-8">
   <?php include($pt."/includes/fav.php"); ?>
  <meta name="description" content="Forgot your password, get your password delivered to your inbox!">
  <meta name="author" content="VitzWebTech"> 	
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include($pt."/includes/meta.php"); ?>
  <?php include($pt."/includes/style.php"); ?>
</head>
<body>
<?php include($pt."/includes/ga.php"); ?>
<?php include($pt."/includes/header.php"); ?>

<?php include($pt."/includes/nav.php"); ?>

<div class="container-fluid" style="height:850px;">
<ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li class="active">Forgot Password</li>        
  </ol>
<?php include($pt."/includes/ad.php"); ?>
  <h1>Forgot Password. Recover your Password Now! </h1>
  <div class="row">
<div class="col-sm-9">
<div class="panel panel-default">
<div class="panel-body">
<div class="page-header">
<div class="container">
  <h3>Enter the Email you provided when you registered. </h3>
  <div id="msg-forgot-password">
  <?php 
if(isset($lg)){
if(!$lg){
echo "<h3 class='alert alert-danger'>Your Email Not Found in Our Database!</h3>";
}else{
echo "<h3 class='alert alert-success'>Your Password has been sent to you at your mail.<br/> Please check your Email Inbox!<h3/>";
}
}
?>
  </div>
  <form  method="post" name="forgot" id="forgot" action="forgot.php" class="form-inline">
    <div class="form-group">
      <label for="email">Email:</label>
      <input maxlength="35" type="email" class="form-control" id="email35" placeholder="Enter email" name="email35" required>
    </div>
	<input name="act" id="act" type="hidden" value="yes">
	<button type="submit" class="btn btn-default">Send</button>
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
<?php include($pt."/includes/footer.php"); ?>


</body>
</html>

