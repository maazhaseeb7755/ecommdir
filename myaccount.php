<?php 
ob_start();
session_start();
$pt="/home/anchortextseo/public_html"; 
if(!isset($_SESSION['login']) && empty($_SESSION['login'])){
header("Location:login.php");
}
 include($pt."/classes_php/DBSQLi.php");
 if(isset($_POST['task'])){
 
  $un=trim($_POST['name']);
  $c=trim($_POST['company']);
  $u=trim($_POST['address']);
  $m=trim($_POST['contact']);
  $city=trim($_POST['city']);
  $un=html_entity_decode($un, ENT_COMPAT, 'UTF-8');
  $c=html_entity_decode($c, ENT_COMPAT, 'UTF-8');
  $u=html_entity_decode($u, ENT_COMPAT, 'UTF-8');
  $m=html_entity_decode($m, ENT_COMPAT, 'UTF-8');
  $city=html_entity_decode($city, ENT_COMPAT, 'UTF-8');
 
  $db =new DBSQLi();
  $conn=$db->getCon();
  $id=$_SESSION['id'];
  $sql = "UPDATE tbl_user Set uname='$un',company='$c',url='$u',mobile='$m',city='$city' WHERE sysid=$id";
  $result=mysqli_query($conn, $sql);
  $db->close($conn);
  unset($_POST['task']);
  header("Location:myaccount.php?action=view");		 
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>MyAccount at www.ecommercedirectorypk.com</title>
  <meta charset="utf-8">
   <?php include($pt."/includes/fav.php"); ?>
  <meta name="description" content="">
  <meta name="author" content="VitzWebTech"> 	
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

<div class="container-fluid" style="height:950px;">
<ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li class="active">My Account</li>        
  </ol>
<?php include($pt."/includes/ad.php"); ?>
 <?php 
 $act=$_GET['action'];
 
 $db =new DBSQLi();
		 $conn=$db->getCon();
		 $id=$_SESSION['id'];
		 $sql = "SELECT * FROM tbl_user WHERE sysid=$id";
		          $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); 
     
 if($act=="view"){
 ?> 

<!--sidebar added-->

<h1>View Your Account on Ecommercedirectorypk.com!</h1>
<h4>Following are your registration details. </h4>
<div style="visibility:hidden;">&nbsp;&nbsp;&nbsp;vvv&nbsp;&nbsp;v&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;&nbsp;&nbsp;v&nbsp;v&nbsp;&nbsp;&nbsp;&nbsp;vv&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;v&nbsp;&nbsp;vv&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v</div>


   <div class="container">
<table class="table table-bordered">
<thead>
<tr>
<th>Full Name </th>
<th><?php echo $row['uname']; ?></th>
</tr>
</thead>
<tbody>
<tr>
<th>Email:</th>
<td><?php echo $row['uemail']; ?></td>
</tr>
<tr>
<th>Company:</th>
<td><?php echo $row['company']; ?></td>
</tr>
<tr>
<th>URL:</th>
<td><?php echo $row['url']; ?></td>
</tr>
<tr>
  <th>Contact</th>
  <td><?php echo $row['mobile']; ?></td>
</tr>
<tr>
  <th>City</th>
  <td><?php echo $row['city']; ?></td>
</tr>
<tr>
  <th>&nbsp;</th>
  <td><a href="myaccount.php?action=edit" data-pjax="#main"><h4><span class="glyphicon glyphicon-pencil"></span>&nbsp; Edit Account</h4></a></td>
</tr>
</tbody>
</table>
  </div>

<?php 
//$db->close($conn);
} else if($act=="edit"){
  //$db =new DBSQLi();
	//	 $conn=$db->getCon();
		// $id=1;
		 //$sql = "SELECT * FROM tbl_user WHERE sysid=$id";
		   //       $result = mysqli_query($conn, $sql);

//         if (mysqli_num_rows($result) > 0) {
  //          $row = mysqli_fetch_assoc($result); 


?>
     <div class="container">
    <h1>Edit your Account Details.!</h1>
    <h4>Following are your registration details.
	  </h4>
	  <div style="visibility:hidden;">&nbsp;&nbsp;&nbsp;vvv&nbsp;&nbsp;v&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;&nbsp;&nbsp;v&nbsp;v&nbsp;&nbsp;&nbsp;&nbsp;vv&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;v&nbsp;&nbsp;vv&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;&nbsp;&nbsp;vvv&nbsp;&nbsp;v&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;&nbsp;&nbsp;v&nbsp;v&nbsp;&nbsp;&nbsp;&nbsp;vv&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;v&nbsp;&nbsp;vv&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v</div>
    <form name="myaccount"  method="post" id="myaccount" action="myaccount.php">
    <div class="form-group">
      <label for="name">Full Name:</label>
      <input type="text" class="form-control" id="name" value="<?php echo $row['uname']; ?>" name="name" required>
    </div>
    
	 <div class="form-group">
      <label for="comapny">Company:</label>
      <input type="text" class="form-control" id="company" value="<?php echo $row['company']; ?>" name="company" required>
    </div>
   <div class="form-group">
      <label for="address">Website Address of Company:</label>
      <input type="url" class="form-control" id="address" value="<?php echo $row['url']; ?>" name="address" required>
    </div>
   <div class="form-group">
      <label for="contact">Contact (Mobile #):</label>
      <input type="text" class="form-control" id="contact" value="<?php echo $row['mobile']; ?>" name="contact" required>
    </div>
	
	<div class="form-group">
  <label for="city">Select list:</label>
  <select class="form-control" name="city" id="city">
    <option><?php echo $row['city']; ?></option>
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
	
   <input name="task" id="task" type="hidden" value="update">
    <button type="submit" id="regsiter" class="btn btn-default">Update Account</button>
  </form>
	</p>
  </div>
<?php 

} else if (empty($act)) {
echo "<h3 class='alert alert-danger'>Some error has occured</h3>";
}
}
$db->close($conn);
?>
</div>

<!--<nav class="navbar navbar-default navbar-fixed-bottom">-->
<?php include($pt."/includes/footer.php"); ?>


</body>
</html>

