<?php session_start();
	 
	 $con = mysqli_connect("localhost","root","root","thilina");
	 
	 if(!$con) 
	 {
		die("Sorry !!! we are facing technical issue"); 
	 }
	 
	 $sql = "DELETE FROM `tblproduct` WHERE `tblproduct`.`productID` = ".$_GET["productID"];	 
	 
	 if(mysqli_query($con,$sql))
	 {
		 header('Location:adminPage.php');
	 }
?>