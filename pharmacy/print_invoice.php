<?php
session_start();
include('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['cashier_id'];
$fname=$_SESSION['first_name']; 
$lname=$_SESSION['last_name'];
$sid=$_SESSION['staff_id'];
$user=$_SESSION['username'];
// $cus_id_fk=$_POST['cus_id_fk'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
if(isset($_POST['submit'])){
    $cus_id_fk=$_POST['cus_id_fk'];
    
    
    
    $sql = "SELECT cus_id_fk,SUM(qty*cost) AS S1
    FROM invoice_entry,drug 
    WHERE cus_id_fk=$cus_id_fk AND dr_id_fk=drug_id
    GROUP BY cus_id_fk";
    $result = mysqli_query($con,$sql);

    $irow=mysqli_fetch_array($result);


    


    //$check = mysqli_fetch_array( $result );
 //    ($result = mysql_query($con,$sql) && mysql_num_rows($result) > 0)
    if(($result == true )&& mysqli_num_rows($result) > 0){
        // $cus_id_fk=4;
        
        // $row = mysqli_fetch_array( $ddetails );
        // header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/print_invoice.php");
       echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>';
echo '<title><?php echo $username;?> - Pharmacy Management</title>';
echo '<link rel="stylesheet" type="text/css" href="style/mystyle.css">';
echo '<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />'; 
echo '<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" />'; 
echo '<script src="js/function.js" type="text/javascript"></script>';
echo '<script>';
echo '</script>';
echo '<style>';
 
echo '#left_column{height: 470px;}';
echo '</style>';

echo '</head>';
echo '<body>';
echo '<div id="content">';
echo '<div id="header">';
echo '<h1> Pharmacy Management</h1></div>';
echo '<div id="left_column">';
echo '<div id="button">';
echo '<ul>';
			echo '<li><a href="cashier.php">Dashboard</a></li>';
			echo '<li><a href="cashier_invoice.php">Invoice</a></li>';
			echo '<li><a href="cashier_stock.php"target="_top">View Stock</a></li>';
            echo '<li><a href="cashier_customer.php"target="_top">Customer</a></li>';
			echo '<li><a href="logout.php">Logout</a></li>';
		echo '</ul>';	
echo '</div>';
echo '</div>';
echo '<div id="main">';
echo '<div id="tabbed_box" class="tabbed_box">';  
 echo  '<h4>Invoice</h4>'; 
echo '<hr/>';	
   echo '<div class="tabbed_area">';  
       echo '<div id="content_1" class="content">';  
			 echo $message;
              echo $message1;
         // display data in table
        
    $csql="SELECT * FROM customer where cust_id='$cus_id_fk'";
    $cdetails=mysqli_query($con,$csql);
    $crow=mysqli_fetch_array($cdetails);
        echo "Name   :<b>" . $crow['cust_name'] . "</b><br><br>";
        echo "Address   :<b>" . $crow['address'] . "</b><br><br>";
        echo "Phone  :<b>" . $crow['phone_n0'] . "</b><br><br>";
        echo "Total Cost :<b>" . $irow['S1'] . "</b><br><br>";
        echo "<table border='1' cellpadding='5' align='center'>";
        echo "<tr><th>Drug Name</th><th>Quantity</th><th>Date</th></tr>";
        
        $dquery="SELECT d.drug_name,i.qty,i.date_in FROM drug d,invoice_entry i WHERE i.cus_id_fk=$cus_id_fk AND i.dr_id_fk=d.drug_id";
        $ddetails=mysqli_query($con,$dquery);
        

        // loop through results of database query, displaying them in the table
        while($row= mysqli_fetch_array($ddetails)) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                
                echo '<td>' . $row['drug_name'] . '</td>';
               
				echo '<td>' . $row['qty'] . '</td>';
                echo '<td>' . $row['date_in'] . '</td>';
                echo "</tr>";
                
				
 
				
		 } 
        // close table>
        echo '</table>';
 
      echo '</div>'; 
   echo '</div>';  
 echo '</div>';
echo '</div>';
echo '<div id="footer" align="Center"> </div>';
echo '</div>';
echo '</body>';
echo '</html>';

    }
    else{
        $message3="Invalid ID!!";
        // echo $message3;
        echo "<script type='text/javascript'>alert('$message3');</script>";
                header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/cashier_invoice.php");
    }
}
?>
