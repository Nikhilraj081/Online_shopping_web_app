
<?php
    $url="select_address.php?".$_SERVER['QUERY_STRING'];
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
?>
<?php
if(isset($_GET['price'])) 
$price=$_GET["price"];
if(isset($_GET['rem']))
$rem=$_GET['rem'];
if(isset($_GET['data']))
{
$pid=$_GET['data'];
}
if(isset($_GET['size']))
{
$size=$_GET['size'];
}

?>
<?php
$output="";
$con=new mysqli("localhost","root","","iwp_project");
if($con->connect_error)
{
    die("connection failed:".connect_error);
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=$_POST["uname"];
    $umob=$_POST["mob"];
    $pin=$_POST["pin"];
    $city=$_POST["city"];
    $state=$_POST["state"];
    $lmark=$_POST["lmark"];
    $address=$_POST["address"];
    $sql="insert into address values('','$name','$umob','$address','$city','$state','$pin','$lmark','$session2')";  
    if($name==""||$umob==""||$pin==""||$city==""||$state==""||$address=="")
    {
        $output="Please Fill All Detail";
    }
    elseif(strlen($umob)!=10)
    {
        $output="Invalid Mobile nNumber";
       
    }
    elseif(strlen($pin)!=6)
    {
        $output="Please enter valid pin code";
    }
    else
    {
        $ima=mysqli_query($con,$sql); 
        header("Location:select_address.php".'?'.$_SERVER["QUERY_STRING"]);      
    }   
}
?>
<body>
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
        <div class="r_login" style="height:700px">
            <div class="r_login_s" style="margin-top:90px;height:430px;width:610px;margin-left:340px;">
                <form class="form_r"  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <h2 style="margin-left:200px;margin-top:-20px;margin-bottom:10px;">ADD ADDRESS</h2><br>
                    <input class="" type="text" placeholder="Enter Name" name="uname" style="height:45px;" ><br>
                    <input type="text" placeholder="Enter Mobile No" name="mob" style="margin-left:310px;margin-top:-63px;height:45px;">                 
                    <input type="text" placeholder="Enter Pincode" name="pin" style="height:45px;"><br>
                    <input class="" type="text" placeholder="Enter City" name="city" style="margin-left:310px;margin-top:-63px;height:45px;">
                    <input class="" type="text" placeholder="Enter State" name="state" style="height:45px;">
                     <input class="" type="text" placeholder="Enter Landmark(Optional)" name="lmark" style="margin-left:310px;margin-top:-45px;height:45px;"><br>
                    <textarea  placeholder="Enter Address(Area)" name="address" style="font-family:Calibri, Helvetica, sans-serif;font-size:17px;width:550px;height:70px;margin-left:15px;margin-top:800px outline:none;padding:10px 10px 10px 10px;"></textarea><br><br>
                    <input type="submit" value="Add Address" style="width:200px;height:40px;font-size:18px;padding:0px 0px 0px 0px;margin-left:200px;background-color:#FFA07A;border:none;">
                    <p style="margin-left:30px;color:red;font-size:18px"><?php echo $output; ?></p>

                </form>

            </div>
        </div>
    <?php include("footer.php");?>
</body>
