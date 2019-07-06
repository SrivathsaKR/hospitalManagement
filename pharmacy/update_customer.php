<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['cashier_id'];
$fname=$_SESSION['first_name']; 
$lname=$_SESSION['last_name'];
$sid=$_SESSION['staff_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}


if(isset($_POST['submit'])){
    $cname=$_POST['cust_name'];
    $age=$_POST['age'];
    $sex=$_POST['sex'];
    $postal=$_POST['address'];
    $phone=$_POST['phone'];
$cust_id=$_GET['cust_id'];
//$username=$_POST['username'];

$sql="UPDATE customer SET cust_name='$cname', age='$age', sex='$sex', address='$postal', phone_n0='$phone' WHERE cust_id='$cust_id'";
$res=mysqli_query($con,$sql);
if($res){header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/cashier_customer.php");}
else{
	$message1="<font color=red>Update Failed, Try again</font>";
	}
}
// Retrieve data from database 



// if(mysqli_query($con,$sql)) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/stock_pharmacist.php");


?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $username;?> - Pharmacy Management</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function.js" type="text/javascript"></script>
<script>
// function validateForm()
// {

// //for alphabet characters only
// var str=document.myform1.drug_name.value;
// 	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 123456789";
// 	//comparing user input with the characters one by one
// 	for(i=0;i<str.length;i++)
// 	{
// 	//charAt(i) returns the position of character at specific index(i)
// 	//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
// 	if(valid.indexOf(str.charAt(i))==-1)
// 	{
// 	alert("Invalid Name");
// 	document.myform1.drug_name.value="";
// 	document.myform1.drug_name.focus();
// 	return false;
//     }
// }
	
// if(document.myform1.drug_name.value=="")
// {
// alert("Name Field is Empty");
// return false;
// }

// //for alphabet characters only
// // var str=document.form99.last_name.value;
// // 	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
// // 	//comparing user input with the characters one by one
// // 	for(i=0;i<str.length;i++)
// // 	{
// // 	//charAt(i) returns the position of character at specific index(i)
// // 	//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
// // 	if(valid.indexOf(str.charAt(i))==-1)
// // 	{
// // 	alert("Last Name Cannot Contain Numerical Values");
// // 	document.form1.last_name.value="";
// // 	document.form1.last_name.focus();
// // 	return false;
// // 	}}
	

// // if(document.form1.last_name.value=="")
// // {
// // alert("Name Field is Empty");
// // return false;
// // }

//  }

</script>
 <style>
 <style>
#left_column{height: 470px;}
</style>
<style>
div.scroll {
      height:350px;
	  overflow-y: scroll;
}
</style>
</head>
</head>
<body>
<div id="content">
<div id="header">
<h1> Pharmacy Management</h1></div>
<div id="left_column">
<div id="button">
<ul>
<li><a href="cashier.php">Dashboard</a></li>
			<li><a href="view_invoice2.php">View Invoice</a></li>
			<li><a href="payment.php"target="_top">Process Payment</a></li>
            <li><a href="cashier_customer.php"target="_top">Customer</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>Manage Customer</h4> 
<hr/>	
    <div class="scroll">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Update Customer</a></li>  
              
        </ul>  
          
        <div id="content_1" class="content">  
		<?php echo $message1;?>
		<form name="form99" onsubmit="return validateForm(this);" action="" method="post" >
			<table width="220" height="106" border="0" >	
				<tr><td align="center"><input name="cust_name" type="text" style="width:170px" placeholder="Customer Name" required="required" id="cust_name" /></td></tr>
				<tr><td align="center"><input name="age" type="text" style="width:170px" placeholder="Age Age" required="required" id="age" /></td></tr>
				<tr><td align="center"><input name="sex" type="text" style="width:170px" placeholder="Sex" required="required" id="sex"/></td></tr>  
				<tr><td align="center"><input name="address" type="text" style="width:170px" placeholder="Address" required="required" id="address" /></td></tr>  
				<tr><td align="center"><input name="phone" type="text" style="width:170px"placeholder="Phone"  required="required" id="phone" /></td></tr>  
				
                <!-- <tr><td align="center"><input name="email" type="email" style="width:170px" placeholder="Email" required="required" id="email" /></td></tr>   
				<tr><td align="center"><input name="username" type="text" style="width:170px" placeholder="Username" required="required" id="username" /></td></tr>
				<tr><td align="center"><input name="password" type="password" style="width:170px" placeholder="Password" required="required" id="password"/></td></tr> -->

				<tr><td align="right"><input name="submit" type="submit" value="Submit"/></td></tr>
            </table>
		</form>
		</div>  
    </div>  
</div>
</div>
<div id="footer" align="Center"> </div>
</div>
</body>
</html>