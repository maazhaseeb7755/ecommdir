<?php

include ("/classes_php/DBSQLi.php");

$userid = 1;
$shopid = $_POST['shopid'];
$rating = $_POST['rating'];

// Check entry within table
$query = "SELECT COUNT(*) AS cntpost FROM shop_rating WHERE shopid=".$shopid." and userid=".$userid;

$result = mysqli_query($con,$query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['cntpost'];

if($count == 0){
    $insertquery = "INSERT INTO shop_rating(userid,shopid,rating) values(".$userid.",".$shopid.",".$rating.")";
    mysqli_query($con,$insertquery);
}else {
    $updatequery = "UPDATE shop_rating SET rating=" . $rating . " where userid=" . $userid . " and shopid=" . $shopid;
    mysqli_query($con,$updatequery);
}


// get average
$query = "SELECT ROUND(AVG(rating),1) as averageRating FROM shop_rating WHERE shopid=".$shopid;
$result = mysqli_query($con,$query) or die(mysqli_error());
$fetchAverage = mysqli_fetch_array($result);
$averageRating = $fetchAverage['averageRating'];

$return_arr = array("averageRating"=>$averageRating);

echo json_encode($return_arr);