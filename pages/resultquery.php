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
		<h2>Result Query</h2>
		<p>Displayed will be results for query you chose.</p>
	</header>
	
	<!--main page content -->
	<section class="wrapper style5">
		<div class="inner">	
            
			<div id="layout1">
			<h2>Your Request is: </h2>


			<?php
					//require_once('../database.php');
					echo ' ';
					echo "<h2>".($_GET["user"]) ."</h2>" ; //outputs what user put in
					
					//session_start();
					//include ('info.php');

					$dsn = 'mysql:host=vojta-data.db.sonic.net;dbname=vojta_data';
					$username = 'vojta_data-all';
					$password = '590d05cd';
					
					$dbconnect = mysql_connect($dsn, $username, $password); //uses my password to get in database
					if(!dbconnect)
							echo "Could not open database"; //if log-in fails then say ...

					//select database
					$db = mysql_select_db("vojta_data", $dbconnect); //connect to database and select vojta_data as the database in phpMyAdmin
					if(!$db)
					{
							echo "Could not open info"; //if it cant be opened say so. 
							exit;
					}

					//gets query from address
					$myQuery = $_GET["user"];
					$myQuery = "$myQuery";
					
					//need to replace \ char with nothing.
					$myQuery= str_replace("\\","",$myQuery);
					echo "executing query: $myQuery";
					
					$res = mysql_query($myQuery); //$_GET["user"]
					
							
					$regex = "/^[select]|[Select]|[SELECT]/";
					
					//$regex = "/[a-zA-Z]+ \d+/";
					if (preg_match($regex, $myQuery)==FALSE)
					{
						  echo "Query must start with 'select'"; //if it cant be opened say so. 
						  exit;
					}
					if ($myQuery==null || $res==null)
					{
						echo "<br><br>Sorry no results found.";
					}

					else
					{
						echo "<table border='1'>";
						// HEADERS
						echo "<tr>";
						for($i = 0; $i < mysql_num_fields($res); $i++) //$res
						{
							echo '<th>' . mysql_field_name($res, $i) . '</th>'; //$res
						}
						echo "</tr>";
						
						
						//TUPLES/ ROWS
						
						while($row = mysql_fetch_row($res)) 
						{
							echo "<tr>";
							foreach($row as $_column) 
							{
								echo "<td> $_column </td>";
							}
							echo "</tr>";
						}
						
						echo "</table>";
					}

					mysql_close($dbconnect); //closes connection

			?>
			</div>
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

