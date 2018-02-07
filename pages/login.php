<?php
    //require_once('../util/secure_conn.php');  // require a secure connection
	
	//https://www.w3schools.com/howto/howto_css_coming_soon.asp
	require_once('../captcha/appvars.php');
	require_once('../captcha/connectvars.php');
?>
<!--<!DOCTYPE html>
<html>
    <style>
		body, html {
			height: 100%;
			margin: 0;
		}

		.bgimg {
			background-image: url('/w3images/forestbridge.jpg');
			height: 100%;
			background-position: center;
			background-size: cover;
			position: relative;
			color: white;
			font-family: "Courier New", Courier, monospace;
			font-size: 25px;
			-webkit-text-stroke: 1px black;
		}

		.topleft {
			position: absolute;
			top: 0;
			left: 16px;
		}

		.bottomleft {
			position: absolute;
			bottom: 0;
			left: 16px;
		}

		.middle {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			text-align: center;
		}

		hr {
			margin: auto;
			width: 40%;
		}
	</style>-->
	
<!DOCTYPE html>
<html>
   <head>
      <title>Log In</title>
	  <meta charset="utf-8" />
	  <meta name="viewport" content="width=device-width, initial-scale=1" />
	  
      <!--OLD STYLE: <link rel="stylesheet" type="text/css" href="../main.css"/>-->
      <link rel="stylesheet" href="../assets/css/main.css" />
	  
	  	<!-- IMPORTING HEADER AND FOOTER: -->
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script> 
		$(function(){
		  $("#header").load("header.html"); 
		  $("#footer").load("footer.php"); 
		});
		</script> 
   </head>
   
   
   
   

		<div id="header"></div>		
<!-- END LINKS / PERL BASESCRIPTS.Please -->
					
					
					
<!-- INTRO -->
		<article id="main">	
				<header>
					<h2>Login Page</h2>
					<p>Please Sign in to your existing account <br>(username and password was emailed to you).</p>
				</header>
	     
		 <section class="wrapper style5">
			<div class="inner">
		
		
		
         <h4>Log In:</h4>
         
            
	

	
            <form action="process_login.php" method="post" id="login_form" class="aligned" >
                <input class="button" type="hidden" name="action" value="login">

               
                <div class="6u 12u$(xsmall)">
					<label><i class="icon fa fa-user"></i> Username        :</label>
					<input type="text" class="text" name="myusername" placeholder="username">
					<br>
				</div>
				
				<div class="6u 12u$(xsmall)">
					<label><i class="icon fa fa-key"></i> Password        :</label>
					<input type="password" class="text" name="password1" placeholder="password">
					<br>
				</div>
				
				<br>
              
                <input class="button" type="submit" value="Login">
				<br><br>
				
            </form>		
		</div>
    </div>



			<!-- Already a user? -->
					<section id="video" class="wrapper style4">
						<div class="inner">
							<header>
							    <p><?php echo $login_message;?></p>
								<h2>Dont have an Account?</h2>
								<p>Please create one.</p>
					
							</header>
							
							<!--buttons-->
							<ul class="actions vertical">
								<li><a href="create_account.php" class="button fit">Create Account</a></li>
								<li><a href="../index.php" class="button fit special">Back Home</a></li>
								<p><?php echo $login_message;?></p>								
							</ul>
							
							
						</div>
					</section>	
						

	 </div>
	</section>
</article> 




<!-- JAVASCRIPT -->
<script>
	// Set the date we're counting down to
	var countDownDate = new Date("Jan 5, 2018 15:37:25").getTime();

	// Update the count down every 1 second
	var countdownfunction = setInterval(function() {

		// Get todays date and time
		var now = new Date().getTime();
		
		// Find the distance between now an the count down date
		var distance = countDownDate - now;
		
		// Time calculations for days, hours, minutes and seconds
		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		
		// Output the result in an element with id="demo"
		document.getElementById("demo").innerHTML = days + "d " + hours + "h "
		+ minutes + "m " + seconds + "s ";
		
		// If the count down is over, write some text 
		if (distance < 0) {
			clearInterval(countdownfunction);
			document.getElementById("demo").innerHTML = "EXPIRED";
		}
	}, 1000);
</script>


	 
	
<!-- Footer -------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="footer"></div>					

			
           </div>	
		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../assets/js/jquery.scrolly.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
        
	</body>
</html>