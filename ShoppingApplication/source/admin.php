<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $filename=$_FILES["imageupload"]["name"];
    $tempname=$_FILES["imageupload"]["tmp_name"];
    $folder="product_image/".$filename;
    $pname=$_POST["pname"];
    $pcateg=$_POST["pcateg"];
    $pbrand=$_POST["brand"];
    $pprice=$_POST["price"];
    $color=$_POST["color"];
    $con=new mysqli("localhost","root","","iwp_project");
    if($con->connect_error)
    {
        die("connection failed:".connect_error);
    }
    $sql="insert into product values('','','$pname','$pcateg','$pbrand',$pprice,'$color','$folder','','','','')";
    mysqli_query($con,$sql);
    $last_id=mysqli_insert_id($con);
    $product_id="pro00".$last_id;
    if($last_id)
    {
        $sql="update product set product_id='$product_id' where id=$last_id";
        mysqli_query($con,$sql);
    }
    move_uploaded_file($tempname,$folder);
    /*$sql="select * from product where product_id='pro009'";
    $ima=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($ima);
    echo $row['product_image'];*/
}


?>
<html>
<form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
    name:<input type="text" name="pname"><br>
    category:<input type="text" name="pcateg"><br>
    brand:<input type="text" name="brand"><br>
    price:<input type="text" name="price"><br>
    color:<input type="text" name="color"><br>
    image:<input type="file" name="imageupload"><br>
    <input type="submit"><br>
    <!--<?php echo "<img src='".$row['product_image']."' width='300' height='300'>"; ?> -->
</form>
</html>