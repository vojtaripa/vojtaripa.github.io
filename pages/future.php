<?php
    //require_once('../util/secure_conn.php');  // require a secure connection
	
	//https://www.w3schools.com/howto/howto_css_coming_soon.asp
	require_once('../captcha/appvars.php');
	require_once('../captcha/connectvars.php');
	require_once ('database.php');

//NEED TO GET ALL FUTURE RACE DATA:
	
	$queryraces = 'SELECT * FROM futureRaces';
	$statement1 = $db->prepare($queryraces);
	$statement1->execute();
	$Races = $statement1->fetchAll(); //ARRAY of races. 
	$statement1->closeCursor();
?>

	
<!DOCTYPE html>
<html>
   <head>
      <title>Future Races</title>
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
	
	<!--Title-->
	<header>
		<h2>Future Races</h2>
		<p>Here are my future races I would like to run.</p>
	</header>
	
	<!--main page content -->
	<section class="wrapper style5">
		<div class="inner">	
            <div id="myDIV" class="header  AddRace" style="background-color:white;">
			  <h2 >Add a new race <br><i> (follow format shown)</i></h2>
			  <input type="text" id="AddRace" class="AddRace" value="<?php echo "Date: YYYY-MM-DD Race Name: <race name>" ?>">
			  <span onclick="newElement()" class="addBtn AddRace">Add</span>
			  
				</div>
				
			<br>	
			<button class="button" onclick="sortList()">Sort</button>
			<br>
			<form action="ProcessFuture.php" method="post" id="process_future" enctype="multipart/form-data">


			  <center>
			  <br><br>
			  <h2><u> Here are my future races I would like to run: </u></h2>
			  <!-- Pointing to new page that will communicate with DB and inputs this data in...  ----------------------------------->
			  <!--<span onclick="window.location.assign('ProcessFuture.php')" class="addBtn AddRace">Save All</span> -->
			  <!-- Reloads Page ----------------------------------->
			  </center>
			  
			  <ol class="AddRace" id="myUL" >
			  <?php
			  //NOW SPIT OUT RACES:
				 foreach ($Races as $Race) : 
					if($Race['done']=="0")
						$checked = "checked";
					else
						$checked = "";
				 
					echo"<li class='AddRace ". $checked ."' name='". $Race['Index'] ."'>";
						 echo "<b> Date: </b>". $Race['date'] . "<b>   Race Name: </b>". $Race['race'] . ""; 
					echo"</li>";
				 endforeach; 
			  
			  ?>
			  </ol>
				
				<input id="amount" value="0" type=hidden name="amount"></input>
				<br><br>
				
				<div class="6u 12u$(xsmall)">
					<label>Username        :</label>
					<input type="text" class="text" name="myusername" placeholder="username">
					<br>
				</div>
				
				<div class="6u 12u$(xsmall)">
					<label>Password        :</label>
					<input type="password" class="text" name="password1" placeholder="password">
					<br>
				</div>
				
				   <span style="display: inline;"><button class="button special"  value="Submit" type="submit"  id="submit">Update</button> <button onclick="location.reload()" class="button special">Clear</button> </span> <!--value="Submit" type="submit"-->
			</form>
			<br>
			<!--<button class="button" id="inputs">Get Inputs</button> intermediate button, how im having submit handle this function -->

				<br>
				<br>
				<p style="display: inline;"><a class="button" href="../index.php" >Back Home to Races</a></p>
				


				
			<!-- JAVASCRIPT --------------------------------------------------------------------------------------->
			<script>
			function sortList() {
			  var list, i, switching, b, shouldSwitch;
			  list = document.getElementById("myUL");
			  switching = true;
			  /*Make a loop that will continue until
			  no switching has been done:*/
			  while (switching) {
				//start by saying: no switching is done:
				switching = false;
				b = list.getElementsByTagName("LI");
				//Loop through all list-items:
				for (i = 0; i < (b.length - 1); i++) {
				  //start by saying there should be no switching:
				  shouldSwitch = false;
				  /*check if the next item should
				  switch place with the current item:*/
				  if (b[i].innerHTML.toLowerCase() > b[i + 1].innerHTML.toLowerCase()) {
					/*if next item is alphabetically
					lower than current item, mark as a switch
					and break the loop:*/
					shouldSwitch= true;
					break;
				  }
				}
				if (shouldSwitch) {
				  /*If a switch has been marked, make the switch
				  and mark the switch as done:*/
				  b[i].parentNode.insertBefore(b[i + 1], b[i]);
				  switching = true;
				}
			  }
			}
			</script>
				
				
				<script>	
				// Create a "close" button and append it to each list item (WORKS)
				var myNodelist = document.getElementsByTagName("LI");
				var i;
				for (i = 0; i < myNodelist.length; i++) {
				  var span = document.createElement("SPAN");
				  var txt = document.createTextNode("\u00D7");
				  span.className = "close";
				  span.appendChild(txt);
				  myNodelist[i].appendChild(span);
				}

				// Click on a close button to hide the current list item (WORKS)
				var close = document.getElementsByClassName("close");
				var i;
				for (i = 0; i < close.length; i++) {
				  close[i].onclick = function() {
					var div = this.parentElement;
					//div.style.display = "none";
					div.remove();
				  }
				}

				// Add a "checked" symbol when clicking on a list item (WORKS)
				var list = document.querySelector('ol');
				list.addEventListener('click', function(ev) 
				{
				  if (ev.target.tagName === 'LI') 
				  {
					ev.target.classList.toggle('checked');
				  }
				}, false);

				// Create a new list item when clicking on the "Add" button (WORKS)
				function newElement()
				{
				  var li = document.createElement("li");
				  li.className ="AddRace";
				  var inputValue = document.getElementById("AddRace").value;
				  var t = document.createTextNode(inputValue);
				  li.appendChild(t);
				  if (inputValue === '') 
				  {
					  alert("You must write something!"); //shows alert on screen.
				  } 
				  else if (!(/^Date:/.test(inputValue ))) 
				  {
					  alert("Please see proper format!"); //shows alert on screen.
				  }
				  else 
				  {
					document.getElementById("myUL").appendChild(li);
				  }
				  document.getElementById("AddRace").value = "";

				  var span = document.createElement("SPAN");
				  var txt = document.createTextNode("\u00D7");
				  span.className = "close";
				  span.appendChild(txt);
				  li.appendChild(span);

				  for (i = 0; i < close.length; i++) 
				  {
					close[i].onclick = function() 
					{
					  var div = this.parentElement;
					  div.style.display = "none";
					}
				  }
				}
				
				</script>
				


				<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js">
				</script>
			<script>
			$(document).ready(function()
			{
				var $amount=0;
				
				$("#submit").click(function()
				{
					//$("li").toggle();
					$("li").each(function()
					{		
							//gets all table data 
							var $InputVal = $(this).text();
							var $checked  = $(this).attr('class'); //CSS PROPERTY
							
							
							var	$newli = $("<br><input  id='"+ $amount +"' name='race"+ $amount +"' type=hidden></input>"); //type=hidden
							var $newCHECKEDinput = $("<br><input  id='checked"+ $amount +"' name='checked"+ $amount +"' type=hidden></input>"); //type=hidden
							
											
							//adding it to header
							$newli.val($InputVal).text($InputVal).appendTo(this);
							$newCHECKEDinput.val($checked).text($checked).appendTo(this); // NEED TO CHANGE
							
							
							$amount++;
					});
					
					$("#amount").val($amount);
					
				});
			});
			</script>
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



