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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="web.css">
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


    <?php 
        $_SESSION["productID"] = $_GET["productID"];
        
        $con = mysqli_connect("localhost","root","root","thilina");
        
        if(!$con) 
        {
            die("Cannoy connect to DB server."); 
        }
        
        $sql = "SELECT * FROM `tblproduct` WHERE  `productID` = '".$_GET["productID"]."'";	
        
        $result = mysqli_query($con,$sql);
        
        $row = mysqli_fetch_assoc($result);
    ?>
    <div class="form-container">
        <h1>Upadate Product Details</h1>
        <form id="RegForm" action="./editHandler.php" method="post" enctype="multipart/form-data">
            <label>Product Name</label>
            <input type="text" name="name" value="<?php echo $row["name"];?>" >
            <label>Product Image</label>
            <input type="file" name="imageFile" >
            <label>Product Price</label>
            <input type="number" placeholder="price" name="price" value="<?php echo $row["price"];?>">           
            <button type="sumbit" class="btn" name="btnSubmit">update details</button>
            <?php $_SESSION["imagePath"] = $row["imagePath"];?>
        </form>
    </div>
<script>
    var MenuItems=document.getElementById("MenuItems");

    MenuItems.style.maxHeight="0px";

    function menutoogle(){
        if(MenuItems.style.maxHeight=="0px")
        {
            MenuItems.style.maxHeight="200px";
        }
        else
        {
            MenuItems.style.maxHeight="0px";
        }
    }
</script>
</body>
</html>