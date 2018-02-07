<?php
require('database.php');

/*
$dsn = 'mysql:host=vojta-data.db.sonic.net; dbname=vojta_data';
$username = 'vojta_data-all';
$password = '590d05cd';


mysql_select_db( "vojta_data",mysql_connect($dsn, $username, $password) );
*/


//USERNAME LOGGED IN and SECURITY:
if($myusername=="" && $mypassword=="")
{	
	//echo"USERNAME: $myusername PASSWORD: $mypassword";
	$myusername = filter_input(INPUT_POST, 'username');
	$mypassword = filter_input(INPUT_POST, 'password');

	//echo "<h1 style='color:red'> SORRY, invalid username or password. </h1>";
	if($myusername=="" && $mypassword=="")
	{
		?>		
		<script type="text/javascript">location.href = 'http://www.vojtaripa.com/finishline';</script>
		<?php
	}
	//header("Location: http://www.vojtaripa.com/finishline");
}
else
{}



if($mypassword=="")
{
	echo "<h1 style='color:red'> SORRY, invalid password. </h1>";
    //include("RaceResults.php?choice=search&user=".urlencode($myusername)."&Year=".urlencode('All')."&Distance=".urlencode('All'));
    exit();
}
else
{
	//finds which user is logged on:
	$queryuser = "SELECT * FROM users  WHERE username = :username ORDER BY idusers DESC limit 1"; 
	$statement5 = $db->prepare($queryuser);
	$statement5->bindValue(':username', $myusername);
	$statement5->execute();
	$theuser = $statement5->fetchAll();
	$statement5->closeCursor();
	
	$theusername = $theuser['0']['username'];
	$thepassword =	$theuser['0']['password'];
	
	/*
	echo "THEUSERNAME: $theusername <br>";
	echo "MYUSERNAME: $myusername <br>";
	echo "THEPASSWORD: $thepassword <br>";
	echo "MYPASSWORD: $mypassword <br>";*/
	
	//IF USERNAME AND PASSWORD ARE NOT RIGHT
	if($myusername!=$theusername || $mypassword!=$thepassword)
	{
		//echo "<h1 style='color:red'>SORRY INVALID LOGIN</h1>";
		?>		
		<script type="text/javascript">location.href = 'http://www.vojtaripa.com/finishline';</script>
		<?php
	}
	else
	$usernameCheck==true; //correct user logged in.
}
//ELSE RUN PAGE.
//****************************************************************************** 

//GETTING ALL RACES and ALL DISTANCES
$query = 'SELECT * FROM MyDistances ORDER BY Distance';
$myquery = "Select COUNT(*) FROM ". $myusername ." LIMIT 1";


$statement = $db->prepare($query);
$statement2 = $db->prepare($myquery);

$statement->execute();
$statement2->execute();

$Distance = $statement->fetchAll();
$MyRaceResults = $statement2->fetchAll();//$statement2->mysql_result( $statement2, 0 );

$statement->closeCursor();
$statement2->closeCursor();

?>



<!DOCTYPE html>
<html>
   <head>
     
	  <meta charset="utf-8" />
	  <meta name="viewport" content="width=device-width, initial-scale=1" />
	  
      <!--OLD STYLE: <link rel="stylesheet" type="text/css" href="../main.css"/>-->
      <link rel="stylesheet" href="../assets/css/main.css" />
	  
	  
	  <title>Add Race</title>
    
	<style>
		* {
			padding: 1px;
			size: 16px;
			align: center;
		}
		input
		{
			width:100%;
		}
		select
		{
			width:30%;
			text-align:center; 
			align:center;
			margin-left:auto; 
			margin-right:auto; 
		}
		td{
			border: 1px solid #ddd;
			margin-top: -1px;
			padding: 12px;
		}
	</style>
	
	
