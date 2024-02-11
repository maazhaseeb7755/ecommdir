<?php
ob_start();
session_start();
global $msg;
global $flag;
$pt="/home/anchortextseo/public_html";

   //if( $_POST["act"]="change" && isset($_POST['npwd'])) {
     // if (preg_match("/[^A-Za-z'-]/",$_POST['name'] )) {
      //   die ("invalid name and name should be alpha");
      //}
	  if(isset($_SESSION['cpToken']) && !empty($_SESSION['cpToken'])){ 
       $s=$_SESSION['cpToken'];
      if(isset($_POST['cpassToken'])){
  $cpid=$_POST['cpassToken'];
  }
  if(!empty($cpid) && $cpid==$s){
      include($pt."/classes_php/DBSQLI.php");
	  
	  $db =new DBSQLi();
      $conn=$db->getCon();  
      $id=$_SESSION['id'];
	  $np=trim($_POST['npwd']);
      $np=html_entity_decode($np, ENT_COMPAT, 'UTF-8');
	  $cnpwd=trim($_POST['cpwd']);
	  $cnpwd=html_entity_decode($cnpwd, ENT_COMPAT, 'UTF-8');
	  if($np==$cnpwd){
	  $s="update tbl_user set  upassword='".$np."' where  sysid=".$id;
	  $result = mysqli_query($conn, $s);
	  $db->close($conn);
	   $msg=true;
	   }else{
	  $msg=false;
	  }
	  unset($_POST['act']);
	  
	  unset($_POST['cpassToken']);
	  unset($_POST['npwd']);
	  unset($_POST['cpwd']);
      unset($_SESSION['cpToken']);
	  //exit();
	  
	  //header("Location:admin.php?msg=cp");
   }
   }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Change your Password! | www.ecommercedirectorypk.com</title>
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

<div class="container-fluid" style="height:850px; ">
<ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li class="active">Change Password</li>        
  </ol>
<?php include($pt."/includes/ad.php"); ?>
  <h1>Change your Password.</h1>
  <div style="visibility:hidden;">&nbsp;&nbsp;&nbsp;vvv&nbsp;&nbsp;v&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;&nbsp;&nbsp;v&nbsp;v&nbsp;&nbsp;&nbsp;&nbsp;vv&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;v&nbsp;&nbsp;vv&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;&nbsp;&nbsp;vvv&nbsp;&nbsp;v&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;&nbsp;&nbsp;v&nbsp;v&nbsp;&nbsp;&nbsp;&nbsp;vv&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v&nbsp;v&nbsp;&nbsp;vv&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v</div>
<div class="row">
<div class="col-sm-9">
<div class="panel panel-default">
<div class="panel-body">
<div class="page-header">
<div class="container">
  <h1>Enter the details in the following form. </h1>
  <div id="msg" style="width:375px;">
  <?php 
if(isset($msg)){
if($msg){
echo "<h3 class='alert alert-success'>Your Password has changed successfully!</h3>";
} else {
echo "<h3 class='alert alert-danger'>Your Passwords Do Not Macth!</h3>";
}
}
?>
  </div>
  <div>
    <h4>Note: Password must be minimum 8 characters long and maximum 12 characters long</h4>
  </div>
  <form  class="form-inline" method="post" name="forgot" id="forgot" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table  class="table" style="width:375px;">
<thead>
<tr>
<th>Old Password:</th>
<th> <div class="form-group">
<!-- <label for="opwd"></label>-->
      <input minlength="8" maxlength="12" type="password" class="form-control" id="opwd" placeholder="Enter Old Password" name="opwd" required>
  </div></th>
</tr>
</thead>
<tbody>
<tr>
<th>New Password:</th>
<td>	<div class="form-group">
      <!--<label for="npwd"></label>-->
      <input minlength="8" maxlength="12" type="password" class="form-control" id="npwd" placeholder="Enter New Password" name="npwd" required>
    </div></td>
</tr>
<tr>
<th>Confirm New Password:</th>
<td><div class="form-group">
     <!-- <label for="cpwd"></label>-->
      <input minlength="8" maxlength="12" type="password" class="form-control" id="cpwd" placeholder="Enter Confirm Password" name="cpwd" required>
    </div></td>
</tr>
<tr>
<th>&nbsp;</th>
<td>
<?php 
include($pt."/classes_php/Random.class.php"); 
$r=new Random();
$t=$r->getToken(); 
?>
<input name="cpassToken" type="hidden" value="<?php echo $t;?>">
	<?php 
	$_SESSION['cpToken']=$t;
	?>
<input name="act" type="hidden" value="change">
	<button type="submit" class="btn btn-default">Change</button></td>
</tr>
</tbody>
</table>
	
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

