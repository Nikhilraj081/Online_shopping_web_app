<?php
	session_start();
	$session="";
    if(isset($_SESSION['user_id']))
    {
        $session2=$_SESSION['user_id'];
       
    }
	if(isset($_SESSION['user_name']))
	{

		$session=$_SESSION['user_name'];
       
        
       
        $con=new mysqli("localhost","root","","iwp_project");
        if($con->connect_error)
        {
            die("connection failed:".connect_error);
        }
        $value=$_GET['data'];
        if(isset($_GET['price']))
        {
             $price=$_GET['price'];
        }
        if(isset($_GET['size']))
        {
             $size=$_GET['size'];
        }
        $refresh=isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL']==='max-age=0';
        if(!$refresh)
        {
            if($value!="index")
            { 
                $sql="insert into cart values('$value',$price,'$session2','','$size')";
                $ima=mysqli_query($con,$sql);
            }
            
        }
        $sql="select product.product_name,product.product_category,product.product_brand,product.product_price,product.product_image,product.product_id,cart.user_id,cart.cart_id from product inner join cart on product.product_id=cart.product_id and cart.user_id='$session2';";
        $ima=mysqli_query($con,$sql);
       
	}
    else
    {
        header("Location:login.php");
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
      
       <div id="my_div1" style="width:100%;height:auto;padding-top:20px;">
           <table style="width:100%;height:auto;">
              <tr>
                <td style="margin-top:-200px;">
                <?php
                 $total=0;
                if(mysqli_num_rows($ima)>0)
                {
                    $row2=array();
                    echo "<div style='margin-top:58px;'>";
                    while($row=mysqli_fetch_assoc($ima))
                    {
                        $total+=$row['product_price'];
                       
                        echo "<table style='margin-top:0px;display:block;padding-left:5px;padding-top:10px;padding-bottom:0px;'>";
                        echo "<tr>";
                            echo "<td> 
                                   <div style='width:800px;height:200px;background-color:white;margin-left:70px;margin-top:-15px;border-radius:2px'>
                                        <img src='".$row['product_image']."' width='180px' height='150px' style='float:left;margin-top:20px;margin-left:70px'></br>
                                         <h3 style='margin-left:270px;color:grey'>".$row['product_brand']."</h3>
                                         <p style='margin-left:270px;margin-top:-20px;color:black;font-size:18px'>".$row['product_name']."</p>
                                         <p style='margin-left:270px;margin-top:-10px;color:black;font-size:23px'>Rs ".$row['product_price']."</p>
                                         <a href='logout.php?data=".$row['cart_id']."&remove=true' target='' style='text-decoration:none;'> <p style='margin-left:270px;font-size:20px;color:red;text-decoration:none;' >Remove</p> </a>
                                       
                                    </div>";
                               
                            echo "</td>";
                        echo "</tr>";
                        echo "</table>";
                        array_push($row2,"".$row['cart_id']."");
                       
                    }
                    echo "</div>";
                    $no_of=mysqli_num_rows($ima);
                    $dc="";
                    if($total<=500)
                    {
                        $dc="50";
                        $total+=(int)$dc;
                    }
                    else
                    {
                        
                        $dc="Free"; 
                        
                    }
                     echo "</td>
                     <td>
                     </td>
                        <div style='background-color:white;width:300px;height:300px;float:right;margin-top:130px;margin-left:1000px;position:fixed;border-style:outset;'>
                            <p style='font-size:20px;margin-left:20px;'>price($no_of items)</p>
                            <p style='font-size:20px;margin-left:20px;'>Delivery Charge</p>
                            <p style='float:right;font-size:20px;margin-top:-40px;margin-right:10px;color:green'>$dc</p>
                            <p style='font-size:30px;margin-left:20px;'>Total Price</p>
                            <p style='float:right;font-size:20px;margin-top:-55px;margin-right:10px;'>Rs $total</p>
                            <a href='select_address.php?price=$total&rem=yes&size=' style='text-decoration:none'><input type='button' value='Place Order' style='background-color:orange;margin-left:52px;width:200px;height:40px;border:none;margin-top:40px;font-size:20px'>
                        </div>
                    </tr>
                    </table>";
                    $_SESSION['val_a']=$row2;
                    if($no_of<=3)
                    {
                        echo "<div style='height:250px;'></div>";
                    }
                }
                else
                {
                    echo "<div style='background-color:;width:100%;height:300px;'>";
                           echo "<p style='font-size:30px;margin-top:300px;margin-left:570px;'>No Items Found</p>" ;
                    echo "</div>";
   
                }
                
           ?>
             
        </div>
    <?php include("footer.php");?>
</body>
