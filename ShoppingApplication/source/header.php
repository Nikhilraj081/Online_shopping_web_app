<!doctype html>
<html>
<head>
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
			  function search()
			  {
				  var ser=document.getElementById("search").value;
				  window.location.href="product_view.php?data="+ser;
			  }
</script>
<?php
	
	
?>
	  
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php echo '<link rel="stylesheet" href="slideshow.css " type="text/css">'; ?>
<?php echo '<link rel="stylesheet" href="header.css " type="text/css">'; ?>
<?php echo '<link rel="stylesheet" href="loginform.css " type="text/css">'; ?>
<?php echo '<link rel="stylesheet" href="index.css " type="text/css">'; ?>
<?php echo '<link rel="stylesheet" href="footer.css " type="text/css">'; ?>
<?php echo '<link rel="stylesheet" href="registrationform.css " type="text/css">'; ?>
	<div class="div_h" style="position:fixed;width:1350px;" id="myHeader" >
		<div style=margin->
		
		</div>
		
	   	<input id="search" type="text" placeholder="search.." style="width:300px;height:31px;margin-top:15px;margin-left:600px;outline:none;padding:10px;">
	  	<div style="margin-left:900px;margin-top:-29.8px;height:29px;width:27px;background-color:white;">
	  		<input type="image" name="search" src="logo/search.png" onclick="search();" style="outline:none;height:15px;width:15px;padding:5px;">
	  	</div>
		<div id="login" style="background-color:black;margin-top:-37px;margin-left:1000px;width:50px;height:50px;display:inline-flex;">
		    <img id="log_img" src="logo/user.png" style="padding-left:7px;padding-top:5px;width:23px;height:23px;"> <p id="log_text" style="margin-top:2px;color:white;font-size:18px;padding:5px;cursor:default;"><a href="login.php" style="color:white;text-decoration:none;">Login</a></p>
			<div class="dropdown" style=" color:white;margin-top:-12px;margin-left:-50px;">
				<h4 id="myac" style="font-family:system-ui; cursor:pointer;"></h4>
				<div class="dropdown-content">	
   					<a href="myaccount.php?data=myorder">My Account</a>
					<a href="logout.php?data=logout">Logout</a>
    				
    				
  				</div>
    		</div>	

		</div>
		<div style="background-color:black;margin-top:-43px;margin-left:1120px;width:50px;height:40px;display:inline-flex;">
			<img src="logo/cart.png" style="padding-left:4px;height:23px;width:23px" > <a href="cart.php?data=index" style="text-decoration:none"> <p style="margin-top:-4px;color:white;font-size:18px;padding:5px;cursor:;">Cart</p></a>
		</div>
		<div style="display:inline-flex;margin-top:-55px;">
		<a href="index.php"><img src="logo/mainlogo.png" style="width:150px;height:70px;margin-left:20px;margin-top:-5px;"></a>
			<div class="dropdown" style=" color:white;margin-top:-1px;margin-left:100px;">
				<h4 style="font-family:system-ui; cursor:pointer">MEN</h6>
				<div class="dropdown-content">
    				<a href="product_view.php?data=jeans">Jeans</a>
   					<a href="product_view.php?data=shirt">Shirt</a>
    				<a href="product_view.php?data=shoes">Shoes</a>
					<a href="product_view.php?data=tshirt">T-shirt</a>
   					<a href="product_view.php?data=watches">Watches</a>
    				
  				</div>
			</div>
			<div class="dropdown" style="color:white;margin-top:-1px;margin-left:30px;">
				<h4 style="font-family:system-ui; cursor:pointer">WOMEN</h6>
				<div class="dropdown-content">
					<a href="product_view.php?data=saree">Sarees</a>
   					<a href="product_view.php?data=kurti">Kurti</a>
    				<a href="product_view.php?data=top">Top</a>
					<a href="product_view.php?data=sandle">Sandle</a>
   					<a href="product_view.php?data=handbag">Handbag</a>
  				</div>
			</div>
			<div class="dropdown" style="color:white;margin-top:-1px;margin-left:30px;">
			<a href="myaccount.php?data=myorder" style="text-decoration:none"><h4 style="font-family:system-ui; cursor:pointer;color:white">MY ACCOUNT</h6></a>
				<div class="dropdown-content">
    				
  				</div>
    		</div>
		</div>
	</div>
</head>


    