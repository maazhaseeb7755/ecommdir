<?php 
      $pt="/home/anchortextseo/public_html";
	  //$pt="";
	  include($pt."/classes_php/DBSQLi.php");
      $db =new DBSQLi();
	  $conn=$db->getCon();
	  $e=$_GET['user_email'];
	  $e=html_entity_decode($e, ENT_COMPAT, 'UTF-8');
	  //$lp=$_GET['land_page'];
	  $sql = "SELECT * FROM tbl_user WHERE uemail='$e'";
		 $result = mysqli_query($conn, $sql);
         
		
         if (mysqli_num_rows($result) > 0) {
         //$row = mysqli_fetch_assoc($result); 
		 echo "<h3 id='emsg' class='alert alert-danger'>Email Already Exist</h3>";
         } else {
         echo "<h3 id='emsg' class='alert alert-success'>Email is Available</h3>";
         }

          $db->close($conn);
		 
        
?>
