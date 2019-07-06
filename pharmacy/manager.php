<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['manager_id'];
$fname=$_SESSION['first_name'];
$lname=$_SESSION['last_name'];
$sid=$_SESSION['staff_id'];
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
#left_column{
height: 470px;
}
</style>
</head>
<body>
<div id="content">
<div id="header">
<h1> Pharmacy Management</h1></div>
<div id="left_column">
<div id="button">
<ul>
			<li><a href="manager.php">Dashboard</a></li>
			<li><a href="view.php">View Users</a></li>
			
			<li><a href="view_invoice.php">View Invoice</a></li>
			<li><a href="stock.php">View Stock</a></li>
			<li><a href="view_customer1.php">View Customer</a></li>
			<li><a href="out_of2.php">Out of Stock</a></li>

			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
</div>
<div id="main">
<!-- Dashboard icons -->
            <div class="grid_7">
            	<a href="manager.php" class="dashboard-module">
                	<img src="images/manager_icon.png" width="100" height="100" alt="edit" />
                	<span><b>Dashboard</b></span>
                </a>
				<a href="view.php" class="dashboard-module">
                	<img src="images/patients_1.png"  width="100" height="100" alt="edit" />
                	<span><b>View Users</b></span>
                </a>
               	<a href="view_invoice.php" class="dashboard-module">
                	<img src="images/Invoice.png"  width="100" height="100" alt="edit" />
                	<span><b>View Invoices</b></span>
                </a>
				<a href="view_prescription.php" class="dashboard-module">
                	<img src="images/prescri.png" width="100" height="100" alt="edit" />
                	<span><b>View Prescription</b></span>
				</a>
				<a href="stock.php" class="dashboard-module">
                	<img src="images/stock_icon.png" width="100" height="100" alt="edit" />
                	<span><b>View Stock</b></span>
                </a>
				<a href="view_customer1.php" class="dashboard-module">
                	<img src="images/customer.png" width="100" height="100" alt="edit" />
                	<span><b>View Customer</b></span>
                </a>
        </div>
</div>
<div id="footer" align="Center"> </div>
</div>
</body>
</html>
