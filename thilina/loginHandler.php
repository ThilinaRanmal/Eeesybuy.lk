<?php session_start();
 if(isset($_POST["btnSubmit"]))
 {
	 $userName = $_POST["email"];
	 $password = $_POST["password"];
	 
	 $con = mysqli_connect("localhost","root","root","thilina");
	 
	 if(!$con) 
	 {
		die("Sorry !!! we are facing technical issue"); 
	 }
	 
	 $sql = "SELECT * FROM `tbluser` WHERE `email` = '".$userName."' and `password` = '".$password."'";
	 
	 $result = mysqli_query($con,$sql);	 
	 
	 if(mysqli_num_rows($result)>0)
	 {

		$row=mysqli_fetch_assoc($result);
		$user_type = $row['type'];

		if($user_type==1){
			$_SESSION["adminName"] = $userName;
			header('Location:adminPage.php');
		}
		elseif($user_type==0){
			$_SESSION["userName"] = $userName;
			header('Location:home.html');
		}
	 }
	 else
	 {
		  header('Location:login.php');
	 } 
 }
?>
