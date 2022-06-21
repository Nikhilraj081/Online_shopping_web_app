<?php
	session_start();
	$session="";
	if(isset($_SESSION['user_name']))
	{

		$session=$_SESSION['user_name'];
	}
  
?>
<?php
    $value=$_GET['data'];
    $con=new mysqli("localhost","root","","iwp_project");
    if($con->connect_error)
    {
        die("connection failed:".connect_error);
    }
    $sql="select * from product where product_category LIKE'%{$value}%'";
    $ima=mysqli_query($con,$sql);
    
?>
<body style="background-color:white">
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
        <div style="width:100%;height:auto;display:inline-flex;">
            <?php
                if(mysqli_num_rows($ima)>0)
                {    echo "<div style='margin-top:90px;'>";
                    while($row=mysqli_fetch_assoc($ima))
                    {
                        echo "<div style='display:inline-flex;'>";
                        echo "<table style='display:inline-flex;padding-left:5px;padding-top:10px;padding-bottom:10px;margin-top:-15px;'>";
                                echo "<tr>";
                                    echo "<td> 
                                            <a href='product_detail.php?data=".$row['product_id']." ' style='text-decoration:none'><div style='margin-top:--30px;width:211px;height:300px;background-color:white;margin-left:0px;border:1px solid black'>
                                                <img src='".$row['product_image']."' width='211px' height='200px'></br>
                                                 <h3 style='margin-left:10px;color:grey'>".$row['product_brand']."</h3>
                                                 <p style='margin-left:10px;margin-top:-20px;color:black;font-size:18px'>".$row['product_name']."</p>
                                                 <p style='margin-left:10px;margin-top:-10px;color:black;font-size:23px'>Rs ".$row['product_price']."</p>
                                               
                                            </div></a>";
                                       
                                    echo "</td>";
                                echo "</tr>";
                        echo "</table>";
                        echo "</div>";
                    }
                    echo "</div>";
                }
                else
                {
                    echo "<div style='width:100%;height:600px'> <h1 style='padding-left:530px;padding-top:200px;color:grey'>Product not found</h1></div>";
                   
                }

            ?>

        </div>
    <?php include("footer.php");?>
</body>
