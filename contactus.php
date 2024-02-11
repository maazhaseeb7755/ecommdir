<?php
ob_start();
session_start();
$pt="/home/anchortextseo/public_html";
//$pt="";
 
 $a=$_POST['fact'];
if(isset($a) && !empty($a)) {
 $to = 'contact@ecommercedirectrypk.com';
$subj= trim($_POST['subject']);
$subj=html_entity_decode($subj, ENT_COMPAT, 'UTF-8');
$from = trim($_POST['fname']);
$from=html_entity_decode($from, ENT_COMPAT, 'UTF-8');
$qt=trim($_POST['mt']);
$qt=html_entity_decode($qt, ENT_COMPAT, 'UTF-8');
$ms=trim($_POST['message']);
$ms=html_entity_decode($ms, ENT_COMPAT, 'UTF-8');
 $em=trim($_POST['email45']);
 $em=html_entity_decode($em, ENT_COMPAT, 'UTF-8');
 //echo "Name=$from,subject=$subj,mt=$qt,msg=$ms,email=$em";
// To send HTML mail, the Content-type header must be set
//$headers  = 'MIME-Version: 1.0' . "\r\n";
//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
//$headers .= 'From: '.$from."\r\n".
  //  'Reply-To: '.$from."\r\n" .
	//'X-Mailer: PHP/' . phpversion();
	  $headers  = "MIME-Version: 1.0\r\n";
       $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $headers .= "From: {$em}\r\n";
       $headers .= "CC:maaz.haseeb75@gmail.com \r\n";
 
// Compose a simple HTML email message
$message = "<html><body>";
$message .= "<h1 style='color:#f40;'>New Message from ".$from."</h1>";
$message .= "<p style='color:#080;font-size:14px;'>Name: ".$from."</p>";
$message .= "<p style='color:#080;font-size:14px;'>subject: ".$subj."</p>";
$message .= "<p style='color:'#080;font-size:14px;'>Query type: ".$qt."</p>";
$message .= "<p style='color:#080;font-size:14px;'>Email: ".$em."</p>";
$message .= "<p style='olor:#080;font-size:14px;'>Message: ".$ms."</p>";
$message .= "</body></html>";
   unset($a);
// Sending email
 if( mail($to, $subject, $message, $headers)){
   header("Location:contactus.php?act=success");
   } else{
   header("Location:contactus.php?act=err");
  }

} 

?>

<!DOCTYPE html>
<html>
<head>
  <title>Contact Us! | www.ecommercedirectorypk.com</title>
  <meta charset="utf-8">
  <?php include($pt."/includes/fav.php"); ?>
  <meta name="description" content="Contact us through sms, mobile number, email or contact form. We are always looking forward to hear from you. You can also provide feedback and suggestions. ">
  <meta name="author" content="VitzWebtech"> 	
  <meta name="keywords" content="Contact us, Contact form of Ecommercedirectorypk.com, Phone, Email">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include($pt."/includes/meta.php"); ?>
  <?php include($pt."/includes/style.php"); ?>
  
</head>
<body style="height:2500px;">
<?php include($pt."/includes/ga.php"); ?>
<?php include($pt."/includes/header.php"); ?>

<?php include($pt."/includes/nav.php"); ?>

<div class="container-fluid"  style="height:2500px;">
  <ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li class="active">Contact Us</li>        
  </ol>
<?php include($pt."/includes/ad.php"); ?>
  <div id="msg">
  <?php 
  $m=$_GET['act'];
  if(isset($m) && !empty($m)){
    if($m=="success"){
     echo "<h3 style='color:#00CC00;'>Your message has been set Succesfully!</h3";
   } else {
     echo "<h3 style='color:#FF0000;'>Error: The website could not send your message!!</h3";
     }
  }
  
  ?>
  </div>
  <div id="ct" style="border:#000000 solid 1px; padding:5px 5px 5px 5px;">
  <h1>Contact Us.</h1>
  <p>Developed and Maintained by VitzWebTech. </p>
  <h4> Work Timings:</h4>
  <h4>Monday to Thursday:</h4>
  <h4> 9:30 AM to 1:00 PM - 3:00 PM to 5:00 PM  </h4>
  <h4>Friday:</h4>
  <h4>9:30 AM to 11:30 AM - 4:00 PM to 6:00 PM </h4>
  <h4>Saturday:</h4>
  <h4>9:30 AM to 1:00 PM </h4>
  
  <div class="row">
<div class="col-sm-9">

  <table class="table" style="width:350px;">
<thead>
<tr>
<th>Mobile #: <span class="glyphicon glyphicon-phone"></span> </th>
<th>92-0324-2116873 </th>
</tr>
</thead>
<tbody>
<tr>
<th>City <span class="glyphicon glyphicon-map-marker"></span> </th>
<td>Karachi</td>
</tr>
<tr>
<th>Area <span class="glyphicon glyphicon-map-marker"></span></th>
<td>North Karachi</td>
</tr>
<tr>
<th>Email <span class="glyphicon glyphicon-envelope"></span></th>
<td><a href="mailto:info@ecommercedirectorypk.com">info@ecommercedirectorypk.com </a> | &nbsp;&nbsp;| haseebseo727@gmail.com</td>
</tr>
<tr>
  <th>Contact Form </th>
  <td>Given Below </td>
</tr>
</tbody>
</table>
<p>Notice: For Email ID Approval and Account Activation just sms. For Advertising just Email!.</p>
</div>
</div>
</div>
<div style="visibility:hidden; padding-bottom:35px;"></div>
<h2 style="padding-bottom:15px;">Contact Us Form</h2>
<p>Please fill the form below for any qeuery</p>
<p><div class="contact-form" style="border:#000000 solid 1px; padding:5px 5px 5px 5px;">
<form id="contactus" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
				<div class="form-group">
			
				  <label  for="fname">Full Name:</label>
				        
					<input type="text" class="form-control" id="fname" placeholder="Enter Full Name" name="fname" required>
				 
				</div>
				<div class="form-group">
				  <label for="lname">Enter Subject:</label>
				         
					<input type="text" class="form-control" id="subject" placeholder="Enter Subject" name="subject" required>
				 
				</div>
				<div class="form-group">
				  <label  for="email">Email:</label>
				  
					<input type="email" class="form-control" id="email45" placeholder="Enter email" name="email45" required>
				 
				</div>
				<div class="form-group">
  <label for="Message Type">Select Message or Query Type:</label>
  <select class="form-control"  name="mt" id="mt">
  	<option value="Directory">Directory</option>
 	<option value="User Account">User Account</option>
	<option value="Feedback & Suggestion">Feedback & Suggestion</option>
	<option value="Advertising">Advertisng</option>
	<option value="Other">Other</option>
    
	</select>
</div>
				<div class="form-group">
				  <label  for="comment">Message:</label>
				 
					<textarea class="form-control" rows="5" id="message" name="message" requred></textarea>
				 
				</div>
				<div class="form-group">        
				 
					<button type="submit" class="btn btn-default">Send</button>
					<input name="fact" type="hidden" value="yes">
				  </div>
				</div>
				</form>
			
  </p>

<!-- col-sm-9 -->
</div>

<!--sidebar added-->
<?php 
include($pt."/classes_php/DBSQLi.php");
 $db =new DBSQLi();
 $conn=$db->getCon();
    //$conn = new mysqli("192.168.0.101", "kazimkh", "khan786", "mysite_db7334");
?>
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
<!--<nav class="navbar navbar-default navbar-fixed-bottom">-->
<?php include($pt."/includes/footer.php"); ?>


</body>
</html>

