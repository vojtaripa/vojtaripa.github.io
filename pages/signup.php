
<?php
    //require_once('../util/secure_conn.php');  // require a secure connection
	
	//https://www.w3schools.com/howto/howto_css_coming_soon.asp
	require_once('../captcha/appvars.php');
	require_once('../captcha/connectvars.php');
?>

	
<!DOCTYPE html>
<html>
   <head>
      <title>Sign Up Form</title>
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
		<h2>Updates</h2>
		<p>Please fill in your information if you would like to recieve updates about this site.</p>
	</header>
	
	<!--main page content -->
	<section class="wrapper style5">
		<div class="inner">	
            <form action="display_results.php" method="post">

			<fieldset>
			<legend>Sign-up Information</legend>
			<table style="width:100%">
			<tr>
			   <td> <label>E-Mail:</label/td>
				<td><input type="text" name="email" value="" class="textbox" style="width:100%"></td>
				<br>
		</tr>

		<tr>
			   <td> <label>Phone Number:</label> </td>
				<td><input type="text" name="phone" value="" class="textbox" style="width:100%"> </td>
			</fieldset>
			</tr>
		</table>
		<br>
			<fieldset>
			
				<div class="6u 12u$(small)">	
					<p>How did you hear about us?</p>
				</div>		
				
				<br>
				
				
				<div class="4u 12u$(small)">
					<input type="radio" id="demo-priority-search-engine" name="heard_from" checked>
					<label for="demo-priority-search-engine">Search engine</label>
				</div>
				
				<div class="4u 12u$(small)">
					<input type="radio" id="demo-priority-word-of-mouth" name="heard_from">
					<label for="demo-priority-word-of-mouth">Word of mouth</label>
				</div>
				
				<div class="4u$ 12u$(small)">
					<input type="radio" id="demo-priority-other" name="heard_from">
					<label for="demo-priority-other">Other</label>
				</div>
				
				<div class="6u 12u$(small)">
				<p>Would you like to receive announcements about new products
				   and special offers?</p>
				</div>
				
				<!--<div class="6u 12u$(small)">
					<input type="checkbox" id="update-no" name="wants_updates">
					<label for="update-no">No, thank you.</label>
				</div>-->
				<div class="6u$ 12u$(small)">
					<input type="checkbox" id="update-yes" name="wants_updates" checked>
					<label for="update-yes">YES, I'd like to receive
				information about new products and special offers.</label>
				</div>
				


				<p>Contact via:</p>
				<select name="contact_via">
						<option value="email">Email</option>
						<option value="text">Text Message</option>
						<option value="phone">Phone</option>
				</select>

				<p>Comments:</p>
				<textarea name="comments" rows="4" cols="50"></textarea>
			</fieldset>

			<input type="submit" value="Submit">
			<br>

			</form>    
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

