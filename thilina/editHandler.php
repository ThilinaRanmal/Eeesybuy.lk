<?php session_start();
   
  $con = mysqli_connect("localhost","root","root","thilina");

    if(!$con) 
	 {
		die("Cannot connect to DB server."); 
	 }
        $productname = $_POST["name"];
        $price = $_POST["price"];
        

		if(!file_exists($_FILES['imageFile']['tmp_name']) || 
		   !is_uploaded_file($_FILES['imageFile']['tmp_name']))
		{
			$image = $_SESSION["imagePath"];
		}
		else
		{
			$image = "images/".basename($_FILES["imageFile"]["name"]);
	        move_uploaded_file($_FILES["imageFile"]["tmp_name"],$image);
		}
	
	 
	 if(!$con) 
	 {
		die("Sorry !!! we are facing technical issue"); 
	 }
	 
	 $sql = "UPDATE `tblproduct` SET `name` = '".$productname."', `imagePath` = '".$image."', `price` = '".$price."' WHERE `tblproduct`.`productID` = ".$_SESSION["productID"].";";
	  
	 if(mysqli_query($con,$sql))	
	 {
		 header('Location:adminPage.php');
	 }
?>