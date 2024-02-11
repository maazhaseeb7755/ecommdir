<?php 
 error_reporting(E_ALL);
 ob_start();
 session_start();

 if(!isset($_GET['e']) && empty($_GET['e'])){
 header("Location:login.php");
 }

$pt="/home/anchortextseo/public_html";
 include($pt."/classes_php/DBSQLi.php");
   $e=trim($_GET['e']);
   $a=trim($_GET['ac']);
    $e=html_entity_decode($e, ENT_COMPAT, 'UTF-8');
    $a=html_entity_decode($a, ENT_COMPAT, 'UTF-8');
  $db =new DBSQLi();
  $conn=$db->getCon();
  
  		
$sql = "SELECT * FROM tbl_user WHERE uemail='$e' AND activation_code='$a'";
		 $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); 
            //$em_approve=$row['uemail_approved'];
			if(!empty($row)){

  
  $sql2 = "Update tbl_user SET ustatus='approved' Where uemail='$e' AND activation_code='$a'";
  $result2 = mysqli_query($conn, $sql2);
  //snedmail();
  
  $to=$e;
  $email="noreply@ecomercedirectorypk.com";
  $subject = 'Congratulations! Account Activated at ecommercedirectorypk.com ';
  
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
$message .= " <p>&nbsp;</p><h3>Your  Account Has been Activated! for ecommercedirectorypk.com.</h3>
<p> You can now add your Online Business at EcommerceDirectorypk.com. </p> ";
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
$issent=mail($to, $subject, $message, $headers);
  
  $db->close($conn);
  header("Location:login.php?msg=success");
  }else{
  echo "<h2 class='alert alert-danger'><br/>An Error has Occured!</h2>";
  }
  
  }else{
    echo "<h2 class='alert alert-danger'><br/>Your Activation code mismatch!</h2>";
  }
?>
