<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['admin_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $user;?> - Pharmacy Management</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css"  media="screen" />
<script src="js/function.js" type="text/javascript"></script>
<style>
#left_column{height: 470px;}

</style>
</head>
<body>
<div id="content">
<div id="header">
<h1> Pharmacy Management</h1></div>
<div id="left_column">
<div id="button">
<ul>
<li><a href="admin.php">Dashboard</a></li>
			<li><a href="admin_pharmacist.php">Pharmacist</a></li>
			<li><a href="admin_manager.php">Manager</a></li>
			<li><a href="admin_cashier.php">Cashier</a></li>
			<li><a href="view_customer2.php">View Customer</a></li>
            <li><a href="view_invoice2.php">View Invoice</a></li>
			<li><a href="out_of.php">Out of Stock</a></li>
            <li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
    
 <!-- Dashboard icons -->
            <div class="grid_7">
            	<a href="admin.php" class="dashboard-module">
                	<img src="images/admin_icon.png" width="75" height="75" alt="edit" />
                	<span><b>Dashboard</b></span>
                </a>
                <a href="admin_pharmacist.php" class="dashboard-module">
                	<img src="images/pharmacist_icon.png"  width="75" height="75" alt="edit" />
                	<span><b>Pharmacist</b></span>
                </a>

				<a href="view_invoice2.php" class="dashboard-module">
                	<img src="images/Invoice.png"  width="100" height="100" alt="edit" />
                	<span><b>View Invoice</b></span>
                
                <a href="admin_manager.php" class="dashboard-module">
                	<img src="images/manager_icon.png"  width="75" height="75" alt="edit" />
                	<span><b>Manager</b></span>
                </a>
                  
                <a href="admin_cashier.php" class="dashboard-module">
                	<img src="images/cashier_icon.png" width="75" height="75" alt="edit" />
                	<span><b>Cashier</b></span>
                </a>
				<a href="view_customer2.php" class="dashboard-module">
                	<img src="images/customer.png" width="100" height="100" alt="edit" />
                	<span><b>View Customer </b></span>
                </a>				  
			</div>
</div>
<div id="footer"></div>
</div>
</body>
</html>
