<?php
session_start();
$pt="/home/anchortextseo/public_html"; 
include($pt."/classes_php/DBSQLi.php");
 
  $ccpt=trim($_POST['cpt']);
  //$ccpt=html_entity_decode($ccpt, ENT_COMPAT, 'UTF-8');	
 // echo "ccpt=$ccpt";
  //echo "</br>";
 // echo "Session=".$_SESSION['cpt'];
  if($_SESSION['cpt']==$ccpt){
  $db =new DBSQLi();
  $conn=$db->getCon();
 
  $sn=trim($_POST['uname']);
  $sn=html_entity_decode($sn, ENT_COMPAT, 'UTF-8');		
  
  $ue=trim($_POST['uemail']);
  $ue=html_entity_decode($ue, ENT_COMPAT, 'UTF-8');		
  
  $bn=trim($_POST['bname']);
  $bn=html_entity_decode($bn, ENT_COMPAT, 'UTF-8');		
  
  
  $ad=trim($_POST['address']);
  $ad=html_entity_decode($ad, ENT_COMPAT, 'UTF-8');		
  $mnc=trim($_POST['maincat']);
  $mnc=html_entity_decode($mnc, ENT_COMPAT, 'UTF-8');		
  $sc=trim($_POST['subcat']);
  $sc=html_entity_decode($sc, ENT_COMPAT, 'UTF-8');		
  $oc=trim($_POST['city']);
  $oc=html_entity_decode($oc, ENT_COMPAT, 'UTF-8');
 
  $shoptype=trim($_POST['shoptype']);
  $shoptype=html_entity_decode($shoptype, ENT_COMPAT, 'UTF-8');		
  $shopcode=0;
  if($shoptype=="Ecommerce Website"){
  $shopcode=1;
  }else{
  $shopcode=5;
  }
  

  $d=date("Y-m-d h:i:s");
  $lastlogin=$d;
  $sql="INSERT into tbl_user_biz set uname='$sn',uemail='$ue', ubis_name='$bn',ubiz_url='$ad',maincat='$mnc',major_prods='$sc',ocity='$oc',ubis_type='$shoptype',date_added='$d'";
 
  if (!mysqli_query($conn, $sql)){
  echo"</br><p>Errorcode: " . mysqli_errno($conn);
  echo "</p>";
  }
   $db->close($conn);
 // unset($_POST['do']);
  unset($_SESSION['cpt']);
  header("Location:addbusiness.php?msg=succ");
  
  
         $to = "mhaseeb7755@gmail.com";
         $subject = "A new busines Added! EcomDirpk.com";
         
         $message = "<h1>A new Business has been Added named <em>$bn</em></h1>";
         $message .= "<h3>This business added by <em>$sn</em>.</h3>";
         
         $header = "From:no-reply@ecommercdirectorypk.com.com \r\n";
         $header .= "Cc:maaz.haseeb75@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         //if( $retval == true ) {
          //  echo "Message sent successfully...";
         //}else {
         //   echo "Message could not be sent...";
         //}
  
  
}else{
unset($_SESSION['cpt']);
header("Location:addbusiness.php?msg=fail");

}  

?>