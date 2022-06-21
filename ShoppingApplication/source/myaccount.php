<?php
	session_start();
	$session="";
    $error="";
	if(isset($_SESSION['user_name']))
	{

		$session=$_SESSION['user_name'];
	}
    if(isset($_SESSION['user_id']))
    {
        $session2=$_SESSION['user_id'];
       
    }
    else
    {
        header("Location:login.php");  
    }
?>
<?php
                
    $con=new mysqli("localhost","root","","iwp_project");
    if($con->connect_error)
     {
        die("connection failed:".connect_error);
     }
    $sql="select product.product_name,product.product_brand,product.product_image,address.user_address,address.user_city,address.user_state,address.user_pincode,purchased.address_id,purchased.purchase_price,purchased.purchase_date,purchased.purchase_time,purchased.purchase_status from product  join purchased on product.product_id=purchased.product_id join address on purchased.address_id=address.address_id and address.user_id='$session2';  ";
    $ima=mysqli_query($con,$sql);                
?>
<body style="background-color:#e6e6e6;background-repeat:no-repeat;background-attachment:fixed;">
     <style>
            .my_div1
            {
                padding-left:100px;
                padding-top:;
            }
            .my_div1 input
            {
                margin-bottom:10px;
                width:250px;
                height:40px;
                padding-left:30px;
                padding-top:6px;
                font-size:18px;
                color:grey;
            }
            .my_div1 label
            {
                margin-top:10px;
                margin-bottom:10px;
                font-size:19px;
            }
     </style>
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
                    <div style="float:left;margin-top:540px;">
                        <table  style='margin-top:0px;display:block;padding-left:5px;padding-top:10px;padding-bottom:0px;float:left;'>
                            <tr>
                                <td >
                                    <a href="myaccount.php?data=update" style="text-decoration:none;"><div onMouseOver="style.color='blue'" onMouseOut="style.color='black'" style='width:230px;height:40px;background-color:white;padding:10px ;margin-left:20px;margin-top:-470px;border-radius:2px'>
                                            <p style="margin-left:30px;font-size:18px;">UPDATE ACCOUNT</p>  
                                    </div></a>
                                    <a href="myaccount.php?data=myorder" style="text-decoration:none;"><div onMouseOver="style.color='blue'" onMouseOut="style.color='black'" style='width:230px;height:40px;background-color:white;padding:10px ;margin-left:20px;margin-top:1px;border-radius:2px'>
                                            <p style="margin-left:50px;font-size:18px;">MY ORDER</p>  
                                    </div></a>
                                    <a href="cart.php?data=index" style="text-decoration:none;"><div onMouseOver="style.color='blue'" onMouseOut="style.color='black'" style='width:230px;height:40px;background-color:white;padding:10px ;margin-left:20px;margin-top:1px;border-radius:2px'>
                                            <p style="margin-left:50px;font-size:18px;">MY CART</p>  
                                    </div></a>
                                    <a href="myaccount.php?data=chng_pass" style="text-decoration:none;"><div onMouseOver="style.color='blue'" onMouseOut="style.color='black'" style='width:230px;height:40px;background-color:white;padding:10px ;margin-left:20px;margin-top:1px;border-radius:2px'>
                                            <p style="margin-left:20px;font-size:18px;">CHANGE PASSWORD</p>  
                                    </div></a>
                                    <a href="logout.php?data=logout" style="text-decoration:none;"><div onMouseOver="style.color='blue'" onMouseOut="style.color='black'" style='width:230px;height:40px;background-color:white;padding:10px ;margin-left:20px;margin-top:1px;border-radius:2px'>
                                            <p style="margin-left:50px;font-size:18px;">LOGOUT</p>  
                                    </div></a>
                                </td>
                            </tr>
                        </table>
                    </div>
      <div id="my_div1" style="width:100%;height:auto;padding-top:20px;">
           <table style="width:100%;height:auto;">
              <tr>
                <td>
                    <?php
                    if(isset($_GET['data']))
                    {
                    $data=$_GET['data'];
                    if($data=="myorder")
                    {
                    
                        if(mysqli_num_rows($ima)>0)
                         {
                             echo "<div style='margin-top:-470px;px;float:right;'>";
                            while($row=mysqli_fetch_assoc($ima))
                            {
                                echo "<table style='margin-top:0px;display:block;padding-left:5px;padding-top:10px;padding-bottom:0px;'>
                                 <tr>
                                    <td> 
                                        <div style='width:1000px;height:200px;background-color:white;margin-left:-120px;margin-top:-15px;border-radius:2px'>
                                            <img src='".$row['product_image']."' width='180px' height='150px' style='float:left;margin-top:20px;margin-left:70px'></br>
                                            <h3 style='margin-left:270px;color:grey'>".$row['product_brand']."</h3>
                                            <p style='margin-left:270px;margin-top:-20px;color:black;font-size:18px'>".$row['product_name']."</p>
                                            <p style='margin-left:270px;margin-top:-10px;color:black;font-size:23px'>Rs ".$row['purchase_price']."</p>
                                            <p style='margin-left:270px;margin-top:-10px;color:green;font-size:15px'><span style='color:black'>STATUS:</span>&nbsp;&nbsp;".$row['purchase_status']."</p>
                                             
                                       
                                         </div>
                               
                                    </td>
                                </tr>
                                </table>";
                            }   
                            echo "</div>";
                        }
                        else
                        {
                            echo "<div style='margin-top:-470px;px;float:right;'>
                                    <p style='margin-left:-750px;margin-top:200px;font-size:40px;color:grey'>NO ITEM</p>
                            </div>";
                        }
                    }
                    else if($data=="update")
                    {
                        $output="";
                        if($_SERVER["REQUEST_METHOD"]=="POST")
                        {
                            $name=$_POST['name'];
                            $id=$_POST['id'];
                            $mob=$_POST['mob'];
                            echo $mob;
                            if(strlen($mob)!=10)
                            {
                                $error="ENTER VALID MOBILE NUMBER";
                            }
                            else
                           {
                                $sql="update user set user_name='$name',user_id='$id',user_mobile=$mob where user_id='$session2'";
                                mysqli_query($con,$sql);
                                $output="ACCOUNT UPDATED SUCESSFULLY";
                            }

                          
                        }
                        $sql2="select * from user where user_id='$session2'";
                        $fetch=mysqli_query($con,$sql2) ;
                        $row=mysqli_fetch_assoc($fetch);
                        echo "<div style='margin-top:-470px;px;float:right;'>";
                        echo "<table style='margin-top:0px;display:block;padding-left:5px;padding-top:10px;padding-bottom:0px;'>
                            <tr>
                                <td> 

                                    <form  method='post' action='myaccount.php?data=update'>
                                            <div style='width:700px;height:400px;background-color:white;margin-left:-920px;margin-top:-15px;border-radius:2px'>
                                                <br>
                                                <br>
                                                    <div class='my_div1'style=''>
                                                        <label >Name</label><br>
                                                        <input type='text' name='name' value='".$row['user_name']."' style=''><br>
                                                        <label>User Id</label><br>
                                                        <input type='text' name='id' value='".$row['user_id']."'><br>
                                                         <label>Mobile Number</label><br>
                                                        <input type='number' name='mob' value='".$row['user_mobile']."'><br><br>
                                                        <input type='submit' value='UPDATE' style='color:black;width:150px;height:40px;margin-left:;padding-left:10px;background-color:orange;'><br><br>
                                                        <label style='color:red'>$error</label>
                                                        <label style='color:green'>$output</label>
                                                        

                                                    </div>
                                       
                                            </div>
                                    </form>
                               
                                </td>
                            </tr>
                            </table>";
                       
                        echo "</div>";
                    }
                    else if($data=="chng_pass")
                    {
                        $output="";
                        if($_SERVER["REQUEST_METHOD"]=="POST")
                        {
                            $pass=$_POST['pass'];
                            $cpass=$_POST['cpass'];
                            $crpass=$_POST['crpass'];
                            if($pass!=$cpass)
                            {
                                $error="Password not matched with Confirm password";
                            }
                            elseif(strlen($pass)<8||strlen($pass)>20)
                            {
                                $error="password should not be less than 8 character and greater than 20 character ";
                            }
                            elseif(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $pass))
                            {
                                $error="password should be atleast one uppercase,lowercase,number & special caracter";
                            }
                            else
                           {
                                $sql2="select user_pass from user where user_id='$session2' and user_pass='$crpass'";
                                $ref=mysqli_query($con,$sql2);
                                if(mysqli_num_rows($ref)>0)
                                {
                                    $sql="update user set user_pass='$pass' where user_id='$session2'";
                                    mysqli_query($con,$sql);
                                    $output="Password Changed";
                                }
                                else
                                {
                                    $error="Current Password Is Wrong";
                                }
                            }

                          
                        }
                        echo "<div style='margin-top:-470px;px;float:right;'>";
                        echo "<table style='margin-top:0px;display:block;padding-left:5px;padding-top:10px;padding-bottom:0px;'>
                            <tr>
                                <td> 

                                    <form  method='post' action='myaccount.php?data=chng_pass'>
                                            <div style='width:700px;height:400px;background-color:white;margin-left:-920px;margin-top:-15px;border-radius:2px'>
                                                <br>
                                                <br>
                                                    <div class='my_div1'style=''>
                                                         <label>CURRENT PASSWORD</label><br>
                                                        <input type='text' name='crpass' ><br><br>
                                                        <label >NEW PASSWORD</label><br>
                                                        <input type='text' name='pass'  style=''><br>
                                                        <label>CONFIRM PASSWORD</label><br>
                                                        <input type='text' name='cpass' ><br>                                                        
                                                        <input type='submit' value='CHANGE' style='color:black;width:150px;height:40px;margin-left:;padding-left:10px;background-color:orange;'><br><br>
                                                        <label style='color:red'>$error</label>
                                                        <label style='color:green'>$output</label>
                                                        

                                                    </div>
                                       
                                            </div>
                                    </form>
                               
                                </td>
                            </tr>
                            </table>";
                       
                        echo "</div>";
                    }
                    else
                    {
                        echo"no data";
                    }
                    }
                    ?>
                </td>
             </tr>
          </table>

        </div>
     <?php include("footer.php");?>
</body>