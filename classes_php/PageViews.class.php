<?php


		 
class PageViews { 
public $i; 
 

public function setI($i) 
{ 
$this->i = $i; 
}
public function getI() 
{ 
return i;
}

public function increment($id) 
{ 
         //include("DBSQLI.php");
         
		 $db =new DBSQLi();
		 $conn=$db->getCon();
		 
		  
		
$sql = "SELECT * FROM tbl_shop WHERE shopid=$id";
		 $result = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($result); 
         $pageviews=$row['page_views'];
		   if($pageviews==0){
		   $pageviews=1;
		   $this->setI($pageviews);
		   }else{
		   $j=$pageviews+1;
		   $this->setI($j);
		   }
		   $sql = "Update  tbl_shop Set page_views=$this->i WHERE shopid=$id";
		 $result = mysqli_query($conn, $sql);
		  $db->close($conn);
		  
		   		 
		 
		
		 }
//}

}
?>