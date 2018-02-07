<?php

    // get the data from the form

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    $password = filter_input(INPUT_POST, 'password');

    $phone = filter_input(INPUT_POST, 'phone');

    

    $heard_from = filter_input(INPUT_POST, 'heard_from');

    if ($heard_from === NULL) {

        $heard_from = 'Unknown';

    }

    

    $wants_updates = $_POST['wants_updates'];

    if (isset($wants_updates)) {

        $wants_updates = 'Yes';

    } else {

        $wants_updates = 'No';

    }



    $contact_via = filter_input(INPUT_POST, 'contact_via');



    $comments = filter_input(INPUT_POST, 'comments');

    $comments = htmlspecialchars($comments);  // NOTE: You must code htmlspecialchars before nl2br for this to work correctly

    $comments = nl2br($comments, false);    

?>


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
		<h2>Account Information</h2>
		<p>Here is the info you put in.</p>
	</header>
	
	<!--main page content -->
	<section class="wrapper style5">
		<div class="inner">	
            <p>Results: </p>
			 <label>Email Address:</label>
		
		

        <span><?php echo htmlspecialchars($email); ?></span><br><br>



        <label>Password:</label>

        <span><?php echo htmlspecialchars($password); ?></span><br><br>



        <label>Phone Number:</label>

        <span><?php echo htmlspecialchars($phone); ?></span><br><br>



        <label>Heard From:</label>

        <span><?php echo htmlspecialchars($heard_from); ?></span><br><br>



        <label>Send Updates:</label>

        <span><?php echo $wants_updates; ?></span><br><br>



        <label>Contact Via:</label>

        <span><?php echo htmlspecialchars($contact_via); ?></span><br><br>



        <span>Comments:</span><br><br>

        <span><?php echo $comments; ?></span><br><br>

        

        <p>&nbsp;</p>
		</text>
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

