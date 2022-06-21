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
                 $sql="select * from product where product_id='$value'";
                 $ima=mysqli_query($con,$sql);
                 $row=mysqli_fetch_assoc($ima);
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
        <div style="width:100%;height:650px;">
        <?php
            if(mysqli_num_rows($ima)>0)
            {
               
                echo "<table>";
                    echo "<tr>";
                      echo "<td>";
                echo "<div style='background-color:;float:left;margin-left:70px;margin-top:90px;width:400px;height:600px'>
                  <img src='".$row['product_image']."' style='width:400px; height:450px'>
                  <input  type='button' onclick='go1()' value='ADD TO CART' style='font-size:17px;cursor:pointer;border:none;background-color:yellow;margin-top:10px;float:left;width:180px;height:50px'></a>
                  <input  type='button'onclick='go2()'value='BUY NOW' style='font-size:17px;cursor:pointer;border:none;background-color:orange;margin-top:10px;margin-left:40px;width:180px;height:50px'></a>
                  </div>";
                  echo "</td>";
                  echo "<td>";
                  echo "<div>
                <h2 style='margin-left:30px;margin-top:-120px;color:grey'>".$row['product_brand']."</h2>
                <p style='margin-left:30px;margin-top:-15px;font-size:20px;'>".$row['product_name']."</p>
                <h2 style='margin-left:30px;margin-top:-5px;color:green;font-size:27px;'>RS ".$row['product_price']."</h2>
                <h2 style='margin-left:30px;margin-top:30px;'>Available Offers</h2>
                <img src='logo/discount2.png' style='float:left;margin-left:30px;width:25px;height:25px'>
                <p style='font-size:17px;margin-left:60px'>Special PriceGet extra 10% off (price inclusive of discount)</p><br>
                <img src='logo/discount2.png' style='float:left;margin-left:30px;margin-top:-10px;width:25px;height:25px'>
                <p style='margin-left:60px;margin-top:-10px;font-size:17px;'>Bank Offer5% Unlimited Cashback on state Bank Credit Card</p><br>
               
                </div>
                ";
                 
                    echo " <p style='font-size:25px;margin-left:30px'>Size</p>";
                 if($row['size1']!="")
                      echo " <input type='radio' name='select1' value='small' id='small' checked style='margin-left:30px'><span style='font-size:20px;'>Small</span>";
                  if($row['size2']!="")
                      echo "<input type='radio'  name='select1' value='medium' id='medium'><span style='font-size:20px;'>Medium</span>";
                  if($row['size3']!="")
                      echo " <input type='radio'  name='select1' value='large' id='large'><span style='font-size:20px;'>Large</span>";
                  if($row['size4']!="")
                    echo " <input type='radio'  name='select1' value='free' id='free' checked style='margin-left:30px'><span style='font-size:20px;'>Free</span>";

                echo "</td>";
                    echo "</tr>";
                echo "</table>";
               
             }
        ?> 
      
        </div>
      <?php include("footer.php");?>

      <script>

        var pid="<?php echo $row['product_id']; ?>";
        var price="<?php echo $row['product_price']; ?>";
        function go1()
        {

          var size=document.getElementsByName("select1");
          for(i=0;i<size.length;i++)
          {
            if(size[i].checked)
            {
              window.location.href="cart.php?data="+pid+ "&price="+price+"&size="+size[i].value;
            }
          }

        }
        function go2()
        {
          var rem="no";
          var size=document.getElementsByName("select1");
          for(i=0;i<size.length;i++)
          {
            if(size[i].checked)
            {
              window.location.href="select_address.php?data="+pid+"&rem="+rem+"&price="+price+"&size="+size[i].value;
            }
          }
           
        }

             
      </script>
</body>
   