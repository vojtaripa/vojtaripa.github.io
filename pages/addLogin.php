<?php
// Start session management and include necessary functions
session_start();
require_once ('../image/file_util.php'); // the get_file_list function
require_once ('../image/image_util.php'); // the process_image function
require_once('database.php');




//include 'indexPHP.php';
//require_once('model/admin_db.php');

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

// Get the action to perform
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_admin_menu';
    }
}

// If the user isn't logged in, force the user to login
if (!isset($_SESSION['is_valid_admin'])) 
{
    $action = 'login';
}


// Check the CAPTCHA pass-phrase for verification
    $user_pass_phrase = SHA1($_POST['verify']);
	/*$testblank = SHA1("jquscn"); //2690e0ec4aab8d23a16d7a1688fbc69fe7ed5a0b 
	
	//echo "Session: $_SESSION['pass_phrase'] <br>";
	//echo "User: $user_pass_phrase <br>";
	$test = $_POST['verify'];
	$sesh = $_SESSION['pass_phrase'];
	echo "the post string: $test <br>";
	echo "the captcha string: $sesh <br>";
	echo "passphrase: $pass_phrase <BR>";	
	echo "user hashed pass phrase: $user_pass_phrase <br>";
	echo "my pass phrase b4 hash: $mypass_phrase <br>";
	echo "Test Blank: $testblank <br>";*/

	
		
//INPUTS:
//****************************************************************************** 	
$myusername = filter_input(INPUT_POST, 'myusername');
$pass1 = filter_input(INPUT_POST, 'password1');
$pass2 = filter_input(INPUT_POST, 'password2');
$first_name = filter_input(INPUT_POST, 'first_name');
$last_name  = filter_input(INPUT_POST, 'last_name');
$email      = filter_input(INPUT_POST, 'email');
$sex        = filter_input(INPUT_POST, 'gender');
$age        = filter_input(INPUT_POST, 'age');
$webpage    = filter_input(INPUT_POST, 'webpage');
$about      = filter_input(INPUT_POST, 'About');

$todaysDate = date('Y-m-d');
$default_date = new DateTime();
//$todaysDate = date_create($todaysDate);
//$todaysDate="";

//date user ADDED
/*echo $myusername. "<br>";
echo $pass1. "<br>";
echo $pass2. "<br>";
echo $age. "<br>";
echo $first_name. "<br>";
echo $last_name. "<br>";
echo $email. "<br>";
echo $sex. "<br>";
echo $webpage . "<br>";
echo $todaysDate."<br>";*/
//****************************************************************************** 


/*   might need to add checker if USER already exists.   */
//SPITS OUT "ALL" users and info
//****************************************************************************** 

	$queryusers = "SELECT * FROM users WHERE username='" . $myusername ."'";

	//ALL USERS STORED IN HERE:
	$username_taken=queryRaces($queryusers);
	//var_dump($queryusers);
	//var_dump($users);
	if($username_taken!=NULL)
	{
		echo "<br><br><br><h1 style='background-color:#E6594D; color:white'>Sorry, username already taken.</h1>";
		include('create_account.php');
		exit();
	}
	
	//for()
