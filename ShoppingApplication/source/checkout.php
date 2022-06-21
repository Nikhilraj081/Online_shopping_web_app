<?php
	session_start();
	$session="";
	if(isset($_SESSION['user_name']))
	{

		$session=$_SESSION['user_name'];
	}
    if(isset($_SESSION['user_id']))
    {
        $session2=$_SESSION['user_id'];
       
    }
    $con=new mysqli("localhost","root","","iwp_project");
    if($con->connect_error)
    {
        die("connection failed:".connect_error);
    }
    $sql="select * from address where user_id='$session2'";
    $ima=mysqli_query($con,$sql); 
?>
<?php
     if(isset($_GET['address']))
     {
     $_SESSION['address_id']=$_GET['address'];
     }
     if(isset($_GET['price']))
     {
         $_SESSION['price']=$_GET['price'];
     }
     if(isset($_GET['pid']))
     {
        $_SESSION['pid']=$_GET['pid'];
     }
     if(isset($_GET['size']))
     {
        $_SESSION['size']=$_GET['size'];
     }
     $rem=$_GET['rem'];
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
       
        $address_id=$_SESSION['address_id'];
        $mode=$_POST['selection'];
        if($mode=="cash")
        {
            
             if(isset($_SESSION['val_a']))
            {
                foreach($_SESSION['val_a'] as $id)
                {
                    $sql="select * from cart where cart_id=$id";
                    $query=mysqli_query($con,$sql);
                    $row=mysqli_fetch_assoc($query);
                    $product_id=$row['product_id'];
                    $price=$row['product_price'];
                    $user_id=$row['user_id'];
                    echo $address_id;
                    $sql="insert into purchased values('',$price,now(),now(),'YOUR ORDER HAS BEEN PLACED','$size','$product_id','$address_id','$user_id')";
                    mysqli_query($con,$sql);
                }
                if($rem=='yes')
                {
                    $sql="delete from cart where user_id='$session2'";
                    mysqli_query($con,$sql);
                } 
                echo "<script> alert('Your order is placed Sucessfully')</script>";
                header("Location:myaccount.php?data=myorder");
                unset($_SESSION['address_id']);
                unset($_SESSION['val_a']);
            
            }
            else
            {
                $price=$_SESSION['price'];
                $product_id=$_SESSION['pid'];
                $size=$_SESSION['size'];
                echo $price.",";
                echo $product_id.",";
                echo $address_id;
                echo $size;
                $sql="insert into purchased values('',$price,now(),now(),'YOUR ORDER HAS BEEN PLACED','$size','$product_id','$address_id','$session2')";
                if(mysqli_query($con,$sql))
                { 
                    echo "executed";
                    unset( $_SESSION['price']); 
                    unset($_SESSION['pid']);
                    unset($_SESSION['size']);
                    unset($_SESSION['address_id']);
                    echo $price;
                    echo "<script> alert('Your order is placed Sucessfully')</script>";
                    header("Location:myaccount.php?data=myorder");
                }
                else
                {
                    echo mysqli_error($con);
                }
            }
            
        }
        
    }
    
?>
<body style="background-color:#e6e6e6;background-repeat:no-repeat;background-attachment:fixed;">
    <?php include("header.php");?>
            <script> 
	  		    value="<?php echo $session; ?>".split(" ");			  
			    if(value!="")
			    {
				    var x=document.getElementById("log_img");
				    x.style.visibility="hidden";
				     var y=document.getElementById("log_text");
				     y.style.visibility="hidden";
				    document.getElementById("myac").innerHTML=value[0].charAt(0).toUpperCase()+value[0].slice(1);	
			    }
	        </script>
            <table>
              <tr>
                <td>
                    <div id="mydiv1" style="width:100%;height:480px;">
                       <form  method="post" action="checkout.php?rem=<?php echo $rem; ?>">
                        <div style="background-color:#2B60DE;;width:650px;height:33px;margin-left:30px;margin-top:100px;padding:6px 20px;"> <a href="address.php" style="text-decoration:none;"><p style="font-size:18px;margin-top:10px;color:white;">Choose Payment Option</p></a></div>
                        <div style="background-color:white;width:650px;height:20px;margin-left:30px;margin-top:0px;padding:20px 20px;"> 
                            <input type="radio" value="upi" name="selection"><lable>&nbsp;&nbsp;&nbsp;UPI</lable>                          
                        </div>
                        <div style="background-color:white;width:650px;height:20px;margin-left:30px;margin-top:1px;padding:20px 20px;">
                             <input type="radio" value="" name="selection"><lable>&nbsp;&nbsp;&nbsp;Credit/Debit/Atm Card</lable>
                         </div>
                        <div style="background-color:white;width:650px;height:20px;margin-left:30px;margin-top:1px;padding:20px 20px;">
                            <input type="radio" value="" name="selection"><lable>&nbsp;&nbsp;&nbsp;Net Banking</lable>
                         </div>
                        <div style="background-color:white;width:650px;height:20px;margin-left:30px;margin-top:1px;padding:20px 20px;"> 
                            <input type="radio" value="cash" name="selection"><lable>&nbsp;&nbsp;&nbsp;Cash On Delivery</lable>
                        </div>
                        <div style="background-color:white;width:650px;height:50px;margin-left:30px;margin-top:1px;padding:10px 20px;"> 
                            <input type="submit" value="Place Order" style="width:150px;height:40px;font-size:17px;margin-left:0px;background-color:orange">
                        </div>
                      </form>
                    </div>
                </td>
                <td>
                        <img src='logo/payment2.png' style='width:600px;height:500px;margin-top:0px;margin-left:20px;position:'>    
                </td>
              </tr>   
            </table> 
                   
    <?php include("footer.php");?>
</body>