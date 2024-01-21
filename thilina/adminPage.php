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
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <link rel="stylesheet" href="web.css">
    <title>admin panel</title>

    <style>
        #editBtn{
            color: blue;
            border: 1px solid blue;
            margin: 0.3em;
            padding:0 0.2em;
        }
        #deleteBtn{
            color: red;
            border: 1px solid red;
            margin: 0.3em;
            padding: 0 0.2em;
        }
        #productheader{
            padding: 2em;
            margin-top: 2em;
            text-align: center;
        }
        #pageName{
            text-align: center;
        }
        .mainContainer{
            background: radial-gradient(#fff,#ffd6d6);
        }
    </style>
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
                    <li><a href="">About</a></li>
                    <li><a href="./addProduct.php">Add product</a></li>
                    <li><a href="./login.php">Account</a></li>
                </ul>
            </nav>
            <img src="./images/cart.png" width="30px" height="30px">
            <img src="./images/menu.png" class="menu-icon"onclick="menutoogle()">
        </div>
        
    </div>
</div>

<h1 id="pageName">Admin Page</h1>
<div class="mainContainer">
    <h2 id="productheader">Products on the display</h2>
    <div class="row">
    
            <?php
                $con =mysqli_connect("localhost","root","root","thilina");
    
                if(!$con)
                {
                    die("Cannot connect with DB server");
                }
    
                $sql = "SELECT * FROM `tblproduct`";
    
                $result = mysqli_query($con,$sql);
    
                if(mysqli_num_rows($result)>0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
    
            ?>
                <div class="col-4">
                    <img src="<?php echo $row["imagePath"]?>" alt="product image">
                    <h2><?php echo $row["name"]?></h2>
                    <p>Price: Rs <?php echo $row["price"]?></p>
                    <a href="editProduct.php?productID=<?php echo $row["productID"];?>" id="editBtn">Edit Details</a>
                    <a href="deleteProduct.php?productID=<?php echo $row["productID"];?>" id="deleteBtn">Remove Product</a>
                </div>
                <?php
                    }
                }
                mysqli_close($con);
            ?>
    </div>
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