<!-- FOR LIVE GEOCODING -->
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script src="jquery.geocomplete.js"></script>
			<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
			
	<script>
	    //FOR LIVE GEOCODING
		//LINK: http://www.jqueryscript.net/other/jQuery-Geocoding-Places-Autocomplete-with-Google-Maps-API-geocomplete.html
		$(function()
		{

			$("#geocomplete").geocomplete()

		});
	</script>
	
	
	<script>
	        
		//GETS SECONDS AND CONVERTS BACK TO TIME FORMAT
		function SecondsToTime(inputTime) 
		{	
			//echo nl2br("Seconds are now: $Seconds \n");
			var CaryOver=0, Hours=0, Minutes=0, Seconds=0;
			//var inputTime=3000;
			
			if(inputTime>=(60*60))
			{
				CaryOver=inputTime%(60*60);
				Hours=Math.floor(inputTime/(60*60));
				inputTime=CaryOver;
				//echo nl2br("Seconds are now: CarryOver \n");
				
			}

			if(inputTime>=60)
			{
				CaryOver=inputTime%60; //Remainder
				Minutes=Math.floor(inputTime/60);
				inputTime=CaryOver;
				//echo nl2br("Minutes are now: CarryOver \n");
				
			}
			else{}
			
			Seconds=Math.floor(inputTime);
			
			//NOW Correct the FORMAT
			if(Hours<10)
			{Hours="0" + Hours;}	
			if(Minutes<10)
			{Minutes="0" + Minutes;}
			if(Seconds<10)
			{Seconds="0" + Seconds;}
			else{}
			
			return (Hours + ":" + Minutes + ":" + Seconds);
		}
		
		
		
		// MY LIVE PACE CALCULATOR:
		//LINK: https://www.daniweb.com/programming/web-development/threads/305789/javascript-calculate-time-between-times
		function FindPace () 
		{
            var startHSelect = document.getElementById ("starttimehour");
            var startMSelect = document.getElementById ("starttimemin");
			var startSSelect = document.getElementById ("starttimesec");
						
			var distance     = document.getElementById ("distance");
			
			// convert string values to integers
			var startH = parseInt (startHSelect.value);
			var startM = parseInt (startMSelect.value);
			var startS = parseInt (startSSelect.value);
			
			var distVal= distance.value;
			
			// create Date objects from start and end
			var start = new Date ();	// the current date and time, in local time.
			var end = new Date ();

			//setting stand and end date (formatting) so we can use getTime() function
			start.setHours (startH, startM, startS);
			end.setHours (00, 00, 00);
			
			//Now setting result AKA elapsed time
			var elapsedInS = start.getTime () - end.getTime ();
			
			//Gets total amount of sec.
			var totalSec = (elapsedInS / (1000*distVal));
			
			//uses function to convert sec to time again.
			var pace = SecondsToTime (totalSec);
			
			//Gets value of result field
			var elapsedSpan = document.getElementById ("elapsed");
							  
			
			//changes the value of the result field
			elapsedSpan.value = "" + (pace); //seconds //(elapsedInS / (1000*distVal) )   //.innerHTML
        }
		
		function Feel ()
		{
			//Gets value of slider field
			var slider = document.getElementById ("slider");
			
			//Gets value of feel field
			var myfeel = document.getElementById ("feel");	

            //Get actual value of feel
            var actualFeel = slider.value;			
			
			//changes the value of the result field
			myfeel.value = "" + (actualFeel); //";//slider.value; 
		}
		
		 
        function Init () 
		{
			FindPace ();
			Feel ();
        }
		
		
    </script>  
	
	
	<!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
	<script> 
	$(function(){
	  $("#header").load("header.html"); 
	  $("#footer").load("footer.html"); 
	});
	</script> 
	
	
		
	
</head>
   
   
 

 
   <body class="landing" onload="Init ()">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header/ Menu -->
				<div id="header"></div>	
