<?php
session_start();
$output="";
if(isset($_SESSION['user_name']))
{
    header("Location:index.php");  
    echo "welcome";
    /*session_unset();
    session_destroy();*/
}
/*else
{
    $output="Please login for continue shopping";
}*/

$con=new mysqli("localhost","root","","iwp_project");
if($con->connect_error)
{
    die("connection failed:".connect_error);
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $uid=$_POST["uid"];
    $pass=$_POST["pass"];
    $sql="select * from user where user_id='$uid' and user_pass='$pass'";
    $conmail=mysqli_query($con,$sql);
    if($uid==""||$pass="")
    {
        $output="Invalid userid or password";  
    }
    elseif(mysqli_num_rows($conmail)>0)
    {
        $row=mysqli_fetch_assoc($conmail);
        $_SESSION['user_name']=$row['user_name'];
        $_SESSION['user_id']=$row['user_id'];
        header("Location:index.php");    
    }
    else
    {
        $output="Invalid userid or password";
    }
    
}
?>
<body>
    <?php include("header.php");?>
      <script>
            var x=document.getElementById("log_img");
				 x.style.visibility="hidden";
				 var y=document.getElementById("log_text");
				 y.style.visibility="hidden";
      </script>
        <div class="f_login" style="height:550px" >
            <div class="f_login_s"  style="margin-top:80px">
                <form class="form_f"  style="mergin-top:200px" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <h2 style="margin-left:105px;margin-top:-20px;margin-bottom:50px;">LOGIN</h2>
                    <input type="email" placeholder="Enter Email Id" name="uid">
                    <div style="margin-top:30px;"><input type="password" placeholder="Enter Password" name="pass" ></div>
                     <div style="margin-top:25px;margin-left:75px;">
                        <input type="submit" value="LOGIN" style="width:100px;height:30px;border-radius:10px;padding:0px 0px 0px 0px;background-color:#0099ff;color:white" >
                    </div>
                    <div style="margin-left:65px;margin-top:30px;">
                        <a href="registration.php" style="color:#0052cc;text-decoration:none;font-family:sans-serif;">Create New Account</a>
                    </div>
                    <p style="margin-left:45px;font-size:18px;color:green"><?php echo $output; ?></p>
                </form>

            </div>
        </div>
    <?php include("footer.php");?>
</body>


