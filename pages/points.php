<?php
//POINTS:

//require_once('database.php');



/*   VARIABLES **************************************************************

*****************************************************************************/
// This should be working, returns an array of race results.
function queryRaces($queryrace) 
{
    
	$dsn = 'mysql:host=vojta-data.db.sonic.net; dbname=vojta_data';
    $username = 'vojta_data-all';
    $password = '590d05cd';

    try 
	{
        $db = new PDO($dsn, $username, $password);
    } 
	catch (PDOException $e) 
	{
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    } 

	//echo $queryrace;
	$statement3 = $db->prepare($queryrace);
	$statement3->execute();
	$myrace = $statement3->fetchAll();
	//$race=$myrace;
	//echo $Distance;
	
	$statement3->closeCursor();
	//echo "not NULL";
	return $myrace;
} 




//SPITS OUT "ALL" users and info
//****************************************************************************** 

	$queryPointsMmax = 'SELECT * FROM MenTimes    WHERE (points = "1400" or points= "1399")';
	$queryPointsMmin = 'SELECT * FROM MenTimes    WHERE (points = "2" or points= "1")';
	$queryPointsWmax = 'SELECT * FROM WomensTimes WHERE (points = "1400" or points= "1399")';
	$queryPointsWmin = 'SELECT * FROM WomensTimes WHERE (points = "2" or points= "1")';

	//ALL USERS STORED IN HERE:
	/*$MenPointsMax=queryRaces($queryPointsMmax);
	$MenPointsMin=queryRaces($queryPointsMmin);
	$WomanPointsMax=queryRaces($queryPointsWmax);
	$WomanPointsMin=queryRaces($queryPointsWmin);*/
	
?>


<!-- HTML --------------------------------------------------------------------------------------------------------------------------->
<?php
    //require_once('../util/secure_conn.php');  // require a secure connection
	
	//https://www.w3schools.com/howto/howto_css_coming_soon.asp
	require_once('../captcha/appvars.php');
	require_once('../captcha/connectvars.php');
?>

	
<!DOCTYPE html>
<html>
   <head>
      	<!-- FOR SORTING TABLES!!! -->
	<script src="pages/sorttable.js"></script> 
	<!-- INCLUDING FOR ALL JAVASCRIPT! -->
	<script src="pages/javascript_RaceResults.js"></script> 
	
    <title>Points</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	
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
		  $("#footer").load("footer.php"); 
		});
		</script> 
<!-- END LINKS / PERL BASESCRIPTS.Please -->
	
	
	<div id="header"></div>						
	

	
					
<!-- MAIN PAGE -->
<article id="main">	
	<header>
		<h2>Points</h2>
		<p>This page describes what I use "points" for, where it comes from and how it works.</p>
	</header>
	
<section class="wrapper style5">
<div class="inner">	

<center><h1 style="color: yellow; background-color:gray;">POINTS = PERFORMANCE (VALUE) <h1></center>
<h2>Better the performance the more points you get!</h2>
<br><br>

<h2>Why?</h2>
<h4>Why is this special?</h4>
<p>Normally people compare their times, marks, and performances, but they are only able to do this within their gender and within their even. This website allows you to expand that comparison and allows you to compare your performance to performances of the other gender and other events in track and field!</p>
<br><p style="color: green;"><b><u>Example:</u></b> Who did better? Joey runs a 22.23 200m time and Sally runs a 1500m time of 4:42.</p>
<br> <p style="color: green;"> We simply have to look up each performance in each respective table (men, women). </p><br>
<a class="button" title="Scoring Table" href="http://vojta.users.sonic.net/blog/IAAF%20Scoring%20Tables%20of%20Athletics%20-%20Outdoor.pdf">&lt; IAAF Scoring Tables of Athletics - Outdoor &gt;</a><br>
<br><br><p style="color: red;"><b><u>Answer: </u></b> Based on Male 200m time of 22.23, Joey recieves points of: 894 </p>
<p style="color: red;"> Based on Female 1500m time of 4:42, Sally recieves points of: 892</p>
<p style="color: red;"> So looks like Joey beats Sally since 894 > 892. Close!</p>


