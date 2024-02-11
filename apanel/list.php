<?php 

         ob_start();
		 session_start();
		 
		// if(!isset($_SESSION['admin']) && empty($_SESSION['admin'])){
        // header("Location:index.php");
         //}
		  
?>
<html>
<head>
  <title>List details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>
   <body>
   <div class="container">
   <form  method="post" id="login_form" role="form" action="results.php">
   <div class="form-group">
<input type="text" name="uname" id="uname" class="form-control" placeholder="Search" required>
</div>
<button type="submit" class="btn btn-default">Submit</button>
</form>
   <table class="table">
<tr>
<th>ID</th><th>Name</th><th>Email</th><th>#</th>
</tr>



      <?php
         include("/home/anchortextseo/public_html/classes_php/DBSQLi.php");
		 //include("../classes_php/DBSQLI.php");
         
		 $db =new DBSQLi();
		 $conn=$db->getCon();
		 
		 $sql = 'SELECT * FROM tbl_user Order BY uid desc';
         $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {?>
			<tr>
<td><?php echo $row["uid"]; ?></td>
<td><?php	echo "<a href='udetails.php?id=".$row['uid']."'> ".$row['uname']." </a>"; ?></td>
<td><?php echo $row["uemail"]; ?></td>
<td><?php echo $row["ustatus"]; ?></td>
</tr>
            
        <?php
		    
			}
         } else {
            echo "0 results";
         }
         //mysqli_close($conn);
		// echo "</br>Trying to close the connection";
		 $db->close($conn);
      ?>
	  
</table>
	  </div>
   </body>
</html>
