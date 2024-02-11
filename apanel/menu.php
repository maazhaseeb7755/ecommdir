<?php 

         ob_start();
		 session_start();
		 
		 if(!isset($_SESSION['admin']) && empty($_SESSION['admin'])){
         header("Location:index.php");
         }
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
   <table class="table">
<tr>
<th colspan="4"></th>
</tr>
<tr><td colspan="4"> Please Continue...</td></tr>
<tr>
  <td colspan="4"><a href="logout.php">LogOut</a></td>
</tr>
</table>
   </div>
   </body>
</html>
