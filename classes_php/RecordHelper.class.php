<?php

class RecordHelper{ 
public $i; 

public function getRows() 
{ 
 
    $db =new DBSQLi();
	$conn=$db->getCon();
    $sql = "SELECT * FROM tbl_shop";
     $result = mysqli_query($conn, $sql);
	 $t=mysqli_num_rows($result);
	// echo "Total Records=$t";
      return $t;
}

} 
?>