<h2>How?</h2>
<h4>How does it work?</h4>
<p>It works on a point system. (not invented by me)
The point system came from professional studies that can be found here:</p>

<a class="button" title="Scoring Table" href="http://vojta.users.sonic.net/blog/IAAF%20Scoring%20Tables%20of%20Athletics%20-%20Outdoor.pdf">&lt; IAAF Scoring Tables of Athletics - Outdoor &gt;</a>.
<p>Points range from <strong>1 </strong>(weak) to<strong> 1400 (beyond world record mark) </strong><br>
<strong>The way it functions:</strong> I copied this table and make a searchable fully dynamic database out of the data.
The data listed here (tables) gets pulled from this database every time the page is refreshed.
The data imputed by the users gets imputed into the database and gets checked/compared/searched to the closest representation of your performance in the database. It then gets assigned a point value. (based on where it falls within the performance list). This value is then returned here to this page and compared to the rest of the point values. (each point value represents a physical performance of the same "effort")</p>

<h4 style="text-align: center;" ><span style="color: #000080;"><em style="color: yellow; background-color:gray;">(Ranking is based a point system I did not create)</em></span></h4>

<table style="width: 300px;">
<tbody>
<tr>
<td width="72">100m</td>
<td width="79">100mH</td>
<td width="59">200m</td>
<td width="47">300m</td>
<td width="64">400m</td>
<td width="55">400mH</td>
<td width="77">4x100m</td>
<td width="71">4x200m</td>
</tr>
<tr>
<td>4x400m</td>
<td>600m</td>
<td>800m</td>
<td>1000m</td>
<td>1500m</td>
<td>Mile</td>
<td>2000m</td>
<td>2000mSC</td>
</tr>
<tr>
<td>3000m</td>
<td>3000mSC</td>
<td>2Miles</td>
<td>5000m</td>
<td>10000m</td>
<td>10km</td>
<td>15km</td>
<td>10Miles</td>
</tr>
<tr>
<td>20Miles</td>
<td>HM</td>
<td>25km</td>
<td>30km</td>
<td>Marathon</td>
<td>100km</td>
<td>High Jump</td>
<td>Pole Vault</td>
</tr>
<tr>
<td>Long Jump</td>
<td>Triple Jump</td>
<td>Shot Put</td>
<td>Discus</td>
<td>Hammer</td>
<td>Javelin</td>
<td>Heptathlon</td>
<td></td>
</tr>
</tbody>
</table>


<hr>
<br><br>
<h2 style="font-size:50px;"> Point Ranges </h2>	
<p>Below are the ranges of points you will recieve based on your performance.</p>

<br>
<br>
<center>

<!-- STARTING TABLE OF DATA -->

	<!--<div style="height:400px; overflow:auto; display:block;">  -->
	  

<?php	   
	   //$res = mysql_query($myQuery); //$_GET["user"]
function displayTable($inputQuery)
{
		
		
		//CONNECT TO DB:
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
		else
		{
			//echo "$inputQuery<br>";
			$res = mysql_query($inputQuery);
			//echo "$res<br>";
			
			echo "<div style=' overflow:auto; display:block;'> <table border='1' class='scroll sortable'>";
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
			echo "</table></div>";
		}
	mysql_close($dbconnect); //closes connection
}
/*
Execute:
*/

echo "<h2>Men Points:</h2>";
echo "<a class='button' href='http://vojta.users.sonic.net/finishline/pages/resultquery.php?user=Select+*+from+MenTimes'>View All Points Possibilities MEN</a><br>";
echo "<h3>Ranging from: </h3><br>";
displayTable($queryPointsMmax);
echo "<h3>TO: </h3><br>";
displayTable($queryPointsMmin);

echo "<br></main><br><br><br><br><main>";

echo "<h2>Women Points:</h2>";
echo "<center><a class='button' href='http://vojta.users.sonic.net/finishline/pages/resultquery.php?user=Select+*+from+WomensTimes'>View All Points Possibilities WOMEN</a><br>";
echo "<h3>Ranging from: </h3><br>";
displayTable($queryPointsWmax);
echo "<h3>TO: </h3><br>";
displayTable($queryPointsWmin);
?>

</center>

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
