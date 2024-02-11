<!--<nav class="navbar navbar-inverse"  data-spy="affix" data-offset-top="197">-->
<nav class="navbar navbar-inverse">

  <ul class="nav navbar-nav">
    <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp; Home</a></li>
	<<li><a href="listofonlineshops.php">List Shop </a></li> 
  
   
	
	<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Log In</a></li>
    <li><a href="contactus.php"><span class="glyphicon glyphicon-envelope"></span>&nbsp; Contact Us</a></li>
	 <?php
	 if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
      ?>   
       <li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-wrench"></span>&nbsp; Admin<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="myaccount.php?action=view">My Account</a></li>
<li><a href="cpass.php">Change Password</a></li>
<li><a href="#">Change Email</a></li>
<li><a href="add_biz.php">Add Biz</a></li>
<li><a href="logout.php">Log Out</a></li>
<li><a href="admin.php">Goto Admin</a></li>
</ul>
</li>  
	  <!--<li><a href="admin.php"><span class="glyphicon glyphicon-wrench"></span>&nbsp; Admin Panel</a></li>-->
	<?php }?>
  </ul>
	<form class="navbar-form navbar-left" role="search" method="get" action="search.php">
<div class="form-group">
<input type="search" name="s" id="s" class="form-control" placeholder="Enter Shopname..">
</div>
<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Search</button>
</form>
<ul class="nav navbar-nav navbar-right">
<li><a href="advsearch.php"><span class="glyphicon glyphicon-search"></span>&nbsp; Adv. Srch</a></li>
</ul>
</nav>
