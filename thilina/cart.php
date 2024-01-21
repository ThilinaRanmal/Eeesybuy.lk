<?php session_start();
if(!isset($_SESSION["userName"]))
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
    <title>add product</title>
    <link href="../../CSS/Mobile_Planet.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="web.css">
    <style>
    html{
        font-size: 16px;
    }
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Manrope', sans-serif;
    }

    body{
        background: #f6f5f7;
    }

   .navbar{
     border-bottom: #D3D3D3 solid 1px;
   }

    img{
        display: block;
    }

    .link-wrapper{
        background-color: rgb(80, 200, 120);
        border-radius:0.5em ;
        align-self: center;
        margin: 0.5em;
    }
    
    /*hamburger button customization*/
    .check{
        display: none;
    }

    .button .button-img{
        height: 30px;
        width: 30px;
    }

    .button{
        position: absolute;/* this will psuh button to top*/
        display: none;
        top:1rem;
        right: 1rem;
    }

    /*buttons hover*/
    .nav-links a:hover{
        background-color:rgb(34,139,34);
    }
    .link-wrapper a:hover{
        background-color:rgb(34,139,34);
        border-radius: 0.5em;
    }

    /*body content */
    main{
    display: flex;
    justify-content: center;
    width: 100%;
    padding:5em 0.5em 0 0.5em;
    }

    /*Product form */
    h2{
        margin-bottom: 1em;
        text-align: center;
    }
    form{
        display: flex;
        flex-direction: column;
    }
    form>*{
        padding: 0.3em 0.3em ;
        margin-bottom: 0.3em;
        display: block;
        font-size: 1.3em;
    }

    .container{
        padding: 2em;
        margin-top: 1em;
        height: 100%;
        display: flex;
        flex-direction: column;
        background-color:#D3D3D3;
        border-radius: 0.5em;
    }

    .inputBox{
        padding: 0.3em;
        font-size: 1.1em;
    }
    
    #btnSubmit{
        padding: 0.5em;
        background-color: rgb(80, 200, 120);
        margin: 1em 0 0 0;
    }

    #btnSubmit:hover{
        background-color:rgb(34,139,34);   
    }


    /* product */
    .product{
        display: flex;
        height: 10%;
        flex-direction: row;
        margin: 0.5em 0;

    }
    .imageBox{
        height: 10%;
        width: 10%;
    }

    .imageBox>img{
        height: 100px;
        width: 100px;
    }

    h2{
        text-align: center;
    }

    #totalSubmit{
        background-color: #ff523b;
        color: white;
    }
    .removeBtn{
        color: brown;
    }
    </style>
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
                    <li><a href="./prodct.php">products</a></li>
                    <li><a href="./login.php">Account</a></li>
                </ul>
            </nav>
            <a href="./cart.php"><img src="./images/cart.png" width="30px" height="30px"></a>
            <img src="./images/menu.png" class="menu-icon"onclick="menutoogle()">
        </div>
    </div>
<div style="padding-left:22%; padding-right:22%">


    <main>  
        <div class="container">
        <u><h2> Your Cart </h2></u>
        <form action="paymentHandler.php" method="post">
        <?php   
        
                $con =mysqli_connect("localhost","root","root","thilina");
                
                if(!$con) 
                {
                    die("Cannot connect with DB server"); 
                }
                
                $cartQuery = "SELECT `productID` FROM `tblcart` WHERE `email` ='".$_SESSION["userName"]."'";
                
                $cartResult = mysqli_query($con,$cartQuery);
            if(mysqli_num_rows($cartResult)>0)
            {

                foreach ($cartResult as $value)
                    {
                        
                        $sql = "SELECT * FROM `tblproduct` WHERE `productID`='".$value['productID']."';";
                    

                        $result = mysqli_query($con,$sql);	

                    
            ?>
                <div class="product">
                        <?php
                            if(mysqli_num_rows($result)>0)
                            {
                            while($row = mysqli_fetch_assoc($result)) 
                                {
                        ?>                                     
                                <div class="imageBox">
                                    <img src="<?php echo $row["imagePath"]?>" alt="">
                                </div>
                                <label class="inputBox" >Product Name</label>   
                                <input type="text" class="inputBox" name="name[]" value="<?php echo $row["name"]?>" readonly>
                                <label class="inputBox">price</label>
                                <input type="text"  value="<?php echo $row["price"]?>" name="price[]" class="price inputBox" readonly> 
                                <label class="inputBox">Quantity</label>   
                                <input type="number"  name="qty[]" class="qty inputBox" min="1" max="100" value="1">
                                <input type="text" class="inputBox" name="email" value="<?php echo $_SESSION["userName"]?>" hidden>
                                <a  href="removeCart.php?productID=<?php echo $row["productID"];?>" class="removeBtn inputBox"> remove product</a>
                        <?php   }
                            } 
                            
                        ?> 

                </div>
            <?php 
                    }
            }
            ?> 
            <span>Total Payment</span><input value="0" type="number" name="total" id="total" readonly>
            <input id="totalSubmit" type="submit" name="paymentBtn" value="check out">    
        </div>
        <script>
    document.addEventListener("DOMContentLoaded", function () {
        updateCartTotal();

        // Remove button
        let removeButtons = document.querySelectorAll(".removeBtn");
        removeButtons.forEach(function (rmvBtn) {
            rmvBtn.addEventListener('click', removeCartItem);
        });

        // Calculate total when qty changes
        let qtyInputs = document.querySelectorAll(".qty");
        qtyInputs.forEach(function (input) {
            input.addEventListener('change', qtyChanged);
        });

        // Calculate total when size changes
        let sizes = document.querySelectorAll(".price");
        sizes.forEach(function (size) {
            size.addEventListener('change', updateCartTotal);
        });
    });

    function qtyChanged(event) {
        let input = event.target;
        if (isNaN(input.value) || input.value <= 0) {
            input.value = 1;
        }
        updateCartTotal();
    }

    function removeCartItem(event) {
        var buttonClicked = event.target;
        buttonClicked.parentElement.remove();
        updateCartTotal();
    }

    function updateCartTotal() {
        var products = document.querySelectorAll(".product");
        var total = 0;

        products.forEach(function (product) {
            var price = parseFloat(product.querySelector(".price").value);
            var qty = parseInt(product.querySelector(".qty").value);

            total += price * qty;
        });

        document.getElementById("total").value = total;
    }
</script>

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
    </main>
</body>
</html>