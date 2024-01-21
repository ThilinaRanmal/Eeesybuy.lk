<?php session_start();
    $con =mysqli_connect("localhost","root","root","thilina");
                
    if(!$con) 
    {
        die("Cannot connect with DB server"); 
    }

    if(isset($_POST["addToCartSubmit"]))
    {
        $sql="INSERT INTO `tblcart` (`productID`, `email`) VALUES ('".$_POST["productID"]."','".$_POST["userEmail"]."');";

        if(mysqli_query($con,$sql))
        {
           header('Location:prodct.php');
        }
        else
        {
            echo "can't add to cart";
        }
    }
?>