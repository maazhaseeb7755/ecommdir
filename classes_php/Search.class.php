<?php


		 
class Search{ 


public function notfound($s) 
{ 
         //include("DBSQLI.php");
         
		 $db =new DBSQLi();
		 $conn=$db->getCon();
		 
		  
		
$sql = "SELECT * FROM tbl_search_notfound WHERE term='$s'";
		 $result = mysqli_query($conn, $sql);
         $totals;
		 if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); 
            $totals=$row['total_searches'];
			$id=$row['searchid'];
			if($totals>0){
			$totals=$totals+1;
		 
	        $sql2 = "Update tbl_search_notfound set total_searches=$totals WHERE searchid=$id";
		 $result2 = mysqli_query($conn, $sql2);
			 	      	  
		  }
		  }else {
            $totals=1;
	     $sql2 = "Insert into tbl_search_notfound set term='$s',total_searches=$totals";
		 $result2 = mysqli_query($conn, $sql2);
		  }
		  $db->close($conn);
		   
		   	}	 
		 
		 
//}

}

?>