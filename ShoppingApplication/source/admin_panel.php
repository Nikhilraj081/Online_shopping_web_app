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
   /* else
    {
        header("Location:login.php");  
    }*/
?>
<?php
                
    $con=new mysqli("localhost","root","","iwp_project");
    if($con->connect_error)
    {
        die("connection failed:".connect_error);
    }
  
                   
?>
<html>
<head>
    <style>
        body
        {
            margin:0px;
            padding:0px;
        }
        .my_div1
            {
                padding-left:100px;
                padding-top:;
            }
            .my_div1 input
            {
                margin-bottom:10px;
                width:250px;
                height:30px;
                padding-left:30px;
                padding-top:6px;
                font-size:18px;
                color:grey;
            }
            .my_div1 input[type="radio"]
            {
                width:15px;
                height:15px;
            }
            .my_div1 input[type="file"]
            {
                width:400px;
                height:40px;
                padding-left:1px;
            }
            .my_div1 label
            {
                margin-top:10px;
                margin-bottom:10px;
                font-size:19px;
            }
            #customers
             {
                 font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                 width: 100%;
            }

            #customers td, #customers th
             {
                border: 1px solid #ddd;
                 padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;}

            #customers th 
            {
             padding-top: 12px;
             padding-bottom: 12px;
             text-align: left;
             background-color: blue;
             color: white;
            }
    </style>
