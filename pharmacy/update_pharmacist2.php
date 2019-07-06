<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['manager_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
$query = "SELECT * FROM pharmacist";
$res = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($res);
$username=$row['username'];

if(isset($_POST['submit'])){
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$sid=$_POST['staff_id'];
$postal=$_POST['postal_address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
//$username=$_POST['username'];
$pas=$_POST['password'];
 
// get value of id that sent from address bar
$user=$_POST['user'];

// Retrieve data from database 
$sql="UPDATE pharmacist SET first_name='$fname', last_name='$lname', staff_id='$sid',
postal_address='$postal',phone='$phone',email='$email', password='$pas' WHERE username='$username'";
if(mysqli_query($con, $sql)) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/manager.php");
}else{
$message1="<font color=red>Update Failed, Try again</font>";
}}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php $username?> Pharmacy Management</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
 <style>#left-column {height: 477px;}
 #main {height: 477px;}
 #lol {
	 position:relative;
	 left:120px;
	 margin-top:0px;
	 margin-bottom:0px;
	 color:black;
	 border-style:solid;
	 margin-right:239px;
	 border-width:2px;
	 padding-left:2px;
	 background-color: rgba(0, 0, 255, 0.3);
 }
 </style>
 <style>
div.scroll {
      height:350px;
	  overflow-y: scroll;
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
			<li><a href="view_prescription.php">View Prescription</a></li>
			<li><a href="stock.php">Manage Stock</a></li>
			<li><a href="view_customer1.php">View Customer</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>Manage Pharmacist</h4> 
<hr/>	
    <div class="scroll">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Update Pharmacist</a></li>  
              
        </ul>  
          
        <div id="content_1" class="content">  
		<?php echo $message1;?>
          <form name="myform" onsubmit="return validateForm(this);" action="update_pharmacist2.php" method="post" >
			<table width="420" height="106" border="0" >	
				<tr><td align="center"><input name="first_name" type="text" style="width:170px" placeholder="First Name" value="<?php include_once('connect_db.php'); echo $_GET['first_name']?>" id="first_name" /></td></tr>
				<tr><td align="center"><input name="last_name" type="text" style="width:170px" placeholder="Last Name" id="last_name" value="<?php include_once('connect_db.php'); echo $_GET['last_name']?>" /></td></tr>
				<tr><td align="center"><input name="staff_id" type="text" style="width:170px" placeholder="Staff ID" id="staff_id" value="<?php include_once('connect_db.php'); echo $_GET['staff_id']?>" /></td></tr>  
				<tr><td align="center"><input name="postal_address" type="text" style="width:170px" placeholder="Address" id="postal_address" value="<?php include_once('connect_db.php'); echo $_GET['postal_address']?>" /></td></tr>  
				<tr><td align="center"><input name="phone" type="text" style="width:170px" placeholder="Phone" id="phone" value="<?php include_once('connect_db.php'); echo $_GET['phone']?>" /></td></tr>  
				<tr><td align="center"><input name="email" type="email" style="width:170px" placeholder="Email" id="email"value="<?php include_once('connect_db.php'); echo $_GET['email']?>" /></td></tr>  

				<!-- <tr><td align="center"><input name="username" type="text" style="width:170px" placeholder="Username" id="username"value="<?php include_once('connect_db.php'); echo $_GET['username']?>" /></td></tr> -->
				<?php echo "<tr><td><p id='lol' >".$row['username']."</p></td></tr>"; ?>

				<tr><td align="center"><input name="password" placeholder="Password" id="password"value="<?php include_once('connect_db.php'); echo $_GET['password']?>"type="password" style="width:170px"/></td></tr>
				<tr><td align="center"><input name="submit" type="submit" value="Update"/></td></tr>
            </table>
		</form>
		</div>  
    </div>  
</div>
</div>
<div id="footer" align="Center"></div>
</div>
</body>
</html>