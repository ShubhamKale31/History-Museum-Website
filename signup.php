<?php
session_start();
?>

<!DOCTYPE html> 
<html lang="en">
<!--
Kale, Shubham
CS545
Red id 822707841
Assignment #3
Fall 2018
-->
<head>
	<title>Shubham Kale CS 545 Assignment 2</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="myPHPCSS.css"/>
</head>

<body>
    <div class="container">
        <div class="header">
        	<img src="img/image1.jpg" alt="Logo" class="logo" />
            <h1>San Diego State University <br/> Natural History Museum</h1>
            
			<br/><br/>
			<!-- Code for the navigation bar -->
            <div class="mainMenu">
                <ul class="menu">
                  <li><a class="active" href="index.html">Home</a></li>
                  <li><a href="about.html">About</a></li>
                  <li><a href="exhibits.html">Exhibits</a></li>
                  <li><a href="events.html">Events</a></li>
                  <li><a href="science.html">Science</a></li>
                  <li><a href="getInvolved.html">Join</a></li>
				  <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
        </div>

		<!-- Validation -->

	
		<?php
		$fnameErr = $lnameErr = $phoneErr= $emailErr = $eventErr = $tattendees5Err= $tattendees12Err= $tattendees17Err= $tattendees18Err= "";
		$name = $email = $event = $tattendeesErr= /*$tattendees=*/ $tattendees5= $tattendees12= $tattendees12= $tattendees18="" ;

		$errors=array();
		
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}		
		 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$valid = true;
			
			if (empty(filter_input(INPUT_POST, "fname"))) {
               $valid = false;
			   $fnameErr = "First name is required";
            }else {
				$_SESSION['fname'] = test_input(filter_input(INPUT_POST, "fname"));
				$fname = test_input(filter_input(INPUT_POST, "fname"));
					
				// check if first name only contains letters and whitespace
				if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
					$valid = false;
					$fnameErr = "Only letters and white space allowed"; 
				}
            }
            
			
			if (empty(filter_input(INPUT_POST, "lname"))) {
               $valid = false;
			   $lnameErr = "Last name is required";
            }else {
				$_SESSION['lname'] = test_input(filter_input(INPUT_POST, "lname"));
				$lname = test_input(filter_input(INPUT_POST, "lname"));
					
				// check if last name only contains letters and whitespace
				if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
					$valid = false;
					$lnameErr = "Only letters and white space allowed"; 
				}
            }
			
			$_SESSION['address'] = test_input(filter_input(INPUT_POST, "address"));
			
			if (empty(filter_input(INPUT_POST, "phone"))) {
               $valid = true;
            }else {
				$_SESSION['phone'] = test_input(filter_input(INPUT_POST, "phone"));
				$phone = test_input(filter_input(INPUT_POST, "phone"));
				if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
				  // $phone is invalid
					$valid = false;
					$phoneErr = "Enter phone number in 111-111-1111 format";
				}
			}
			
			
			if (empty(filter_input(INPUT_POST, "email"))) {
               $valid = false;
			   $emailErr = "Email is required";
            }else {
               $_SESSION['email'] = test_input(filter_input(INPUT_POST, "email"));
			   $email = test_input(filter_input(INPUT_POST, "email"));
               
               // check if e-mail address is well-formed 
				if (!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)) {
					$valid = false;
					$emailErr = "Invalid email format, please enter valid email"; 
				}
			}
			
			if (empty(filter_input(INPUT_POST, "event"))) {
				$valid = false;
				$eventErr = "Event is required";
            }else {
				$_SESSION['event'] = test_input(filter_input(INPUT_POST, "event"));
			}
			
			if (empty($_POST["tattendees5"])) {
				$valid = false;
				$tattendees5Err = "No. of attendees under the age of 5 is required";
			} else {
				$_SESSION['tattendees5'] = test_input(filter_input(INPUT_POST, "tattendees5"));
				$tattendees5 = test_input($_POST["tattendees5"]);
				
				// check if entered number is not negative
				if (!preg_match("/^[0-9]*$/",$tattendees5)) {
					$valid = false;
					$tattendees5Err = "Negative numbers not allowed"; 
				}
			}
			
			if (empty($_POST["tattendees12"])) {
				$valid = false;
				$tattendees12Err = "No. of attendees between 5 and 12 is required";
			} else {
				$_SESSION['tattendees12'] = test_input(filter_input(INPUT_POST, "tattendees12"));
				$tattendees12 = test_input($_POST["tattendees12"]);
				
				// check if entered number is not negative
				if (!preg_match("/^[0-9]*$/",$tattendees12)) {
					$valid = false;
					$tattendees12Err = "Negative numbers not allowed"; 
				}
			}
			
			if (empty($_POST["tattendees17"])) {
				$valid = false;
				$tattendees17Err = "No. of attendees between 13 and 17 is required";
			} else {
				$_SESSION['tattendees17'] = test_input(filter_input(INPUT_POST, "tattendees17"));
				$tattendees17 = test_input($_POST["tattendees17"]);
				
				// check if entered number is not negative
				if (!preg_match("/^[0-9]*$/",$tattendees17)) {
					$valid = false;
					$tattendees17Err = "Negative numbers not allowed"; 
				}
			}
	  
			if (empty($_POST["tattendees18"])) {
				$valid = false;
				$tattendees18Err = "No. of attendees who are above 18yrs old required";
			} else {
				$_SESSION['tattendees18'] = test_input(filter_input(INPUT_POST, "tattendees18"));
				$tattendees18 = test_input($_POST["tattendees18"]);
				
				// check if entered number is not negative
				if (!preg_match("/^[0-9]*$/",$tattendees18)) {
					$valid = false;
					$tattendees18Err = "Negative numbers not allowed"; 
				}
			}
			
			if (empty(filter_input(INPUT_POST, "other"))) {
               $_SESSION['other'] = "";
			} else {
				$_SESSION['other'] = test_input(filter_input(INPUT_POST, "other"));
				$other = test_input(filter_input(INPUT_POST, "other"));
			}
			
			
			if($valid){
				header("location:signup-successful.php");
				exit();
			}
		}
		?>
		
        <!-- Main content Area -->
        <div class="row">
            <div class="exhibitmain">
                <div class="pop">
                <h2>Sign-Up for our upcoming events</h2>
                <div>
                    <h3>Please fill the form and click submit when finished.</h3>
                    <h5><span class="required">*</span> Required fields</h5>

                   
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<fieldset>
                            <legend>Personal information:</legend>
							<label for="firstname">First Name: </label><br />
							<input type="textbox" name="fname" placeholder="Enter first name" value="<?php echo $fname;?>">
							<span class="error">* <?php echo $fnameErr;?></span>
							<br/><br/>

							<label for="lastname">Last Name: </label><br />
							<input type="textbox" name="lname" placeholder="Enter last name" value="<?php echo $lname;?>">
							<span class="error">* <?php echo $lnameErr;?></span>
							<br/><br/>

							<label for="address">Address: </label><br />
							<textarea name="address" id="address" rows="5" cols="40" value="<?php echo $address;?>"></textarea>
							<br/><br/>

							<label for="phone">Phone: </label><br />
							<input type="textbox" name="phone" value="<?php echo $phone;?> ">
							<span class="error"><?php echo $phoneErr;?></span>
							<br/><br/>

							<label for="email">E-mail: </label><br />
							<input type="email" name="email" placeholder="Enter email id" value="<?php echo $email;?>">
							<span class="error">* <?php echo $emailErr;?></span>
							<br/><br/>
						</fieldset>
						<br/>
						
						<fieldset>
                            <legend>Other information:</legend>
							<label for="events">Event:</label><br />
							<select name="event" id="event">
								<option value="">None</option>
								<option value="BRCC Mission">BRCC Mission</option>
								<option value="Binational Expeditions">Binational Expeditions</option>
								<option value="Paleontological Mitigation Services">Paleontological Mitigation Services</option>
							</select>
							<span class="error">* <?php echo $eventErr;?></span>
							<br/><br/>
		
  
						    <label for="under5">Number of attendees under 5 years old:</label><br />
						    <input type="number" name="tattendees5"  value="<?php echo $tattendees5;?>">
						    <span class="error">* <?php echo $tattendees5Err;?></span>
						    <br/><br/>
							
						    <label for="bet5&12">Number of attendees 6 to 12 years old:</label><br />
							<input type="number" name="tattendees12" value="<?php echo $tattendees12;?>">
						    <span class="error">* <?php echo $tattendees12Err;?></span>
						    <br/><br/>
							
							<label for="bet13&17">Number of attendees 13 to 17 years old:</label><br />
							<input type="number" name="tattendees17" value="<?php echo $tattendees17;?>">
							<span class="error">* <?php echo $tattendees17Err;?></span>
							<br/><br/>
 
							<label for="above18"> Number of attendees 18+ years old:</label><br />
							<input type="number" name="tattendees18" value="<?php echo $tattendees18;?>">
							<span class="error">* <?php echo $tattendees18Err;?></span>
							<br/><br/>
							
							<label for="signup">Signup for newsletter:</label><br />
							<input type="checkbox" name="yes" value="yes" checked>Yes
							<input type="checkbox" name="no" value="no">No<br>
							<br/>
							
							<label for="other">What other events would you like offered?</label><br />
                            <textarea name="other" id="other" rows="5" cols="60" placeholder="Enter for any other information"></textarea>
                            <br /><br />
			  
							<input type="submit" name="submit" class="button" value="Submit"> 
							<input type="reset" class="button" value="Reset"><br /><br />
						</fieldset>
					</form>
                </div>
            </div>
        </div>

        <div class="rightside">
                <div class="pop">
                <h2>Our Mission is ..</h2>
                    <ul>
                    <li>To interpret the 
                        natural world through research, education and exhibits</li>
                    <li>To promote 
                        understanding of the evolution and diversity of southern California 
                        and the peninsula of Baja California</li>
                    <li>To train and grow our future leaders 
                        in research and conservation</li>
                    <li>To inspire in all a respect for nature 
                        and the environment</li>
                    </ul>
                    <p>We believe the San Diego State University Natural 
                    History Museum will be the premier collections-based 
                    environmental education and natural history research resource in our region. </p>
                </div>
                <br>
                <div class="pop">
                    <h2>Sign Up for Our Newsletter..</h2>
                    Receive the latest information about our new exhibitions, programs, events, and more.
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
		<div class="footer1">
			<p>San Diego State University <br/> Natural History Museum <br/> San Diego, CA <br/><a href="tel:1-619-594-5200">(619) 594-5200 </a><br/> </p>
		</div>
		
		<div class="footer2">
			<p>Museum Hours<br/>Daily 10.00am to 5.00pm<br/>Closed when the campus is closed<br/>Hours subject to change</p>
		</div>
			
		<div class="footer3">
            © All rights reserved<br/><br/> 
            <span class="footerLogos">
            Follow us @ 
            <a href="https://www.facebook.com/SanDiegoState" onclick="target='_blank'"> <img src="img/fb.png" alt="Facebook" class="icon" title="Click here to follow us on Facebook"/> </a>
            <a href="https://www.linkedin.com/school/san-diego-state-university/" onclick="target='_blank'"> <img src="img/li.png" alt="LinkedIn" class="icon" title="Click here to follow us on LinkedIn"/> </a>
            <a href="https://twitter.com/SDSU" onclick="target='_blank'"> <img src="img/twit.png" alt="Twitter" class="icon" title="Click here to follow us on Twitter"/> </a>
            <a href="https://www.instagram.com/sdsu/" onclick="target='_blank'"> <img src="img/insta.png" alt="Instagram" class="icon" title="Click here to follow us on Instagram"/> </a>
            </span>
        </div>
	</div>

    </body>
</html>

