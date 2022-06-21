<?php
	session_start();
	$session="";
	if(isset($_SESSION['user_name']))
	{

		$session=$_SESSION['user_name'];
	}
?> 
  <body style="width:1350px;">	
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
	 		 <div style="width:1350px;height:auto;margin-left:">
			  <div style="border:1px solid blue;margin-left:">
			  		<div style="margin-top:72px;margin-right:">
					  <div class="slideshow-container" style="margin-left:-10px;">
								<div class="mySlides fade">
									<div class="numbertext"></div>
									<img src="slideshow/1.jpg" style="width:100%;height:400px">
									<div class="text"></div>
								</div>

								<div class="mySlides fade">
									<div class="numbertext"></div>
									<img src="slideshow/3.jpg" style="width:100%;height:400px">
									<div class="text"></div>
								</div>

								<div class="mySlides fade">
									<div class="numbertext"></div>
									<img src="slideshow/2.jpg" style="width:100%;height:400px">
									<div class="text"></div>
								</div>
						</div>
						<br>
						<div style="text-align:center">
							<span class="dot"></span> 
							<span class="dot"></span> 
							<span class="dot"></span> 
						</div>
							<script>
									var slideIndex = 0;
									showSlides();

									function showSlides() {
									var i;
									var slides = document.getElementsByClassName("mySlides");
									var dots = document.getElementsByClassName("dot");
									for (i = 0; i < slides.length; i++) {
										slides[i].style.display = "none";  
									}
									slideIndex++;
									if (slideIndex > slides.length) {slideIndex = 1}    
									for (i = 0; i < dots.length; i++) {
										dots[i].className = dots[i].className.replace(" active", "");
									}
									slides[slideIndex-1].style.display = "block";  
									dots[slideIndex-1].className += " active";
									setTimeout(showSlides, 5000); // Change image every 2 seconds
									}
							</script>
       				</div>
			<h2 style="margin-left:43%;margin-top:30px;">OUR CATEGORY</h2>
 	    	<div style="display:inline-flex">
		   		<a href="product_view.php?data=<?php echo "jeans" ?>" style="text-decoration:none;color:black">
		   		<div class="categ">
			    	<img src="category/jeans.jpg" style="width:226px;height:200px">
                	<h2 style="margin-left:90px;">Jeans</h2>
    	    	</div></a>
				<a href="product_view.php?data=<?php echo "shirt" ?>" style="text-decoration:none;color:black">
		    	<div class="categ" >
		        	<img src="category/kurta.jpeg" style="width:226px;height:200px">
                	<h2 style="margin-left:90px;">Shirt</h2>
    	    	</div></a>
				<a href="product_view.php?data=<?php echo "shoes" ?>" style="text-decoration:none;color:black">
		   		 <div class="categ">
		       		 <img src="category/shoes.jpeg" style="width:226px;height:200px">
                	<h2 style="margin-left:90px;">Shoes</h2>
    	    	 </div></a>
				<a href="product_view.php?data=<?php echo "watches" ?>" style="text-decoration:none;color:black">
		   		 <div class="categ">
		       		 <img src="category/watche.jpeg" style="width:226px;height:200px">
               		 <h2 style="margin-left:90px;">Wathces</h2>
    	    	</div></a>
				<a href="product_view.php?data=<?php echo "t-shirt" ?>" style="text-decoration:none;color:black">
		   		 <div class="categ">
		       		 <img src="category/tshirt.jpeg" style="width:226px;height:200px">
               		 <h2 style="margin-left:90px;">T-shirt</h2>
		    	</div></a>
        	</div>
         	<div style="display:inline-flex;padding-bottom:30px;">
				<a href="product_view.php?data=<?php echo "kurti" ?>" style="text-decoration:none;color:black">
	        	<div class="categ">
			    	<img src="category/kurti.jpeg" style="width:226px;height:200px">
                	<h2 style="margin-left:80px;">Kurta</h2>
		    	</div></a>
				<a href="product_view.php?data=<?php echo "saree" ?>" style="text-decoration:none;color:black">
		    	<div class="categ">
			    	<img src="category/sarre.jpeg" style="width:226px;height:200px">
                	<h2 style="margin-left:80px;">Saree</h2>
    	    	</div></a>
				<a href="product_view.php?data=<?php echo "top" ?>" style="text-decoration:none;color:black">
		    	<div class="categ">
			    	<img src="category/top.jpeg" style="width:226px;height:200px">
                	<h2 style="margin-left:90px;">Top</h2>
    	    	</div></a>
				<a href="product_view.php?data=<?php echo "sandle_shoes" ?>" style="text-decoration:none;color:black">
		    	<div class="categ">
			    	<img src="category/sandle.jpeg" style="width:226px;height:200px">
                	<h2 style="margin-left:40px;">Sandle & Shoes</h2>
    	   		</div></a>
				<a href="product_view.php?data=<?php echo "handbag" ?>" style="text-decoration:none;color:black">
		    	<div class="categ">
			    	<img src="category/handbag.jpeg" style="width:226px;height:200px">
                	<h2 style="margin-left:80px;">Handbag</h2>
    	    	</div></a>
	    	</div>
        </div>
        	
        <?php include("footer.php");?>
	</body>
   
   