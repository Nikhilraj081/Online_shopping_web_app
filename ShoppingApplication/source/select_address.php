<?php
	session_start();
	$session="";
	if(isset($_SESSION['user_name']))
	{

		$session=$_SESSION['user_name'];
	}
    else
    {
      header("Location:login.php"); 
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
    $size="";
    $price="";
    $rem="";
    if(isset($_GET['price'])) 
        $price=$_GET["price"];
    if(isset($_GET['rem']))
        $rem=$_GET['rem'];
    $pid="";
    if(isset($_GET['data']))
    {
        $pid=$_GET['data'];
    }
    if(isset($_GET['size']))
    {
        $size=$_GET['size'];
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
                    <div id="mydiv1" style="width:100%;height:800px;">
                        <div style="background-color:white;width:650px;height:40px;margin-left:30px;margin-top:100px;padding:10px 20px;"> <a href="address.php?data=<?php echo $pid ?>&rem=<?php echo $rem ?>&price=<?php echo $price ?>&size=<?php echo $size ?>" style="text-decoration:none;"><p style="font-size:18px;margin-top:10px;color:#2B60DE;">+ &nbsp;&nbsp;&nbsp;Add New Address</p></a></div>
                   
                    <?php
                        if(mysqli_num_rows($ima)>0)
                        {
                            echo "<div style='margin-top:4px;'>";
                            while($row=mysqli_fetch_assoc($ima))
                            {
                                echo "
                                    <div style='background-color:white;width:650px;height:110px;margin-left:30px;margin-top:0px;padding:10px 20px;margin-bottom:4px;'>
                                    <form  >
                                        <div style='display:inline-flex;margin-top:-15px;'>
                                        <p style='font-size:20px;'>".ucwords($row['user_name'])."&nbsp;&nbsp;&nbsp;</p><p style='font-size:17px;margin-top:23px;'>".$row['user_mobile_no']."</p>
                                        </div>
                                        <br>
                                        <div style='display:inline-flex;margin-top:-30px;'>
                                        <p >".ucwords($row['user_address'])."</p>
                                        <p >,".ucwords($row['user_city'])."</p>
                                        <p>,".ucwords($row['user_state'])."-</p>
                                        <p >".ucwords($row['user_pincode'])."</p>
                                        </div>
                                        <br>
                                       <a href='checkout.php?size=$size&price=$price&rem=$rem&pid=$pid&address=".$row['address_id']."' style='text-decoration:none;'> <input type='button' value='Deliver Here' style='background-color:orange;border:none;margin-left:0px;width:130px;height:30px;padding:0px;font-size:15px;'></a>
                                    </form>
                                    </div>
                                ";
                               
                                
                            }
                            echo "</div>";
                        }

                    ?>
                    </div>
                </td>
                <td>
                <img src='logo/delivery.png' style='width:650px;height:550px;margin-top:-200px;margin-left:-50px;position:'>
                    
                </td>
      </table>
      

    <?php include("footer.php");?>
</body>