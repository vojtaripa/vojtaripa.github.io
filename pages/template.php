<?php
    //require_once('../util/secure_conn.php');  // require a secure connection
	
	//https://www.w3schools.com/howto/howto_css_coming_soon.asp
	require_once('../captcha/appvars.php');
	require_once('../captcha/connectvars.php');
?>

	
<!DOCTYPE html>
<html>
   <head>
      <title>Log In</title>
	  <meta charset="utf-8" />
	  <meta name="viewport" content="width=device-width, initial-scale=1" />
	  
      <!--OLD STYLE: <link rel="stylesheet" type="text/css" href="../main.css"/>-->
      <link rel="stylesheet" href="../assets/css/main.css" />
   </head>
   
   
   
   <body class="landing" onload="Init ()">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

		<!-- IMPORTING HEADER AND FOOTER: -->
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script> 
		$(function(){
		  $("#header").load("header.html"); 
		  $("#footer").load("footer.html"); 
		});
		</script> 
<!-- END LINKS / PERL BASESCRIPTS.Please -->
	
	
	<div id="header"></div>						
	

	
					
<!-- MAIN PAGE -->
<article id="main">	
	
	<!--Title-->
	<header>
		<h2>Title</h2>
		<p>Page Description.</p>
	</header>
	
	<!--main page content -->
	<section class="wrapper style5">
		<div class="inner">	
            <p>Rest of page </p>
		</div>
	</section>
	
</article> 







	
<!-- Footer -------------------------------------------------------------------------------------------------------------------------------------------------------------->
					<footer id="footer">
						


			
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
