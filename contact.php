<?php

if (isset($_POST['sub'])) {
	$name = htmlspecialchars($_POST['Name']);
	$email = htmlspecialchars($_POST['email']);
	$subject = " ";
	$message = htmlspecialchars($_POST['mssg']);

	if (!empty($name) && !empty($email)  && !empty($message)) {
		//passed
		//check email
		if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			//failed
			$msg = 'plese use à valide email';
			$msgClass = 'alert-danger';
		} else {
			$to_email = "harragui28@gmail.com";
			$body = 'Contact Request :
                        Name :' . $name . '
                        Email :' . $email . '
                        Subject :' . $subject . '
                        Message :' . $message . '
                        ';

			if (mail($to_email, $subject, $body, "headres")) {
				echo ("Email successfully sent to ...");
			} else {
				echo ("Email sending failed...");
			}
		}
	}
}

?>
<h1 class="text-center" id="title">Contacter Moi</h1>
<div class="container bg-light" id="contact">

	<form action="cv.php" method="post">
		<div class="form-group" id="survey-form">
			<label for="label-name">* Nom :</label>
			<input type="text" name="Name" class="form-control" placeholder="Name" required>
		</div>
		<div class="alert">
		</div>
		<div class="form-group" id="survey-form">
			<label for="label-mail">* Email :</label>
			<input type="text" name="email" class="form-control" placeholder="Email" required>
		</div>
		<div class="alert">
		</div>

		<div class="alert">
		</div>
		<div class="form-group">
			<label for="exampleFormControlTextarea1">Message :</label>
			<textarea name="mssg" id="message" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
		</div>
		<div class="alert">
		</div>
		<div class="form-group">
			<input type="submit" name="sub" class="btn btn-primary btn-lg btn-block" value="Envoyer">
		</div>
		<div class="form-group">
		</div>

</div>
</div>