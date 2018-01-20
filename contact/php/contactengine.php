<?php

		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$from = 'Eastcraft Contact Form'; 
/*		$to = 'seth@eastcraftshop.com'; */
/*		$to = 'klingmachine@gmail.com';*/
/*		$to = 'seth@eastcraftshop.com, sethestep@gmail.com'; */
		$to = 'seth@eastcraftshop.com.test-google-a.com';
		$subject = 'Message from Eastcraft Form';
		
		$body = "From: $name\n E-Mail: $email\n Message:\n $message";
 

		// If there are no errors, send the email
		if (mail ($to, $subject, $body, $from)) {
			$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
		} else {
			$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
		}




/*
$EmailFrom = "chriscoyier@gmail.com";
$EmailTo = "klingmachine@gmail.com";
$Subject = "Nice & Simple Contact Form by CSS-Tricks";
$Name = Trim(stripslashes($_POST['Name'])); 
$Tel = Trim(stripslashes($_POST['Tel'])); 
$Email = Trim(stripslashes($_POST['Email'])); 
$Message = Trim(stripslashes($_POST['Message'])); 

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contactthanks.php\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
}

*/
?>