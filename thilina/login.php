<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-Divas-online store</title>
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
                    <li><a href="./prodct.php">Products</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">Account</a></li>
                </ul>
            </nav>
            <img src="./images/cart.png" width="30px" height="30px">
            <img src="./images/menu.png" class="menu-icon"onclick="menutoogle()">
        </div>
    </div>
<!-----acc page----->

<div class="acc-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <img src="./images/image1.png" width="100%">
            </div>
            <div class="col-2">
                <div class="form-container">
                    <div class="form-btn">
                        <span onclick="login()">Login</span>
                        <span onclick="Register()">Register</span>
                        <hr id="Indicator">
                    </div>
                    <form id="LoginForm" action="./loginHandler.php" method="post">
                        <input type="email" placeholder="Email" name="email">
                        <input type="password" placeholder="Password" name="password">
                        <button type="sumbit" class="btn" name="btnSubmit">Login</button>
                        <a href="">Forgot password</a>
                    </form>
                    <form id="RegForm" action="./regHandler.php" method="post">
                        <input type="text" placeholder="username" name="name">
                        <input type="email" placeholder="Email" name="email">
                        <input type="password" placeholder="Password" name="password">
                        <button type="sumbit" class="btn" name="btnSubmit">Register</button>
                    </form>
                </div>
            </div>     
        </div>
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

<!------toogle form---->
<script>

    var LoginForm=document.getElementById("LoginForm");
    var RegForm=document.getElementById("RegForm");
    var Indicator=document.getElementById("Indicator");

    function Register(){
        RegForm.style.transform="translateX(0px)";
        LoginForm.style.transform="translateX(0px)";
        Indicator.style.transform="translateX(100px)";
    }
    function login(){
        RegForm.style.transform="translateX(300px)";
        LoginForm.style.transform="translateX(300px)";
        Indicator.style.transform="translateX(0px)";
    }
</script>
</body>
</html>