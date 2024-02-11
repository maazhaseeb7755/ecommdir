<?php


		 
class Login { 
private $email; 
private $password; 

public function setEmail($email) 
{ 
$this->email = $email; 
}

public function setP($pass) 
{ 
$this->password = $pass; 
}

public function checklogin() 
{ 
         //include("DBSQLI.php");
         
		 $db =new DBSQLi();
		 $conn=$db->getCon();
		 
		  
		
$sql = "SELECT * FROM tbl_user WHERE upassword='$this->password' AND uemail='$this->email'";
		 $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); 
            $status=$row['ustatus'];
			if($status=="approved"){
		   $_SESSION['id']=$row['sysid'];
           $_SESSION['name']=$row['uname'];
           $_SESSION['email']=$row['uemail'];
		   $_SESSION['pass']=$row['upassword'];
           $_SESSION['city']=$row['city'];
           $_SESSION['company']=$row['company'];
           $_SESSION['url']=$row['url'];
           $_SESSION['login']="yes";
          $db->close($conn);
		   return true;
		   		 
		 if( isset($_POST['rememberme']) ){

          setcookie("em", "$e", time()+60*60*60, "/","localhost");
	      setcookie("pd", "$n", time()+60*60*60, "/","localhost");
          
		  $setup=true;
          
		  }else{
          setcookie("em", "", time()-1, "/","localhost");
          setcookie("pd", "", time()-1, "/","localhost");
          $setup=false;
         }
	
		 }else if($status=="pending"){
    	   $_SESSION['email']=$row['uemail'];
		   $_SESSION['pass']=$row['upassword'];
		 $db->close($conn);
		 header("Location:pending.php");
		 }	
         } else {
         $db->close($conn);   
		 return	false;
         }
		 }
//}

}
?>