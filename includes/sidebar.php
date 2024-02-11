<img src="images/ad1.png" alt="Advertise Here" />
<div style="visibility:hidden">&nbsp;&nbsp;v&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;v</div>
<table class="table table-bordered" style="width:140px;">

<thead>
<tr>
<th>Last 5 Shops Added </th>
</tr>
</thead>

<tbody>
<?php 
         $db =new DBSQLi();
		 $conn=$db->getCon();
         $sql="Select * from tbl_shop Order by shopid desc";
		 $result = mysqli_query($conn, $sql);
         $j=1;
         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {?>

<tr>
<th><?php	echo "<a href='onlineshopdetails.php?id=".$row['shopid']."'> ".$row['shopname']." </a>"; ?></th>
</tr>


<?php 
$j=$j+1;
if($j==5){
break;
}
} 
}
?>

</tbody>
</table>

