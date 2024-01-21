<?php session_start();
    
    $con =mysqli_connect("localhost","root","root","thilina");
    
    if(!$con) 
    {
        die("Cannot connect with DB server"); 
    }


    $sql="DELETE FROM `tblcart` WHERE `productID`='".$_GET["productID"]."' AND `email` = '".$_SESSION["userName"]."';";

    if(mysqli_query($con,$sql))
    {
        header('Location:cart.php');
    }
    else
    {
        echo "can't add to cart";
    }

?>