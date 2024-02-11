<?php 

         ob_start();
		 session_start();
		 
		 //if(!isset($_SESSION['admin']) && empty($_SESSION['admin'])){
         //header("Location:index.php");
         //}
		  
?>
<html>
<head>
  <title>List Shop details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>
   <body>
   <div class="container">
   <form  method="post" id="login_form" role="form" action="results2.php">
   <div class="form-group">
<input type="text" name="sname" id="sname" class="form-control" placeholder="Search" required>
</div>
<button type="submit" class="btn btn-default">Submit</button>
</form>
   <table class="table">
<tr>
<th>ShopID</th><th>ShopName</th><th>URL</th><th></th><th>#</th><th>approve</th>
</tr>



      <?php
	     //include("../classes_php/DBSQLI.php");
         include("/home/anchortextseo/public_html/classes_php/DBSQLi.php");
		 
		 $db =new DBSQLi();
		 $conn=$db->getCon();
		 
		 $sql = 'SELECT * FROM tbl_shop Order BY shopid desc';
         $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {?>
			<tr>
<td><?php echo $row["shopid"]; ?></td>
<td><?php	echo "<a href='sdetails.php?id=".$row['shopid']."'> ".$row['shopname']." </a>"; ?></td>
<td><?php echo $row["url"]; ?></td>
<td><?php echo $row["maincat"]; ?></td>
<td><?php	echo "<a href='eb.php?shopid=".$row['shopid']."'> Edit </a>"; ?> | <?php	echo "<a href='edit_seo.php?shopid=".$row['shopid']."'> Edit SEO</a>"; ?></td>
<td><?php echo $row["approved"]; ?> <a href="approve.php?i=<?php echo $row['shopid']; ?>">A</a></td>
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
