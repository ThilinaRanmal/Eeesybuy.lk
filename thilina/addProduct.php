<?php session_start();
if(!isset($_SESSION["adminName"]))
{   
	header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="web.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src="./images/logo black.png" width="125px">
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="home.html">Home</a></li>
                    <li><a href="prodct.php">Products</a></li>
                    <li><a href="./adminPage.php">Admin Page</a></li>
                    <li><a href="./addProduct.php">Add product</a></li>
                    <li><a href="./login.php">Account</a></li>
                </ul>
            </nav>
            <img src="./images/cart.png" width="30px" height="30px">
            <img src="./images/menu.png" class="menu-icon"onclick="menutoogle()">
        </div>
        
    </div>
</div>


<div class="form-container">
    <h1>Enter Product Details</h1>
    <form id="RegForm" action="./addProduct.php" method="post" enctype="multipart/form-data">
            <label>Product Name</label>
            <input type="text" placeholder="product name" name="name">
            <label>Product Image</label>
            <input type="file" name="imageFile">
            <label>Product Price</label>
            <input type="number" placeholder="price" name="price">
            <button type="sumbit" class="btn" name="btnSubmit">add product</button>
    </form>
</div>

    <?php
                if(isset($_POST["btnSubmit"]))
                {
                    $productname = $_POST["name"];
                    $price = $_POST["price"];
                    
                    $image = "images/".basename($_FILES["imageFile"]["name"]);
	                move_uploaded_file($_FILES["imageFile"]["tmp_name"],$image);

                    $con =mysqli_connect("localhost","root","root","thilina");
                    
                    if(!$con) 
                        {
                            die("Sorry !!! we are facing technical issue"); 
                        }
                    
                    $sql = "INSERT INTO `tblproduct`(`productID`, `name`, `price`, `imagePath`) VALUES (NULL, '".$productname."','".$price."','".$image."' );";
                    
                    if(mysqli_query($con,$sql))	
                        {
                            echo "product added sucessfully !!!!";
                        }
                    else
                        {
                        echo "Oops !! Something is wrong , Please select the file again";
                        }
                    }
                ?>

</body>
</html>