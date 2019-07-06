<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['pharmacist_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
// $query = "SELECT * FROM stock";
// $res = mysqli_query($con,$query);
// $row = mysqli_fetch_assoc($res);
// $stock_id=$row['stock_id'];


if(isset($_POST['submit'])){
$dname=$_POST['drug_name'];
$category=$_POST['category'];
$descr=$_POST['description'];
// $company=$_POST['company'];
// $sup=$_POST['supplier'];
$quant=$_POST['quantity'];
$drug_id=$_GET['drug_id'];
//$username=$_POST['username'];
$cost=$_POST['cost'];
$sql="UPDATE drug SET quantity='$quant',category=$category,description=$descr,cost=$cost WHERE drug_id='$drug_id'";
$res=mysqli_query($con,$sql);
if($res){header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/stock_pharmacist.php");}
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
			<li><a href="pharmacist.php">Dashboard</a></li>
			<!-- <li><a href="admin_pharmacist.php">Pharmacist</a></li> -->
			<li><a href="prescription.php">Prescription</a></li>
			<li><a href="stock_pharmacist.php">Stock</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
		</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>Manage Stock</h4> 
<hr/>	
    <div class="scroll">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Update Stock</a></li>  
              
        </ul>  
          
        <div id="content_1" class="content">  
		<?php echo $message1;?>
		<form name="myform" onsubmit="return validateForm(this);" action="" method="post" >
			<table width="420" height="106" border="0" >	
				 <tr><td align="center"><input name="drug_name" type="text" style="width:170px" placeholder="Drug Name  " required="required" id="drug_name" /></td></tr>
				<tr><td align="center"><input name="category" type="text" style="width:170px" placeholder="Category" required="required" id="category"/></td></tr>
				<tr><td align="center"><input name="description" type="text" style="width:170px" placeholder="Description" required="required" id="description" /></td></tr>
				<!-- <tr><td align="center"><input name="company" type="text" style="width:170px" placeholder="Manufacturing Company"  required="required" id="company" /></td></tr>  
				<tr><td align="center"><input name="supplier" type="text" style="width:170px" placeholder="Supplier" required="required" id="supplier" /></td></tr>    -->
				<tr><td align="center"><input name="quantity" type="number" min="0" style="width:170px" placeholder="Quantity" required="required" id="quantity" /></td></tr>  
				<tr><td align="center"><input name="cost" type="text" style="width:170px" placeholder="Unit Cost" required="required" id="cost" /></td></tr>  
				<tr><td align="center"><input name="submit" type="submit" value="Submit" id="submit"/></td></tr>
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