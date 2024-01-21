<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>all-pro-Divas-online store</title>
    <link rel="stylesheet" href="web.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src="./images/logo black.png" width="125px">
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="home.html">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="./login.php">Account</a></li>
                </ul>
            </nav>
            <a href="./cart.php"><img src="./images/cart.png" width="30px" height="30px"></a>
            <img src="./images/menu.png" class="menu-icon"onclick="menutoogle()">
        </div>
    </div>

<div class="small-container">

    <div class="row row-2">
        <h2>ALL Products</h2>
        <select>
        <option>Default sorting</option>
        <option>sort by price</option>
        <option>Default popularity</option>
        <option>sort by rating</option>
        <option>sort by sale</option>
        </select>
    </div>
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
                <h4><?php echo $row["name"]?></h4>
                <p>Price :$<?php echo $row["price"]?></p>   

                <!-- show add to cart only when users loged -->
                <?php if (isset($_SESSION["userName"])): ?>
                <form action="./addCart.php" method="post">
                    <input type="text" name="productID" value="<?php echo $row["productID"]?>" hidden>  
                    <input type="text" name="userEmail" value="<?php echo $_SESSION["userName"]?>" hidden>                
                    <input type="submit" name="addToCartSubmit" value="add to cart" class="add-cart" >
                </form>
                <?php else: ?>
                    <p style="color: red;">*please sign to buy products*</p>                    
                <?php endif; ?>
            </div>
            <?php
                }
            }		
            mysqli_close($con);		
        ?>


    </div>
    <div class="page-btn">
        <span>1</span>
        <span>2</span>
        <span>3</span>
        <span>4</span> 
    </div>
</div>


<!-----footer----->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3>
                    Download our App
                </h3>
                <p>Download App for Android and ios Mobile phone</p>
                <div class="app-logo">
                    <img src="./images/play-store.png">
                    <img src="./images/app-store.png">
                </div>
            </div>
            <div class="footer-col-2">
                <img src="./images/logo whitw.png">
                <p>Our Purpose is to sustainbly make the plessure 
                    and benefits of sports accessible to the many</p>
            </div>
            <div class="footer-col-3">
                <h3>
                   Useful Links
                </h3>
                <ul>
                    <li>Coupons</li>
                    <li>Blog post</li>
                    <li>Return Policy</li>
                    <li>Join Affiliate</li>
                </ul>
            </div>
            <div class="footer-col-4">
                <h3>
                    Follow US
                </h3>
                <ul>
                    <li>Facebook</li>
                    <li>Twitter</li>
                    <li>Instagram</li>
                    <li>Youtube</li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="copyright">Copyright 2022 -Wako store</p>
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