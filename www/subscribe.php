<?php
if ( isset( $_POST['newsletter_submit'] ) ) {
	// Initialize error array
	$newsletter_errors = array();

	// Check email input field
	if ( trim( $_POST['newsletter_email'] ) === '' )
		$newsletter_errors[] = 'Adresse mail requise';
	elseif ( !preg_match( "/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,4}$/i", trim( $_POST['newsletter_email'] ) ) )
		$newsletter_errors[] = 'Adresse mail non valide'; 
	else
		$newsletter_email = trim( $_POST['newsletter_email'] );
	
	// Send email if no input errors
	if ( empty( $newsletter_errors ) ) {
		$email_to = "ohouii.web@gmail.com"; // Change to your own email address
		$subject = "Inscription pour le lancement du site";
		$body = "Details: " . $newsletter_email . "\r\n";
		$headers = "Inscription lancement: <" . $email_to . ">\r\nReply-To: " . $newsletter_email . "\r\n";
		mail( $email_to, $subject, $body, $headers );
		echo 'Merci pour votre soutien, vous serez l\'un de nos privilégiés (mais surtout grand chanceux) à être averti de la sortie de notre site !';
	} else {
		echo 'Please go back and correct the following errors:<br />';
		foreach ( $newsletter_errors as $error ) {
			echo $error . '<br />';
		}
	}
}
?>