<!-- END LINKS / PERL BASESCRIPTS.Please -->
					
	

	
	

	
<!-- MAIN PAGE -->
<article id="main">	
	
				<header>
					<h2>Add Race Result</h2>
					<p>Please Add Your Race Results.</p>
				</header>
	     
		 
		 <!-- Section Two -->
					<section id="two" class="wrapper alt style2">
						<section class="spotlight">
							<div class="image"><img src="../image/web.png" alt="web" align="center" style="width: 40%; height: 40%" ></div><div class="content">
								<h2><u>Get Started</u></h2>
								<h2>Finding Results on the web</h2>
								<p>If you need help finding your results, you can start with these links:</p>
								    <select id="links" name="links" class="selectboxkl" style="background-color:black;">
										<option value="#" ><a href="#"><i>Select Webpage</i></a></option>
										<option value="https://www.athlinks.com/" ><a href="https://www.athlinks.com/">Athlinks</a></option>
										<option value="https://results.active.com/" ><a href="https://results.active.com/">Active</a></option>
										<option value="http://www.onlineraceresults.com/" ><a href="http://www.onlineraceresults.com/">Online Race Results</a></option>
										<option value="https://www.directathletics.com/" ><a href="https://www.directathletics.com/">Direct Athletics</a></option>
										<option value="http://www.coolrunning.com/engine/1/" ><a href="http://www.coolrunning.com/engine/1/">Cool Running</a></option>
										
									</select>
									<script type="text/javascript">
									 var urlmenu = document.getElementById( 'links' );
									 urlmenu.onchange = function() {
										  window.open(  this.options[ this.selectedIndex ].value );
									 };
									</script>
							</div>
						</section>
						
						<section class="spotlight">
							<div class="image"><img src="../image/docs.png" alt="document" align="center" style="width: 40%; height: 40%" ></div><div class="image"><div class="content">
								<h2><u>OPTION 1</u></h2>
								<h2>Add results from a file</h2>
								<p>If you have a Excel file with all of your races, please send it to me and I can upload it.</p>
							</div>
						</section>
						
						<section class="spotlight">
							<div class="image"><img src="../image/manual.png" alt="manual" align="center" style="width: 40%; height: 40%" ></div><div class="content">
								<h2><u>OPTION 2</u></h2>
								<h2>Add a manual result</h2>
								<p>If you have the information about your race, please add it manually below by filling out the form provided.</p>
							</div>
						</section>
					
					
					<section class="spotlight">
							<div></div><div class="content">
								<h2><u>OPTION 3</u></h2>
								<h2>Automatically Add Results</h2>
								<p>Sorry this is still in development, but I'm hoping to integrate grabbing results from a website/database and automatically importing them.</p>
							</div>
						</section>
		           </section>
		 
		 
		 
		 
		 
		 <!-- NEW SECTION -->
		 <section class="wrapper style5">
			<div class="inner">
			<div class="image"><img src="../image/finishline_runner.jpg" alt="Finish" align="center" style="width: 40%; height: 40%" ></div>
		<h2>Add Race: Manually </h2>
		
		<h4> - Fill in the following, please follow format shown. </h4>     
      </br> </br>
		<!--IMAGE-->
		<h3>Select Race Picture</h3>
        <form action="add_race.php" method="post" id="add_race_form" enctype="multipart/form-data">
			
			<!--IMAGE-->
			
			<style>
				  
				  .upload
				  {
					color: black;
					width: 40%;
					background: #ccc;
					margin: 0 auto;
					padding: 1.5%;
				  }

				   ol.upload {
					  color: black;
					padding-left: 0;
				  }

				   li.upload {
					color: black;
					background: #eee;
					display: flex;
					justify-content: space-between;
					margin-bottom: 10px;
					list-style-type: none;
				  }

				   img.upload {
					color: black;
					height: 64px;
					margin-left; 20px;
					order: 1;
				  }

				   p.upload {
					color: black;
					line-height: 32px;
					padding-left: 5px;
				  }

				   label.upload, button.upload {
					background-color: black;
					background-image: linear-gradient(to bottom, rgba(230,89,77,0), rgba(230,89,77, 0.4) 40%, rgba(230,89,77, 0.4) 60%, rgba(230,89,77, 0));
					color: #ccc;
					padding: 5px 10px;
					border-radius: 5px;
					border: 1px ridge gray;
				  }

				 				
				  label.upload:hover, button:hover {
                  background-color: #222;
                  } 
                  label:active, button:active {
                  background-color: #333;
                  }
			</style>


			<center>
			  <div class="upload">
				<label class="upload" for="image_uploads" style="color:white">Choose images to upload (PNG, JPG)</label>
				<input class="upload" type="file" id="image_uploads" name="image_uploads" accept=".jpg, .jpeg, .png" multiple>
			  </div>
			  
			  <div class="preview upload">
				<p class="upload">
				<?php
				if($Picture!=NULL)
					echo "$Picture";
				else
					echo "No files currently selected for upload";
				?>
				</p>
				
			  </div>
			  <input placeholder="No Image Selected." class="upload" type="text" id="myFile" name="file1" value="<?php echo $Picture; ?>" readonly>
			</center>
			<br><br>

			<script>
			var input = document.querySelector('input');
			var preview = document.querySelector('.preview');

			input.style.visibility = 'hidden';
			input.addEventListener('change', updateImageDisplay);
			
			function updateImageDisplay() 
			{
			  while(preview.firstChild) 
			  {
				preview.removeChild(preview.firstChild);
			  }

			  var curFiles = input.files;
			  if(curFiles.length === 0) 
			  {
				var para = document.createElement('p');
				var x = document.getElementById("myFile").value;
				
				para.textContent = 'No files currently selected for upload';
				
				preview.appendChild(para);
				
			  } 
			  else 
			  {
				var list = document.createElement('ol');
				preview.appendChild(list);
				
				for(var i = 0; i < curFiles.length; i++) 
				{
				  var listItem = document.createElement('li');
				  var para = document.createElement('p');
				  
				  if(validFileType(curFiles[i])) 
				  {
					para.textContent = 'File name ' + curFiles[i].name + ', file size ' + returnFileSize(curFiles[i].size) + '.';
					document.getElementById("myFile").value = curFiles[i].name;
					
					var image = document.createElement('img');
					image.src = window.URL.createObjectURL(curFiles[i]);

					listItem.appendChild(image);
					listItem.appendChild(para);

				  } 
				  
				  else 
				  {
					para.textContent = 'File name ' + curFiles[i].name + ': Not a valid file type. Update your selection.';
					listItem.appendChild(para);
				  }

				  list.appendChild(listItem);
				}
			  }
			}var fileTypes = [
			  'image/jpeg',
			  'image/pjpeg',
			  'image/png'
			]

			function validFileType(file) {
			  for(var i = 0; i < fileTypes.length; i++) {
				if(file.type === fileTypes[i]) {
				  return true;
				}
			  }

			  return false;
			}function returnFileSize(number) {
			  if(number < 1024) {
				return number + 'bytes';
			  } else if(number > 1024 && number < 1048576) {
				return (number/1024).toFixed(1) + 'KB';
			  } else if(number > 1048576) {
				return (number/1048576).toFixed(1) + 'MB';
			  }
			}
			</script>


						<!--<input type="hidden" name="action" value="upload">
						<input type="file" name="file1"><br>-->

 			




