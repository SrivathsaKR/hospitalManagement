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
?>
<!DOCTYPE html>
<html>
<head>
<title><?php $user?> Pharmacy Management</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function1.js" type="text/javascript"></script>
   <style>#left-column {height: 477px;}
 #main {height: 477px;}
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
<div id="tabbed_box" class="tabbed_box">  
    <h4>View  Invoice</h4> 
<hr/>	
    <div class="scroll">  

      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View Invoice</a></li>  
            <!-- <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add Invoice</a></li>   -->
              
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
		
        $result = mysqli_query($con,"SELECT c.cust_name,s.drug_name,i.qty,s.cost,i.date_in FROM invoice_entry i,stock s,customer c WHERE i.cus_id_fk=c.cust_id AND i.dr_id_fk=s.stock_id"); 
        // or die(mysqli_error());
        
                
// display data in table

echo "<table border='1' cellpadding='5' align='center'>";
echo "<tr><th>CustomerName</th><th>Drug Name</th><th>Quantity</th><th>Cost</th><th>Date</th></tr>";

// loop through results of database query, displaying them in the table
while($row = mysqli_fetch_array( $result )) {
        
        // echo out the contents of each row into a table
        echo "<tr>";
        
        echo '<td>' . $row['cust_name'] . '</td>';
        echo '<td>' . $row['drug_name'] . '</td>';
        echo '<td>' . $row['qty'] . '</td>';
        echo '<td>' . $row['cost'] . '</td>';
        echo '<td>' . $row['date_in'] . '</td>';
        
        ?>
        <!-- <td><a href="update_customer.php?cust_id=<?php echo $row['cust_id']?>"><img src="images/update-icon.png" width="35" height="35" border="0" hspace="5"/></a></td>
        <td><a href="delete_customer.php?cust_id=<?php echo $row['cust_id']?>"><img src="images/delete-icon.png" width="35" height="35" border="0" hspace="5" /></a></td> -->
        <?php
 } 
// close table>
echo "</table>";
?> 
</div>  
</div>  

</div>  
</div>
<div id="footer" align="Center"> </div>
</div>
</body>
</html>