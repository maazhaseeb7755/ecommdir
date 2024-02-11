<?php 

         ob_start();
		 session_start();
		 
		 if(!isset($_SESSION['admin']) && empty($_SESSION['admin'])){
         header("Location:index.php");
         }
		  
?>
<html>
<head>
  <title>Approve Shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>
   <body>
   <div class="container">
  
  



      <?php
	     //include("../classes_php/DBSQLI.php");
         include("/home/anchortextseo/public_html/classes_php/DBSQLi.php");
		 
		 $db =new DBSQLi();
		 $conn=$db->getCon();
		 $id=$_GET['i'];
		  
		 $sql = "Update  tbl_shop SET approved='yes' Where shopid=$id";
         $result = mysqli_query($conn, $sql);

         //if (mysqli_num_rows($result) > 0) {
         //mysqli_close($conn);
		// echo "</br>Trying to close the connection";
		 $db->close($conn);
		 header("Location:listshops.php");
      ?>
	  
	  </div>
   </body>
</html>
