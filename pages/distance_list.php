<?php

require_once('database.php');

/*
DistanceID
Name
DistanceMascot
*/

// Get all Distance

$query = 'SELECT * FROM MyDistances ORDER BY Distance';

$statement = $db->prepare($query);

$statement->execute();

$Distance = $statement->fetchAll();

$statement->closeCursor();

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
      <title>Race Distance Translations</title>
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
   
   
   
   <body class="landing" onload="Init ()">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<div id="header"></div>
					
					
<!-- END LINKS / PERL BASESCRIPTS.Please -->
					
	

	
					
<!-- MAIN PAGE -->
<article id="main">	
	
		<header>
				<h2>Race Distance Translations</h2>
				<p>This page will show you conversions of numeric values to distance names.</p>
		</header>
		
		
		<section class="wrapper style5">
							<div class="inner">

								<section>

<!-- INSERT PAGE CODE HERE -->
		<table>

        <tr>
            <th>Distance</th>
            <th>Distance Name</th>

        </tr>
  <?php foreach ($Distance as $Distance) : ?>
        <tr>
            <td><?php echo $Distance['Distance']; ?></td>
			<td><?php echo $Distance['distName']; ?></td>
        </tr>
        <?php endforeach; ?>    
   
    </table>
</center>

    <br>

    <p><a href="../index.php" class="button fit special">Home</a></p>

           </section>
		 </div>
	</section>
</article> 







	
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
