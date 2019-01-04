<?php
session_start();
?>

<!DOCTYPE html> 
<html lang="en">
<!--
Kale, Shubham
CS545
Red id 822707841
Assignment #4
Instructor: Cyndi Chie
Fall 2018
-->
<head>
	<title>Shubham Kale CS 545 Assignment 2</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="myPHPCSS.css"/>
	<script type="text/javascript" src="form_validation.js"></script>
</head>

<body onload="checkNames( '<?php echo $_SESSION['fname']; ?>', '<?php echo $_SESSION['lname']; ?>')">
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
		<div class="row">
            <div class="exhibitmain">
				<div class="pop">
					<h2>Sign up for the SDSU NHM Newsletter</h2>
					<h3>Thank you for subscribing to our newsletter.</h3>
					<?php
						$fname = $_SESSION['fname'];
						$lname = $_SESSION['lname'];
						$address = $_SESSION['address'];
						$phone = $_SESSION['phone'];
						$email = $_SESSION['email'];
						$event = $_SESSION['event'];
						$total = $_SESSION['total'];
						$tattendees5 = $_SESSION['tattendees5'];
						$tattendees12 = $_SESSION['tattendees12'];
						$tattendees17 = $_SESSION['tattendees17'];
						$tattendees18 = $_SESSION['tattendees18'];
						$yes = $_SESSION['yes'];
						$no = $_SESSION['no'];
						$other = $_SESSION['other'];
					?>
					
					<br/>
					<label>Name:</label>
					<label id="fname"></label>
					<label id="lname"></label>

					<?php 
						//Code to display name
						echo "<br>";
									
						//Code to display address if entered by user
						if (!empty($address)) {
							echo "Address: " . $address . "<br>";
						}
						
						
						//Code to display phone if entered by user
						if (!empty($phone)) {
							echo "Phone: " . $phone . "<br>";
						}
						
						
						//Code to display email
						echo "Email: " . $email; 
						echo "<br>";

						//Code to display event selected by user
						echo "Event to attend: " . $event . "<br>";  
						
						//Code to display total number of attendees for the event
						echo "Total attendees:". ($tattendees5+$tattendees12+$tattendees17+$tattendees18);
						echo "<br>";

						//Code to display any other information of event the user needs
						if (!empty($other)) {
							echo "Additional Interests: " . $other;
						}
					?>
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

