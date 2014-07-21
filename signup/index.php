<?
/***************************************************************************
 *		WebDB/beta_scripts/signup/index.php
 *                            -------------------
 *		begin                : Sunday, 12 November 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/

require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
$error_message_sent = "";
if (isset($_POST['signup_submit']))
{
	$register_username = varclean($_POST['register_username']);
	$register_email_1 = varclean($_POST['register_email_1']);
	$register_email_2 = varclean($_POST['register_email_2']);
	$register_ip = getenv("REMOTE_ADDR");
	$register_group = 1;

	$sent_username = ('&sent_username=' . $register_username);
	$sent_email_1 = ('&sent_email_1=' . $register_email_1);
	$sent_email_2 = ('&sent_email_2=' . $register_email_2);

	$check_username_availability = mysql_query("SELECT * FROM cms_users WHERE (user_username='$register_username')");

	if (($_POST['register_username'] == '') || ($_POST['register_email_1'] == '') || ($_POST['register_email_2'] == ''))
	{
		unset($_POST['signup_submit']);
		$error_message_send = 9; // Some fields are missing.
		header('Location: ' . ($_SERVER['PHP_SELF']) . '?error_msg=' . $error_message_send . $sent_username . $sent_email_1 . $sent_email_2);
	}
	else
	{
		if (mysql_num_rows($check_username_availability) == 0) // Make sure the username is available.
		{
			if ($register_email_1 == $register_email_2) // Make sure the emails match.
			{
				if (validate_email($register_email_1)) // Make sure the email is valid syntactically.
				{
					$check_email_availability = mysql_query("SELECT * FROM cms_users WHERE (user_email='$register_email_1')");
					if (mysql_num_rows($check_email_availability) == 0) // Make sure the email has not been registered.
					{
						$display_password = substr(md5(time()),0,6);
						$insert_password = md5($display_password);
						// If all is well we dump everything into the database...
						$register_username = (mysql_escape_string($register_username));
						$insert_password = (mysql_escape_string($insert_password));
						$register_email_1 = (mysql_escape_string($register_email_1));
						$register_group = (mysql_escape_string($register_group));
						$register_ip = (mysql_escape_string($register_ip));
						$register_user_information = "
						INSERT INTO cms_users (user_username, user_password, user_email, user_group, user_ip) 
						VALUES ('$register_username', '$insert_password', '$register_email_1', '$register_group', '$register_ip')";
						mysql_query($register_user_information) or die('The server made a boo boo! Not your fault!');
						require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/mailer.php');
						if(mail($register_email_1, $subject, $message, $from))
						{
							unset($_POST['signup_submit']);
							header('Location: ' . $current_domain . 'signup/success.php?' . $sent_username . $sent_email_1); 
						}
						else
						{
							echo 'Could not send email... darn...';
						}
					}
					else
					{
						unset($_POST['signup_submit']);
						$error_message_send = 3; // Email is taken
						header('Location: ' . ($_SERVER['PHP_SELF']) . '?error_msg=' . $error_message_send . $sent_username . $sent_email_problem); 
					}
				}
				else
				{
					unset($_POST['signup_submit']);
					$error_message_send = 2; // Email_1 is invalid
					header('Location: ' . ($_SERVER['PHP_SELF']) . '?error_msg=' . $error_message_send . $sent_username . $sent_email_problem); 
				}
			}
			else
			{
				unset($_POST['signup_submit']);
				$error_message_send = 1; // Emails do not match
				header('Location: ' . ($_SERVER['PHP_SELF']) . '?error_msg=' . $error_message_send . $sent_username); 
			}// end of email / password check
		}
		else
		{
			unset($_POST['signup_submit']);
			$error_message_send = 7; // Username Taken
			header('Location: ' . ($_SERVER['PHP_SELF']) . '?error_msg=' . $error_message_send . $sent_username . $sent_email_1 . $sent_email_2); 
		}//End of the ifelse
	}//End of check for blank fields
}// end of isset
else
{
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
?>
<h2>You need a real email!</h2>
<form method="post" action="<?=($_SERVER['PHP_SELF']); ?>">
<table summary="<?=$current_domain_plain?> account registration form. Single column, seperate row for each type of information." width="100%" id="register" cellspacing="0" cellpadding="10" >
	<caption>Sign up for a <strong>free</strong> <?=$current_domain_plain?> account!</caption>
	<tr>
	<td>
	<label for="register_username">Desired username:</label>
	<br />
	<input type="text" name="register_username" id="register_username" value="<? $register_username_sent = ""; if (isset($_GET['sent_username'])){echo (htmlspecialchars($_GET['sent_username']));}?>"/><? if (!isset($_GET['sent_username'])){echo ('<span style="color:red;font-size:large"> &#171;</span>');}?>
	</td>
	</tr>
	<tr>
	<td>
	<label for="register_email_1">Email:</label>
	<br />
	<input type="text" name="register_email_1" id="register_email_1" value="<? $register_email_1_sent = ""; if (isset($_GET['sent_email_1'])){echo (htmlspecialchars($_GET['sent_email_1']));}?>"/><? if (!isset($_GET['sent_email_1'])){echo ('<span style="color:red;font-size:large"> &#171;</span>');}?>
	</td>
	</tr>
	<tr>
	<td>
	<label for="register_email_2">Re-enter email:</label>
	<br />
	<input type="text" name="register_email_2" id="register_email_2" value="<? $register_email_2_sent = ""; if (isset($_GET['sent_email_2'])){echo (htmlspecialchars($_GET['sent_email_2']));}?>"/><? if (!isset($_GET['sent_email_2'])){echo ('<span style="color:red;font-size:large"> &#171;</span>');}?>
	</td>
	</tr>
	<tr>
	<td>
	<input type="submit" name="Submit" id="Submit" value="Submit" />
	<input type="hidden" name="signup_submit" id="signup_submit" value="signup_submit" />
	</td>
	</tr>
</table>
<p>Your Internet Protocol (IP) address is being logged as <?= getenv("REMOTE_ADDR"); ?></p>
</form>
<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
}// end of main if/else statement for showing results or not...
?>