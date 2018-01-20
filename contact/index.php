<!DOCTYPE html>
<html>
<head>
<!-- reCAPTCHA KEY: 6LceKAoUAAAAAMqiV1-TBMJJqbYn_cOaiKvF8Vbv
 -->
	<meta charset="UTF-8">
	<meta id="meta" name="viewport" content="width=device-width; initial-scale=1.0" />
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />

	<link rel="stylesheet" type="text/css" href="../slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="../slick/slick-theme.css"/>
	<link rel="stylesheet" type="text/css" href="../css/sethestep.css">
	<link href="https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Quattrocento|Alegreya+SC:400,400i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans|Cormorant+Garamond" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
	<script src="../js/eastcraft2.2.js"></script> 
	<script type="text/javascript" src="../slick/slick.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>

</head>
<body>
    
  	<?php 
  		$selected = 'contact';
  		require '../seth_header.php'; 
  	?>
  	
		  	<div class="back-panel"></div>
			<div class="content-only">
				<p class="centered-cloud no-border" > Seth is based out of Alexandria, VA.  The best way to contact him is by sending him a message:</p>

				<div class="form-div">
					<form id="contactForm" action="php/contactengine.php" method="post">
						<p class="success-msg">Thank You for Reaching out to us. <br> We'll get back to you soon!</p>
						<input name="name" type="text" class="form-input required" id="nameInput" placeHolder="Name"/>
						<input name="email" type="email" class="form-input required" id="emailInput" placeHolder="Email"/>
						<textarea name="message" type="text" class="form-input required" id="messageInput" placeHolder="Message"></textarea>
						<input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
						<div id="grecaptchaDiv" class="g-recaptcha" style="transform:scale(0.9);-webkit-transform:scale(.9);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>

						<button class="ec-button submit-button" type="submit"><h1 class="inset-text">SEND</h1></button>
					</form>
				</div>
			</div>
		</div>
		
		<?php require('../seth_footer.php'); ?>
		
	</div>
  </div>
  
  
</body>