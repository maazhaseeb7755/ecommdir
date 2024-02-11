<?php 

         ob_start();
		 session_start();
		 
		 if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
         header("Location:menu.php");
        }
		  
	     $pt="/home/anchortextseo/public_html";
		 include("../classes_php/DBSQLi.php");
         global $lg;
		 global $setup; 
		 $db =new DBSQLi();
		 $conn=$db->getCon();
		 if(isset($_POST['lg'])){
		 
		 $a=$_POST['lg'];
		 $n=trim($_POST['pwd']);
		 $n=html_entity_decode($n, ENT_COMPAT, 'UTF-8');
		 $n2=md5($n);		 
		 $e=trim($_POST['email']);
		 $e=html_entity_decode($e, ENT_COMPAT, 'UTF-8');
		 $sql = "SELECT * FROM tbl_test_user WHERE upassword='$n2' AND email='$e'";
		 $result = mysqli_query($conn, $sql);
		 if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); 
           $_SESSION['name']=$row['name'];
           $_SESSION['email']=$row['email'];
           $_SESSION['admin']="yes";
			$lg=true;
			} else {
            
			$lg=false;
         }
		 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex,nofollow">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/bootstrap.min.js"?>></script>
</head>

<body>

<div class="container">
  <h2>Login </h2>
  <div>
  <?php 
if(isset($lg)){
if(!$lg){
echo "<h3 style='background-color:#FF0000; color:#FFFFFF;'>Your Email and Password Do Not Macth!</h3>";
}else{
header("Location:menu.php");
}
}
?>  
  </div>
  <form  method="post" name="logn" id="login" action="<?php $_SERVER['PHP_SELF']; ?>">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
	<input name="lg" type="hidden" value="yes">
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
 
</body>
</html>