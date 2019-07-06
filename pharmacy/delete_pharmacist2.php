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
$id=$_GET[pharmacist_id];
$sql="DELETE FROM pharmacist WHERE pharmacist_id='$id'";
mysqli_query($con,$sql);
//$rows=mysql_fetch_assoc($result);
header("location:view.php");
?>
