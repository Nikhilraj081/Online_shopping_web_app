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
$uid=$_POST["uid"];
$pass=$_POST["pass"];
$cpass=$_POST["cpass"];
$sql="select * from user where user_id='$uid'";
$conmail=mysqli_query($con,$sql);
    if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$uid) || $uid=="")
    {
        $output="Invalid mail Id";
        if($uid=="")
        {
            $output="Please enter mail id";
        }
    }
    elseif(strlen($pass)<8||strlen($pass)>20)
    {
        $output="password should not be less than 8 character and greater than 20 character ";
    }
    elseif(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $pass))
    {
        $output="password should be atleast one uppercase,lowercase,number & special caracter";
    }
    elseif($pass!=$cpass || $pass==""||$cpass==""||strlen($pass)<8)
    {
        $output="Confirm password is not matched";
        if($pass=="")
        {
            $output="Please enter password";
        }
        if($cpass=="")
        {
            $output="Please enter confirm password";
        }
       
    }
    elseif($name=="")
    {
        $output="Please enter name";
    }
    elseif(mysqli_num_rows($conmail)>0)
    {
        $row=mysqli_fetch_assoc($conmail);
        if($uid==isset($row['user_id']))
        {
            $output="You are already register";
        }
       
    }
    else
    {
        $sql="insert into user values('$uid','$pass','$name',NULL)";
        if(mysqli_query($con,$sql))
        {
            echo "<h1>sucessfully</h1>";
            header("Location:login.php");
        }
        else
        {
             echo "error:".$sql."<br>".mysqli_error($con);
        }
    }
    
}
?>
<body>
    <?php include("header.php");?>
        <div class="r_login" style="height:600px">
            <div class="r_login_s" style="margin-top:90px;height:430px">
                <form class="form_r" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <h2 style="margin-left:50px;margin-top:-20px;margin-bottom:10px;">REGISTRATION</h2>
                    <label>NAME</label>
                    <input class="" type="text" placeholder="Enter Name" name="uname"><br>
                    <label>EMAIL Id</label>
                    <input type="email" placeholder="Enter Email-Id" name="uid"><br>
                    <label>PASSWORD</label>
                    <input type="password" placeholder="Enter Password" name="pass"><br>
                    <label>CONFIRM PASSWORD</label>
                    <input type="password" placeholder="Enter New Password" name="cpass"><br><br>
                    <input type="submit" value="Continue" style="width:200px;padding:0px 0px 0px 0px;margin-left:40px;background-color:#FFA07A;">
                    <p style="margin-left:10px;color:red;font-size:16px"><?php echo $output; ?></p>

                </form>

            </div>
        </div>
    <?php include("footer.php");?>
</body>
