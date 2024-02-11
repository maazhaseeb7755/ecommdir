<?php 
 $u=$_POST['url'];
 $u=html_entity_decode($u, ENT_COMPAT, 'UTF-8');
 $d2=parse_url($u, PHP_URL_HOST);

if (strpos($d2, 'w') === 0 ) {
  $t = substr($d2, 4); 
}else{
  $t=$d2;
}

 $e=$_POST['aem'];
 $e=html_entity_decode($e, ENT_COMPAT, 'UTF-8');
 $arr=split("@",$e);
if ($t==$arr[1]) {
		 echo "<h3 id='appstat' class='alert alert-success'>Your Email Addres is Approved!</h3>";
       } else {
         echo "<h3 id='appstat' class='alert alert-danger'>Your Email address is NOT Approved!</h3>";
        }

?>
