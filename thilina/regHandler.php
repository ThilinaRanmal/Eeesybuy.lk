<?php session_start();
if(isset($_POST["btnSubmit"]))
{
	 $name = $_POST["name"];
	 $email = $_POST["email"];
	 $password = $_POST["password"];
	 
	 $con = mysqli_connect("localhost","root","root","thilina");
	 
	 if(!$con) 
	 {
		die("Sorry !!! we are facing technical issue"); 
	 }
	 
	 $sql = "INSERT INTO `tbluser`(`name`, `email`, `password`) VALUES ( '".$name."', '".$email."', '".$password."');";
	 
	 mysqli_query($con,$sql);	
	
     header('Location:home.html');

}
?>
