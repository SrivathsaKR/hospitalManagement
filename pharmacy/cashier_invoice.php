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
$cus_id_fk=$_POST['cus_id_fk'];
$dr_id_fk=$_POST['dr_id_fk'];
$qty=$_POST['qty'];



// $sql1=mysqli_query($con,"SELECT * FROM customer WHERE username='$user'");
// // or die(mysqli_error());
//  $result=mysqli_fetch_array($sql1);
//  if($result>0){
// $message="<font color=blue>sorry the username entered already exists</font>";
//  }
 $query="SELECT quantity from drug WHERE drug_id='$dr_id_fk'";
 $exec=mysqli_query($con,$query);
 $res = mysqli_fetch_assoc( $exec );
if($qty<=$res['quantity']){
 $sql=mysqli_query($con,"INSERT INTO invoice_entry(cus_id_fk,dr_id_fk,qty,date_in)
VALUES('$cus_id_fk','$dr_id_fk','$qty',DATE(NOW()))");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/cashier_invoice.php");
}else{
$message1="<font color=red>Insertion Failed, Try again</font>";
}
 }
 else{
    $message3="Quantity Over The Limit!!";
    // echo $message3;
    echo "<script type='text/javascript'>alert('$message3');</script>";
}
	}
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
<body>
<div id="content">
<div id="header">
<h1> Pharmacy Management</h1></div>
<div id="left_column">
<div id="button">
<ul>
			<li><a href="cashier.php">Dashboard</a></li>
			<li><a href="cashier_invoice.php">Invoice</a></li>
			<li><a href="cashier_stock.php"target="_top">View Stock</a></li>
            <li><a href="cashier_customer.php"target="_top">Customer</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>Manage Invoice</h4> 
<hr/>	
    <div class="scroll">  

      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View Invoice</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add Invoice</a></li>
            <!-- <li><a href="javascript:tabSwitch('tab_3', 'content_1');" id="tab_2">Add Invoice</a></li>   -->
              
        </ul>  
          
        <div id="content_1" class="content">  
			<?php echo $message;
			  echo $message1;
			  
		/* 
		View
        Displays all data from 'Manager' table
		*/

        // connect to the database
        include_once('connect_db.php');

        // get results from database
		
        $result = mysqli_query($con,"SELECT * FROM invoice_entry"); 
                // or die(mysqli_error());
				
					    
        // display data in table
        
        echo "<table border='1' cellpadding='5' align='center'>";
        echo "<tr><th>CustomerID </th><th>Drug ID</th><th>Quantity</th><th>Date</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                
                echo '<td>' . $row['cus_id_fk'] . '</td>';
                echo '<td>' . $row['dr_id_fk'] . '</td>';
				echo '<td>' . $row['qty'] . '</td>';
                echo '<td>' . $row['date_in'] . '</td>';
                
				?>
				<!-- <td><a href="update_customer.php?cust_id=<?php echo $row['cust_id']?>"><img src="images/update-icon.png" width="35" height="35" border="0" hspace="5"/></a></td>
				<td><a href="delete_customer.php?cust_id=<?php echo $row['cust_id']?>"><img src="images/delete-icon.png" width="35" height="35" border="0" hspace="5" /></a></td> -->
				<?php
		 } 
        // close table>
        echo '</table>';
?> 
        </div> 




        <div id="content_1" class="content">
        <form name="form99" onsubmit="return validateForm(this);" action="print_invoice.php" method="post" >
			<table width="220" height="106" border="0" >	
				<tr><td align="center"><input name="cus_id_fk" type="text" style="width:170px" placeholder="Customer ID" required="required" id="cus_id_fk" /></td></tr>
				<!-- <tr><td align="center"><input name="dr_id_fk" type="text" style="width:170px" placeholder="Drug ID" required="required" id="dr_id_fk" /></td></tr>
				<tr><td align="center"><input name="qty" type="number" min="0" style="width:170px" placeholder="Quantity" required="required" id="qty"/></td></tr>   -->
				<!-- <tr><td align="center"><input name="date_in" type="number" min="0" style="width:170px" placeholder="Address" required="required" id="date_in" /></td></tr>   -->
 
				
                <!-- <tr><td align="center"><input name="email" type="email" style="width:170px" placeholder="Email" required="required" id="email" /></td></tr>   
				<tr><td align="center"><input name="username" type="text" style="width:170px" placeholder="Username" required="required" id="username" /></td></tr>
				<tr><td align="center"><input name="password" type="password" style="width:170px" placeholder="Password" required="required" id="password"/></td></tr> -->

				<tr><td align="right"><input name="submit" type="submit" value="Display Invoice"/></td></tr>
            </table>
		</form>
        
        
               </div> 
        <div id="content_2" class="content">  
		           <!--Cashier-->
		<?php echo $message;
			  echo $message1;
			  ?>
		<form name="form99" onsubmit="return validateForm(this);" action="cashier_invoice.php" method="post" >
			<table width="220" height="106" border="0" >	
				<tr><td align="center"><input name="cus_id_fk" type="text" style="width:170px" placeholder="Customer ID" required="required" id="cus_id_fk" /></td></tr>
				<tr><td align="center"><input name="dr_id_fk" type="text" style="width:170px" placeholder="Drug ID" required="required" id="dr_id_fk" /></td></tr>
				<tr><td align="center"><input name="qty" type="number" min="0" style="width:170px" placeholder="Quantity" required="required" id="qty"/></td></tr>  
				<!-- <tr><td align="center"><input name="date_in" type="number" min="0" style="width:170px" placeholder="Address" required="required" id="date_in" /></td></tr>   -->
 
				
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
