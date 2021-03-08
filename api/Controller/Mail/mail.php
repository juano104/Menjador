<?php
class Mail{

	function send_mail(){
		if(isset($_POST['send']))
        {
		$to_email=$_POST['to'];
		$subject=$_POST['subject'];
		$message=$_POST['message'];
			
		$to = $to_email;
        $subject = $subject;
        $txt = $message;
        $headers = "From: sergimoya155@gmail.com" . "\r\n" .
        "CC: sergimoya155@gmail.com";
		mail($to,$subject,$txt,$headers);
		}
        $this->view->render('mail/send_mail');
	}
}
?>