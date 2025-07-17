<?php

    $error = ""; $successMessage = "";

    if ($_POST) {
        
        if (!$_POST["email"]) {
            
            $error .= "An email address is required.<br>";
            
        }
        
        if (!$_POST["content"]) {
            
            $error .= "The content field is required.<br>";
            
        }
        
        if (!$_POST["subject"]) {
            
            $error .= "The subject is required.<br>";
            
        }
        
        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            
            $error .= "The email address is invalid.<br>";
            
        }
        
        if ($error != "") {
            
            $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
            
        } else {
            
            $emailTo = "lori@evangelinearts.com";
            
            $subject = $_POST['subject'];
            
            $content = $_POST['content'];
            
            $headers = "From: ".$_POST['email'];
            
            if (mail($emailTo, $subject, $content, $headers)) {
                
                $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, we\'ll get back to you ASAP!</div>';
                
                
            } else {
                
                $error = '<div class="alert alert-danger" role="alert"><p><strong>Your message couldn\'t be sent - please try again later</div>';
                
                
            }
            
        }
        
        
        
    }

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>EvangelineArts</title>

<link href="bootstrap.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="styles.css" type="text/css">
</head>

<body>
	<header>
		<div class="row">
		<div class="col">
		<img class="style-logo" src="images/colormagnolia.jpg" alt="Evangelinearts magnolia" width="220" height="200">
		<img class="style-logo-name" src="images/evangelineartsname.png" alt="Evangelinearts" width="220" height="200">
		<nav class="style-nav">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="classes.html">Classes</a></li>
				<li><a href="portfolio.html">Art</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</nav>
		</div>
		</div>
	</header>
	<main>
		<div class="row">
			<div class="col">
				<div class="wood">
					
					
					
					
					<h1>Send an email to evangelinearts</h1>
					
					
					
					<div class="col" style=background-color:#744738> 
						 <div class="container">
      
      
      <div id="error"><?php echo $error.$successMessage; ?></div>
      
      <form method="post">
  <fieldset class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    <small class="text-muted">We'll never share your email with anyone else.</small>
  </fieldset>
  <fieldset class="form-group">
    <label for="subject">Subject</label>
    <input type="text" class="form-control" id="subject" name="subject" >
  </fieldset>
  <fieldset class="form-group">
    <label for="exampleTextarea">What would you like to ask us?</label>
    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
  </fieldset>
  <button type="submit" id="submit" class="btn btn-info">Submit</button>
</form>
          
        </div>
			</div>

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
          
          
    <script type="text/javascript">
          
          $("form").submit(function(e) {
              
              var error = "";
              
              if ($("#email").val() == "") {
                  
                  error += "The email field is required.<br>"
                  
              }
              
              if ($("#subject").val() == "") {
                  
                  error += "The subject field is required.<br>"
                  
              }
              
              if ($("#content").val() == "") {
                  
                  error += "The content field is required.<br>"
                  
              }
              
              if (error != "") {
                  
                 $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
                  
                  return false;
                  
              } else {
                  
                  return true;
                  
              }
          })
          
    </script>
				</div>
			</div>
		</div>
		 
		
</main>
<footer>
	<div class="row">
		<div class="col">
			<p class="footer-text"> ©2019 EvangelineArts. All rights reserved.</p>
		</div>
	</div>
</footer>
</body>
</html>