//****************************************************************************** 




	// Captcha Verified
	if ($_SESSION['pass_phrase'] == $user_pass_phrase) 
	{
	//*********** Validate Password ******************************************
	//$email = "abc123@lolhaha"; // Invalid email address 
	//echo "Captcha Verified";
			
			//PASSWORD DONT MATCH
			if($pass1 != $pass2) 
			{
				 echo "<br><br><br><h1 style='background-color:#E6594D; color:white'>Passwords do not match, please try again.</h1>";
				 include('create_account.php');
				 exit();
			} 
			
			//IF ANYTHING IS BLANK
			else if ($myusername == null || $myusername == false || $pass1 == null || $pass1 == false ) 
			{
				echo "<br><br><br><h1 style='background-color:#E6594D; color:white'>Invalid username or password. Check all fields and try again.</h1>";
				$error = "<br><br><br><h1 style='background-color:#E6594D; color:white'>Invalid username or password. Check all fields and try again.</h1>";
				include('error.php');
				exit();
			} 

			//GOOD!
			else 
			{
				
				//****************************************************************************** 

				$messageADMIN="
												
												<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
									<html xmlns='http://www.w3.org/1999/xhtml'>

									<head>
									  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
									  <title>Welcome to Finishline!</title>
									  <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
									</head>

									<body bgcolor='#FFFFFF'>
									  <table border='0' cellpadding='10' cellspacing='0' style=
									  'background-color: #FFFFFF' width='100%'>
										<tr>
										  <td>
											<!--[if (gte mso 9)|(IE)]>
										  <table width='600' align='center' cellpadding='0' cellspacing='0' border='0'>
											<tr>
											  <td>
										<![endif]-->

											<table align='center' border='0' cellpadding='0' cellspacing='0' class=
											'content' style='background-color: #FFFFFF'>
											  <tr>
												<td id='templateContainerHeader' valign='top' mc:edit='welcomeEdit-01'>
												  <p style='text-align:center;margin:0;padding:0;'><img src=
												  'http://vojta.users.sonic.net/finishline/images/finishlogo1.png'
												  style='display:inline-block;'></p>
												</td>
											  </tr>

											  <tr>
												<td align='center' valign='top'>
												  <table border='0' cellpadding='0' cellspacing='0' class=
												  'brdBottomPadd-two' id='templateContainer' width='100%'>
													<tr>
													  <td class='bodyContent' valign='top' mc:edit='welcomeEdit-02'>
											
											<h1><strong>A new user: $myusername signed up <br><br> for Finishline. &#x1F3C1; &#x1F3C3; &#x1F3C1;</strong></h1>

											
											 <table id='customers'>
											  <tr>
											   <th>Value Name</th> <th>Value</th> </tr>
												<tr>
												 <td>USERNAME</td> <td>$myusername</td> 
												</tr>
												<tr>
												 <td>PASSWORD</td> <td>$pass1</td>
												</tr>
												<tr>
												 <td>NAME</td> <td>$first_name</td>
												</tr>
												<tr>
												 <td>LAST NAME</td> <td>$last_name</td>
												</tr>
												<tr>
												 <td>AGE</td> <td>$age</td>
												</tr>
												<tr>
												 <td>EMAIL</td> <td>$email</td>
												</tr>
												<tr>
												 <td>GENDER</td> <td>$sex</td>
												</tr>
												<tr>
												 <td>WEBSITE</td> <td>$webpage</td>
												</tr>
											</table>
											<br>
											
										  </td>
										</tr>

										<tr align='top'>
										  <td class='bodyContentImage' valign='top'>
											<table border='0' cellpadding='0' cellspacing='0'>
											  <tr>
												<td align='left' style='margin:0;padding:0;' valign=
												'top' width='50' mc:edit='welcomeEdit-03'>
												  <p style='margin-bottom:10px'><img src=
												  'https://media.licdn.com/mpr/mpr/shrinknp_400_400/AAIABADGAAwAAQAAAAAAAA0RAAAAJGI2YzNjMjAyLTcyNTYtNDA3ZS05NGE4LTVhODYwZWRhZDgxMQ.jpg'
												  style='display:block;'></p>
												</td>

												<td align='left' style='width:15px;margin:0;padding:0;'
												valign='top' width='15'>&nbsp;</td>

												<td align='left' style=
												'margin:0;padding-top:10px;line-height:1;' valign=
												'top' mc:edit='welcomeEdit-04'>
												  <h4><strong>Vojta Ripa</strong></h4>

												  <h5>Finishline founder & developer </h5>
												</td>
											  </tr>
											</table>
										  </td>
										</tr>
									  </table>
									</td>
								  </tr>
								  
								   <tr>
									<td align='center'>

								  
								

									</td>
								  </tr>

								  <tr>
									<td align='center' valign='top'>
									  <!-- BEGIN BODY // -->

									  <table border='0' cellpadding='0' cellspacing='0' id=
									  'templateContainerMiddleBtm' width='100%'>
										<tr>
										  <td class='bodyContent' valign='top' mc:edit='welcomeEdit-11'>
											<h3><strong>Get back to Finishline</strong></h3>

											<h4>Go to Finishline and check out your race results as well as results of others! Get next race ideas and maybe even find a running partner that runs similar pace.</h4><a class='blue-btn' href=
											'http://vojta.users.sonic.net/finishline/#users'><strong>Finishline Home</strong></a>
										  </td>
										</tr>
									  </table><!-- // END BODY -->
									</td>
								  </tr>

								  <tr>
									<td align='center' class='unSubContent' id='bodyCellFooter' valign=
									'top'>
									  <table border='0' cellpadding='0' cellspacing='0' id=
									  'templateContainerFooter' width='100%'>
										<tr>
										  <td valign='top' width='100%' mc:edit='welcomeEdit-11'>
											<p style='text-align:center;'><img src=
											'http://c0185784a2b233b0db9b-d0e5e4adc266f8aacd2ff78abb166d77.r51.cf2.rackcdn.com/templates/cog-03.jpg'
											style='margin:0 auto 0 auto;display:inline-block;'></p>

											<h6 style='text-align:center;margin-top: 9px;'>Finishline Inc</h6>

											<h6 style='text-align:center;'>Created&#8203; by:&#8203; </h6>

											<h6 style='text-align:center;'>Vojta&#8203; Ripa&#8203; </h6>

											<h6 style='text-align:center;margin-top: 7px;'><a href=
											'--unsubscribe--'>unsubscribe</a></h6>
										  </td>
										</tr>
									  </table>
									</td>
								  </tr>
								</table><!--[if (gte mso 9)|(IE)]>
								  </td>
								</tr>
							</table>
							<![endif]-->
							  </td>
							</tr>
						  </table>

						  <style type='text/css'>
						  
						  
						  #customers {
							font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
							border-collapse: collapse;
							width: 100%;
								}

								#customers td, #customers th {
									border: 1px solid #ddd;
									padding: 8px;
								}

								#customers tr:nth-child(even){background-color: #f2f2f2;}

								#customers tr:hover {background-color: #ddd;}

								#customers th {
									padding-top: 12px;
									padding-bottom: 12px;
									text-align: left;
									background-color: #3386e4;
									color: white;
								}

							span.preheader {
							display:none!important
							}
							td ul li {
							  font-size: 16px;
							}

							/* /\/\/\/\/\/\/\/\/ CLIENT-SPECIFIC STYLES /\/\/\/\/\/\/\/\/ */
							#outlook a {
							padding:0
							}

							/* Force Outlook to provide a 'view in browser' message */
							.ReadMsgBody {
							width:100%
							}

							.ExternalClass {
							width:100%
							}

							/* Force Hotmail to display emails at full width */
							.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div {
							line-height:100%
							}

							/* Force Hotmail to display normal line spacing */
							body,table,td,p,a,li,blockquote {
							-webkit-text-size-adjust:100%;
							-ms-text-size-adjust:100%
							}

							/* Prevent WebKit and Windows mobile changing default text sizes */
							table,td {
							mso-table-lspace:0;
							mso-table-rspace:0
							}

							/* Remove spacing between tables in Outlook 2007 and up */
							/* /\/\/\/\/\/\/\/\/ RESET STYLES /\/\/\/\/\/\/\/\/ */
							body {
							margin:0;
							padding:0
							}

							img {
							max-width:100%;
							border:0;
							line-height:100%;
							outline:none;
							text-decoration:none
							}

							table {
							border-collapse:collapse!important
							}

							.content {
							width:100%;
							max-width:600px
							}

							.content img {
							height:auto;
							min-height:1px
							}

							#bodyTable {
							margin:0;
							padding:0;
							width:100%!important
							}

							#bodyCell {
							margin:0;
							padding:0
							}

							#bodyCellFooter {
							margin:0;
							padding:0;
							width:100%!important;
							padding-top:39px;
							padding-bottom:15px
							}

							body {
							margin:0;
							padding:0;
							min-width:100%!important
							}

							#templateContainerHeader {
							font-size:14px;
							padding-top:2.429em;
							padding-bottom:.929em
							}

							#templateContainerFootBrd {
							border-bottom:1px solid #e2e2e2;
							border-left:1px solid #e2e2e2;
							border-right:1px solid #e2e2e2;
							border-radius:0 0 4px 4px;
							background-clip:padding-box;
							border-spacing:0;
							height:10px;
							width:100%!important
							}

							#templateContainer {
							border-top:1px solid #e2e2e2;
							border-left:1px solid #e2e2e2;
							border-right:1px solid #e2e2e2;
							border-radius:4px 4px 0 0;
							background-clip:padding-box;
							border-spacing:0
							}

							#templateContainerMiddle {
							border-left:1px solid #e2e2e2;
							border-right:1px solid #e2e2e2
							}

							#templateContainerMiddleBtm {
							border-left:1px solid #e2e2e2;
							border-right:1px solid #e2e2e2;
							border-bottom:1px solid #e2e2e2;
							border-radius:0 0 4px 4px;
							background-clip:padding-box;
							border-spacing:0
							}

							#templateContainerMiddleBtm .bodyContent {
							padding-bottom:2em
							}

							/**
							* @tab Page
							* @section heading 1
							* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
							* @style heading 1
							*/
							h1 {
							color:#2e2e2e;
							display:block;
							font-family:Helvetica;
							font-size:26px;
							line-height:1.385em;
							font-style:normal;
							font-weight:400;
							letter-spacing:normal;
							margin-top:0;
							margin-right:0;
							margin-bottom:15px;
							margin-left:0;
							text-align:left
							}

							/**
							* @tab Page
							* @section heading 2
							* @tip Set the styling for all second-level headings in your emails.
							* @style heading 2
							*/
							h2 {
							color:#2e2e2e;
							display:block;
							font-family:Helvetica;
							font-size:22px;
							line-height:1.455em;
							font-style:normal;
							font-weight:400;
							letter-spacing:normal;
							margin-top:0;
							margin-right:0;
							margin-bottom:15px;
							margin-left:0;
							text-align:left
							}

							/**
							* @tab Page
							* @section heading 3
							* @tip Set the styling for all third-level headings in your emails.
							* @style heading 3
							*/
							h3 {
							color:#545454;
							display:block;
							font-family:Helvetica;
							font-size:18px;
							line-height:1.444em;
							font-style:normal;
							font-weight:400;
							letter-spacing:normal;
							margin-top:0;
							margin-right:0;
							margin-bottom:15px;
							margin-left:0;
							text-align:left
							}

							/**
							* @tab Page
							* @section heading 4
							* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
							* @style heading 4
							*/
							h4 {
							color:#545454;
							display:block;
							font-family:Helvetica;
							font-size:14px;
							line-height:1.571em;
							font-style:normal;
							font-weight:400;
							letter-spacing:normal;
							margin-top:0;
							margin-right:0;
							margin-bottom:15px;
							margin-left:0;
							text-align:left
							}

							h5 {
							color:#545454;
							display:block;
							font-family:Helvetica;
							font-size:13px;
							line-height:1.538em;
							font-style:normal;
							font-weight:400;
							letter-spacing:normal;
							margin-top:0;
							margin-right:0;
							margin-bottom:15px;
							margin-left:0;
							text-align:left
							}

							h6 {
							color:#545454;
							display:block;
							font-family:Helvetica;
							font-size:12px;
							line-height:2em;
							font-style:normal;
							font-weight:400;
							letter-spacing:normal;
							margin-top:0;
							margin-right:0;
							margin-bottom:15px;
							margin-left:0;
							text-align:left
							}

							p {
							color:#545454;
							display:block;
							font-family:Helvetica;
							font-size:16px;
							line-height:1.5em;
							font-style:normal;
							font-weight:400;
							letter-spacing:normal;
							margin-top:0;
							margin-right:0;
							margin-bottom:15px;
							margin-left:0;
							text-align:left
							}

							.unSubContent a:visited {
							color:#a1a1a1;
							text-decoration:underline;
							font-weight:400
							}

							.unSubContent a:focus {
							color:#a1a1a1;
							text-decoration:underline;
							font-weight:400
							}

							.unSubContent a:hover {
							color:#a1a1a1;
							text-decoration:underline;
							font-weight:400
							}

							.unSubContent a:link {
							color:#a1a1a1;
							text-decoration:underline;
							font-weight:400
							}

							.unSubContent a .yshortcuts {
							color:#a1a1a1;
							text-decoration:underline;
							font-weight:400
							}

							.unSubContent h6 {
							color:#a1a1a1;
							font-size:12px;
							line-height:1.5em;
							margin-bottom:0
							}

							.bodyContent {
							color:#505050;
							font-family:Helvetica;
							font-size:14px;
							line-height:150%;
							padding-top:3.143em;
							padding-right:3.5em;
							padding-left:3.5em;
							padding-bottom:.714em;
							text-align:left
							}

							.bodyContentImage {
							color:#505050;
							font-family:Helvetica;
							font-size:14px;
							line-height:150%;
							padding-top:0;
							padding-right:3.571em;
							padding-left:3.571em;
							padding-bottom:1.357em;
							text-align:left
							}

							.bodyContentImage h4 {
							color:#4E4E4E;
							font-size:13px;
							line-height:1.154em;
							font-weight:400;
							margin-bottom:0
							}

							.bodyContentImage h5 {
							color:#828282;
							font-size:12px;
							line-height:1.667em;
							margin-bottom:0
							}

							/**
							* @tab Body
							* @section body link
							* @tip Set the styling for your email's main content links. Choose a color that helps them stand out from your text.
							*/
							a:visited {
							color:#3386e4;
							text-decoration:none;
							}

							a:focus {
							color:#3386e4;
							text-decoration:none;
							}

							a:hover {
							color:#3386e4;
							text-decoration:none;
							}

							a:link {
							color:#3386e4;
							text-decoration:none;
							}

							a .yshortcuts {
							color:#3386e4;
							text-decoration:none;
							}

							.bodyContent img {
							height:auto;
							max-width:498px
							}

							.footerContent {
							color:gray;
							font-family:Helvetica;
							font-size:10px;
							line-height:150%;
							padding-top:2em;
							padding-right:2em;
							padding-bottom:2em;
							padding-left:2em;
							text-align:left
							}

							/**
							* @tab Footer
							* @section footer link
							* @tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
							*/
							.footerContent a:link,.footerContent a:visited,/* Yahoo! Mail Override */ .footerContent a .yshortcuts,.footerContent a span /* Yahoo! Mail Override */ {
							color:#606060;
							font-weight:400;
							text-decoration:underline
							}

							/**
							* @tab Footer
							* @section footer link
							* @tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
							*/
							.bodyContentImageFull p {
							font-size:0!important;
							margin-bottom:0!important
							}

							.brdBottomPadd {
							border-bottom:1px solid #f0f0f0
							}

							.brdBottomPadd-two {
							border-bottom:1px solid #f0f0f0
							}

							.brdBottomPadd .bodyContent {
							padding-bottom:2.286em
							}

							.brdBottomPadd-two .bodyContent {
							padding-bottom:.857em
							}

							a.blue-btn {
							  background: #5098ea;
							  display: inline-block;
							  color: #FFFFFF;
							  border-top:10px solid #5098ea;
							  border-bottom:10px solid #5098ea;
							  border-left:20px solid #5098ea;
							  border-right:20px solid #5098ea;
							  text-decoration: none;
							  font-size: 14px;
							  margin-top: 1.0em;
							  border-radius: 3px 3px 3px 3px;
							  background-clip: padding-box;
							}

							.bodyContentTicks {
							color:#505050;
							font-family:Helvetica;
							font-size:14px;
							line-height:150%;
							padding-top:2.857em;
							padding-right:3.5em;
							padding-left:3.5em;
							padding-bottom:1.786em;
							text-align:left
							}

							.splitTicks {
							width:100%
							}

							.splitTicks--one {
							width:19%;
							color:#505050;
							font-family:Helvetica;
							font-size:14px;
							padding-bottom:1.143em
							}

							.splitTicks--two {
							width:5%
							}

							.splitTicks--three {
							width:71%;
							color:#505050;
							font-family:Helvetica;
							font-size:14px;
							padding-top:.714em
							}

							.splitTicks--three h3 {
							margin-bottom:.278em
							}

							.splitTicks--four {
							width:5%
							}

							@media only screen and (max-width: 550px),screen and (max-device-width: 550px) {
							body[yahoo] .hide {
							display:none!important
							}

							body[yahoo] .buttonwrapper {
							background-color:transparent!important
							}

							body[yahoo] .button {
							padding:0!important
							}

							body[yahoo] .button a {
							background-color:#e05443;
							padding:15px 15px 13px!important
							}

							body[yahoo] .unsubscribe {
							font-size:14px;
							display:block;
							margin-top:.714em;
							padding:10px 50px;
							background:#2f3942;
							border-radius:5px;
							text-decoration:none!important
							}
							}

							@media only screen and (max-width: 480px),screen and (max-device-width: 480px) {
							  .bodyContentTicks {
								padding:6% 5% 5% 6%!important
							  }

							  .bodyContentTicks td {
								padding-top:0!important
							  }

							  h1 {
								font-size:34px!important
							  }

							  h2 {
								font-size:30px!important
							  }

							  h3 {
								font-size:24px!important
							  }

							  h4 {
								font-size:18px!important
							  }

							  h5 {
								font-size:16px!important
							  }

							  h6 {
								font-size:14px!important
							  }

							  p {
								font-size:18px!important
							  }

							  .brdBottomPadd .bodyContent {
								padding-bottom:2.286em!important
							  }

							  .brdBottomPadd-two .bodyContent {
								padding-bottom:.857em!important
							  }

							  #templateContainerMiddleBtm .bodyContent {
								padding:6% 5% 5% 6%!important
							  }

							  .bodyContent {
								padding:6% 5% 1% 6%!important
							  }

							  .bodyContent img {
								max-width:100%!important
							  }

							  .bodyContentImage {
								padding:3% 6% 6%!important
							  }

							  .bodyContentImage img {
								max-width:100%!important
							  }

							  .bodyContentImage h4 {
								font-size:16px!important
							  }

							  .bodyContentImage h5 {
								font-size:15px!important;
								margin-top:0
							  }
							}
							.ii a[href] {color: inherit !important;}
							span > a, span > a[href] {color: inherit !important;}
							a > span, .ii a[href] > span {text-decoration: inherit !important;}
						  </style>

						</body>
						</html>
						
						";
				//****************************************************************************** 
						$messageUSER="
						
						
							
										
							<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
							<html xmlns='http://www.w3.org/1999/xhtml'>

							<head>
							  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
							  <title>Welcome to Finishline!</title>
							  <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
							</head>

							<body bgcolor='#FFFFFF'>
							  <table border='0' cellpadding='10' cellspacing='0' style=
							  'background-color: #FFFFFF' width='100%'>
								<tr>
								  <td>
									<!--[if (gte mso 9)|(IE)]>
								  <table width='600' align='center' cellpadding='0' cellspacing='0' border='0'>
									<tr>
									  <td>
								<![endif]-->

									<table align='center' border='0' cellpadding='0' cellspacing='0' class=
									'content' style='background-color: #FFFFFF'>
									  <tr>
										<td id='templateContainerHeader' valign='top' mc:edit='welcomeEdit-01'>
										  <p style='text-align:center;margin:0;padding:0;'><img src=
										  'http://vojta.users.sonic.net/finishline/images/finishlogo1.png'
										  style='display:inline-block;'></p>
										</td>
									  </tr>

									  <tr>
										<td align='center' valign='top'>
										  <table border='0' cellpadding='0' cellspacing='0' class=
										  'brdBottomPadd-two' id='templateContainer' width='100%'>
											<tr>
											  <td class='bodyContent' valign='top' mc:edit='welcomeEdit-02'>
												<p>Hi $first_name,</p>

												<h1><strong>Congratulations on signing up<br><br>
												for Finishline! &#x1F3C1; &#x1F3C3; &#x1F3C1;</strong></h1>

												<h3>Thanks for joining our free community of runners.
												Finishline is here to allow you to store and see all of you race results in one place.
												Check out everyone's race results, and analyze your own!
												Finishline will make it easy to find, sort, filter, and total all of your race results, as well
												as find all of your PRs in various distances. It will then graph them for you for visual display and 
												even geocode them and add them on a map for you!<br><br>
												Please let me know what you think of the website. If you can give me any feedback what you like, dont like, want added/ changed that would be greatly appreciated!
														<br><br> Your username is:<b> $myusername </b> <br><br>Your password is: <b>$pass1 </b><br><br> Please keep these for your reference. <br><br> 
														Enjoy the website! <br><br>
												</h3>
											  </td>
											</tr>

											<tr align='top'>
											  <td class='bodyContentImage' valign='top'>
												<table border='0' cellpadding='0' cellspacing='0'>
												  <tr>
													<td align='left' style='margin:0;padding:0;' valign=
													'top' width='50' mc:edit='welcomeEdit-03'>
													  <p style='margin-bottom:10px'><img src=
													  'https://media.licdn.com/mpr/mpr/shrinknp_400_400/AAIABADGAAwAAQAAAAAAAA0RAAAAJGI2YzNjMjAyLTcyNTYtNDA3ZS05NGE4LTVhODYwZWRhZDgxMQ.jpg'
													  style='display:block;'></p>
													</td>

													<td align='left' style='width:15px;margin:0;padding:0;'
													valign='top' width='15'>&nbsp;</td>

													<td align='left' style=
													'margin:0;padding-top:10px;line-height:1;' valign=
													'top' mc:edit='welcomeEdit-04'>
													  <h4><strong>Vojta Ripa</strong></h4>

													  <h5>Finishline founder & developer </h5>
													</td>
												  </tr>
												</table>
											  </td>
											</tr>
										  </table>
										</td>
									  </tr>

									  <tr>
										<td align='center'>

										  <table border='0' cellpadding='0' cellspacing='0' class='brdBottomPadd-two ' id='templateContainerMiddle' width='100%'>
											<tr valign='top'>
											  <td align='center' class='bodyContentTicks'>
												<table border='0' cellpadding='0' cellspacing='0' width='100%'>

												  <tr valign='top'>
													<td valign='top' mc:edit='welcomeEditImgFirst' style='width:19%;color:#505050;font-family:Helvetica;font-size:14px;padding-bottom:1.143em;'>
													  <p style=
													  'text-align:center;margin:0 0 15px 0;padding:0;'>
													  <img height='' src=
													  'http://c0185784a2b233b0db9b-d0e5e4adc266f8aacd2ff78abb166d77.r51.cf2.rackcdn.com/templates/circle.jpg'
													  style='display:block;' width='91'></p>
													</td>

													<td valign='top' style='width:5%;'>&nbsp;</td>

													<td valign='top' mc:edit='welcomeEditTxtFirst' style='width:71%;color:#505050;font-family:Helvetica;font-size:14px;padding-top:0.714em;'>
													  <h3><strong>Please Log In!</strong></h3>
													  <h4>Your next step will be to login. Once you are logged in, you have access to add, delete and modify your races. If you dont log in, you will only be able to view and filter your results.
													  Please login here: <a href='http://vojta.users.sonic.net/finishline/pages/login.php'>Log In</a></h4>
													</td>

													<td valign='top' style='width:5%;'>&nbsp;</td>
												  </tr>

												  <tr valign='top'>
													<td valign='top' mc:edit='welcomeEditImgFirst' style='width:19%;color:#505050;font-family:Helvetica;font-size:14px;padding-bottom:1.143em;'>
													  <p style=
													  'text-align:center;margin:0 0 15px 0;padding:0;'>
													  <img height='' src=
													  'http://c0185784a2b233b0db9b-d0e5e4adc266f8aacd2ff78abb166d77.r51.cf2.rackcdn.com/templates/circle.jpg'
													  style='display:block;' width='91'></p>
													</td>

													<td valign='top' style='width:5%;'>&nbsp;</td>

													<td valign='top' mc:edit='welcomeEditTxtFirst' style='width:71%;color:#505050;font-family:Helvetica;font-size:14px;padding-top:0.714em;'>
													  <h3><strong>Add your first race result</strong></h3>
													  <h4>Once you are logged in, you can start adding race results! Hopefully you know them from memory, but if not I included some webpages to search race results on the add race page.
													  I'm currently working on adding races automatically from various websites! Stay tuned.</h4>
													</td>

													<td valign='top' style='width:5%;'>&nbsp;</td>
												  </tr>

												  <tr valign='top'>
													<td valign='top' mc:edit='welcomeEditImgFirst' style='width:19%;color:#505050;font-family:Helvetica;font-size:14px;padding-bottom:1.143em;'>
													  <p style=
													  'text-align:center;margin:0 0 15px 0;padding:0;'>
													  <img height='' src=
													  'http://c0185784a2b233b0db9b-d0e5e4adc266f8aacd2ff78abb166d77.r51.cf2.rackcdn.com/templates/circle.jpg'
													  style='display:block;' width='91'></p>
													</td>

													<td valign='top' style='width:5%;'>&nbsp;</td>

													<td valign='top' mc:edit='welcomeEditTxtFirst'>
													  <h3><strong>Analyze Results</strong></h3>
													  <h4>Once you have a few results added, you can start analyzing your race results and looking at your PRs! (I have a hard time remembering my PRs and times, but luckly this site makes it easy!)</h4>
													</td>

													<td valign='top' style='width:5%;'>&nbsp;</td>
												  </tr>

												</table>
											  </td>

											</tr>
										  </table>

										</td>
									  </tr>

									  <tr>
										<td align='center' valign='top'>
										  <!-- BEGIN BODY // -->

										  <table border='0' cellpadding='0' cellspacing='0' id=
										  'templateContainerMiddleBtm' width='100%'>
											<tr>
											  <td class='bodyContent' valign='top' mc:edit='welcomeEdit-11'>
												<h3><strong>Get back to Finishline</strong></h3>

												<h4>Go to Finishline and check out your race results as well as results of others! Get next race ideas and maybe even find a running partner that runs similar pace.</h4><a class='blue-btn' href=
												'http://vojta.users.sonic.net/finishline/'><strong>Finishline Home</strong></a>
											  </td>
											</tr>
										  </table><!-- // END BODY -->
										</td>
									  </tr>

									  <tr>
										<td align='center' class='unSubContent' id='bodyCellFooter' valign=
										'top'>
										  <table border='0' cellpadding='0' cellspacing='0' id=
										  'templateContainerFooter' width='100%'>
											<tr>
											  <td valign='top' width='100%' mc:edit='welcomeEdit-11'>
												<p style='text-align:center;'><img src=
												'http://c0185784a2b233b0db9b-d0e5e4adc266f8aacd2ff78abb166d77.r51.cf2.rackcdn.com/templates/cog-03.jpg'
												style='margin:0 auto 0 auto;display:inline-block;'></p>

												<h6 style='text-align:center;margin-top: 9px;'>Finishline Inc</h6>

												<h6 style='text-align:center;'>Created&#8203; by:&#8203; </h6>

												<h6 style='text-align:center;'>Vojta&#8203; Ripa&#8203; </h6>

												<h6 style='text-align:center;margin-top: 7px;'><a href=
												'--unsubscribe--'>unsubscribe</a></h6>
											  </td>
											</tr>
										  </table>
										</td>
									  </tr>
									</table><!--[if (gte mso 9)|(IE)]>
									  </td>
									</tr>
								</table>
								<![endif]-->
								  </td>
								</tr>
							  </table>

							  <style type='text/css'>

								span.preheader {
								display:none!important
								}
								td ul li {
								  font-size: 16px;
								}

								/* /\/\/\/\/\/\/\/\/ CLIENT-SPECIFIC STYLES /\/\/\/\/\/\/\/\/ */
								#outlook a {
								padding:0
								}

								/* Force Outlook to provide a 'view in browser' message */
								.ReadMsgBody {
								width:100%
								}

								.ExternalClass {
								width:100%
								}

								/* Force Hotmail to display emails at full width */
								.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div {
								line-height:100%
								}

								/* Force Hotmail to display normal line spacing */
								body,table,td,p,a,li,blockquote {
								-webkit-text-size-adjust:100%;
								-ms-text-size-adjust:100%
								}

								/* Prevent WebKit and Windows mobile changing default text sizes */
								table,td {
								mso-table-lspace:0;
								mso-table-rspace:0
								}

								/* Remove spacing between tables in Outlook 2007 and up */
								/* /\/\/\/\/\/\/\/\/ RESET STYLES /\/\/\/\/\/\/\/\/ */
								body {
								margin:0;
								padding:0
								}

								img {
								max-width:100%;
								border:0;
								line-height:100%;
								outline:none;
								text-decoration:none
								}

								table {
								border-collapse:collapse!important
								}

								.content {
								width:100%;
								max-width:600px
								}

								.content img {
								height:auto;
								min-height:1px
								}

								#bodyTable {
								margin:0;
								padding:0;
								width:100%!important
								}

								#bodyCell {
								margin:0;
								padding:0
								}

								#bodyCellFooter {
								margin:0;
								padding:0;
								width:100%!important;
								padding-top:39px;
								padding-bottom:15px
								}

								body {
								margin:0;
								padding:0;
								min-width:100%!important
								}

								#templateContainerHeader {
								font-size:14px;
								padding-top:2.429em;
								padding-bottom:.929em
								}

								#templateContainerFootBrd {
								border-bottom:1px solid #e2e2e2;
								border-left:1px solid #e2e2e2;
								border-right:1px solid #e2e2e2;
								border-radius:0 0 4px 4px;
								background-clip:padding-box;
								border-spacing:0;
								height:10px;
								width:100%!important
								}

								#templateContainer {
								border-top:1px solid #e2e2e2;
								border-left:1px solid #e2e2e2;
								border-right:1px solid #e2e2e2;
								border-radius:4px 4px 0 0;
								background-clip:padding-box;
								border-spacing:0
								}

								#templateContainerMiddle {
								border-left:1px solid #e2e2e2;
								border-right:1px solid #e2e2e2
								}

								#templateContainerMiddleBtm {
								border-left:1px solid #e2e2e2;
								border-right:1px solid #e2e2e2;
								border-bottom:1px solid #e2e2e2;
								border-radius:0 0 4px 4px;
								background-clip:padding-box;
								border-spacing:0
								}

								#templateContainerMiddleBtm .bodyContent {
								padding-bottom:2em
								}

								/**
								* @tab Page
								* @section heading 1
								* @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
								* @style heading 1
								*/
								h1 {
								color:#2e2e2e;
								display:block;
								font-family:Helvetica;
								font-size:26px;
								line-height:1.385em;
								font-style:normal;
								font-weight:400;
								letter-spacing:normal;
								margin-top:0;
								margin-right:0;
								margin-bottom:15px;
								margin-left:0;
								text-align:left
								}

								/**
								* @tab Page
								* @section heading 2
								* @tip Set the styling for all second-level headings in your emails.
								* @style heading 2
								*/
								h2 {
								color:#2e2e2e;
								display:block;
								font-family:Helvetica;
								font-size:22px;
								line-height:1.455em;
								font-style:normal;
								font-weight:400;
								letter-spacing:normal;
								margin-top:0;
								margin-right:0;
								margin-bottom:15px;
								margin-left:0;
								text-align:left
								}

								/**
								* @tab Page
								* @section heading 3
								* @tip Set the styling for all third-level headings in your emails.
								* @style heading 3
								*/
								h3 {
								color:#545454;
								display:block;
								font-family:Helvetica;
								font-size:18px;
								line-height:1.444em;
								font-style:normal;
								font-weight:400;
								letter-spacing:normal;
								margin-top:0;
								margin-right:0;
								margin-bottom:15px;
								margin-left:0;
								text-align:left
								}

								/**
								* @tab Page
								* @section heading 4
								* @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
								* @style heading 4
								*/
								h4 {
								color:#545454;
								display:block;
								font-family:Helvetica;
								font-size:14px;
								line-height:1.571em;
								font-style:normal;
								font-weight:400;
								letter-spacing:normal;
								margin-top:0;
								margin-right:0;
								margin-bottom:15px;
								margin-left:0;
								text-align:left
								}

								h5 {
								color:#545454;
								display:block;
								font-family:Helvetica;
								font-size:13px;
								line-height:1.538em;
								font-style:normal;
								font-weight:400;
								letter-spacing:normal;
								margin-top:0;
								margin-right:0;
								margin-bottom:15px;
								margin-left:0;
								text-align:left
								}

								h6 {
								color:#545454;
								display:block;
								font-family:Helvetica;
								font-size:12px;
								line-height:2em;
								font-style:normal;
								font-weight:400;
								letter-spacing:normal;
								margin-top:0;
								margin-right:0;
								margin-bottom:15px;
								margin-left:0;
								text-align:left
								}

								p {
								color:#545454;
								display:block;
								font-family:Helvetica;
								font-size:16px;
								line-height:1.5em;
								font-style:normal;
								font-weight:400;
								letter-spacing:normal;
								margin-top:0;
								margin-right:0;
								margin-bottom:15px;
								margin-left:0;
								text-align:left
								}

								.unSubContent a:visited {
								color:#a1a1a1;
								text-decoration:underline;
								font-weight:400
								}

								.unSubContent a:focus {
								color:#a1a1a1;
								text-decoration:underline;
								font-weight:400
								}

								.unSubContent a:hover {
								color:#a1a1a1;
								text-decoration:underline;
								font-weight:400
								}

								.unSubContent a:link {
								color:#a1a1a1;
								text-decoration:underline;
								font-weight:400
								}

								.unSubContent a .yshortcuts {
								color:#a1a1a1;
								text-decoration:underline;
								font-weight:400
								}

								.unSubContent h6 {
								color:#a1a1a1;
								font-size:12px;
								line-height:1.5em;
								margin-bottom:0
								}

								.bodyContent {
								color:#505050;
								font-family:Helvetica;
								font-size:14px;
								line-height:150%;
								padding-top:3.143em;
								padding-right:3.5em;
								padding-left:3.5em;
								padding-bottom:.714em;
								text-align:left
								}

								.bodyContentImage {
								color:#505050;
								font-family:Helvetica;
								font-size:14px;
								line-height:150%;
								padding-top:0;
								padding-right:3.571em;
								padding-left:3.571em;
								padding-bottom:1.357em;
								text-align:left
								}

								.bodyContentImage h4 {
								color:#4E4E4E;
								font-size:13px;
								line-height:1.154em;
								font-weight:400;
								margin-bottom:0
								}

								.bodyContentImage h5 {
								color:#828282;
								font-size:12px;
								line-height:1.667em;
								margin-bottom:0
								}

								/**
								* @tab Body
								* @section body link
								* @tip Set the styling for your email's main content links. Choose a color that helps them stand out from your text.
								*/
								a:visited {
								color:#3386e4;
								text-decoration:none;
								}

								a:focus {
								color:#3386e4;
								text-decoration:none;
								}

								a:hover {
								color:#3386e4;
								text-decoration:none;
								}

								a:link {
								color:#3386e4;
								text-decoration:none;
								}

								a .yshortcuts {
								color:#3386e4;
								text-decoration:none;
								}

								.bodyContent img {
								height:auto;
								max-width:498px
								}

								.footerContent {
								color:gray;
								font-family:Helvetica;
								font-size:10px;
								line-height:150%;
								padding-top:2em;
								padding-right:2em;
								padding-bottom:2em;
								padding-left:2em;
								text-align:left
								}

								/**
								* @tab Footer
								* @section footer link
								* @tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
								*/
								.footerContent a:link,.footerContent a:visited,/* Yahoo! Mail Override */ .footerContent a .yshortcuts,.footerContent a span /* Yahoo! Mail Override */ {
								color:#606060;
								font-weight:400;
								text-decoration:underline
								}

								/**
								* @tab Footer
								* @section footer link
								* @tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
								*/
								.bodyContentImageFull p {
								font-size:0!important;
								margin-bottom:0!important
								}

								.brdBottomPadd {
								border-bottom:1px solid #f0f0f0
								}

								.brdBottomPadd-two {
								border-bottom:1px solid #f0f0f0
								}

								.brdBottomPadd .bodyContent {
								padding-bottom:2.286em
								}

								.brdBottomPadd-two .bodyContent {
								padding-bottom:.857em
								}

								a.blue-btn {
								  background: #5098ea;
								  display: inline-block;
								  color: #FFFFFF;
								  border-top:10px solid #5098ea;
								  border-bottom:10px solid #5098ea;
								  border-left:20px solid #5098ea;
								  border-right:20px solid #5098ea;
								  text-decoration: none;
								  font-size: 14px;
								  margin-top: 1.0em;
								  border-radius: 3px 3px 3px 3px;
								  background-clip: padding-box;
								}

								.bodyContentTicks {
								color:#505050;
								font-family:Helvetica;
								font-size:14px;
								line-height:150%;
								padding-top:2.857em;
								padding-right:3.5em;
								padding-left:3.5em;
								padding-bottom:1.786em;
								text-align:left
								}

								.splitTicks {
								width:100%
								}

								.splitTicks--one {
								width:19%;
								color:#505050;
								font-family:Helvetica;
								font-size:14px;
								padding-bottom:1.143em
								}

								.splitTicks--two {
								width:5%
								}

								.splitTicks--three {
								width:71%;
								color:#505050;
								font-family:Helvetica;
								font-size:14px;
								padding-top:.714em
								}

								.splitTicks--three h3 {
								margin-bottom:.278em
								}

								.splitTicks--four {
								width:5%
								}

								@media only screen and (max-width: 550px),screen and (max-device-width: 550px) {
								body[yahoo] .hide {
								display:none!important
								}

								body[yahoo] .buttonwrapper {
								background-color:transparent!important
								}

								body[yahoo] .button {
								padding:0!important
								}

								body[yahoo] .button a {
								background-color:#e05443;
								padding:15px 15px 13px!important
								}

								body[yahoo] .unsubscribe {
								font-size:14px;
								display:block;
								margin-top:.714em;
								padding:10px 50px;
								background:#2f3942;
								border-radius:5px;
								text-decoration:none!important
								}
								}

								@media only screen and (max-width: 480px),screen and (max-device-width: 480px) {
								  .bodyContentTicks {
									padding:6% 5% 5% 6%!important
								  }

								  .bodyContentTicks td {
									padding-top:0!important
								  }

								  h1 {
									font-size:34px!important
								  }

								  h2 {
									font-size:30px!important
								  }

								  h3 {
									font-size:24px!important
								  }

								  h4 {
									font-size:18px!important
								  }

								  h5 {
									font-size:16px!important
								  }

								  h6 {
									font-size:14px!important
								  }

								  p {
									font-size:18px!important
								  }

								  .brdBottomPadd .bodyContent {
									padding-bottom:2.286em!important
								  }

								  .brdBottomPadd-two .bodyContent {
									padding-bottom:.857em!important
								  }

								  #templateContainerMiddleBtm .bodyContent {
									padding:6% 5% 5% 6%!important
								  }

								  .bodyContent {
									padding:6% 5% 1% 6%!important
								  }

								  .bodyContent img {
									max-width:100%!important
								  }

								  .bodyContentImage {
									padding:3% 6% 6%!important
								  }

								  .bodyContentImage img {
									max-width:100%!important
								  }

								  .bodyContentImage h4 {
									font-size:16px!important
								  }

								  .bodyContentImage h5 {
									font-size:15px!important;
									margin-top:0
								  }
								}
								.ii a[href] {color: inherit !important;}
								span > a, span > a[href] {color: inherit !important;}
								a > span, .ii a[href] > span {text-decoration: inherit !important;}
							  </style>

							</body>
							</html>
						
						";

				/*Send Email USER*/
				$email = trim($email, " \t\n\r\0\x0B");
				$to      = "$email";
				$subject = "Welcome to Finishline! 🏁 🏃 🏁";
				
				//https://emojipedia.org/
		        $subject = "=?UTF-8?B?" . base64_encode($subject) . "?=";
				
				/*$message = "Welcome to Finishline $first_name! \n Please let me know what you think of the website. If you can give me any feedback what you like, dont like, want added/ changed that would be greatly appreciated!
				            \n Your username is: $myusername and password is: $pass1 \n Please keep these for your reference. \n\n 
							Enjoy the website! \n\n
							-Vojta Ripa"; */
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: finishline@sonic.com' . "\r\n" .'Reply-To: vojtaripa@yahoo.com' . "\r\n" .'X-Mailer: PHP/' . phpversion();

				mail($to, $subject, $messageUSER, $headers);
				//echo "mail($to, $subject, $messageUSER, $headers)"; works with vojta.ripa@sonic.net
				//****************************************************************************** 

				
						
				//****************************************************************************** 
				
				/*Send Email to ME (vojta)*/
				$to      = 'vojtaripa@yahoo.com';
				$subject = "Finishline: New user $myusername 🏁 🏃 🏁";
				$subject = "=?UTF-8?B?" . base64_encode($subject) . "?="; //HAD TO ADD EMOJIS IN LOCAL MACHINE THEN TRANSFER FILE BACK OVER.
				/*$message = "A new user: $myusername signed up for Finishline.";*/
				
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: finishline@sonic.com' . "\r\n" .'Reply-To: webmaster@example.com' . "\r\n" .'X-Mailer: PHP/' . phpversion();

				mail($to, $subject, $messageADMIN, $headers);
				//****************************************************************************** 
				
				
				
				
				
				
				
				
				/*HASH PASSWORD*/
				require_once('database.php');			
				//echo "Password: " . $pass1 . "....<br>";
				
				$pass1 = SHA1($pass1); //hashing password
				$mypassword = $pass1;
				//echo "Hashed Password: " . $pass1;
				
				
				
				//IMAGES************************************************************************************************************************************* DONE
				$image_dir = 'image/racePics';
				//echo "image dir: $image_dir_path <br>";

				$image_dir_path = getcwd() . DIRECTORY_SEPARATOR . $image_dir;
				//echo "image dir path: $image_dir_path <br>";

				$action = filter_input(INPUT_POST, 'action');
				if ($action == NULL)
				{
					$action = filter_input(INPUT_GET, 'action');
					if ($action == NULL) 
					{
						$action = '';
					}
				}

				//Checking if file exists....
				if (isset($_FILES['image_uploads'])) 
				{
					//gets name of file uploaded.
					$filename = $_FILES['image_uploads']['name'];
					
					//if its empty.. (do nothing)
					if (empty($filename)) 
					{
						//USE DEFAULT.
						//echo "no file <br>";
					} 
					
					else 	
					{
						//FROM:
						$source = $_FILES['image_uploads']['tmp_name'];
						//echo "source: $source <br>";
						
						//TO:
						$image_dir_path = str_replace("/pages","",$image_dir_path);
						//make new directory with username as name
						mkdir($image_dir_path . "/". $myusername, 0700);
						//adding that to destination path of image. (where image will go)
						$image_dir_path = $image_dir_path ."/".$myusername;
						//echo "image_dir_path: $image_dir_path <br>";						
						$target = $image_dir_path . DIRECTORY_SEPARATOR . $filename;
						//echo "target: $target <br>";
						
						//MOVE IMAGE:
						move_uploaded_file($source, $target);
						
						// create the '400' and '100' versions of the image and replace image with the smaller one.
						process_image($image_dir_path, $filename);
						
						//now delete original: (dont do it since i'm renaming the file to orininal name in "image_util.php"
						//unlink($target);
					}
					
					//makes myimage the directory where image is located
					/*
					$myimage      = $target;
					echo "MyImage: $myimage <br>";
					//define sting to delete
					$deleteString = "/home/look4ter/public_html/php7294/Ass14/";
					//deletes part of string
					$myimage      = str_replace($deleteString, "", $myimage);
					echo "Pt 1 newstring: $myimage <br>";
					//makes data the string, then gets what extension the image is
					$data         = $myimage;
					$whatIWant    = substr($data, strpos($data, ".") + 1);
					echo "WhatIWant: $whatIWant <br>";
					
					//deletes that extension, then adds the _100 for smaller image size and adds extension of image back
					$myimage = str_replace("." . $whatIWant, "", $myimage) . "_400." . $whatIWant;				
					echo "myimage: $myimage <br>";
					echo "filename: $filename <br>";
					*/
					
					/* RESUTLTS:
					source: /tmp/phpRAoCia 
					image_dir_path: /nfs/www/WWW_pages/vojta/finishline/image/racePics 
					target: /nfs/www/WWW_pages/vojta/finishline/image/racePics/hillheadshot.JPG 
					MyImage: /nfs/www/WWW_pages/vojta/finishline/image/racePics/hillheadshot.JPG 
					Pt 1 newstring: /nfs/www/WWW_pages/vojta/finishline/image/racePics/hillheadshot.JPG 
					WhatIWant: JPG 
					myimage: /nfs/www/WWW_pages/vojta/finishline/image/racePics/hillheadshot_400.JPG 
					*/
				} 

				//IF IT DOESNT EXIST:
				else 
				{
					$filename="";
					//echo "no image";
				}
				// DONE IMAGE ******************************************************************************************************************* 

				
				
				
				
				// Add the user to the database  
				
				$query = 'INSERT INTO users (username, password, Picture, first_name, last_name, email, sex, age, webpage, about, Date_Added) VALUES(:myusername, :pass1, :filename, :first_name, :last_name, :email, :sex, :age, :webpage, :about, :todaysDate)';
				$statement = $db->prepare($query);
				$statement->bindValue(':myusername', $myusername);
				$statement->bindValue(':pass1', $pass1);
				//NEW INPUTS
				$statement->bindValue(':filename', $filename);
				$statement->bindValue(':first_name', $first_name);
				$statement->bindValue(':last_name', $last_name);
				$statement->bindValue(':email', $email);
				$statement->bindValue(':sex', $sex);
				$statement->bindValue(':age', $age);
				$statement->bindValue(':webpage', $webpage);	
				$statement->bindValue(':about', $about);
				$statement->bindValue(':todaysDate', $todaysDate);							
				
				$statement->execute();
				$statement->closeCursor();
				
				
				//now I need to add new table with new username as name
				$query_add_table= "
				 CREATE TABLE `$myusername` (
					  `Index` int(11) NOT NULL,
					  `Date` date NOT NULL,
					  `Race` varchar(50) NOT NULL,
					  `Time` time NOT NULL,
					  `Distance` decimal(5,2) NOT NULL,
					  `Place` int(11) NOT NULL,
					  `Pace` time NOT NULL,
					  `Location` varchar(100) NOT NULL,
					  `Type` varchar(10) NOT NULL,
					  `Picture` varchar(100) NOT NULL,
					  `LinkToResults` varchar(150) NOT NULL,
					  `LinkToActivity` varchar(100) NOT NULL,
					  `shoes` varchar(15) NOT NULL,
					  `Notes` text NOT NULL,
					  `Feel` int(2) NOT NULL,
					  `Points` int(4) NOT NULL,
					  `Modified` date NOT NULL,
					  `DateAdded` date NOT NULL
					) 

					ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='';

					ALTER TABLE `$myusername`
					  ADD PRIMARY KEY (`Index`);";
				$statement2 = $db->prepare($query_add_table);
				$statement2->execute();
				$statement2->closeCursor();


				// Display the Product List page
				//echo $email . "Welcome $myusername";
				
				echo "<center><br><br><br><br><br><br><h1 style='background-color:#E6594D; color:white'>Thank you for signing up $first_name!<br><br><b><u>STEP 2:</u></b><br> Please add your first race.</h1></center>";
				
				include('add_race_form.php'); 
			    
			}
	}	
	
	//Captcha WRONG
    else 
	{
      echo "<br><br><br><h1 style='background-color:#E6594D; color:white'>Please enter the verification pass-phrase exactly as shown.</h1>";
	  include 'create_account.php';
    }
	
	//include 'login.php';
	
?>