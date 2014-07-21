<?
/***************************************************************************
 *		WebDB/contact/index.php
 *                            -------------------
 *		begin                : Sunday, 29 November 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/
 
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
//
// Start main code
//

if(isset($_POST['contact_submit']))
{
	if (!empty($_SESSION['captcha_code']) && strtoupper($_POST['captcha_code']) == $_SESSION['captcha_code'])
	{
		unset($_SESSION['captcha_code']);
		//
		// Some basic variables set
		//
		$contact_name = stripslashes($_POST['contact_name']);
		$contact_email = stripslashes($_POST['contact_email']);
		$contact_subject = stripslashes($_POST['contact_subject']);
		$contact_message = stripslashes($_POST['contact_message']);
		$contact_ip = getenv("REMOTE_ADDR");
	
		if (mail('hakaslak@gmail.com',$contact_subject,$contact_message,"From: $contact_name <$contact_email>"))
		{
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
			echo ("
			<div id=\"main_content_announcemets\">Message successfully sent!</div>
			<p>I (Andrew) recieved your message! Unless it is spam, you should recieve a reply eventually.</p>
			<p><strong>Thank you for contacting me! Your feedback is very much appreciated!</strong></p>
			");
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
		}
		else
		{
			$error_message_send = 8; // Error sending email (contact form)
			header("Location: index.php?error_msg=" . $error_message_send); 
		}
	}// end captcha
	else
	{
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
			echo('The security code you entered was wrong. Please <a href="' . $_SERVER['PHP_SELF'] . '" title="Go back and try again">click here and try again.</a>');
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
	}
}// end of isset
else
{
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
?>
<form method="post" action="<?= ($_SERVER['PHP_SELF']); ?>">
<table summary="A form to contact the webmaster of <?=$current_domain?>" width="100%" id="contact" cellspacing="0" cellpadding="10" >
	<caption>Send Andrew a message!</caption>
	<tr>
	<td>
	<label for="contact_name">Your name</label>
	<br />
	<input type="text" name="contact_name" id="contact_name" maxlength="20"/>
	</td>
	</tr>
	<tr>
	<td>
	<label for="contact_email">Your email:</label>
	<br />
	<input type="text" name="contact_email" id="contact_email" maxlength="60"/>
	</td>
	</tr>
	<tr>
	<td>
	<label for="contact_subject">Subject:</label>
	<br />
	<input type="text" name="contact_subject" id="contact_subject" maxlength="60"/>
	</td>
	</tr>
	<tr>
	<td>
	<label for="contact_message">Message:</label>
	<br />
	<textarea name="contact_message" id="contact_message" cols="50" rows="10"></textarea>
	</td>
	</tr>
	<tr>
	<td>
	<img src="<?='http://' . $current_domain_plain . '/files/includes/captcha/security-image.php?width=144'?>" width="144" height="30" alt="Security Image" />
	<br />
    <label for="captcha_code">Security Image:</label>
	<br />
	<input type="text" name="captcha_code" id="captcha_code" value="" />
	</td>
	</tr>
	<tr>
	<td>
	<input type="submit" name="Submit" id="Submit" value="Send message!" />
	<input type="hidden" name="contact_submit" value="contact_submit" />
	</td>
	</tr>
</table>
<p>Your Internet Protocol (IP) address is being logged as <?= getenv("REMOTE_ADDR"); ?></p>
</form>
<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
}// end of main if/else statement for showing results or not...
?>