<?php
   //require_once('util/secure_conn.php');  // require a secure connection
   require_once('../captcha/appvars.php');
   require_once('../captcha/connectvars.php');
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Sign-up</title>
	  <meta charset="utf-8" />
	  <meta name="viewport" content="width=device-width, initial-scale=1" />
	  
      <!--OLD STYLE: <link rel="stylesheet" type="text/css" href="../main.css"/>-->
      <link rel="stylesheet" href="../assets/css/main.css" />
   
   <script src="//code.jquery.com/jquery-1.10.2.js"></script>
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
					
					
					
<!-- INTRO -->
		<article id="main">	
				<header>
					<h2>Create Account</h2>
					<p>Please Create a Login Account so you can store your race results.</p>
				</header>
	     
		 <section class="wrapper style5">
			<div class="inner">
		
		
		
         <h2>Sign-up Form:</h4>
         <h1 style='background-color:#E6594D; color:white;  line-height: 32px;  padding-left: 5px;'><u><b>STEP 1:</b></u></br> Please fill in the following: </br>( follow format shown. )</h1>
          
			
			<!--IMAGE--------------------------------------------------------------------------------------->
            <div class="6u 12u$">
			<h4>Select your profile picture</h4>
			</div>
			
            <form action="addLogin.php" method="post" id="login_form" enctype="multipart/form-data">
			  
               
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
                  color: white;
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
               </br>
               
               <!--<h3> Fill in the following, please follow format shown. </h3> 	-->
               
                  <div class="6u 12u$(xsmall)">
                     <label><b style="color:red;font-size:25px;">*</b>Username        :</label>
                     <input type="text" class="text" name="myusername" placeholder="username" required>
                     </br>
                 </div>
                
				 <div class="6u 12u$(xsmall)">
                     
                        <label><b style="color:red;font-size:25px;">*</b>Password   (Min. 6 characters):</label>
                     
                     <input type="password" pattern=".{6,}" class="text" name="password1" placeholder="password" required>
                     </br>
                 </div>
				  
                  <div class="6u 12u$(xsmall)">
                     
                        <label><b style="color:red;font-size:25px;">*</b>Re-type password:</label>
                     
                     <input type="password" pattern=".{6,}" class="text" name="password2" placeholder="password" required>
                     </br>
                  </div>
                  
				  <div class="6u 12u$(xsmall)">
                     
                        <label for="verify"><b style="color:red;font-size:25px;">*</b>Human Verification:</label>
                     
                     
                        <img src="captcha.php" alt="Verification pass-phrase" />
                        <input type="text" id="verify" name="verify" value="" required placeholder="Enter whats above."/> 
                     
                  </div>
				  
                  <div class="6u 12u$(xsmall)">
                     
                        <label><b style="color:red;font-size:25px;">*</b>First Name:</label>
                     
                     <input type="text" class="text" name="first_name" placeholder="Usain" required>
                     </br>
                  </div>
				  
                  <div class="6u 12u$(xsmall)">
                     
                        <label><b style="color:red;font-size:25px;">*</b>Last Name:</label>
                     
                     <input type="text" class="text" name="last_name" placeholder="Bolt" required>
                     </br>
                  </div>
				  
				  
				    				  
				  
                  <div class="6u 12u$(xsmall)">
                        <label>Email:</label>
                     
                     <input type="email" class="text" name="email" placeholder="devnull@sonic.com">
					 </br>
                  </div>

	 
              
				  
				  <div class="4u 12u$(small)">
						<label><b style="color:red;font-size:25px;">*</b>Gender:</label>    
				  
						<input type="radio" id="m" name="gender" value='m' checked>
						<label for="m">Male</label>

						<input type="radio" id="f" name="gender" value='f'>
						<label for="f">Female</label>

					</div>
                  
				  			  <div class="6u 12u$(xsmall)">   
                        <label><b style="color:red;font-size:25px;">*</b>Age:</label>                  
                        <input type="text"  pattern="[0-9]{1,2}" min="1" max="99" name="age" placeholder="0" required>
					 </br>
                  </div>
				  

				  
				  
                  <div class="6u 12u$(xsmall)">  
                        <label>Link to your Strava / webpage:</label>
                       <input type="text" pattern="https?://.+" name="webpage" placeholder="https://www.strava.com"> <!--type webpage -->
                     </br>
                  </div>
				  
                  <div class="6u 12u$(xsmall)">
                      <label>About you / Bio:</label>
                      <textarea rows="8" cols="75" name="About" placeholder="About you..."> </textarea>
                     </br>
                  </div>
         
		 
               </br></br>
 
               <input type="hidden" name="action" value="login">
               
			   <input class="button" type="submit" value="Sign-up">
               <input class="button" type="reset">
           
		  </div>
       </form>
	</div>   
	   
	   
	   
				
	<!-- Already a user? -->
					<section id="video" class="wrapper style4">
						<div class="inner">
							<header>
							    <p><?php echo $login_message;?></p>
								<h2>Already have an Account?</h2>
								<p>Please log back in.</p>
					
							</header>
							
							<!--buttons-->
							<ul class="actions vertical">
								<li><a href="login.php" class="button fit">Log In</a></li>
								<li><a href="../index.php" class="button fit special">Back Home</a></li>		
							</ul>
							
							
						</div>
					</section>
     
		
	 </div>
	</section>
</article> 
	 
	 
	 
    				
<!-- Footer -------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="footer"></div>

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