<?php
require_once ('database.php');

$username = filter_input(INPUT_POST, 'myusername');
        $password = filter_input(INPUT_POST, 'password1');
		
        if (isset($username) && isset($password)) 
		{
			//finds which user is logged on:
			$queryuser = 'SELECT * FROM users  WHERE username = :username ORDER BY idusers DESC limit 1'; 
			$statement5 = $db->prepare($queryuser);
			$statement5->bindValue(':username', $username);
			$statement5->execute();
			$theuser = $statement5->fetchAll();
			$statement5->closeCursor();
			
			$theusername = $theuser['0']['username'];
			$thepassword =	$theuser['0']['password'];
			//echo "Password before SHA1: " . $password . "....<br>";
			$password =SHA1($password); //hashing password
			//$test=SHA1('111');
			
			//displaying values in database
			//echo "this is the user in DB: $theusername <br>";
			//echo "this is the password in DB: $thepassword <br>";
			
			//displaying values user put in
			//echo "<br>this is the user put in by USER: $username <br>";
			//echo "this is the passwordput in by USER: $password <br>";
			
			//echo "Test is: $test";
			
			// need to varify username and password
			if($username==$theusername && $password==$thepassword)
			{
				$login_message = 'Success!';
				//redirect('/nfs/WWW_pages/vojta/RaceResults/indexAdmin.php');
				//include("Location: ". $url); /* Redirect browser */
				$myusername=$username;
				$mypassword=$password;
				
				//****************************************************************************** 
				
				//FIRST DELETE ALL EXISTING DATA IN DB:
				$myraceTEST = filter_input(INPUT_POST, ('race0'));
				echo "<br><br>RaceAdded: $myraceTEST<br>";

				/*if($myraceTEST=="")
				{
					echo "Sorry, can't add race(s)";
					include("future.php");
					exit(-1);
				}*/

				//else
				//{
				
					$sql1 = "DELETE FROM futureRaces";
					$query1 = $sql1;
					$statement2 = $db->prepare($query1);
					$statement2->execute();
					$statement2->closeCursor();
					//****************************************************************************** 


					//GET VARIABLES from previous page:

						$amount = filter_input(INPUT_POST, 'amount');
						echo "Amount of races adding: ".$amount."<br>";

						//used to get date and name from string given. 
							function get_string_between($string, $start, $end)
							{
								$string = " ".$string;
								 $ini = strpos($string,$start);
								 if ($ini == 0) return "";
								 $ini += strlen($start);     
								 $len = strpos($string,$end,$ini) - $ini;
								 return substr($string,$ini,$len);
							}

							
						//FORLOOP TO GET rest of races pulled in.
						for($i=0;$i<$amount;$i++)
						{
							$myrace = filter_input(INPUT_POST, ('race'.$i)); //get next race entry...
							$myrace = trim($myrace ," \t\n\r\0\x0B\Ã\¿½ï"); //get rid of special chars
							//echo "MyRace: $myrace<br>";
							
							//$lastChar = substr(strrchr($myrace, 1), 1 );
							$length=strlen ( $myrace );
							$lastChar = substr($myrace, ($length-1), 1);
							
							
							//echo "->" . $lastChar . "******************************************************************************<br>";
							
							$DATE= get_string_between($myrace,"Date: "," Race Name:");
							//echo "date: $DATE <br>";
							
							//$DATE= substr ( $DATE,0, -1);
							
							$NAME= get_string_between($myrace,"Name: ",$lastChar);
							$NAME = trim($NAME ," \t\n\r\0\x0B\Ã\¿\½\ï");
							//echo "Name: $NAME<br>";
							
							
							//echo "my race: $myrace <br> date: $DATE and name: $NAME <br>";
							// INPUT RACE
							
						  if($DATE=='' || $NAME=='')
						  {
							 $sql="";
						  }
						  
						  else
						  {
							  $checked=filter_input(INPUT_POST, ('checked'.$i));//GET VARIABLE
							  
							  if(preg_match("/checked/", $checked)) //javascript /checked/.test($checked)
							  {
								  $sql = "INSERT INTO futureRaces VALUES(NULL,'". $NAME ."',0,'". $DATE ."');"; //$myrace
							  }
							  else
							  {
								  $sql = "INSERT INTO futureRaces VALUES(NULL,'". $NAME ."',1,'". $DATE ."');"; //$myrace
							  }
							  //$sql="";
							  //echo "$i. INSERT INTO futureRaces VALUES(NULL,'". $NAME ."',0,'". $DATE ."'); <br>"; //$race
						  }
						  
			// ADDING RACE TO DB ******************************************************************************* ****************************************************************************** ****************************************************************************** 

								$query = $sql;
								
								$statement = $db->prepare($query);

								$statement->execute();
								
								$statement->closeCursor();
					}


				
					//}
					//THEN make it go back to previous page...
					include('future.php');
				
				

				//****************************************************************************** 
				/*<!--
				<script type="text/javascript">
					window.location.href = 'RaceResults.php';
				</script>-->
				*/
				
				//$url="http://vojta.users.sonic.net/RaceResults/indexAdmin.php";
				exit();
			}
			else
			{
				echo '<br><br><br>Username or password is incorrect, please try again.';
				
				include('future.php');
			}
        } 
		else 
		{
            echo "<br><br><br>this is the username you put: $username <br>";
			echo "this is the password you put: $password <br>";
			echo 'You must login to make changes to this page.';
			//$url="http://vojta.users.sonic.net/RaceResults/login2.php";
            include('future.php');
        }






?>

Runfa$t1