<!-- 	

Index
Date
Race
Time
Distance
Place
Pace
Location
Type
Picture
LinkToResults
LinkToActivity
shoes
Notes

-->
<!-- CHANGE VALUE TO placeholder= -->

			<div class="6u 12u$(xsmall)">
			<label>Race # (READ ONLY)</label>
			
			<?php $counter=0; foreach ($MyRaceResults as $MyRaceResults) : ?>
				<input type="text" name="Index" value="<?php echo $MyRaceResults[0]+1; ?>" readonly>
			 <?php $counter++; endforeach; 
			 if($counter==0) {?>
			<input type="text" name="Index" value="1" readonly>	 
			 <?php } ?>	 
			 </div>
			 </br></br>

			 
			<div class="6u 12u$(xsmall)">
           <label>Race Name:</label>
            <input type="text" name="Race" placeholder="Running of the Warriors" required><br>		   
		   </div>
			</br></br>
		   
		   <div class="6u 12u$(xsmall)">
			<label>Date of Race:</label>
            <input type="date" name="Date" value="01/01/2017" required ><br>		   
		   </div>
		   </br></br>
		   
		   <div class="6u 12u$(xsmall)">
			 <label>Distance:</label>
             <select id="distance" name="Distance" onchange="FindPace ()" class="selectboxkl">
				<?php foreach ($Distance as $Distance) : ?>
					<option value="<?php echo $Distance['Distance']; ?>">
						<?php echo $Distance['distName']; ?>
					</option>
				<?php endforeach; ?>
            </select></div>
			</br></br>
			
			<div class="6u 12u$(xsmall)">
			<label>Time Run:</label>
            </div>
			
			<center>
			<table>
			<tr><b><th style="text-align:center">Hours                     </th><th style="text-align:center">|</th><th style="text-align:center">Minutes                    </th><th style="text-align:center">|</th><th style="text-align:center">Seconds</th></b></tr>
				
				<tr>
				<td><select id="starttimehour" name="Hours" onchange="FindPace ()" class="selectboxkl" style="color:black">
					<option value="00" selected="selected">00</option>
					<option value="01" >01</option>
					<option value="02" >02</option>
					<option value="03" >03</option>
					<option value="04" >04</option>
					<option value="05" >05</option>
					<option value="06" >06</option>
					<option value="07" >07</option>
					<option value="08" >08</option>
					<option value="09" >09</option>
					<option value="10" >10</option>
				</select>
				</td>
				
				<td>
				<label style="text-align:center">:</label>
				</td>
				
				<td>
				<select id="starttimemin" name="Minutes" onchange="FindPace ()" class="selectboxkl" style="color:black">
					<option value="00" selected="selected">00</option>
					<option value="01" >01</option>
					<option value="02" >02</option>
					<option value="03" >03</option>
					<option value="04" >04</option>
					<option value="05" >05</option>
					<option value="06" >06</option>
					<option value="07" >07</option>
					<option value="08" >08</option>
					<option value="09" >09</option>
					<option value="10" >10</option>
					<option value="11" >11</option>
					<option value="12" >12</option>
					<option value="13" >13</option>
					<option value="14" >14</option>
					<option value="15" >15</option>
					<option value="16" >16</option>
					<option value="17" >17</option>
					<option value="18" >18</option>
					<option value="19" >19</option>
					<option value="20" >20</option>
					<option value="21" >21</option>
					<option value="22" >22</option>
					<option value="23" >23</option>
					<option value="24" >24</option>
					<option value="25" >25</option>
					<option value="26" >26</option>
					<option value="27" >27</option>
					<option value="28" >28</option>
					<option value="29" >29</option>
					<option value="30" >30</option>
					<option value="31" >31</option>
					<option value="32" >32</option>
					<option value="33" >33</option>
					<option value="34" >34</option>
					<option value="35" >35</option>
					<option value="36" >36</option>
					<option value="37" >37</option>
					<option value="38" >38</option>
					<option value="39" >39</option>
					<option value="40" >40</option>
					<option value="41" >41</option>
					<option value="42" >42</option>
					<option value="43" >43</option>
					<option value="44" >44</option>
					<option value="45" >45</option>
					<option value="46" >46</option>
					<option value="47" >47</option>
					<option value="48" >48</option>
					<option value="49" >49</option>
					<option value="50" >50</option>
					<option value="51" >51</option>
					<option value="52" >52</option>
					<option value="53" >53</option>
					<option value="54" >54</option>
					<option value="55" >55</option>
					<option value="56" >56</option>
					<option value="57" >57</option>
					<option value="58" >58</option>
					<option value="59" >59</option>
				</select>
				</td>
				
				<td>
				<label style="text-align:center">:</label>
				</td>
				
				<td>
				<select id="starttimesec" name="Seconds" onchange="FindPace ()" class="selectboxkl" style="color:black">
					<option value="00" selected="selected">00</option>
					<option value="01" >01</option>
					<option value="02" >02</option>
					<option value="03" >03</option>
					<option value="04" >04</option>
					<option value="05" >05</option>
					<option value="06" >06</option>
					<option value="07" >07</option>
					<option value="08" >08</option>
					<option value="09" >09</option>
					<option value="10" >10</option>
					<option value="11" >11</option>
					<option value="12" >12</option>
					<option value="13" >13</option>
					<option value="14" >14</option>
					<option value="15" >15</option>
					<option value="16" >16</option>
					<option value="17" >17</option>
					<option value="18" >18</option>
					<option value="19" >19</option>
					<option value="20" >20</option>
					<option value="21" >21</option>
					<option value="22" >22</option>
					<option value="23" >23</option>
					<option value="24" >24</option>
					<option value="25" >25</option>
					<option value="26" >26</option>
					<option value="27" >27</option>
					<option value="28" >28</option>
					<option value="29" >29</option>
					<option value="30" >30</option>
					<option value="31" >31</option>
					<option value="32" >32</option>
					<option value="33" >33</option>
					<option value="34" >34</option>
					<option value="35" >35</option>
					<option value="36" >36</option>
					<option value="37" >37</option>
					<option value="38" >38</option>
					<option value="39" >39</option>
					<option value="40" >40</option>
					<option value="41" >41</option>
					<option value="42" >42</option>
					<option value="43" >43</option>
					<option value="44" >44</option>
					<option value="45" >45</option>
					<option value="46" >46</option>
					<option value="47" >47</option>
					<option value="48" >48</option>
					<option value="49" >49</option>
					<option value="50" >50</option>
					<option value="51" >51</option>
					<option value="52" >52</option>
					<option value="53" >53</option>
					<option value="54" >54</option>
					<option value="55" >55</option>
					<option value="56" >56</option>
					<option value="57" >57</option>
					<option value="58" >58</option>
					<option value="59" >59</option>
				</select>
				</td>
				</tr>
				</table>
				</center>
	
			
			<div class="6u 12u$(xsmall)"> 	
				 <label>Pace Run </label>
				<input type="text" name="Pace" id="elapsed" readonly value="00:01:00"> <br> <!-- <span name="Pace" id="elapsed"></span>  -->
		   </div>
		   
		   
		   <div class="6u 12u$(xsmall)">
            <label>Place Finished:</label>
            <input name="Place" placeholder="1" type="text" min="1" max="1000" pattern="[0-9]{1,3}" required ><br>
		   </div>
		   
		   <div class="6u 12u$(xsmall)">		
			 <label>Location</label>
            <input id="geocomplete" type="text" name="Location" placeholder="Santa Rosa, Ca" required ><br>
		   </div>
		   
		   <div class="6u 12u$(xsmall)">   
		   	<label>Type of Race</label>          
			 <select name="Type" class="fit">
					<option value="XC">XC</option>
					<option value="Track">Track</option>
					<option value="Road" selected="selected" >Road</option>
					<option value="Tri">Tri</option>
            </select>
			</div>
			</br></br>
			
			<div class="6u 12u$(xsmall)">  
			<label>Add link to your results: </label>
			<input type="text" pattern="https?://.+" name="ResultsLink" placeholder="Directathletics.com">
			</div>
			</br></br>
			
			<div class="6u 12u$(xsmall)">
			<label>Add link to your activity:</label> <br><a class="button fit special" href="https://www.strava.com/dashboard?feed_type=my_activity">My Strava Activities</a>
			<input type="text" pattern="https?://.+" name="ActivityLink" placeholder="strava.activity.com">
			</div>
			</br></br>
			
			<div class="6u 12u$(xsmall)">
			<label>Shoe Model/ Brand </label>
			<input type="text" name="Shoes" placeholder="Ex. Nike Lunar Racer">
			</div>
			
			</br></br>
			
			<div class="6u 12u$(xsmall)">
				 <label>How did you feel? (Scale 1 to 10, 10 being the best)</label>
				
			   <label>Felt like:</label> <input type="range" name="feel" min="0" max="10" value="0" onchange="Feel ()" id="slider">
			   <input type="text" name="feeltext" value="0" readonly id="feel"><br>
			  <pre> 0 (Worst)                          10 (Best) </pre>
				<br>
		   </div>
		   
		   <div class="6u 12u$(xsmall)">
			 <label>Notes:</label>
            <textarea rows="8" cols="75" name="Comments" value="" placeholder="Please write a note about the race..."> </textarea><br>
		   </div>
		   
		   
		   <input type="hidden" name="username" value="<? echo $myusername?>" >
		   <input type="hidden" name="password" value="<? echo $mypassword?>" > 

            <input class="button" type="submit" value="Add Race">  <br><br> <input class="button" type=reset value="Clear">
			<br>
        </form>
		</br>
		</br>
		</br>
			<!--buttons-->
			<ul class="actions vertical">
				<li><a href="<?php echo "RaceResults.php?choice=search&user=".urlencode($myusername)."&password=".urlencode($mypassword)."&Year=".urlencode('All')."&Distance=".urlencode('All'); ?>" class="button fit">Back To Profile</a></li>
				<li><a href="../index.php" class="button fit special">Home</a></li>
				<p><?php echo $login_message;?></p>								
			</ul>
	</div>
   </div>
        
	


		 </div>
	</section>
</article> 







	
<!-- Footer -------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="footer"></div>

			
           </div>	
		<!-- Scripts 
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../assets/js/jquery.scrolly.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>-->
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]
			<script src="../assets/js/main.js"></script>-->
        
	</body>
</html>
