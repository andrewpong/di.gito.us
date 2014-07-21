<?
/***************************************************************************
 *		WebDB/error.php
 *                            -------------------
 *		begin                : Sunday, 12 November 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/

$error_message_sent = "";
if (isset($_GET['error_msg']))
{
	$error_message_sent = $_GET['error_msg'];
	switch($error_message_sent)
	{
		case "1":$error_message = ("Your emails do not match");break;
		case "2":$error_message = ("The email address <strong>" . ($_GET['sent_email_problem']) . "</strong> is invalid. Please check to make sure it is correct and try again!");break;
		case "3":$error_message = ("\"" . ($_GET['sent_email_problem']) . "\" has already been registered!");break;
		case "4":$error_message = ("\"" . ($_GET['sent_phone']) . "\" is not a valid phone number!");break;
		case "5":$error_message = ("\"" . ($_GET['sent_area']) . "\" is not a valid area code!");break;
		case "6":$error_message = ("\"" . ($_GET['sent_email_problem']) . "\" has played this lottery! Stop being greedy =P");break;
		case "7":$error_message = ("\"" . ($_GET['sent_username']) . "\" has already registered for an account!");break;
		case "8":$error_message = ("Error sending message!");break;
		case "9":$error_message = ("Please fill out all required fields!");break;
		case "10":$error_message = ("Your old password is not correct!");break;
		case "11":$error_message = ("Your new passwords do not match!");break;
		case "12":$error_message = ("Your post is too long!");break;
	}
	echo ("<div id=\"error_message\">" . $error_message . "</div>");
}
?>