</head>
<body style="background-color:#e6e6e6;background-repeat:no-repeat;background-attachment:fixed;"> 
    <div style="background-color:black;width:100%;height:70px;padding-top:1px">
        <p style="color:white;font-size:25px;margin-left:50px;">Admin Panel</p>
    <div>
    <div style="float:left;margin-top:470px;">
        <table  style='margin-top:0px;display:block;padding-left:5px;padding-top:10px;padding-bottom:0px;float:left;'>
             <tr>
                    <td >
                            <a href="admin_panel.php?data=user" style="text-decoration:none;"><div onMouseOver="style.color='blue'" onMouseOut="style.color='black'" style='width:230px;height:40px;background-color:white;padding:10px ;margin-left:20px;margin-top:-470px;border-radius:2px'>
                            <p style="margin-left:70px;font-size:18px;">USERS</p>  
                            </div></a>
                            <a href="admin_panel.php?data=addp" style="text-decoration:none;"><div onMouseOver="style.color='blue'" onMouseOut="style.color='black'" style='width:230px;height:40px;background-color:white;padding:10px ;margin-left:20px;margin-top:1px;border-radius:2px'>
                            <p style="margin-left:40px;font-size:18px;">ADD PRODUCT</p>  
                             </div></a>
                            <a href="admin_panel.php?data=order" style="text-decoration:none;"><div onMouseOver="style.color='blue'" onMouseOut="style.color='black'" style='width:230px;height:40px;background-color:white;padding:10px ;margin-left:20px;margin-top:1px;border-radius:2px'>
                            <p style="margin-left:58px;font-size:18px;">ORDERS</p>  
                            </div></a>
                            <a href="logout.php?data=logout" style="text-decoration:none;"><div onMouseOver="style.color='blue'" onMouseOut="style.color='black'" style='width:230px;height:40px;background-color:white;padding:10px ;margin-left:20px;margin-top:1px;border-radius:2px'>
                            <p style="margin-left:55px;font-size:18px;">LOGOUT</p>  
                             </div></a>
                    </td>
            </tr>
        </table>
    </div>
    <!--***************************************************-->
    <div id="my_div1" style="width:100%;height:auto;padding-top:20px;">
           <table style="width:100%;height:auto;">
              <tr>
                <td>
                    <?php
                    if(isset($_GET['data']))
                    {
                    $data=$_GET['data'];
                    if($data=="user")
                    {  
                        if($_SERVER["REQUEST_METHOD"]=="POST")
                        {
                            
                            $id=$_POST['id'];
                            $sql="select *from user where user_id LIKE '%{$id}%' ";
                            $ima=mysqli_query($con,$sql); 
                        }
                        else
                        {
                            $sql="select *from user";
                            $ima=mysqli_query($con,$sql); 
                        }                  
                        if(mysqli_num_rows($ima)>0)
                         {
                            
                             echo "<div style='margin-top:-470px;margin-left:300px;margin-right:10px'>";
                             
                             echo "<div style='background-color:;width:320px;height:60px;display:inline-flex;'>
                               <form method='post' action='admin_panel.php?data=user' style='display:inline-flex;'>
                                    <input type='text' placeholder='Enter user id' name='id' style='width:300px;height:35px;padding-left:10px;'>&nbsp;
                                    <input type='submit' value='Search' style='width:90px;height:34px;background-color:#4CAF50;border:none;cursor:pointer;'>
                               </form>
                               
                               
                             </div>";
                                echo "<table id='customers'>
                                     <tr>
                                    <th>User Id</th>
                                    <th>Name</th>
                                    <th>Mobile Number</th>
                                    <th>Operation</th>
                                    </tr>";
                            while($row=mysqli_fetch_assoc($ima))
                            {
                                
                               echo "<tr>
                                    <td>".$row['user_id']."</td>
                                    <td>".$row['user_name']."</td>
                                    <td>".$row['user_mobile']."</td>
                                    <td><a href='myaccount.php?data=update'><button type='button'>UPDATE</button></a></td>
                                        </tr>";
                                       
                                         
                               
                                    
                            }   
                            echo "</table>";
                            echo "</div>";
                        }
                        else
                        {
                            echo "<div style='margin-top:-470px;px;float:right;'>
                                    <p style='margin-left:-750px;margin-top:200px;font-size:40px;color:grey'>NO ITEM</p>
                            </div>";
                        }
                    }
                    else if($data=="addp")
                    {
                        $output="";
                        if($_SERVER["REQUEST_METHOD"]=="POST")
                        {
                            $filename=$_FILES["imageupload"]["name"];
                            $tempname=$_FILES["imageupload"]["tmp_name"];
                            $folder="product_image/".$filename;
                            $pname=$_POST["pname"];
                            $pcateg=$_POST["pcateg"];
                            $pbrand=$_POST["pbrand"];
                            $pprice=$_POST["pprice"];
                            $sql="insert into product values('','','$pname','$pcateg','$pbrand',$pprice,'black','$folder','','','','')";
                            mysqli_query($con,$sql);
                            $last_id=mysqli_insert_id($con);
                            $product_id="pro00".$last_id;
                            if($last_id)
                            {
                                $sql="update product set product_id='$product_id' where id=$last_id";
                                mysqli_query($con,$sql);
                            }
                            move_uploaded_file($tempname,$folder);  
                        }
                        echo "<div style='margin-top:-470px;px;float:right;'>";
                        echo "<table style='margin-top:0px;display:block;padding-left:5px;padding-top:10px;padding-bottom:0px;'>
                            <tr>
                                <td> 

                                    <form  method='post' action='admin_panel.php?data=addp' enctype='multipart/form-data'>
                                            <div style='width:700px;height:480px;background-color:white;margin-left:-950px;margin-top:-25px;border-radius:2px'>
                                                <br>
                                                <br>
                                                    <div class='my_div1'style=''>
                                                        <label >Name</label><br>
                                                        <input type='text' name='pname'  style=''><br>
                                                        <label>Category</label><br>
                                                        <input type='text' name='pcateg'><br>
                                                         <label>Brand</label><br>
                                                        <input type='text' name='pbrand' ><br>
                                                        <label>price</label><br>
                                                        <input type='number' name='pprice' ><br>
                                                       
                                                        <label>Image</label><br>
                                                        <input type='file' name='imageupload'><br><br>
                                                        
                                                        <input type='submit' value='UPDATE' style='color:black;width:150px;height:40px;margin-left:;padding-left:10px;background-color:orange;'><br><br>
                                                        <label style='color:green'>$output</label>
                                                        

                                                    </div>
                                       
                                            </div>
                                    </form>
                               
                                </td>
                            </tr>
                            </table>";
                       
                        echo "</div>";
                    }
                    
                    else if($data=="order")
                    {
                       
                            $sql="select product.product_name,product.product_brand,product.product_image,purchased.purchase_price,purchased.purchase_date,purchased.user_id from product  join purchased on product.product_id=purchased.product_id ;  ";
                            $ima=mysqli_query($con,$sql);                   
                            if(mysqli_num_rows($ima)>0)
                            {
                            
                             echo "<div style='margin-top:-470px;margin-left:300px;margin-right:10px'>";
                                echo "<table id='customers'>
                                     <tr>
                                    <th>Product image</th>
                                    <th>Product Name</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Order Date</th>
                                    <th>Customer Id</th>
                                    <th>Status</th>
                                    </tr>";
                            }
                            while($row=mysqli_fetch_assoc($ima))
                            {
                                
                               echo "<tr>
                                    <td><img src='".$row['product_image']."' style='width:100px;height:100px'></td>
                                    <td>".$row['product_name']."</td>
                                    <td>".$row['product_brand']."</td>
                                    <td>".$row['purchase_price']."</td>
                                    <td>".$row['purchase_date']."</td>
                                    <td>".$row['user_id']."</td>
                                    <td><p style='color:green'>Processing<p></td>
                                        </tr>";
                                       
                                         
                               
                                    
                            }   
                            echo "</table>";
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

</body>
</html>

