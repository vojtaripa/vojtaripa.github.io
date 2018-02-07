<?php
   //SOURCE:
   //https://dcrazed.com/free-responsive-html5-css3-templates/
   
   // ***index.php use to be called USERS.php
   require_once('pages/database.php');
   
   
   
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
   
   	$queryusers = 'SELECT * FROM users';
   	$statement1 = $db->prepare($queryusers);
   	$statement1->execute();
   	//$users = $statement1->fetch();
   	$statement1->closeCursor();
   	
   	//ALL USERS STORED IN HERE:
   	$users=queryRaces($queryusers);
   ?>
<!--HTML-->
<!DOCTYPE HTML>
<!--
   Spectral by HTML5 UP
   html5up.net | @ajlkn
   Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
   -->
<html>
   <head>
      <title>Finishline</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
      <link rel="stylesheet" href="assets/css/main.css" />
      <!--[if lte IE 8]>
      <link rel="stylesheet" href="assets/css/ie8.css" />
      <![endif]-->
      <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ie9.css" />
      <![endif]-->
      <!--MINE-->
      <link rel="Finishline Icon" href="image/finishline.ico">
      <!-- FOR SORTING TABLES!!! -->
      <script src="pages/sorttable.js"></script> 
      <!-- INCLUDING FOR ALL JAVASCRIPT! -->
      <!-- SOMETHING IN THIS IS BREAKING WILL HAVE TO LOOK 
         <script src="pages/javascript_RaceResults.js"></script> -->
      <!-- IMPORTING HEADER AND FOOTER: -->
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script> 
         $(function(){
           //$("#header").load("pages/header.html"); 
           $("#footer").load("pages/footer.php"); 
         });
      </script> 
   </head>
   <body class="landing" onload="Init ()">
      <!-- Page Wrapper -->
      <div id="page-wrapper">
         <!-- Header/ Menu -->
         <header id="header" class="alt">
            <h1><a href="index.php"><i class="icon fa-flag-checkered"></i><b> Finish</b>line</a></h1>
            <nav id="nav" class="alt" >
               <ul>
                  <a  style="color:#E6584B"  href="#"><i class="icon fa-home"></i> Home</a>&nbsp;
                  <a  href="#users"><i class="icon fa-users"></i> Users</a>&nbsp;
                  <a  href="pages/functions.php"><i class="icon fa-calculator"></i> Functions</a>&nbsp; 
                  <a  href="pages/distance_list.php"><i class="icon fa-road"></i> Distances</a>&nbsp; 
                  <a  href="pages/points.php"><i class="icon fa-info"></i> Points</a>&nbsp; 
                  <a  href="pages/signup.php"><i class="icon fa-envelope"></i> Contact</a>&nbsp; 
                  <a  href="pages/about.html"><i class="icon fa-user"></i> About Author</a>&nbsp; 
                  <a  class="noline" href="#">&nbsp; 	&nbsp;	|	&nbsp;	&nbsp;</a>
                  <a  href="pages/create_account.php"><i class="icon fa-user-plus"></i> Sign Up</a>&nbsp; 
                  <a  href="pages/login.php"><i class="icon fa-sign-in"></i> Log In</a>
                  <li class="special">
                     <a href="#menu" class="menuToggle"><span>Menu</span></a>
                     <div id="menu">
                        <ul>
                           <li><a style="color:#E6584B" href="index.php">Home</a></li>
                           <li><a href="pages/functions.php">Functions</a></li>
                           <li><a href="pages/distance_list.php">Distances</a></li>
                           <li><a href="pages/points.php">Points</a></li>
                           <li><a href="pages/signup.php">Contact</a></li>
                           <li><a href="pages/about.html">About Author</a></li>
                           <li><a href="http://vojta.users.sonic.net/blog/">Vojta's Main Page</a></li>
                           <br>
                           <li><a href="generic.html">Generic</a></li>
                           <li><a href="elements.html">Elements</a></li>
                           <br>
                           <li><a href="pages/create_account.php">Sign Up</a></li>
                           <li><a href="pages/login.php">Log In</a></li>
                        </ul>
                     </div>
                  </li>
               </ul>
            </nav>
         </header>
         <!-- Intro -->
         <section id="banner">
            <div class="inner">
               <h2><i class="icon fa-flag-checkered"></i><b> Finish</b>line</h2>
               <p>Keep all your race results<br />
                  in one place.<br /><br />
                  created by <a href="http://vojtaripa.com/blog"><b>Vojta Ripa</b></a>.
               </p>
               <ul class="actions">
                  <li><a href="pages/create_account.php" class="button special">Get Started</a></li>
               </ul>
			   
            </div>
            <a href="#about" class="more scrolly">Learn More</a>
         </section>
		 
		  </div>
         <!-- About -->
         <section id="about" class="wrapper style1 special">
            <div class="inner">
               <header class="major">
                  <h2>Welcome to Finishline!</h2>
                  <p>This website was created with a runners in mind,<br />
                     its designed to allow runners keep their race results all in once place. <br>
                     Once you put your race results in, you can easily analyze your performance<br>
                     See trends, best races, totals & averages (miles, time, pace, place.. ect.)<br>
                     Share and compare your results with others!
                  </p>
               </header>
               <ul class="icons major">
                  <li><span class="icon fa-trophy major style1"><span class="label">Trophy</span></span></li>
                  <li><span class="icon fa-users major style2"><span class="label">Users</span></span></li>
                  <li><span class="icon fa-bar-chart major style1"><span class="label">Chart</span></span></li>
                  <li><span class="icon fa-database major style3"><span class="label">Database</span></span></li>
               </ul>
            </div>
         </section>
         <!-- VIDEO -->
         <section id="video" class="wrapper style4">
            <div class="inner">
               <div class="6u 12u$(medium)">
                  <header>
                     <h2>How to use Finishline</h2>
                     <p>Please view my video to get you started with navigation around my site.</p>
                     <!--video-->
                     <iframe width="560" height="315" src="https://www.youtube.com/embed/0ZYh7jzcIMY" frameborder="0" gesture="media" allowfullscreen></iframe>
                     </br></br>
                  </header>
               </div>
               <div class="6u 12u$(medium)">
                  <!--buttons-->
                  <ul class="actions vertical">
                     <li><a href="pages/create_account.php" class="button fit special small">Create Account</a></li>
                     <li><a href="pages/login.php" class="button fit small">Existing User</a></li>
                  </ul>
               </div>
            </div>
         </section>
         <!-- USERS -->
         <section class="wrapper style5" id="users">
            <div class="inner" >
               <header>
                  <h2>Finishline Users</h2>
                  <p>Below are all users that store their race results on Finishline. Please click on one to see their results, or <a href="pages/create_account.php">Create an Account</a> to start tracking your own race results. If you already have an account, <a href="pages/login.php">please loggin</a>.</p>
               </header>
               <!--table-->
            </div>
			
			<section class="wrapper style4">
            
			
			<div class="innerSmall">
            <h5>Users</h5>
            <div class="table-wrapper">
            <table class="alt scroll sortable">
            
            <tr  >
            <th style="width:120px">Count                					</th> <!-- DOES NOT EVEN MOVE -->
            <th style="width:80px">Click to View              					    </th> <!-- DOES NOT EVEN MOVE -->
            <th style="width:100px">First Name            &DownArrowUpArrow;</th> <!-- DOES NOT EVEN MOVE -->
            <th style="width:150px">Last  Name            &DownArrowUpArrow;</th> <!--SORTING TABLE BASED ON INPUT --> <!-- WORKS onclick="sortTable(0)" -->
            <th style="width:120px">Picture                					</th> <!-- DOES NOT EVEN MOVE -->
            <th style="width:250px">Gender                &DownArrowUpArrow;</th> <!-- WORKS-->
            <th style="width:250px">Age               &DownArrowUpArrow;</th> <!-- WORKS-->
            <!-- <th style="width:250px">Total Wins                &DownArrowUpArrow;</th> WORKS-->
            <th style="width:150px">Total Results         &DownArrowUpArrow;</th> <!-- TIME IS NOT SORTED RIGHT... -->
            <th style="width:250px">Last Race Date            &DownArrowUpArrow;</th> <!-- WORKS-->
            <th style="width:150px">Best Race                 &DownArrowUpArrow;</th> <!-- TIME IS NOT SORTED RIGHT... -->
            <th style="width:250px">Best Points Earned        &DownArrowUpArrow;</th> <!-- WORKS-->
            </tr>
            
            <!--table body -->
                                 
            <!-- GETS EACH RACE and Race details-->                     				
            <?php
               $totalCount=0;
               foreach($users as $users):
               	
               	//PICTURE:	
               	
               	//username:
               	$username=$users['username'];
               					
               	//if picture exists, use picture
               	//echo "Picture: " . $users['Picture'];
               	if($users['Picture']!=Null)
               	{
               		$picture= "image/racePics/". $username. "/" . $users['Picture'];
               	} 
               	//else use default
               	else
               	{
               		$picture="image/default.jpg";
               	}
               	
               	
               	//TOTAL RACES:
               	$queryusers = 'SELECT Count(Race) FROM '.$username;
               	$totalRacesArray=queryRaces($queryusers);
               	$totalRaces=$totalRacesArray[0][0];//gets the number of races!				
               	
               	//# of wins:
               	$number_of_wins_Query = 'SELECT Count(*) FROM ' .$username. ' WHERE Place=1';
               	$ResultQuery=queryRaces($number_of_wins_Query);
               	$number_of_wins = $ResultQuery[0][0];
               						
               	//Best event point / rank:
               	$Max_Points_Query = 'SELECT MAX(Points) FROM ' .$username;
               	$ResultQuery=queryRaces($Max_Points_Query);
               	$Max_Points = $ResultQuery[0][0];
               	
               	//Best event point / rank:
               	$Best_Race_Query = 'SELECT Distance FROM ' .$username. ' WHERE Points='.$Max_Points;
               	$ResultQuery=queryRaces($Best_Race_Query);
               	$Best_Race = $ResultQuery[0][0];
               	$Best_Race_Query = 'SELECT distName FROM MyDistances WHERE Distance='.$Best_Race;
               	$ResultQuery=queryRaces($Best_Race_Query);
               	$Best_Race_Name = $ResultQuery[0][0];
               	
               	//Last Race Date:
               	$Last_Race_Date_Query = 'SELECT MAX(Date) FROM ' .$username;
               	$ResultQuery=queryRaces($Last_Race_Date_Query);
               	$Last_Race_Date = $ResultQuery[0][0];
               						
               	//AGE: (get from user)
               	
               ?>	
            <tr  class='clickable-row'  onclick="window.document.location='<?php 
               //echo "index.php?user=". $username;
               echo "pages/RaceResults.php?choice=search&user=".urlencode($username)."&Year=".urlencode('All')."&Distance=".urlencode('All'); 
               ?>';"> 
            <td style="width:100px">  <?php $totalCount++; echo "$totalCount";  			 ?> </td>			
            <td ><a class="button" style="background:#E6584B; color:white;">Results for <?php echo $users['first_name'];                 		 ?></a></td>
            <td style="width:150px">  <?php echo $users['first_name'];                 		 ?> </td>
            <td style="width:250px">  <?php echo $users['last_name'];                        ?> </td>
            <td style="width:120px"> <img height="70px" src="<?php echo $picture; ?>" alt="<?php echo $picture; ?>" ></td>
            <td style="width:150px" > <?php echo $users['sex'];                              ?> </td>
            <!-- <td style="width:150px" > <?php echo $number_of_wins;                              ?> </td>-->
            <td style="width:150px" > <?php echo $users['age'];                              		 ?> </td>
            <td style="width:100px">  <?php echo $totalRaces;                            	 ?></td>	
            <td style="width:150px" > <?php echo $Last_Race_Date;                              ?> </td>
            <td style="width:150px" > <?php echo "$Best_Race_Name"                           ?> </td>
            <td style="width:150px" > <?php echo $Max_Points;                              ?> </td>
            </tr>	
            <?php endforeach; ?>
             	
            <!--Table footer -->	
            <tfoot>
            <tr>
            <td colspan="2"></td>
            <td>TOTALS</td>
            </tr>
            </tfoot>
            </table>
            </div>
            </div>
            </section>
         </section>
         
		 
		 <!--Comments -->
         
		 <section id="cta" class="wrapper style4">
            <div class="inner">
               <!--<h2>Comments:</h2>
                  <p>Please let me know what else you would like to see, I can change, modify, add anything; Open to suggestions!<br></p>-->
               <div style="color:white;" id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">Comment Form</a> is loading comments...</div>
               <link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" />
               <script type="text/javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={};} (function(){var s=document.createElement("script"), l=hcb_user.PAGE || (""+window.location).replace(/'/g,"%27"), h="//www.htmlcommentbox.com";s.setAttribute("type","text/javascript");s.setAttribute("src", h+"/jread?page="+encodeURIComponent(l).replace("+","%2B")+"&mod=%241%24wq1rdBcg%24DnRxkqNQmUnhoputqLMl10"+"&opts=16862&num=10&ts=1499300164544");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
               <!-- end www.htmlcommentbox.com -->
            </div>
         </section>
         <!-- footer -->
         <div id="footer"></div>
     
	  
	  
      <!-- Scripts -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/jquery.scrollex.min.js"></script>
      <script src="assets/js/jquery.scrolly.min.js"></script>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script>
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="assets/js/main.js"></script>
   </body>
</html>