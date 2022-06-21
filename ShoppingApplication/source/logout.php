<?php
session_start();
$session="";
    if(isset($_SESSION['user_id']))
    {
        $session=$_SESSION['user_id'];
    }
    if($_GET['data']=="logout")
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location:index.php"); 
    }
    else if($_GET['remove']=="true")
    {
        $product=$_GET['data'];
        $con=new mysqli("localhost","root","","iwp_project");
        if($con->connect_error)
        {
            die("connection failed:".connect_error);
        }
        $sql="delete from cart where cart_id='$product' and user_id='$session'";
        mysqli_query($con,$sql);
        header("Location:cart.php?data=index");

    }
    else
    {
        header("Location:cart.php?data=index");
    }
    
    
?>