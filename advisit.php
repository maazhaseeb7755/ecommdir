<?php 
      $pt="";
	  include($pt."/classes_php/DBSQLi.php");
      $db =new DBSQLi();
	  $conn=$db->getCon();
	  $id=$_GET['aid'];
	  //$lp=$_GET['land_page'];
	  $sql = "SELECT * FROM tbl_ads WHERE aid=$id";
		 $result = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($result); 
         $adviews=$row['adviews'];
		 $lp=$row['landing_page'];
		 if($adviews==0){
		   $adviews=1;
		   
		   }else{
		   $adviews=$adviews+1;
		    }
		   $sql2 = "Update  tbl_ads Set adviews=$adviews WHERE aid=$id";
		 $result2 = mysqli_query($conn, $sql2);
		  $db->close($conn);
		  header("Location:$lp");
        
?>
